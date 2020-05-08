<!-- INSERTAR DATOS A LA TABLA NUEVA DE PRODUCTO-->
<?php 
	include_once 'conection.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio_venta=$_POST['precio_venta'];
		$precio_compra=$_POST['precio_compra'];
		$color=$_POST['color'];

		if(!empty($nombre) && !empty($descripcion) && !empty($precio_venta) && !empty($precio_compra) && !empty($color)){
			$sentencia=$conection->prepare('INSERT INTO Producto(nombre, descripcion, precio_venta, precio_compra, color) VALUES(:nombre,:descripcion,:precio_venta,:precio_compra,:color)');
			$sentencia->execute(array(
				':nombre' =>$nombre,
				':descripcion' =>$descripcion,
				':precio_venta' =>$precio_venta,
				':precio_compra' =>$precio_compra,
				':color' =>$color
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
		<!-- FORMULARIO-->
		<h1>PRUDUCTO NUEVO</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre" placeholder="nombre">
				<br>
				<input type="text" name="descripcion" placeholder="descripcion">
				<br>
				<input type="text" name="precio_venta" placeholder="precio venta">
				<br>
				<input type="text" name="precio_compra" placeholder="precio compra">
				<br>
				<input type="text" name="color" placeholder="color">
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
		
	</div>
</body>
</html>

