<!-- INSERTAR DATOS A LA TABLA NUEVA CATEGORIA-->
<?php 
	include_once 'conection.php';
	
	if(isset($_POST['guardar'])){
		$nombre_cat=$_POST['nombre_cat'];

		if(!empty($nombre_cat)){
			$sentencia=$conection->prepare('INSERT INTO categoriaProducto(nombre_cat) VALUES(:nombre_cat)');
			$sentencia->execute(array(
				':nombre_cat' =>$nombre_cat
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
			<a href="catFabricante.php" target="">CATEGORIA DE FABRICANTE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</nav>
		<!--FORMULARIO-->
		<h1>CATEGORIA NUEVA</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre_cat" placeholder="nombre">
		
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>	
	</div>
</body>
</html>

