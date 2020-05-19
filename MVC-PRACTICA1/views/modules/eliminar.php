<!--Formulario que se muestra cuando se va a eliminar un usuario y que pide la contraseña para continuar-->
<h3>Para eliminar un usuario primero necesita ingresar su contraseña</h3>
<form method="POST">

    <label> Ingrese su contraseña: </label>
    <input type="password" name="contra_confirm" >
    <input type="submit" value="Eliminar">

</form>

<?php
    //Confirma si se esta mandando lo que se escribio en el campo, para despues agarrarlo con la variable $_POST en el metodo del controlador
    //Osease la primera vez no se enviara nada al controlador, sino hasta que se presione el boton de eliminar
    if(isset($_POST['contra_confirm'])){

        $datos = new MvcController();
        $r = $datos->eliminaDatosUsuario();

    }
    
?>