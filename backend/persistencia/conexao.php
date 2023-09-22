<?php
class Conexao {
    // private $host = "localhost";
    // private $user = "root";
    // private $pass = "";
    // private $database = "database1";
    // private $mysqli;
    private static $pdo;
    private $host;
    private $database;
    private $user;
    private $pass;
    

    public function __construct(){

        $this->host = 'localhost';
        $this->database = 'database1';
        $this->user = 'root';
        $this->pass = '';
                
    }
    public function conectaDB(){

        try {
            if (!static::$pdo) {
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
                $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                static::$pdo = new PDO($dsn, $this->user, $this->pass, $opcoes);
            }
            return static::$pdo;
        } catch (PDOException $erro) {
            die("Erro ao conectar ao banco " . $erro->getMessage());
        }
    }

}

