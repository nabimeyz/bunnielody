<?php
//encriptar la info de cada item de la tienda
define ("KEY", "metztliunam");
define ("COD", "AES-128-ECB");

class Database {

    //las propiedades se cambian cuando se sube a un web host
    private $hostname= "localhost";
    private $database="bunnielody-db";
    private $username= "root";
    private $password= "MiliPercy2001.";
    private $charset= "utf8";

    function conectar () {
        try {
           $conexion = "mysql:host=" . $this->hostname . "; dbname=". $this->database ."; charset=". $this->charset;
             $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
             $pdo = new PDO($conexion,  $this->username,  $this->password, $opciones);
             return $pdo; 
        }
     catch (PDOException $e) {
        echo 'Error en la conexion: ' . $e->getMessage();
        exit;
     }   

    }
}