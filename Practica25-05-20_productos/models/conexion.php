<?php
	class Conexion{
		public static function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=inventarios","root","");
			return $link;
		}
	}
?>