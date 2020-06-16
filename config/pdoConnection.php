<?php
namespace Config;

use PDO;

class pdoConnection
{
    private static $pdo;

    private static string $db_host = "localhost:8889";
    private static string $db_user = 'root';
    private static string $db_pass = 'root';
    private static string $db_name = 'bibliotheque';

    public static function getPdo() {
        if(is_null(self::$pdo))
        {
            try
            {
                $mysql_connect_str = "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name;
                $dbConnection = new PDO($mysql_connect_str, self::$db_user, self::$db_pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
                self::$pdo = $dbConnection;
            } catch (\PDOException $e) {
                die('Impossible de se connecter au serveur MySQL: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}