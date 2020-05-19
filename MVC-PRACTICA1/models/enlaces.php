<?php


class Paginas{

    //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador

    public function enlacesPaginasModel($enlacesModel){
        //Validamos
        if($enlacesModel == "salir" || $enlacesModel == "editar" || $enlacesModel == "ingresar" || $enlacesModel == "usuarios" || $enlacesModel == "eliminar" || $enlacesModel == "registroProducto" || $enlacesModel == "productos" ){
            //Mostramos el URL concatenado con la variable $enlacesModel
            $module = "views/modules/".$enlacesModel.".php";
        }

        //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
        else if($enlacesModel == "index"){
            $module = "views/modules/registro.php";
        }
        else if($enlacesModel == "ok"){
            $module = "views/modules/registro.php";
        }
        else if($enlacesModel == "fallo"){
            $module = "views/modules/ingresar.php";
        }
        else if($enlacesModel == "cambio"){
            $module = "views/modules/usuario.php";
        }
        //Validar una LISTA BLANCA 
        else{
            $module = "views/modules/registro.php";
        }

        return $module;
    }

}


?>