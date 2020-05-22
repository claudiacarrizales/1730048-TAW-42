<?php 
//ELIMINACION DE LA FILA CEN BASE A SU IDENTIFICADOR
	include_once 'conection.php';
	if(isset($_GET['id_fabricante'])){
		$id=(int) $_GET['id_fabricante'];
		$delete=$conection->prepare('DELETE FROM campoFabricante WHERE id_fabricante=:id_fabricante');
		$delete->execute(array(
			':id_fabricante'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>