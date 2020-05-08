<!--verificacion de los datos que no se haya quedado un campo vacio
		aqui se añaden nuevos productos a la tabla-->
<?php 
	include_once 'conection.php';
	
	if(isset($_POST['guardar'])){
		$nombre_cat_fab=$_POST['nombre_cat_fab'];

		if(!empty($nombre_cat_fab)){
			$sentencia=$conection->prepare('INSERT INTO catFabricante(nombre_cat_fab) VALUES(:nombre_cat_fab)');
			$sentencia->execute(array(
				':nombre_cat_fab' =>$nombre_cat_fab,
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
		<!--FORMULARIO-->
		<h1>CATEGORIA DEL FABRICANTE NUEVO</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre_cat_fab" placeholder="nombre">
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
		
	</div>
</body>
</html>

