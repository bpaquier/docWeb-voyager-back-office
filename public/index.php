<?php
session_start();
require "../controller/controller.php";

if(isset($_SESSION['check'])){

}

include '../includes/post-db.php';
  if(isset($_GET['action'])) {
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