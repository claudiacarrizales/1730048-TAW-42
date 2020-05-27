<?php
    class MvcController{
        //Muestra una plantilla al usuario

        public function plantilla(){
            include 'Views/template.php';
        }

        //Mostrar enlaces

        public function enlacesPaginasController(){

            if(isset($_GET['action'])){
                $enlaces = $_GET['action'];
            }else{
                $enlaces = 'index';
            }

            $respuesta = Paginas::enlacesPaginasModel($enlaces);
            include $respuesta;
        }

        public function inicioDeSesion(){
            if(isset($_POST['txtUsuario']) && isset($_POST['txtContraseña'])){
                $datos = array(
                    "usuario" => $_POST['txtUsuario'],
                    "contraseña" => $POST['txtContraseña']
                );

                $respuesta = Datos::ingresoUsuarioModel($datos, 'users');

                if($respuesta['usuario'] == $_POST['txtUsuario'] && password_verify($_POST['txtContraseña'], $respuesta['password']){
                    session_start();
                    $_SESSION['validar'] = true;
                    $_SESSION['usuario'] = $respuesta['usuario'];
                    $_SESSION['id'] = $respuesta['id'];
                    header('location:index.php?action=tablero');
                }else{
                    header('location:index.php?action=fallo&res=fallo');
                }
                

            }
        }

        public function vistaUsersController(){
            $respuesta = Datos::vistaUserModel('users');

            foreach($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios&idUserEditar='.$item['id'].'" class="btn btn-warning btn-sm btn-icon" 
                            title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                            
                        </td>
                        <td>
                            <a href="index.php?action=usuarios&idBorrar='.$item['id'].'" class="btn btn-danger btn-sm btn-icon" 
                            title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                        </td>
                        
                        <td>'.$item['firstname'].'</td>
                        <td>'.$item['lastname'].'</td>
                        <td>'.$item['user_name'].'</td>
                        <td>'.$item['user_email'].'</td>
                        <td>'.$item['date_added'].'</td>
                    </tr>';
            }
        }

    }

?>