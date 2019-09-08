<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url('assets/css/dashboard.css')?>"

  <meta charset="utf-8">
	<title>DashBoard de Troféis</title>
  <script src="https://kit.fontawesome.com/02bc6d3fdb.js"></script>
</head>
<body>

<div class="container">

  <div class="row">

    <div class="col"> <h3> Moedas: </h3> </div>
    <?php
      foreach ($GLOBALS['coin_status'] as $trofeu ): ?>
        <div class="col">
          <span style="font-size: 90px; color: <?php echo $trofeu ? 'yellow' : 'grey'?>;">
            <i class="fas fa-trophy"></i>
          </span>
        </div>
    <?php endforeach; ?>
  </div>

  <div class="row">

    <div class="col"> <h3> Mortes: </h3> </div>
    <?php
      foreach ($GLOBALS['death_status'] as $trofeu ): ?>
        <div class="col">
          <span style="font-size: 90px; color: <?php echo $trofeu ? 'yellow' : 'grey'?>;">
            <i class="fas fa-trophy"></i>
          </span>
        </div>
    <?php endforeach; ?>
  </div>

  <div class="row">

    <div class="col"> <h3> Turtles: </h3> </div>
    <?php
      foreach ($GLOBALS['turtle_status'] as $trofeu ): ?>
        <div class="col">
          <span style="font-size: 90px; color: <?php echo $trofeu ? 'yellow' : 'grey'?>;">
            <i class="fas fa-trophy"></i>
          </span>
        </div>
    <?php endforeach; ?>
  </div>

  <div class="row">
    <div class="col"> <h3> Bowsers: </h3> </div>
    <?php
      foreach ($GLOBALS['bowser_status'] as $trofeu ): ?>
        <div class="col">
          <span style="font-size: 90px; color: <?php echo $trofeu ? 'yellow' : 'grey'?>;">
            <i class="fas fa-trophy"></i>
          </span>
        </div>
    <?php endforeach; ?>
  </div>
  <h3>
    Nome: <?=$user['name']?>
    Moedas: <?=$user['sum_coins']?>
    Mortes: <?=$user['sum_deaths']?>
    Turtles: <?=$user['sum_turtles']?>
    Bowsers: <?=$user['sum_bowsers']?>
  </h3>
  <a href="<?= base_url('ribon/home')?>">
    <button type="button" class="btn btn-primary">VOLTAR</button>
  </a>


</div>

</body>


</html>
