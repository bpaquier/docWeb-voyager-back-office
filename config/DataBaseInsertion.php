<?php

namespace Config;



use PDO;


class DataBaseInsertion {
    private string $db_host = "custom-pcvp.mysql.eu2.frbit.com";
    private string $db_user = 'custom-pcvp';
    private string $db_pass = 'ClblgnkUMoXyy03hhy_whnlM';
    private string $db_name = 'custom-pcvp';
    private $pdo;
    private string $id;
    private string $title;
    private string $text_1;
    private string $text_2;


    public function __construct(string $id, string $title, string $text_1, string $text_2)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text_1 = $text_1;
        $this->text_2 = $text_2;
    }

    public function connect(): bool {
        try {
            $mysql_connect_str = "mysql:host=$this->db_host;dbname=$this->db_name";
            $dbConnection = new PDO($mysql_connect_str, $this->db_user, $this->db_pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            $this->pdo = $dbConnection;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function addOnTableUse():void {
        /*$pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE how_to_use_it
            SET title = :title, text_1 = :text_1, text_2 = :text_2
            WHERE id = :id');
        $stmt->execute(array(
            ':id' =>  $this->id,
            ':title' => $this->title ,
            'text_1' => $this->text_1,
            'text_2' => $this->text_2 ,
        ));*/

        $pdo = $this->pdo;
        $req = $pdo->prepare('INSERT INTO users (name, password) VALUES (:name, :pass)');
        $req->execute([
            "name" => 'Manager',
            "pass" => password_hash('voyager', PASSWORD_DEFAULT)
        ]);

    }

    public function addOnTableTeam():void {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('UPDATE polaroids
      SET title = :title, text_1 = :text_1, text_2 = :text_2
      WHERE id = :id');
        $stmt->execute(array(
            ':id' =>  $this->id,
            ':title' => $this->title ,
            'text_1' => $this->text_1,
            'text_2' => $this->text_2 ,
        ));
    }
}

