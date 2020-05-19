<?php

class MvcController{ 
    //Llamar a la plantilla
    public function pagina(){
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        include "views/template.php";
    }

    //Interacción con el usuario
    public function enlacesPaginasController(){
        //Trabajar con los enlaces de las páginas
        //Validamos si la variable "action" viene vacia, es decir cuando se abre la pagina por primera vez se debe cargar la vista index.php

        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlaces = $_GET['action'];
        }else{
            //Si viene vacio inicializo con index
            $enlaces = "index";
        }

        //Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, etc.
        //Para esto hay que mandar al modelo para que haga dicho proceso y muestre la informacions

        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;
    }

    public function registroUsuarioController(){
        if(isset($_POST["usuarioRegistro"])){

            //Recibe a traves del metodo POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("usuario" => $_POST["usuarioRegistro"],
                                     "password" => $_POST["passwordRegistro"],
                                     "email" => $_POST["emailRegistro"]);

            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }
            else{
                header("location:index.php");
            }
        }
    }
    //controller 
    public function traerDatosProducto(){
        if(isset($_GET["id"])){
            $id_usuario = $_GET["id"];
            $respuesta = Datos::traerDatosDeProducto($id_usuario, "productos");
            return $respuesta;
        }
    }

    public function registroProductoController(){
        if(isset($_POST["nombre"])){

            //Recibe a traves del metodo POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("nombre" => $_POST["nombre"],
                                     "descripcion" => $_POST["descripcion"],
                                     "precio_compra" => $_POST["precioCompra"],
                                     "precio_venta" => $_POST["precioVenta"],
                                     "inventario" => $_POST["inventario"],
                                     "categoria" => $_POST["categoria"]);

            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registroProductosModel($datosController, "productos");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=productos");
            }
            else{
                header("location:index.php?action=registroProducto");
            }
        }
    }

    //extraer datos
    public function traerDatosProductos(){
        session_start();
        if( isset($_SESSION['iniciada']) ){
            $respuesta = Datos::traerDatosProductosModel();
            if($respuesta){
                return $respuesta;
            }else{
                echo "No se encontraron registros";
            }
        }else{
            echo 'Debe iniciar sesion para ver esto';
            return [];
        }
    }


    public function traerDatosCategorias(){
        $respuesta = Datos::traerCategorias();
        return $respuesta;
    }



    //Funcion para validar al usuario en el login
    public function ingresoUsuarios(){

        if(isset($_POST["usuario"]) ){

            $datosController = array("usuario" => $_POST['usuario'],
                                     "password" => $_POST['pass']);
            
            $respuesta = Datos::ingresoDeUsuarios($datosController, "usuarios");

            
            if( $respuesta ){

                session_start();

                $_SESSION['iniciada'] = true;

                $_SESSION['id_usuario'] = $respuesta['id'];

                //echo $respuesta['id'];
                header("location:index.php?action=usuarios");
            }else{

                header("location:index.php?action=registro");
            
            }
        }
    }


    //Funcion para traer la lista de todos los usuarios de la tabla con el mismo nombre
    public function traerUsuarios(){
        session_start();

        if( isset($_SESSION['iniciada']) ){


            //$asd = $_SESSION["ok"];

            $respuesta = Datos:: traerDatos("usuarios");

            if($respuesta){
                return $respuesta;
            }else{
                echo "No se encontraron registros";
            }

        }else{
            echo 'Debe iniciar sesion para ver esto';
            return [];
        }

    }

    
    //Se pasara el id por medio de un dato enviado a traves de metodo GET
    public function traerDatosUsuario(){

        if(isset($_GET["id"])){

            $id_usuario = $_GET["id"];

            $respuesta = Datos::traerDatosDeUsuario($id_usuario, "usuarios");

            return $respuesta;

        }
    }

    //Actualiza los datos de un usuario aqui si se le pasa todo un arreglo para saber que datos se actualizaran
    public function actualizarDatosUsuario(){

        if( isset($_POST["usuario"]) ){

            $datosUsuario = array("usuario" => $_POST["usuario"],
                                     "password" => $_POST["password"],
                                     "email" => $_POST["email"],
                                     "id" => $_GET["id"]);
            
            $respuesta = Datos::actualizarDatos($datosUsuario, "usuarios");

            if( $respuesta >= 1 ){

                header("location:index.php?action=usuarios");
            }else{

                //header("location:index.php?action=registro");
                echo 'Error';
            }
        }

    }
    //actualizar datos producto
    public function actualizarDatosProducto(){

        if( isset($_POST["nombre"]) ){

            $datosController = array("nombre" => $_POST["nombre"],
                                     "descripcion" => $_POST["descripcion"],
                                     "precio_compra" => $_POST["precioCompra"],
                                     "precio_venta" => $_POST["precioVenta"],
                                     "inventario" => $_POST["inventario"],
                                     "categoria" => $_POST["categoria"],
                                     "id" => $_GET["id"]);
            
            $respuesta = Datos::actualizarDatosProducto($datosController, "productos");

            if( $respuesta >= 1 ){

                header("location:index.php?action=productos");
            }else{

                //header("location:index.php?action=registro");
                echo 'Error';
            }
        }

    }

    //Elimina los datos de un usuario especificado a traves del envio de un parametro GET
    public function eliminaDatosUsuario(){
        session_start();

        $pass = Datos::passDeUsuario($_SESSION['id_usuario'], "usuarios");


        if($_POST['contra_confirm'] == $pass['password'] ){

            if(isset($_GET["id"])){

                $datosUsuario = $_GET["id"];
    
                $respuesta = Datos::eliminarDatos($datosUsuario, "usuarios");
    
                if( $respuesta >= 1 ){
    
                    header("location:index.php?action=usuarios");
                }else{
                    echo 'Error al eliminar';
                }
    
            }

        }else{
            echo 'Contraseña incorrecta';
        }
        
    }
    //eliminar datos
    public function eliminaDatosProducto(){
        session_start();

        $pass = Datos::passDeUsuario($_SESSION['id_usuario'], "usuarios");


        if($_POST['contra_confirm'] == $pass['password'] ){

            if(isset($_GET["id"])){

                $datosProducto = $_GET["id"];
    
                $respuesta = Datos::eliminarDatosProducto($datosProducto, "productos");
    
                if( $respuesta >= 1 ){
    
                    header("location:index.php?action=productos");
                }else{
                    echo 'Error al eliminar';
                }
    
            }

        }else{
            echo 'Contraseña incorrecta';
        }

        
    }

}

?>