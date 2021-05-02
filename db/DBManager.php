<?php

include_once('config.php');

class DBzona extends PDO{
    protected $conn;

    function __construct(){
        try {
            //$this->conn = new PDO ("mysql:dbname=zona27;host=localhost", "xavi", "xavi");
            $this->conn = new PDO (DB_DSN, DB_USER, DB_PASS);
        } catch (PDOException $e){
            echo "Fallo en la conexion con la Base de Datos";
        }
    }

    function dbconn(){
        return $this->conn;
    }

};
?>