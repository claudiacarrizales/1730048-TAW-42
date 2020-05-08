<?php 
	//ELIMINACION DE LA FILA CEN BASE A SU IDENTIFICADOR
	include_once 'conection.php';
	if(isset($_GET['id_categoria'])){
		$id=(int) $_GET['id_categoria'];
		$delete=$conection->prepare('DELETE FROM categoriaProducto WHERE id_categoria=:id_categoria');
		$delete->execute(array(
			':id_categoria'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>