<!--Vista del formulario del REGISTRO-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">REGISTRO DE USUARIO</h2>
        <!--Formulario de inicio-->
        <form method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Usuario</strong></label>
		    <input type="text" class="form-control" placeholder="Usuario"  name="usuarioRegistro" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Contraseña</strong></label>
		    <input type="password" class="form-control" placeholder="Contraseña" name="passwordRegistro" required>
		  </div>


		  <div class="form-group">
		    <label for="exampleInputEmail1"><strong>Email</strong></label>
		    <input type="email" class="form-control" placeholder="Email" name="emailRegistro" required>
		  </div>
		 
		  <button type="submit" class="btn btn-primary">Ingresar</button>
		</form>
    </div>
</section>




<?php

	//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
	$registro = new MvcController();

	//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
	$registro -> registroUsuarioController();

	if(isset($_GET["action"])){

	    if($_GET["action"] == "ok"){
	        echo "Registro Exitoso";
	    }

	}
?>