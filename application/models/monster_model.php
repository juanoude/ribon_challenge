<?php
  class Monster_model extends CI_Model {
    public function insertKill($id, $monster){
      $sql = "INSERT INTO killed_monster (user_id, monster_id) VALUES ( ? , ? )";
      $this->db->query($sql, array($id, 1));

      $this->load->model('user_model');
      $this->user_model->refreshKillScore($id, $monster);

      if($monster == 1){
        $this->isTurtleTrophy($id);
      }else{
        $this->isBowserTrophy($id);
      }
    }

    public function isTurtleTrophy($id){

      $this->load->model('user_model');
      $score = $this->user_model->getSum($id);
      $level = 0;

      $GLOBALS['turtle_mark'] = array(
          0 => 1,
          1 => 100,
          2 => 1000,
          3 => 10000,
          4 => 100000
      );

      $GLOBALS['turtle_status'] = array(
            0 => false,
            1 => false,
            2 => false,
            3 => false,
            4 => false
      );

      for($i=0;$i<5;$i++) {
        if($GLOBALS['turtle_mark'][$i] <= $score['sum_turtles']) {
          $GLOBALS['turtle_status'][$i] = true;
          $level++;
        }else {
          break;
        }
      }

      $type = 'TURTLE';
      $this->load->model('trophies_model');
      $this->trophies_model->insertOrUpdateTrophy($id, $level, $type);
    }

  public function isBowserTrophy($id) {

    $this->load->model('user_model');
    $score = $this->user_model->getSum($id);
    $level = 0;

    $GLOBALS['bowser_mark'] = array(
        0 => 1,
        1 => 100,
        2 => 1000,
        3 => 10000,
        4 => 100000
    );

    $GLOBALS['bowser_status'] = array(
          0 => false,
          1 => false,
          2 => false,
          3 => false,
          4 => false
    );

    for($i=0;$i<5;$i++) {
      if($GLOBALS['bowser_mark'][$i] <= $score['sum_bowsers']) {
        $GLOBALS['bowser_status'][$i] = true;
        $level++;
      }else {
        break;
      }
    }

    $type = 'BOWSER';
    $this->load->model('trophies_model');
    $this->trophies_model->insertOrUpdateTrophy($id, $level, $type);
  }

}


 ?>
