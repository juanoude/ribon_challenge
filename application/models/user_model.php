<?php
  class User_model extends CI_Model {


    public function getSum($id) {

      $sql = "SELECT sum_coins, sum_deaths, sum_bowsers, sum_turtles FROM user WHERE id = ?";
      $query = $this->db->query($sql, $id);
      return $query->row_array();

    }

    // public function getTrophies($id){
    //   $sql = "SELECT level FROM trophies WHERE id = ?";
    //   $query = $this->db->query($sql, $id);
    //   $adapt = $query->row();
    //
    // }


    public function refreshCoinScore($id, $value){

      $score = $this->getSum($id);


      $sum = $score['sum_coins'] + $value;


      $sql = "UPDATE user SET sum_coins = ? WHERE id = ?";
      $this->db->query($sql, array($sum, $id));

    }

    public function refreshDeathScore($id) {

      $score = $this->getSum($id);

      $sum = $score['sum_deaths'] + 1;

      $sql = "UPDATE user SET sum_deaths = ? WHERE id = ?";
      $this->db->query($sql, array($sum, $id));
    }

    public function refreshKillScore($id, $monster) {

      $score = $this->getSum($id);

      switch($monster) {
        case 1:
          $sum = $score['sum_turtles'] + 1;
          $sql = "UPDATE user SET sum_turtles = ? WHERE id = ? ";
          $this->db->query($sql, array($sum, $id));
          break;

        case 2:
          $sum = $score['sum_bowsers'] + 1;
          $sql = "UPDATE user SET sum_bowsers = ? WHERE id = ? ";
          $this->db->query($sql, array($sum, $id));
          break;
      }


    }

    public function listUsers(){
      $sql = "SELECT * FROM user";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function insertUser($nome){
      $sql = "INSERT INTO user (name) VALUES ( ? )";
      $this->db->query($sql, $nome);
    }

    public function getUser($id){
      $sql = "SELECT * FROM user WHERE id = ? ";
      $query = $this->db->query($sql, $id);
      return $query->row_array();
    }


  }
 ?>
