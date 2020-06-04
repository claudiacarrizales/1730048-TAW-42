<?php 
	/*Cierra la sesión actual y limpia la sesió actual y limpia la inforancion asociada a la misma*/
	session_start();
	$_SESSION = array();
    session_destroy();
    //header("Location:index.php");
	ob_end_flush();
?>