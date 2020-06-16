<?php


use Config\DataBaseInsertion;

require_once __DIR__ . '/../config/bootstrap.php';

if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['text-1']) && isset($_POST['text-2'])){
    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $text_1 = htmlspecialchars($_POST['text-1']);
    $text_2 = htmlspecialchars($_POST['text-2']);

    $insert = new DataBaseInsertion($id, $title, $text_1, $text_2);

    if (isset($_POST['record'])) {
        $insert->connect();
        $insert->addOnTableUse();
    } elseif (isset($_POST['polaroids'])) {
        $insert->connect();
        $insert->addOnTableTeam();
    }
unset($_POST);
}

include_once __DIR__ . '/../includes/header.php';

include_once __DIR__ . '/../includes/main.php';

include_once __DIR__ . '/../includes/displayer.php';

include_once __DIR__ . '/../includes/select-form.php';

include_once  __DIR__ . '/../includes/footer.php';

include_once __DIR__ . '/../includes/form-script.php';



