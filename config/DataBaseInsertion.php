<?php

namespace Config;



use PDO;
use PDOException;


class DataBaseInsertion {
    private string $db_host = "custom-pcvp.mysql.eu2.frbit.com";
    private string $db_user = 'custom-pcvp';
    private string $db_pass = 'ClblgnkUMoXyy03hhy_whnlM';
    private string $db_name = 'custom-pcvp';
    private object $pdo;
    private string $id;
    private string $title;
    private string $text_1;
    private string $text_2;
    private string $text_3;


    public function __construct(string $id, string $title, string $text_1, string $text_2, string $text_3)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text_1 = $text_1;
        $this->text_2 = $text_2;
        $this->text_3 = $text_3;
    }

    public function connect(): bool {
        try {
            $mysql_connect_str = "mysql:host=$this->db_host;dbname=$this->db_name";
            $dbConnection = new PDO($mysql_connect_str, $this->db_user, $this->db_pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            $this->pdo = $dbConnection;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function addOnTableUse():void {
        $pdo = $this->pdo;

        $prevInfos = $pdo->prepare('SELECT * FROM how_to_use_it WHERE id = :id');
        $prevInfos->execute([
            'id' => $this->id
        ]);
        $infos = $prevInfos->fetch();

        strlen($this->title) > 0 ? $newTitle = $this->title  : $newTitle = $infos['title'];
        strlen($this->text_1) > 0 ? $newText_1 = $this->text_1  : $newText_1 = $infos['text_1'];
        strlen($this->text_2) > 0 ? $newText_2 = $this->text_2  : $newText_2 = $infos['text_2'];

        $stmt = $pdo->prepare('UPDATE how_to_use_it
            SET title = :title, text_1 = :text_1, text_2 = :text_2
            WHERE id = :id');
        $stmt->execute(array(
            'id' =>  $this->id,
            'title' => $newTitle ,
            'text_1' => $newText_1,
            'text_2' => $newText_2 ,
        ));

        /*
        $pdo = $this->pdo;
        $req = $pdo->prepare('INSERT INTO users (name, password) VALUES (:name, :pass)');
        $req->execute([
            "name" => 'Manager',
            "pass" => password_hash('voyager', PASSWORD_DEFAULT)
        ]);*/

    }

    public function addOnTableTeam():void {
        $pdo = $this->pdo;

        $prevInfos = $pdo->prepare('SELECT * FROM polaroids WHERE id = :id');
        $prevInfos->execute([
            'id' => $this->id
        ]);
        $infos = $prevInfos->fetch();

        strlen($this->title) > 0 ? $newTitle = $this->title  : $newTitle = $infos['title'];
        strlen($this->text_1) > 0 ? $newText_1 = $this->text_1  : $newText_1 = $infos['text_1'];
        strlen($this->text_2) > 0 ? $newText_2 = $this->text_2  : $newText_2 = $infos['text_2'];

        $stmt = $pdo->prepare('UPDATE polaroids
      SET title = :title, text_1 = :text_1, text_2 = :text_2
      WHERE id = :id');
        $stmt->execute(array(
            'id' =>  $this->id,
            'title' => $newTitle ,
            'text_1' => $newText_1,
            'text_2' => $newText_2 ,
        ));
    }

    public function addOnTableJourney():bool {

            $pdo = $this->pdo;

            $prevInfos = $pdo->prepare('SELECT * FROM journey WHERE id = :id');
            $prevInfos->execute([
                'id' => $this->id
            ]);
            $infos = $prevInfos->fetch();

            strlen($this->text_1) > 0 ? $newText_1 = $this->text_1 : $newText_1 = $infos['text_1'];
            strlen($this->text_2) > 0 ? $newText_2 = $this->text_2 : $newText_2 = $infos['text_2'];
            strlen($this->text_3) > 0 ? $newText_3 = $this->text_3 : $newText_3 = $infos['text_3'];

            $stmt = $pdo->prepare('UPDATE journey
          SET  text_1 = :text_1, text_2 = :text_2, text_3 = :text_3
          WHERE id = :id');
            $stmt->execute(array(
                'id' =>  $this->id,
                'text_1' => $newText_1,
                'text_2' => $newText_2 ,
                'text_3' => $newText_3 ,
            ));



            if(!$stmt) {
                return false;
            } else {
                return true;
            }

    }
}

