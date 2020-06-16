<?php

function addFlash (string $type, string $message):void
{
    $_SESSION['flashes'][] = [
        'type' => $type,
        'message' => $message,
    ];
}


function getFlashes ():array
{
    $flashes = $_SESSION['flashes'] ?? [];
    unset($_SESSION['flashes']);
    return $flashes;
}