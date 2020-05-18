<h1>INGRESAR</h1>
	<form>
		<input type="text" placeholder="usuario" name="usuarioIngreso" required>
		<input type="text" placeholder="password" name="passwordIngreso" required>
		<input type="submit" value="Enviar">
	</form>

	<?php
		$ingreso = new MvcController();
		$ingreso -> ingresoUsuarioController();

		if(isset($_GET["action"])){
			if($_GET["action"]=="fallo"){
				echo "Fallo al ingresar";
			}
		}
	?>