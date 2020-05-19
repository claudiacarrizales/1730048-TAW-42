<?php

class Conexion{

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=MVC_PRACTICA1", "root", "");
        return $link;
    }

}