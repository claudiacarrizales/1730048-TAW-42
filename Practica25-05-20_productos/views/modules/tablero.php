<?php 
	/*Se verifica que exista una sesion, en caso de que no sea así, se muestra el login*/
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
	}
	/*Se llama al controlador que muestra las tarjetas con la informacion que se obtiene del sistema (#ventas,# de usuarios, # productos, #categorias, #movimientos en el stock, total de gancias)*/
	$tablero=new MvcController();
	$tablero->contarFilas();
?>