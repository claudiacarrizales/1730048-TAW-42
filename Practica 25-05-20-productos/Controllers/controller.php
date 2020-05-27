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
        public function registrarUserController (){
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><b>Registro</b de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group">
                                <label for="nusuariotxt">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt"
                                placeholder="Ingrese el nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxt">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt"
                                placeholder="Ingrese el Apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxt">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxt" id="usuariotxt"
                                placeholder="Ingrese el Usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="ucontratxt">Contraseña: </label>
                                <input class="form-control" type="password" name="ucontratxt" id="ucontratxt"
                                placeholder="Ingrese la contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxt">Correo electronico: </label>
                                <input class="form-control" type="email" name="uemailtxt" id="uemailtxt"
                                placeholder="Ingrese el correo electronico" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }

        public function insertarUserController() {
            if(isset($_POST["nusuariotxt"])) {
                //Encriptar la contraseña.
                $_POST["ucontratxt"] = password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);
                $datosController = array("nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["ausuariotxt"],
                "usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);

                $respuesta = Datos::insertarUserModel($datosController,"users");

                if($respuesta == "success"){
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</
                            button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                !Exito!
                            </h5>
                            Usuario agregado con exito.
                        </div>
                    </div>
                    ';
                } else {
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</
                            button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                !Error!
                            </h5>
                            Se ha producido un error al momento de agregar el usuario, trate de nuevo.
                        </div>
                    </div>
                    ';
                }
            }
        }
        public function editarUserController() {
            $datosController = $_GET["idUserEditar"];
            //envío de datos al mododelo
            $respuesta = Datos::editarUserModel($datosController,"users");
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group">
                                <input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxtEditar">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Contraseña: </label>
                                <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Correo Electrónico: </label>
                                <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
        </div>
        <?php
        }

        public function actualizarUserController(){
            if (isset($_POST["nusuariotxtEditar"])){
                $_POST["contratxtEditar"] = password_hash($_POST["contratxtEditar"],PASSWORD_DEFAULT);

                $datosController = array("id"=>$_POST["idUserEditar"],"nusuario"=>$_POST["nusuariotxtEditar"],
                "ausuario"=>$_POST["ausuariotxtEditar"],,"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST
                ["contratxtEditar"],"email"=>$_POST["uemailtxtEditar"]);

                //Enviar datos al modelo
                if($respuesta == "success"){
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</
                            button>
                            <h5>
                                <i class="icon fas fa-check"></i>
                                !Exito!
                            </h5>
                            Usuario editado con exito.
                        </div>
                    </div>
                    ';
                } else {
                    echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</
                            button>
                            <h5>
                                <i class="icon fas fa-ban"></i>
                                !Error!
                            </h5>
                            Se ha producido un error al momento de editar el usuario, trate de nuevo.
                        </div>
                    </div>
                    ';
                }
            }
        }

    }

?>