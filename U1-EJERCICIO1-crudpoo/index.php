<!--El inicio del sistema en donde manda a llamar la conexion de la base de datos, y primer controlador  llamado estudiantes_controller.php-->
<?php
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');

    $controller= new estudiante_controller();
    //el index manda a llamar el nombre del m del header y este se va a controller llamando el metodo que tieme
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->index();
        }
    }else{
        $controller->index();
    }




?>