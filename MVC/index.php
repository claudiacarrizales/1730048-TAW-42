<!-- EN EL INDEX MOSTRAREMOS LA SALIDA DE LAS VISTAS AL USUARIO Y ATREVES DE EL ENVIAREMOS
	LAS DISTINTAS ACCIONES QUE EL USUARIO ENVIE AL CONTROLADOR-->


<?php
require_once('models/enlaces.php');
require_once('models/crud.php');
require_once('models/cruProd.php');

//CONTROLADOR
//CREACION DE LOS OBJETOS, QUE ES LA LOGICA DEL NEGOCIO
require_once('controllers/controller.php');

//muestra la funcion o metodo pagina que se encuentra en controllers/controller.php
//PROPIEDAD QUE INVOQUE UN METODO QUE SE LLAMA PAGINA
$mvc->pagina();
?>