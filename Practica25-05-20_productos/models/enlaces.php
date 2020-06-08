<?php
	//modelo de enlaces web
	class Paginas{
		public static function enlacesPaginasModel($enlaces){
			if(($enlaces)== "login" || ($enlaces)== "tablero" || ($enlaces)== "usuarios" || ($enlaces)== "salir" || ($enlaces)== "inventario"){
				$module="views/modules/".$enlaces.".php";
			}else if ($enlaces=="index"){
				$module="views/modules/login.php";
			}else {
				$module="views/modules/login.php";
			}

			return $module;

		}
	}
?>