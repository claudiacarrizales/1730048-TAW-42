<?php
    //operacionalidades para el manejo de la base de datos confome las vistas que tenemos en pantalla
    class estudiante_model{
        private $DB;
        private $estudiantes;


        //REALIZA LA CONSULTA PARA VERIFICAR LOS DATOS EN LA BD
        function iniciar_sesion_model($data)
        {
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where nombre = ? and password = ?";
            $q = $this->DB->prepare($sql);
            $q->execute( array( $data['nombre'], $data['password'] ));
            $data = $q->fetch(PDO::FETCH_ASSOC);

            //print_r ($data);
            return $data;
        }


        function __construct(){
            $this->DB=Database::connect();
        }
        //seleccion de las consultas para el muetreo de los datos de la tablla de la base de datos en la tabla de la view
        function get(){
            $sql= 'SELECT estudiante.*, carrera.nombre as nombreC, universidad.nombre as nombreU FROM estudiante INNER JOIN carrera ON estudiante.id_carrera=carrera.id_carrera INNER JOIN universidad ON universidad.id_uni=estudiante.id_uni ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->estudiantes=$fila;
            return  $this->estudiantes;
        }
        //llama todos los dato de la tabla carrera par mostrarlos en la view
        function getCarrera(){
            $sql= 'SELECT * FROM carrera';
            $fila=$this->DB->query($sql);
            $this->carrera=$fila;
            return  $this->carrera;
        }

        //llama todos los datos de la tabla universidad para mostrarlos en la view
        function getUni(){
            $sql= 'SELECT * FROM universidad';
            $fila=$this->DB->query($sql);
            $this->universidad=$fila;
            return  $this->universidad;
        }

        //*****************************************************************************************


        //insercioin de nuesvos estudiantes a la base de datos
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(cedula,nombre,apellidos,promedio,edad,fecha, password, id_uni, id_carrera)VALUES (?,?,?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['password'],$data['universidad'],$data['carrera']));
            Database::disconnect();       
        }
        //CARRERAAAAAAAAAAAAAAAA
        //insercioin de nuesvos estudiantes a la base de datos
        function createCarrera($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombre)VALUES (?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombreC']));
            Database::disconnect();       
        }
        //UNIVERSIDADDDDDDDDD
        //insercioin de nuesvos universidad a la base de datos
        function createUniversidad($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidad(nombre)VALUES (?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombreU']));
            Database::disconnect();       
        }



        //**********************************************************************************************



        //selleccion con el id de algun registro de la base de datos
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //query uniendo las tres tablas
            $sql = "SELECT estudiante.*, carrera.nombre as nombreC, universidad.nombre as nombreU FROM estudiante INNER JOIN carrera ON estudiante.id_carrera=carrera.id_carrera INNER JOIN universidad ON universidad.id_uni=estudiante.id_uni where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //selleccion con el id de algun registro de la base de datos
        function get_idCarrera($id_carrera){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //query uniendo las tres tablas
            $sql = "SELECT * FROM carrera where id_carrera = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id_carrera));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //selleccion con el id de algun registro de la base de datos
        function get_idUniversidad($id_uni){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //query uniendo las tres tablas
            $sql = "SELECT * FROM universidad where id_uni = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id_uni));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }


        //*********************************************************************************************



        //sentencia de actualizacion en la base de datos 
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=?, password=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['password'], $date));
            Database::disconnect();
        }

        //sentencia de actualizacion en la base de datos 
        function updateCarrera($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carrera set nombre=? WHERE id_carrera = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombreC'], $date));
            Database::disconnect();
        }

        //sentencia de actualizacion en la base de datos 
        function updateUniversidad($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE universidad set nombre=? WHERE id_uni = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombreU'], $date));
            Database::disconnect();
        }




        //******************************************************************************************



        //sentencia para eliminar algun registro de la base de ddatos conforme el id
        //delete studiantes
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }


        //DELETE CARRERA
        function deleteCarrera($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where id_carrera=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }


        //DELETE UNIVERSIDAD
        function deleteUniversidad($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM universidad where id_uni=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

