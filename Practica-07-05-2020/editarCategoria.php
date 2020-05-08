<!--VERIFICAION DE LOS DATOS QUE SE HAYAN LLENADO CORRECTAMENTE SIN DEJAR UNOS EN BLANCO
		Y ASI MISMO EL USO DE EDITAR Y LA CARGA DE OS DATOS-->
<?php
	include_once 'conection.php';

	if(isset($_GET['id_categoria'])){
		$id=(int) $_GET['id_categoria'];

		$buscar_id=$conection->prepare('SELECT * FROM categoriaProducto WHERE id_categoria=:id_categoria LIMIT 1');
		$buscar_id->execute(array(
			':id_categoria'=>$id
		));
		$resu=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$nombre_cat=$_POST['nombre_cat'];

		if(!empty($nombre_cat)){
			$sentencia_update=$conection->prepare('UPDATE categoriaProducto SET nombre_cat=:nombre_cat WHERE id_categoria=:id_categoria');
			$sentencia_update->execute(array(
				':id_categoria'=>$id,
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
<!--FORMULARIO DEL LLENADO-->
		<h1>CATEGORIA NUEVA</h1>
		<form method="post">
			<div class="form">
				<input type="text" name="nombre_cat" value="<?php if($resu) echo $resu['nombre_cat'];?>">
			
				<br><br>
				<a href="index.php">CANCELAR</a>
				<input type="submit" name="guardar" value="GUARDAR">
			</div>
		</form>
	</div>
</body>
</html>
