<?php
  class PDOConnexion
  {
      private $db_host = "127.0.0.1:3306";
      private $db_user = 'root';
      private $db_pass = 'root';
      private $db_name = 'voyager';
  
      public function connect(){
          $mysql_connect_str = "mysql:host=$this->db_host;dbname=$this->db_name";
          $dbConnection = new PDO($mysql_connect_str, $this->db_user, $this->db_pass,[
              PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
          ]);
  
          return $dbConnection;
      }
  }



  
  if(isset($_POST['record'])){

  $pdo = new PDOConnexion();
  $db = $pdo->connect();
  $stmt = $db->prepare('UPDATE how_to_use_it
  SET title = :title, text_1 = :text_1, text_2 = :text_2
  WHERE id = :id');

  $stmt->execute(array(
  ':id' => $_POST['id'],
  ':title' => $_POST['title'],
  'text_1' => $_POST['text-1'],
  'text_2' => $_POST['text-2'],
  ));

  $pdo = null;
  redirectTo("manager");
  }else if (isset($_POST['polaroids'])){
    

      $pdo = new PDOConnexion();
      $db = $pdo->connect();
      $stmt = $db->prepare('UPDATE polaroids
      SET title = :title, text_1 = :text_1, text_2 = :text_2
      WHERE id = :id');
    
      $stmt->execute(array(
      ':id' => $_POST['id'],
      ':title' => $_POST['title'],
      'text_1' => $_POST['text-1'],
      'text_2' => $_POST['text-2'],
      ));
    
      $pdo = null;
      redirectTo("manager");
  }

