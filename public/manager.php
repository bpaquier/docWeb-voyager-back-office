<?php


use Config\DataBaseInsertion;

require_once __DIR__ . '/../config/bootstrap.php';

if(!isset($_SESSION['checked'])){
    addFlash('danger', 'You have to be connected to access at the dashboard');
    header('Location: index.php');
    die();
}

if(isset($_POST['record']) || isset($_POST['polaroids'])){
    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $text_1 = htmlspecialchars($_POST['text-1']);
    $text_2 = htmlspecialchars($_POST['text-2']);
    $text_3 = htmlspecialchars($_POST['text-3']);

    $insert = new DataBaseInsertion($id, $title, $text_1, $text_2, $text_3);

    if (isset($_POST['record'])) {
        $insert->connect();
        $insert->addOnTableUse();
        addFlash('success', 'Post changed with success');

    } elseif (isset($_POST['polaroids'])) {
        $insert->connect();
        $insert->addOnTableTeam();
        addFlash('success', 'Post changed with success');

    }
unset($_POST);
}

include_once __DIR__ . '/../includes/header.php';

include_once __DIR__ . '/../includes/main.php';

include_once __DIR__ . '/../includes/flashes.php';

include_once __DIR__ . '/../includes/displayer.php';

include_once __DIR__ . '/../includes/select-form.php';

include_once  __DIR__ . '/../includes/footer.php';

include_once __DIR__ . '/../includes/form-script.php';



