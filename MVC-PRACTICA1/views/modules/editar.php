
<!--Forumario donde se editaran los datos de un usuario previamente registrado-->
<h1>EDITAR DATOS DEL USUARIO</h1>

<?php

    $r = array();
    $datos = new MvcController();
    $r = $datos->traerDatosUsuario();

?>

<!--Formulario en donde se ponen los datos existentes para que el usuario los edite y luego los guarde con el boton-->
<form method="post">

    <input type="text" name="id" value="<?= $r[0]['id'] ?>" disabled>

    <input type="text" placeholder="usuario" name="usuario" value="<?= $r[0]['usuario'] ?>" required>

    <input type="password" placeholder="contraseña" name="password" value="<?= $r[0]['password'] ?>" required>

    <input type="email" placeholder="email" name="email" value="<?= $r[0]['email'] ?>" required>

    <input type="submit" value="Actualizar">

</form>

<?php

//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$registro = new MvcController();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$registro -> actualizarDatosUsuario();

?>