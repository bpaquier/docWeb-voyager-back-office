<?php

namespace Config;

require __DIR__ . '/../../vendor/autoload.php';

interface dataBaseConnexion
{
    public function dbConnection();

    public function setSqlRequest();

    public function returnResponse();
}