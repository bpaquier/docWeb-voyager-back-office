<?php

require_once __DIR__ . '/../config/bootstrap.php';

include_once __DIR__ . '/../includes/header.php';

if(isset($_SESSION['checked']))
{
    header('Location: manager.php?action=manager');
} else {
    header(('Location: login.php?action=login'));
}

