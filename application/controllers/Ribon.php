<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ribon extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {

		$this->load->model('user_model');

		$data =  array(
			'users' => $this->user_model->listUsers()
		);

		$this->load->view('login', $data);
	}

	public function home() {

		if(!$this->session->has_userdata('id')) {
			redirect('/');
		}
		$this->load->model('user_model');

		$id = $this->session->userdata('id');

		print_r($this->session->userdata('id'));

		$dados = array(
			'user' => $this->user_model->getUser($id)
		);

		$this->load->view('home', $dados);
	}

	public function dashboard() {

		$this->load->model('monster_model');
		$this->load->model('moeda_model');
		$this->load->model('death_model');
		$this->load->model('user_model');

		$id = $this->session->userdata('id');

		$this->monster_model->isBowserTrophy($id);
		$this->monster_model->isTurtleTrophy($id);
		$this->moeda_model->isCoinTrophy($id);
		$this->death_model->isDeathTrophy($id);

		$dados = array(
			'user' => $this->user_model->getUser($id)
		);

		$this->load->view('dashboard', $dados);

	}

	public function collect_coin($id, $value) {
		$this->load->model('moeda_model');
		$this->moeda_model->insertCoin($id, $value);
		redirect('/home');
	}

	public function die($id, $repeats) {
		$this->load->model('death_model');

		for($i=0;$i<$repeats;$i++) {
			$this->death_model->insertDeath($id);
		}
		redirect('/home');
	}

	public function kill($id, $monster, $repeats) {
		$this->load->model('monster_model');

		for($i=0;$i<$repeats;$i++){
			$this->monster_model->insertKill($id, $monster);
		}
		redirect('/home');
	}

	public function novo(){
		$nome = $_POST['nome'];

		$this->load->model('user_model');
		$this->user_model->insertUser($nome);

		redirect('/');
	}

	public function login() {
		$this->session->set_userdata('id', $_POST['id']);
		$this->session->set_userdata('name', $_POST['nome']);

		redirect('/home');
	}





}
