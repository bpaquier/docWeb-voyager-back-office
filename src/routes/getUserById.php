<?php

namespace Routes;

require __DIR__ . '/../../vendor/autoload.php';

use Config\PDOConnexion;
use Config\dataBaseConnexion;
use PDO;

class getUserById implements dataBaseConnexion
{

    private $id;
    private $pdo;
    private $sql;

    public function __construct(int $id)
    {
    $this->id = $id;
    }

    public function dbConnection()
    {
        $db = new PDOConnexion();
        $this->pdo = $db->connect();
    }

    public function setSqlRequest()
    {
        $this->sql = "SELECT * FROM user WHERE id = :id";
    }

    public function returnResponse()
    {
        $pdo = $this->pdo;
        try {
            $stmt = $pdo->prepare($this->sql);
            $stmt->execute([
                'id' => $this->id
            ]);
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($response) ?: null;
        } catch (Exception $e) {
            return 'DB connection error' . $e.getMessage();
        }
    }
}