<?php

namespace Config;
use PDO;

class PDOConnexion
{
    private $db_host = "127.0.0.1:3306";
    private $db_user = 'root';
    private $db_pass = 'root';
    private $db_name = 'voyager';

    public function connect(){
        $mysql_connect_str = "mysql:host=$this->db_host;dbname=$this->db_name";
        $dbConnection = new PDO($mysql_connect_str, $this->db_user, $this->db_pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]);

        return $dbConnection;
    }
}