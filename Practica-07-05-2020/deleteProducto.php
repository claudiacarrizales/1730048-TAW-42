<?php 
	//ELIMINACION DE LA FILA CEN BASE A SU IDENTIFICADOR
	include_once 'conection.php';
	if(isset($_GET['id_producto'])){
		$id=(int) $_GET['id_producto'];
		$delete=$conection->prepare('DELETE FROM Producto WHERE id_producto=:id_producto');
		$delete->execute(array(
			':id_producto'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>