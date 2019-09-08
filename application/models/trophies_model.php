<?php

  class Trophies_model extends CI_Model {


    public function hasTrophie($id, $type) {
      $sql = "SELECT * FROM trophies WHERE user_id = ? AND type = ?";
      $query = $this->db->query($sql, array($id, $type));
      return $query->num_rows();
    }

    public function insertTrophie($id, $level, $type) {
      $sql = "INSERT INTO trophies (user_id, level, type) VALUES ( ? , ? , ? )";
      $query = $this->db->query($sql, array($id, $level, $type));
    }

    public function updateTrophie($id, $level, $type) {
      $sql = "UPDATE trophies SET level = ? WHERE user_id = ? AND type = ? ";
      $query = $this->db->query($sql, array($level, $id, $type));
    }

    public function insertOrUpdateTrophy($id, $level, $type) {
      if($this->hasTrophie($id, $type) == 1){
        $this->updateTrophie($id, $level, $type);
      }else {
        $this->insertTrophie($id, $level, $type);
      };
    }

  }


 ?>
