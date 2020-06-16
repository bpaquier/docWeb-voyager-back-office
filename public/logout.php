<?php

require_once __DIR__ . '/../config/bootstrap.php';

unset($_SESSION['checked']);

addFlash('success', 'you have been disconnected');

header('Location: index.php');


