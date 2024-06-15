<?php
class database {
    private $hostname= "localhost";
    private $database="bunnielody-bd";
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