<?php

namespace App;

use PDO;
use PDOException;

class DbSession{

    public $mysql;

    public function __construct()
    { 
        try {
            $this->mysql = $this->getConnection();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    private function getConnection(){
        // Local DataBase
        // $host = "localhost";
        // $user = "root";
        // $password = "";
        // $dtbase = "consulting";

        // Heroku DataBase
        $host = "eu-cdbr-west-01.cleardb.com";
        $user = "b7e460b0197f05";
        $password = "6b3c3055";
        $dtbase = "heroku_e61828cc2d20c4c";

        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host={$host}; dbname={$dtbase}", $user, $password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

}