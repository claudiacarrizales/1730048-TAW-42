<?php
	include_once 'conection.php';

	if(isset($_GET['id_producto'])){
		$id=(int) $_GET['id_producto'];

		$buscar_id=$conection->prepare('SELECT * FROM Producto WHERE id_producto=:id_producto LIMIT 1');
		$buscar_id->execute(array(
			':id_producto'=>$id
		));
		$resu=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio_venta=$_POST['precio_venta'];
		$precio_compra=$_POST['precio_compra'];
		$color=$_POST['color'];


		if(!empty($nombre) && !empty($descripcion) && !empty($precio_venta) && !empty($precio_compra) && !empty($color) ){
			$sentencia_update=$conection->prepare('UPDATE Producto SET nombre=:nombre, descripcion=:descripcion, precio_venta=:precio_venta, precio_compra=:precio_compra, color=:color WHERE id_producto=:id_producto');
			$sentencia_update->execute(array(
				':id_producto'=>$id,
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

		<h1>PRUDUCTO NUEVO</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre" value="<?php if($resu) echo $resu['nombre'];?>">
				<br>
				<input type="text" name="descripcion" value="<?php if($resu) echo $resu['descripcion'];?>">
				<br>
				<input type="text" name="precio_venta" value="<?php if($resu) echo $resu['precio_venta'];?>">
				<br>
				<input type="text" name="precio_compra" value="<?php if($resu) echo $resu['precio_compra'];?>">
				<br>
				<input type="text" name="color" value="<?php if($resu) echo $resu['color'];?>">
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
	</div>
</body>
</html>

