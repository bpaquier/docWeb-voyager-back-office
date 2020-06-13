<?php

require "../model/model.php";


function redirectTo($route){
  header('Location: index.php?action='. $route);
}

function checkPass($pass){
  if($pass == "pute"){
    
    $_SESSION['check'] = true;
    redirectTo("manager");
  }
  
  
}

