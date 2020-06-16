<?php


class checkConnexion
{
    private string $password;

    public function __construct(string $password){
        $this->password = $password;
    }

    public function checkPassword():bool {
        if($this->password === 'password')
        {
            return true;
        }
        else {
            return false;
        }
    }
}