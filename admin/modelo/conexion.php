<?php

class Conexion
{

    public static function conectar()
    {

        try {
            $link = new PDO("mysql:host=localhost;dbname=platanea_db;charset=utf8mb4", "root", "");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $link; 
          
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}

?>