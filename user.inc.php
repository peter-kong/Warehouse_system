<?php
  class User extends Dbh{

    public function getAllUsers(){
      $stmt = $this->connect()->query("SELECT * FROM score_data");

      while ($row = $stmt->fetch()) {
        $student_id = $row['student_id'];
        return $student_id;
      }

    }

    public function getUserWithCountCheck(){
       
    }

  }
 ?>
