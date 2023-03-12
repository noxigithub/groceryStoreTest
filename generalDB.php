<?php

class DB_Connection{

  private  $servername = "localhost";
  private  $username = "yourusername";
  private  $password = "yourpassword";
  private  $dbname = "yourdbname";


  public function Connection(){
    try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }

      return $conn;
  }
}


