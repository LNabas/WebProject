<?php

/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 13/04/2017
 * Time: 10:00
 */
class Database
{
    private $pdo;

    public function __construct($login, $password, $database_name, $host = 'localhost')
    {
        $this->pdo = new PDO("mysql:dbname=$database_name;host=$host", $login, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }


    public function query($query, $params = false)
    {
        if($params)
        {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        }
        else{
            $req = $this->pdo->query($query);
        }

        return $req;
    }
}