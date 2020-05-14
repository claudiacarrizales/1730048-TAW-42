<?php
	//MODELO DE ENLACES WEB
	class paginas{
		public function enlacesPaginasModel($enlaces){
			if(($enlaces)=="ingresar" || ($enlaces)=="usuarios" || ($enlaces)=="productos" || ($enlaces)=="registroProducto" || ($enlaces)=="editar" || ($enlaces)=="editarProducto" || ($enlaces)=="salir"){
				$module = "views/modules/".$enlaces.".php";
			}
			else if($enlaces=="index"){
				$module = "views/modules/registro.php";
			}
			else if($enlaces=="ok"){
				$module = "views/modules/registro.php";
			}
			else if($enlaces=="fallo"){
				$module = "views/modules/ingresar.php";
			}
			else if($enlaces=="cambio"){
				$module = "views/modules/usuarios.php";
			}else{
				$module ="views/modules/registro.php";
			}
			return $module;
		}
	}
?>