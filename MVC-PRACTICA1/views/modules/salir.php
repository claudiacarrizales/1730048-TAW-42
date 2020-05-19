<?php
session_start();


if(isset($_SESSION['iniciada']) ){
    session_destroy();
    echo '<h1>Has salido</h1>';
}else{
    echo 'Para salir necesitar iniciar sesion';
}


?>