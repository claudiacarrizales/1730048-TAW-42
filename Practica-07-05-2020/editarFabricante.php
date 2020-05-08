<!--VERIFICAION DE LOS DATOS QUE SE HAYAN LLENADO CORRECTAMENTE SIN DEJAR UNOS EN BLANCO
		Y ASI MISMO EL USO DE EDITAR Y LA CARGA DE OS DATOS-->
<?php
	include_once 'conection.php';

	if(isset($_GET['id_fabricante'])){
		$id=(int) $_GET['id_fabricante'];

		$buscar_id=$conection->prepare('SELECT * FROM campoFabricante WHERE id_fabricante=:id_fabricante LIMIT 1');
		$buscar_id->execute(array(
			':id_fabricante'=>$id
		));
		$resu=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$nombre_fab=$_POST['nombre_fab'];
		$direccion=$_POST['direccion'];
		$correo=$_POST['correo'];
		$telefono=$_POST['telefono'];

		if(!empty($nombre_fab) && !empty($direccion) && !empty($correo) && !empty($telefono)){
			$sentencia_update=$conection->prepare('UPDATE campoFabricante SET nombre_fab=:nombre_fab, direccion=:direccion, correo=:correo, telefono=:telefono WHERE id_fabricante=:id_fabricante');
			$sentencia_update->execute(array(
				':id_fabricante'=>$id,
				':nombre_fab' =>$nombre_fab,
				':direccion' =>$direccion,
				':correo' =>$correo,
				':telefono' =>$telefono
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
				<input type="text" name="nombre_fab" value="<?php if($resu) echo $resu['nombre_fab'];?>">
				<br>
				<input type="text" name="direccion" value="<?php if($resu) echo $resu['direccion'];?>">
				<br>
				<input type="email" name="correo" value="<?php if($resu) echo $resu['correo'];?>">
				<br>
				<input type="text" name="telefono" value="<?php if($resu) echo $resu['telefono'];?>">
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
	</div>
</body>
</html>

