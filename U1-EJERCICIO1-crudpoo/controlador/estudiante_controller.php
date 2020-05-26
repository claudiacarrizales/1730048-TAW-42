<?php 

    require_once('modelo/estudiante_model.php');

    //manejo de vusta, el controlador permite 
    class estudiante_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new estudiante_model();
        }
        //el controlador el cual su funcion es recibir ordenes que le de el usuario  
        function index(){
            $query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/index.php');
            include_once('vistas/footer.php');
        }
        
        function carreraTable(){
            $query =$this->model_e->getCarrera();

            include_once('vistas/header.php');
            include_once('vistas/carreraTable.php');
            include_once('vistas/footer.php');
        }

        function universidadTable(){
            $query =$this->model_e->getUni();

            include_once('vistas/header.php');
            include_once('vistas/universidadTable.php');
            include_once('vistas/footer.php');
        }


        function estudiante(){
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
        //mandar llamar el registro carrera
        function carrera(){
            $data=NULL;
            if(isset($_REQUEST['id_carrera'])){
                $data=$this->model_e->get_id($_REQUEST['id_carrera']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/carrera.php');
            include_once('vistas/footer.php');
        }
        //mandar llamar el registro UNIVERSIDAD
        function universidad(){
            $data=NULL;
            if(isset($_REQUEST['id_uni'])){
                $data=$this->model_e->get_id($_REQUEST['id_uni']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/universidad.php');
            include_once('vistas/footer.php');
        }

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
            if (isset($_GET['id'])) {
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }else{
                $this->model_e->create($data);
            }
            
            header("Location:index.php");

        }

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
    }
?>