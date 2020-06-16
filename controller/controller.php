<?php

require "../model/model.php";


function redirectTo($route){
  header('Location: index.php?action='. $route);
}

function checkPass($pass){
  if($pass == "password"){
    
    $_SESSION['check'] = true;
    redirectTo("manager");
  }
}

