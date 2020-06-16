<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Voyager Manager</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand" href="index.php">Voyager Manager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a
          class="nav-item nav-link
      <?php
      if (isset($_GET['action']) && $_GET['action'] === "login")
      {
          echo "active";
      } ?>
        " href="<?php
      if(isset($_SESSION['checked'])){
          echo 'logout.php';
      } else {
          echo 'login.php?action=login';
      }?>"><?php
            if(isset($_SESSION['checked'])){
                echo 'Log Out';
            } else {
                echo 'Log In';
            }
          ?> <span class="sr-only">(current)</span></a>

      <a class="nav-item nav-link <?php
      if (isset($_GET['action']) && $_GET['action'] === "manager")
      {
          echo "active";
      } ?>" href="manager.php?action=manager">Dashboard</a>
        <a class="nav-item nav-link" target="_blank" href="https://golden-record.netlify.app/#/">Visit Voyager Website</a>
    </div>
  </div>
</nav>

