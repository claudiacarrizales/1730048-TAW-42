<!--Vista del formulario del login-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">INICIO DE SESION</h2>
        <!--Formulario de inicio-->
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Usuario</strong></label>
            <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Contraseña</strong></label>
            <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
          </div>
         
          <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

    </div>
</section>


<?php

    //Instancia del objeto del controlador para hacer la validacion de los datos
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarios();

    if(isset($_GET['action'])){
        if($_GET['action'] == "fallo"){
            echo "No se pudo ingresar a la cuenta";
        }
    }

?>