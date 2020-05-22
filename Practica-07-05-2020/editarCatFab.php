<!--VERIFICAION DE LOS DATOS QUE SE HAYAN LLENADO CORRECTAMENTE SIN DEJAR UNOS EN BLANCO
		Y ASI MISMO EL USO DE EDITAR Y LA CARGA DE OS DATOS-->
<?php
	include_once 'conection.php';

	if(isset($_GET['id_cat_fab'])){
		$id=(int) $_GET['id_cat_fab'];

		$buscar_id=$conection->prepare('SELECT * FROM catFabricante WHERE id_cat_fab=:id_cat_fab LIMIT 1');
		$buscar_id->execute(array(
			':id_cat_fab'=>$id
		));
		$resu=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$nombre_cat_fab=$_POST['nombre_cat_fab'];

		if(!empty($nombre_cat_fab)){
			$sentencia_update=$conection->prepare('UPDATE catFabricante SET nombre_cat_fab=:nombre_cat_fab WHERE id_cat_fab=:id_cat_fab');
			$sentencia_update->execute(array(
				':id_cat_fab'=>$id,
				':nombre_cat_fab' =>$nombre_cat_fab
			));
			header('Location: index.php');
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Control de productos y categorias</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
	<div class="contenedor">
		<!--FORMULARIO-->
		<h1>FABRICANTE NUEVO</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre_cat_fab" value="<?php if($resu) echo $resu['nombre_cat_fab'];?>">
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
	</div>
</body>
</html>