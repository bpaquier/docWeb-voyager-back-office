<?php


class checkConnexion
{
    private string $password;
    private string $db_host = "custom-pcvp.mysql.eu2.frbit.com";
    private string $db_user = 'custom-pcvp';
    private string $db_pass = 'ClblgnkUMoXyy03hhy_whnlM';
    private string $db_name = 'custom-pcvp';

    public function __construct(string $password){
        $this->password = $password;
    }

    public function checkPassword():bool {
        $mysql_connect_str = "mysql:host=$this->db_host;dbname=$this->db_name";
        $pdo = new PDO($mysql_connect_str, $this->db_user, $this->db_pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $pdo->prepare('SELECT password FROM users where id = "1"');
        $password = $pdo->fetch();
        if(password_verify($this->password, $password))
        {
            return true;
        }
        else {
            return false;
        }
    }
}