<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>Joguinho do Troféu</title>
</head>
<body>

<div class="container">
	<h1>Seja bem-vindo <?= $_SESSION['usuario']['name'] ?></h1>

	<div class="row">
		<div class="col">
			<h3> Moedas:</h3>
		</div>
			<div class="col">
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
				  <a href="<?=base_url("collect_coin/{$this->session->userdata('id')}/1")?>"> <button type="button" class="btn btn-secondary">1</button> </a>
				  <a href="<?=base_url("collect_coin/{$this->session->userdata('id')}/100")?>"> <button type="button" class="btn btn-secondary">100</button> </a>
					<a href="<?=base_url("collect_coin/{$this->session->userdata('id')}/1000")?>"> <button type="button" class="btn btn-secondary">1.000</button> </a>
					<a href="<?=base_url("collect_coin/{$this->session->userdata('id')}/10000")?>"> <button type="button" class="btn btn-secondary">10.000</button> </a>
					<a href="<?=base_url("collect_coin/{$this->session->userdata('id')}/100000")?>"> <button type="button" class="btn btn-secondary">100.000</button> </a>
				</div>
			</div>
	</div>

	<div class="row">
		<div class="col">
			<h3> Mortes:</h3>
		</div>
			<div class="col">
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
				  <a href="<?=base_url("die/{$this->session->userdata('id')}/1")?>"> <button type="button" class="btn btn-secondary">1</button> </a>
				  <a href="<?=base_url("die/{$this->session->userdata('id')}/10")?>"> <button type="button" class="btn btn-secondary">10</button> </a>
					<a href="<?=base_url("die/{$this->session->userdata('id')}/25")?>"> <button type="button" class="btn btn-secondary">25</button> </a>
					<a href="<?=base_url("die/{$this->session->userdata('id')}/50")?>"> <button type="button" class="btn btn-secondary">50</button> </a>
					<a href="<?=base_url("die/{$this->session->userdata('id')}/100")?>"> <button type="button" class="btn btn-secondary">100</button> </a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<h3> Turtles:</h3>
			</div>
				<div class="col">
					<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
					  <a href="<?=base_url("kill/{$this->session->userdata('id')}/1/1")?>"> <button type="button" class="btn btn-secondary">1</button> </a>
					  <a href="<?=base_url("kill/{$this->session->userdata('id')}/1/100")?>"> <button type="button" class="btn btn-secondary">100</button> </a>
						<a href="<?=base_url("kill/{$this->session->userdata('id')}/1/1000")?>"> <button type="button" class="btn btn-secondary">1.000</button> </a>
						<a href="<?=base_url("kill/{$this->session->userdata('id')}/1/10000")?>"> <button type="button" class="btn btn-secondary">10.000</button> </a>
						<a href="<?=base_url("kill/{$this->session->userdata('id')}/1/100000")?>"> <button type="button" class="btn btn-secondary">100.000</button> </a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<h3> Bowser:</h3>
				</div>
					<div class="col">
						<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
				  		<a href="<?=base_url("kill/{$this->session->userdata('id')}/2/1")?>"> <button type="button" class="btn btn-secondary">1</button> </a>
						  <a href="<?=base_url("kill/{$this->session->userdata('id')}/2/100")?>"> <button type="button" class="btn btn-secondary">100</button> </a>
							<a href="<?=base_url("kill/{$this->session->userdata('id')}/2/1000")?>"> <button type="button" class="btn btn-secondary">1.000</button> </a>
							<a href="<?=base_url("kill/{$this->session->userdata('id')}/2/10000")?>"> <button type="button" class="btn btn-secondary">10.000</button> </a>
							<a href="<?=base_url("kill/{$this->session->userdata('id')}/2/100000")?>"> <button type="button" class="btn btn-secondary">100.000</button> </a>
						</div>
					</div>
				</div>

				<a href="<?= base_url('ribon/dashboard')?>">
			    <button type="button" class="btn btn-warning">DASHBOARD</button>
			  </a>

				<a href="<?= base_url('ribon/index')?>">
			    <button type="button" class="btn btn-info">TROCAR USUARIO</button>
			  </a>

				<ul style = "margin-top: 3em;" class="list-group">
			    <li class="list-group-item list-group-item-primary">Nome: <?=$user['name']?></li>
			    <li class="list-group-item list-group-item-primary">Moedas: <?=$user['sum_coins']?></li>
			    <li class="list-group-item list-group-item-primary">Mortes: <?=$user['sum_deaths']?></li>
			    <li class="list-group-item list-group-item-primary">Turtles: <?=$user['sum_turtles']?></li>
			    <li class="list-group-item list-group-item-primary">Bowsers: <?=$user['sum_bowsers']?></li>
			  </ul>

</div>

</body>
</html>
