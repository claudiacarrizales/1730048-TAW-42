<?php

class Conexion{

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=MVC_PRACTICA1", "admin", "5e6847ce9a2862a305e2d820e3eae97858d20168bc6d4b9f");
        return $link;
    }

}