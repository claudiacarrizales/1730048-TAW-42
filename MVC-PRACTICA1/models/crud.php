<?php

require_once("conexion.php");

class Datos extends Conexion{
        
    #Registro de usuarios
    public function registroUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES(:usuario, :password, :email) ");
        
        $stmt->bindParam(":usuario", $datosModel["usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();

    }

    #Registro de prodctos
    public function registroProductosModel($datosModel, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, precio_compra, precio_venta, inventario, id_categoria) VALUES(:nombre, :descripcion, :precio_compra, :precio_venta, :inventario, :categoria) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":precio_compra", $datosModel["precio_compra"], PDO::PARAM_INT);
        $stmt->bindParam(":precio_venta", $datosModel["precio_venta"], PDO::PARAM_INT);
        $stmt->bindParam(":inventario", $datosModel["inventario"], PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();

    }
    //funcion extrae datos producto
    public function traerDatosDeProducto($id, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id , PDO::PARAM_STR);
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    //cargar datos de la bd
    public function traerDatosProductosModel(){
        $stmt = Conexion::conectar()->prepare("SELECT productos.*, categoria as idCategoria, categoria as categoria FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria;");
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }


    public function traerCategorias(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM categoria");
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    //Ingreso del usuario

    public function ingresoDeUsuarios($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario AND password = :password");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);

        $stmt->bindParam(":password", $datosModel['password'], PDO::PARAM_STR);

        $stmt->execute();

        $r = array();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;
        
    }

    //Function que retorna el password del usuario, con el fin de que lo valide cuando se va a eliminar un ususrio

    public function passDeUsuario($id, $tabla){
        
        $stmt = Conexion::conectar()->prepare("SELECT password FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $r = array();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;

    }

    //Traer todos los datos de la tabla

    public function traerDatos($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        $r = array();

        $r = $stmt->FetchAll();
        
        return $r;

    }

    //Traer los datos de un usuario en especifico pasandole el id
    public function traerDatosDeUsuario($id, $tabla){


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id , PDO::PARAM_STR);

        $stmt->execute();

        $r = array();

        $r = $stmt->FetchAll();
        
        return $r;

    }

    //Actualizar los datos de un usuario

    public function actualizarDatos($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id ");

        //$stmt = Conexion::conectar()->prepare("SELECT usuario = :usuario, password = :password, email = :email FROM $tabla WHERE id = :id ");

        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);

        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        $stmt->execute();

        $filasAfectadas = $stmt->rowCount();

        return $filasAfectadas;

    }

     //Actualizar los datos de un producto

    public function actualizarDatosProducto($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, precio_compra = :precio_compra, precio_venta = :precio_venta, inventario = :inventario, id_categoria = :id_categoria WHERE id = :id ");

        //$stmt = Conexion::conectar()->prepare("SELECT usuario = :usuario, password = :password, email = :email FROM $tabla WHERE id = :id ");

        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":precio_compra", $datosModel["precio_compra"], PDO::PARAM_INT);
        $stmt->bindParam(":precio_venta", $datosModel["precio_venta"], PDO::PARAM_INT);
        $stmt->bindParam(":inventario", $datosModel["inventario"], PDO::PARAM_INT);
        $stmt->bindParam(":id_categoria", $datosModel["categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        $stmt->execute();

        $filasAfectadas = $stmt->rowCount();

        return $filasAfectadas;

    }


    //Eliminar datos de un usuario

    //Aqui en lugar de pasarle un array, solo se le pasa una variable tipo int para que sepa el id del usuari a eliminar
    public function eliminarDatos($idUsuario, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $idUsuario, PDO::PARAM_INT);

        $stmt->execute();

        $filasAfectadas = $stmt->rowCount();

        return $filasAfectadas;
    }

    //eliminar producto
    public function eliminarDatosProducto($id, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        $filasAfectadas = $stmt->rowCount();

        return $filasAfectadas;
    }

}