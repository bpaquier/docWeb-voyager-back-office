<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand" href="#">Voyager Manager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link  <?php echo $_GET['action'] == "login" ? "active" :  "";?>" href="index.php?action=login">Login<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" target="_blank" href="#">Voyager Website</a>
      <a class="nav-item nav-link <?php echo $_GET['action'] == "manager" ? "active" :  "";?>" href="index.php?action=manager">Manager</a>
    </div>
  </div>
</nav>

