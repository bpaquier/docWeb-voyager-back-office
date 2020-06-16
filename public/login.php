<?php

require_once __DIR__ . '/../config/bootstrap.php';

include_once __DIR__ . '/../includes/header.php';

include_once __DIR__ . '/../includes/main.php';

if (isset($_POST['password'])){
    $password = htmlspecialchars($_POST['password']);

    $check = new checkConnexion($password);

     if($check->checkPassword()){
         $_SESSION['checked'] = true;
         header('Location: manager.php?action=manager');
         addFlash('dark', 'Welcome on your dashboard');
         die();
     } else {
         addFlash('danger', 'Password incorrect');
         header('Location: login.php?action=login');
         die();
     }

}

include_once __DIR__ . '/../includes/sign-in-form.php';

include_once __DIR__ . '/../includes/flashes.php';

include_once __DIR__ . '/../includes/footer.php';