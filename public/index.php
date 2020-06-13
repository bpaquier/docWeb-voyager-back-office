<?php
session_start();
require "../controller/controller.php";

if(isset($_SESSION['check'])){
        
  echo "connected";
}

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


// $pdo = new PDOConnexion();
// $db = $pdo->connect();
// $stmt = $db->query('SELECT * FROM polaroids');
// $res = $stmt->fetchAll();

// var_dump($res);

  if( isset($_GET['action']) ) {
   

    if($_GET['action'] == "login" ){
      if(isset($_SESSION['check'])){
        redirectTo("manager");
      }
      include '../views/login.php';
    }

    if($_GET['action'] == "manager"){
      if(isset($_SESSION['check'])){
        
        include '../views/manager.php';
        include '../includes/form-script.php';
      } else {
        redirectTo("login");
      }
      
    }

    if($_GET['action'] == "check-pass"){
      checkPass($_POST['password']);

    }


    } else {
    include '../views/login.php';

    }

  

 ?>