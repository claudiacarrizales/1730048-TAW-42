<?php 
	include_once 'conection.php';
	
	if(isset($_POST['guardar'])){
		$nombre_fab=$_POST['nombre_fab'];
		$direccion=$_POST['direccion'];
		$correo=$_POST['correo'];
		$telefono=$_POST['telefono'];

		if(!empty($nombre_fab) && !empty($direccion) && !empty($correo) && !empty($telefono)){
			$sentencia=$conection->prepare('INSERT INTO campoFabricante(nombre_fab, direccion, correo, telefono) VALUES(:nombre_fab,:direccion,:correo,:telefono)');
			$sentencia->execute(array(
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
		<nav>
			<a href="nuevo.php" target="">NUEVO PRODUCTO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="nuevaCategoria.php" target="">NUEVA CATEGORIA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="fabricante.php" target="">FABRICANTE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="catFabricante.php" target="">CATEGORIA FABRICANTE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</nav>
		<h1>FABRICANTE NUEVO</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre_fab" placeholder="nombre">
				<br>
				<input type="text" name="direccion" placeholder="direccion">
				<br>
				<input type="email" name="correo" placeholder="correo">
				<br>
				<input type="text" name="telefono" placeholder="telefono">
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
		
	</div>
</body>
</html>

