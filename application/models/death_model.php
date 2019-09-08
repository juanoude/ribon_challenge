<?php
  class Death_model extends CI_Model {
    public function insertDeath($id){
      $sql = "INSERT INTO deaths (user_id) VALUES ( ? )";
      $this->db->query($sql, $id);

      $this->load->model('user_model');
      $this->user_model->refreshDeathScore($id);

      $this->isDeathTrophy($id);

    }

    public function isDeathTrophy($id){

      $this->load->model('user_model');
      $score = $this->user_model->getSum($id);
      $level = 0;

      $GLOBALS['death_mark'] = array(
          0 => 1,
          1 => 10,
          2 => 25,
          3 => 50,
          4 => 100
      );

      $GLOBALS['death_status'] = array(
          0 => false,
          1 => false,
          2 => false,
          3 => false,
          4 => false
      );

      for($i=0;$i<5;$i++) {
        if($GLOBALS['death_mark'][$i] <= $score['sum_deaths']) {
          $GLOBALS['death_status'][$i] = true;
          $level++;
        }else {
          break;
        }
      }

      $type = 'DEATH';
      $this->load->model('trophies_model');
      $this->trophies_model->insertOrUpdateTrophy($id, $level, $type);

    }
  }

 ?>
