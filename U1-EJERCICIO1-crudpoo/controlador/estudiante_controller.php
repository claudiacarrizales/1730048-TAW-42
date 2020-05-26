<?php 
    
    require_once('modelo/estudiante_model.php');

    //manejo de vusta, el controlador permite 
    class estudiante_controller{
        private $model_e;
        private $model_p;


        //EXTRACCION DATOS INICIAR SESION
        function iniciar_sesion() 
        {
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['password']=$_REQUEST['txt_contrasena'];
            
            if(!empty($this->model_e->iniciar_sesion_model($data))){
                //echo 'bienvenido c:';
                session_start();
                    $_SESSION['validar'] = true;
                    header("Location:index.php");
            }else{
                //echo 'equivocado :c';
                header("Location:index.php?m=login&e=no");


            }
        }

        function __construct(){
            $this->model_e=new estudiante_model();
        }
        //el controlador el cual su funcion es recibir ordenes que le de el usuario  
        function index(){
            //NO VISUALIZAR HASTA QUE ENTRE SESION
            session_start();
            if(!isset($_SESSION['validar'])){
                header('location:index.php?m=login');
            }

            $query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/index.php');
            include_once('vistas/footer.php');
        }
        
        function carreraTable(){
            //NO VISUALIZAR HASTA QUE ENTRE SESION
            session_start();
            if(!isset($_SESSION['validar'])){
                header('location:index.php?m=login');
            }

            $query =$this->model_e->getCarrera();

            include_once('vistas/header.php');
            include_once('vistas/carreraTable.php');
            include_once('vistas/footer.php');
        }

        function universidadTable(){
            //NO VISUALIZAR HASTA QUE ENTRE SESION
            session_start();
            if(!isset($_SESSION['validar'])){
                header('location:index.php?m=login');
            }
            $query =$this->model_e->getUni();

            include_once('vistas/header.php');
            include_once('vistas/universidadTable.php');
            include_once('vistas/footer.php');
        }

        //*********************************************************************************************

        function estudiante(){

            //NO VISUALIZAR HASTA QUE ENTRE SESION
            session_start();
            if(!isset($_SESSION['validar'])){
                header('location:index.php?m=login');
            }

            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            $queryC =$this->model_e->getCarrera();
            $queryU =$this->model_e->getUni();

            include_once('vistas/header.php');
            include_once('vistas/estudiante.php');
            include_once('vistas/footer.php');
        }
        //vsta del inicio de sesion
        function login(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/login.php');
            include_once('vistas/footer.php');
        }

        //****************************************************************************************

        //mandar llamar el registro carrera
        function carrera(){
            //NO VISUALIZAR HASTA QUE ENTRE SESION
            session_start();
            if(!isset($_SESSION['validar'])){
                header('location:index.php?m=login');
            }

            $data=NULL;
            if(isset($_REQUEST['id_carrera'])){
                $data=$this->model_e->get_idCarrera($_REQUEST['id_carrera']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/carrera.php');
            include_once('vistas/footer.php');
        }

        //mandar llamar el registro UNIVERSIDAD
        function universidad(){
            //NO VISUALIZAR HASTA QUE ENTRE SESION
            session_start();
            if(!isset($_SESSION['validar'])){
                header('location:index.php?m=login');
            }

            $data=NULL;
            if(isset($_REQUEST['id_uni'])){
                $data=$this->model_e->get_idUniversidad($_REQUEST['id_uni']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/universidad.php');
            include_once('vistas/footer.php');
        }

        //*******************************************************************************************

        //pasar datos al modelo y el modelo comuncia a la vista
        function get_datosE(){
            
            //$data['id']=$_REQUEST['txt_id'];
            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['apellidos']=$_REQUEST['txt_apellidos'];
            $data['promedio']=$_REQUEST['txt_promedio'];
            $data['edad']=$_REQUEST['txt_edad'];
            $data['fecha']=$_REQUEST['txt_fecha'];
            $data['password']=$_REQUEST['txt_pass'];
            $data['carrera']=$_REQUEST['carrera'];
            $data['universidad']=$_REQUEST['universidad'];

            // $this->model_e->create($data);
            //si no hay id crea un nuevo registro si hay solo da la opcion de actualizarlo
            if (isset($_GET['id'])) {
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }else{
                $this->model_e->create($data);
            }
            
            header("Location:index.php");
        }

        //pasar datos al modelo y el modelo comuncia a la vista
        //CARRERA REISTRAR
        function get_datosCarrera(){

            $data['nombreC']=$_REQUEST['txt_nomC'];
            // $this->model_e->create($data);
            //si no hay id crea un nuevo registro si hay solo da la opcion de actualizarlo
            if (isset($_GET['id_carrera'])) {
                $date=$_REQUEST['id_carrera'];
                $this->model_e->updateCarrera($data,$date);
            }else{
                $this->model_e->createCarrera($data);
            }
            
            header("Location:index.php?m=carreraTable");
        }

        //pasar datos al modelo y el modelo comuncia a la vista
        //UNIVERSIDAD REISTRAR
        function get_datosUniversidad(){

            $data['nombreU']=$_REQUEST['txt_nomU'];
            // $this->model_e->create($data);
            //si no hay id crea un nuevo registro si hay solo da la opcion de actualizarlo
            if (isset($_GET['id_uni'])) {
                $date=$_REQUEST['id_uni'];
                $this->model_e->updateUniversidad($data,$date);
            }else{
                $this->model_e->createUniversidad($data);
            }
            header("Location:index.php?m=universidadTable");
        }


        //***********************************************************************************************

        //DELETE CONFIRMAR ESTUDIANTES
        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {

                $date['id']=$_REQUEST['txt_id'];

                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }

        //DELETE CONFIRMAR CARRERA
        function confirmarDeleteCarrera(){

            $data=NULL;

            if ($_REQUEST['id_carrera']!=0) {
               $data=$this->model_e->get_idCarrera($_REQUEST['id_carrera']);
            }

            if ($_REQUEST['id_carrera']==0) {

                $date['id_carrera']=$_REQUEST['txt_idCarrera'];

                $this->model_e->deleteCarrera($date['id_carrera']);
                header("Location:index.php?m=carreraTable");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }


        //DELETE CONFIRMAR UNIVERSIDAD
        function confirmarDeleteUniversidad(){

            $data=NULL;

            if ($_REQUEST['id_uni']!=0) {
               $data=$this->model_e->get_idUniversidad($_REQUEST['id_uni']);
            }

            if ($_REQUEST['id_uni']==0) {

                $date['id_uni']=$_REQUEST['txt_idUniversidad'];

                $this->model_e->deleteUniversidad($date['id_uni']);
                header("Location:index.php?m=universidadTable");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }

        //********************************************************************
        function salir(){
            session_start();
            session_destroy();

            header("Location:index.php?m=login");
        }
    }
?>