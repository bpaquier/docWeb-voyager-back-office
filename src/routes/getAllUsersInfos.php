<?php
namespace Routes;

require __DIR__ . '/../../vendor/autoload.php';

use Config\PDOConnexion;
use Config\dataBaseConnexion;
use PDO;


class getAllUsersInfos implements dataBaseConnexion
{
    private $pdo;
    private $sql;

    public function dbConnection()
    {
        $db = new PDOConnexion();
        $this->pdo = $db->connect();
    }

    public function setSqlRequest()
    {
        $this->sql = "SELECT * FROM user";
    }

    public function returnResponse()
    {
        $pdo = $this->pdo;
        try {
           $stmt = $pdo->prepare($this->sql);
           $stmt->execute();
           $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return json_encode($response);
        } catch (Exception $e) {
            return 'DB connection error' . $e.getMessage();
        }
    }
}




