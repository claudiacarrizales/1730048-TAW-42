<?php 
//ELIMINACION DE LA FILA CEN BASE A SU IDENTIFICADOR
	include_once 'conection.php';
	if(isset($_GET['id_cat_fab'])){
		$id=(int) $_GET['id_cat_fab'];
		$delete=$conection->prepare('DELETE FROM catFabricante WHERE id_cat_fab=:id_cat_fab');
		$delete->execute(array(
			':id_cat_fab'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>