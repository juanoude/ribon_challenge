<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
  <link rel="stylesheet" href="<?=base_url("assets/css/geral.css")?>">
	<title>Joguinho do Troféu</title>
</head>
<body>

<div class="container">
	<h1> Selecione o usuário: </h1>
    <ul class="list-group">
        <?php foreach($users as $user): ?>
          <li class="list-group-item list-group-item-primary">
            <form method="post" action="<?=base_url('ribon/login')?>">
              Nome: <?=$user['name']?>
              <input type="hidden" name="id" value="<?=$user['id']?>">
              <input type="hidden" name="nome" value="<?=$user['name']?>">
              Moedas: <?=$user['sum_coins']?>
              Mortes: <?=$user['sum_deaths']?>
              Turtles: <?=$user['sum_turtles']?>
              Bowsers: <?=$user['sum_bowsers']?>
              <input style=" float: right;" type="submit" class="btn btn-primary" value="Entrar">
            </form>
          </li>
        <?php endforeach; ?>
    </ul>

    <div class="novo form-group">
      <form action="<?=base_url('ribon/novo')?>" class="flex" method="post">
        <input type="text" name="nome" placeholder="Nome do novo usuário" required class = "form-control">
        <input style=" float: right;" type="submit" class="btn btn-info" value="Criar Novo">
      </form>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
