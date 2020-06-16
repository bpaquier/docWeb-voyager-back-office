<?php

require_once __DIR__ . '/../config/bootstrap.php';

include_once __DIR__ . '/../includes/header.php';

if (isset($_POST['password'])){
    $password = htmlspecialchars($_POST['password']);

    $check = new checkConnexion($password);

     if($check->checkPassword()){
         $_SESSION['checked'] = true;
         header('Location: index.php');
     } else {
         header('Location: index.php');
     }

}

include_once __DIR__ . '/../includes/sign-in-form.php';