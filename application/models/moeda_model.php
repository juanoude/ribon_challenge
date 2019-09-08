<?php
  class Moeda_model extends CI_Model {

    public function insertCoin($id, $value){
      $sql = "INSERT INTO  collected_coin (user_id, value) VALUES ( ? , ? )";
      $this->db->query($sql, array($id, $value));

      $this->load->model('user_model');

      $this->user_model->refreshCoinScore($id, $value);

      $this->isCoinTrophy($id);

    }

    public function isCoinTrophy($id){

      $this->load->model('user_model');
      $score = $this->user_model->getSum($id);
      $level = 0;

      $GLOBALS['coin_mark'] = array(
          0 => 1,
          1 => 100,
          2 => 1000,
          3 => 10000,
          4 => 100000
      );

      $GLOBALS['coin_status'] = array(
            0 => false,
            1 => false,
            2 => false,
            3 => false,
            4 => false
      );

      for($i=0;$i<5;$i++) {
        if($GLOBALS['coin_mark'][$i] <= $score['sum_coins']) {
          $GLOBALS['coin_status'][$i] = true;
          $level++;
        }else {
          break;
        }
      }

      $type = 'COIN';
      $this->load->model('trophies_model');
      $this->trophies_model->insertOrUpdateTrophy($id, $level, $type);
    }

  }

?>
