
<!--Forumario donde se editaran los datos de un usuario previamente registrado-->
<?php

    $r = array();
    $datos = new MvcController();
    $r = $datos->traerDatosUsuario();

?>

<!--Formulario en donde se ponen los datos existentes para que el usuario los edite y luego los guarde con el boton-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">EDITAR DATOS DEL USUARIO</h2>
        <!--Formulario de inicio-->

		<form method="post">
		
		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Id</strong></label>
		    <input type="text" class="form-control" name="id" value="<?= $r[0]['id'] ?>" disabled>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Usuario</strong></label>
		    <input type="text" class="form-control" placeholder="usuario" name="usuario" value="<?= $r[0]['usuario'] ?>" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Contraseña</strong></label>
		    <input type="password" class="form-control" placeholder="contraseña" name="password" value="<?= $r[0]['password'] ?>" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Email</strong></label>
		     <input type="email" class="form-control" placeholder="email" name="email" value="<?= $r[0]['email'] ?>" required>
		  </div>
		 
		 	<input type="submit" class="btn btn-primary" value="Actualizar">
		</form>
    </div>
</section>

<?php

//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$registro = new MvcController();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$registro -> actualizarDatosUsuario();

?>