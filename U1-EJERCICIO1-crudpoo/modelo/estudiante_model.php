<?php
    //operacionalidades para el manejo de la base de datos confome las vistas que tenemos en pantalla
    class estudiante_model{
        private $DB;
        private $estudiantes;

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




        function getCarrera(){
            $sql= 'SELECT * FROM carrera';
            $fila=$this->DB->query($sql);
            $this->carrera=$fila;
            return  $this->carrera;
        }


        function getUni(){
            $sql= 'SELECT * FROM universidad';
            $fila=$this->DB->query($sql);
            $this->universidad=$fila;
            return  $this->universidad;
        }



        //insercioin de nuesvos estudiantes a la base de datos
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(cedula,nombre,apellidos,promedio,edad,fecha, password, id_uni, id_carrera)VALUES (?,?,?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['password'],$data['universidad'],$data['carrera']));
            Database::disconnect();       
        }

        //selleccion con el id de algun registro de la base de datos
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT estudiante.*, carrera.nombre as nombreC, universidad.nombre as nombreU FROM estudiante INNER JOIN carrera ON estudiante.id_carrera=carrera.id_carrera INNER JOIN universidad ON universidad.id_uni=estudiante.id_uni where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        //sentencia de actualizacion en la base de datos 
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=?, password=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['password'], $date));
            Database::disconnect();

        }
        //sentencia para eliminar algun registro de la base de ddatos conforme el id
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

