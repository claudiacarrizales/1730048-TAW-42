<!-- MANDAR LLAMAR LA CONEXION DE LA BASE DE DATOS

Y REALIZACION DE CONSULTAS A LAS TABLAS DE LA BASE DE DATOS-->
<?php
	include_once 'conection.php';
	$sentencia=$conection->prepare('SELECT * FROM Producto');
	$sentencia->execute();
	$res=$sentencia->fetchAll();
?>

<?php
	include_once 'conection.php';
	$sentencia=$conection->prepare('SELECT * FROM categoriaProducto');
	$sentencia->execute();
	$resultado=$sentencia->fetchAll();
?>

<?php
	include_once 'conection.php';
	$sentencia=$conection->prepare('SELECT * FROM campoFabricante');
	$sentencia->execute();
	$resultadoo=$sentencia->fetchAll();
?>


<?php
	include_once 'conection.php';
	$sentencia=$conection->prepare('SELECT * FROM catFabricante');
	$sentencia->execute();
	$resultadooo=$sentencia->fetchAll();
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
		<!-- menu de navegacion que cuenta con 4
			modulos-->
		<nav>
			<a href="nuevo.php" target="">NUEVO PRODUCTO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="nuevaCategoria.php" target="">NUEVA CATEGORIA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="fabricante.php" target="">NUEVO FABRICANTE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="catFabricante.php" target="">CATEGORIA FABRICANTE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</nav>
		<!--CREACION DE LA TABLA PRODUCTOS
				PARA PODER VER LA VISUALIZACION-->
		<h1>PRODUCTOS</h1>
		<table>
			<tr class="head">
				<td>ID</td>
				<td>NOMBRE</td>
				<td>DESCRIPCION</td>
				<td>PRECIO VENTA</td>
				<td>PRECIO COMPRA</td>
				<td>COLOR</td>
				<td>CATEGORIA</td>
				<td colspan="2">Opcion</td>
			</tr>
			<?php foreach($res as $fila):?>
				<tr>
					<td><?php echo $fila['id_producto'];?></td>
					<td><?php echo $fila['nombre'];?></td>
					<td><?php echo $fila['descripcion'];?></td>
					<td><?php echo $fila['precio_venta'];?></td>
					<td><?php echo $fila['precio_compra'];?></td>
					<td><?php echo $fila['color'];?></td>
					<td><?php echo $fila['id_categoria'];?></td>
					<td><a href="updateProducto.php?id_producto=<?php echo $fila['id_producto'];?>">Editar</a></td>
					<td><a href="deleteProducto.php?id_producto=<?php echo $fila['id_producto'];?>">Eliminar</a></td>
				</tr>
			<?php endforeach?>
		</table>
		<!--CREACION DE LA TABLA CATEGORIA DEL PRODUCTOS
				PARA PODER VER LA VISUALIZACION-->
		<h1>CATEGORIA DEL PRODUCTO</h1>
		<table>
			<tr class="head">
				<td>ID</td>
				<td>NOMBRE</td>
				<td colspan="2">Opcion</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr>
					<td><?php echo $fila['id_categoria'];?></td>
					<td><?php echo $fila['nombre_cat'];?></td>
					<td><a href="editarCategoria.php?id_categoria=<?php echo $fila['id_categoria'];?>">Editar</a></td>
					<td><a href="eliminarCategoria.php?id_categoria=<?php echo $fila['id_categoria'];?>">Eliminar</a></td>
				</tr>
			<?php endforeach?>
		</table>
		<!--CREACION DE LA TABLA FABRICANTES
				PARA PODER VER LA VISUALIZACION-->

		<h1>CAMPOS FABRICANTES</h1>
		<table>
			<tr class="head">
				<td>ID</td>
				<td>NOMBRE FABRICANTE</td>
				<td>DIRECCION</td>
				<td>CORREO</td>
				<td>TELEFONO</td>
				<td colspan="2">Opcion</td>
			</tr>
			<?php foreach($resultadoo as $fila):?>
				<tr>
					<td><?php echo $fila['id_fabricante'];?></td>
					<td><?php echo $fila['nombre_fab'];?></td>
					<td><?php echo $fila['direccion'];?></td>
					<td><?php echo $fila['correo'];?></td>
					<td><?php echo $fila['telefono'];?></td>
					<td><a href="editarFabricante.php?id_fabricante=<?php echo $fila['id_fabricante'];?>">Editar</a></td>
					<td><a href="eliminarFabricante.php?id_fabricante=<?php echo $fila['id_fabricante'];?>">Eliminar</a></td>
				</tr>
			<?php endforeach?>
		</table>
		<!--CREACION DE LA TABLA CATEGORIAS DEL FABRICANTE
				PARA PODER VER LA VISUALIZACION-->

		<h1>CATEGORIA FABRICANTE</h1>
		<table>
			<tr class="head">
				<td>ID</td>
				<td>NOMBRE CATEGORIA</td>
				<td colspan="2">Opcion</td>
			</tr>
			<?php foreach($resultadooo as $fila):?>
				<tr>
					<td><?php echo $fila['id_cat_fab'];?></td>
					<td><?php echo $fila['nombre_cat_fab'];?></td>
				
					<td><a href="editarCatFab.php?id_cat_fab=<?php echo $fila['id_cat_fab'];?>">Editar</a></td>
					<td><a href="eliminarCatFab.php?id_cat_fab=<?php echo $fila['id_cat_fab'];?>">Eliminar</a></td>
				</tr>
			<?php endforeach?>
		</table>

	</div>
</body>
</html>