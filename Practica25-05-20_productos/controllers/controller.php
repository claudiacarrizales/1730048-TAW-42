<?php
	class MvcController extends Datos{

		#llamada a la plantilla
		public function pagina(){
			include "views/template.php";
		}

		//enlaces
		public function enlacesPaginasController(){
			if(isset($_GET['action'])){
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//Es el momento en que el controlador invoca el modelo enalcesPaginaModel para que muestre el listaaod de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		//INgreso usuarios
		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){
				$datosController= array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);
				$respuesta= Datos::ingresoUsuarioModel($datosController,"users");
				//validar la repsuesta de modelo
				if($respuesta["usuario"]==$_POST["usuarioIngreso"] && password_verify($_POST["passwordIngreso"], $respuesta["contrasena"])){
					//session_start();
					$_SESSION["validar"]=true;
					$_SESSION["nombre_usuario"]=$respuesta["usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("Location:index.php?action=tablero");
					
				}else{
					header("Location:index.php?action=fallo&res=fallo");
				}
			}
		}


		//Vista de usuarios
		public  function vistaUsuarioController(){
			$respuesta=Datos::vistaUsuarioModel("users");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td><a href=index.php?action=usuarios&idUserEditar='.$item["user_id"].'><button class="btn btn-secondary"><i class="fas fa-edit"></i></button></td>

						<td><a href=index.php?action=usuarios&idBorrar='.$item["user_id"].'><button class="btn btn-secondary"><i class="fas fa-trash"></i></button></td>
						<td>'.$item["firstname"].'</td>
						<td>'.$item["lastname"].'</td>
						<td>'.$item["user_name"].'</td>
						<td>'.$item["user_email"].'</td>
						<td>'.$item["date_added"].'</td>
						
					</tr>';
			}
		}

		/*--Este controlador se encarga de mostrar el formualrio al usuario para registrase*/
		public function registrarUsuarioController(){
			?>
			<div class="col-md-6 mt-6">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de usuarios </h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=usuarios">
							<div class="form-group">
								<label for="nusuariotxt">Nombre:</label>
								<input  class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" required>
							</div>
							<div class="form-group">
								<label for="ausuariotxt">Apellidos:</label>
								<input  class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" required>
							</div>
							<div class="form-group">
								<label for="usuariotxt">Usuario:</label>
								<input  class="form-control" type="text" name="usuariotxt" id="usuariotxt" required> 
							</div>
							<div class="form-group">
								<label for="ucontratxt">Contraseña:</label>
								<input  class="form-control" type="password" name="ucontratxt" id="ucontratxt" required>
							</div>
							<div class="form-group">
								<label for="uemailtxt">Correo Electornico:</label>
								<input  class="form-control" type="text" name="uemailtxt" id="uemailtxt" required>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		/*Este contorlador sirve para insertar el usuario que se acaba de ingresar y notifica si se rlaizo dicha actividad o si hubo algun error, en el caso de la contsaseña, primero que nada se tendra uqe encriptar mediante el algoritmo hash y la funcion password_hash y se guarda para posteriromente realizar la insercion*/
		public function insertarUsuarioController(){
			if(isset($_POST["nusuariotxt"])){
				//encriptar la contraseña
				$_POST["ucontratxt"]=password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);

				//Almacenar en un array los valores de los text del metodo "registrarUserController"
				$datosController=array("nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);

				$respuesta=Datos::insertarUsuarioModel($datosController,"users");

				if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Usuario agregado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de agregar.
							</div>
						</div>
					';
				}
			}
		}

		/*Este contorlador se encarga de mostar el formulario para editar sus daos, la contraseña no se carga debido a como esta iencripara, no es optimo */
		public function editarUsuarioController() {
            $datosController = $_GET["idUserEditar"];
            //envío de datos al mododelo
            $respuesta = Datos::editarUsuarioModel($datosController,"users");
            //formulario para el llenado
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

        /*este controlador sirve para actuaizat el usuario que se acaba de ingresar y notifica si se reliazo dicha actividad o hubo algun error*/
        public function actualizarUsuarioController(){
        	if(isset($_POST["nusuariotxtEditar"])){
        		$_POST["contratxtEditar"]=password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);
        		$datosController=array("id" => $_POST["idUserEditar"],"nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST["ausuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["contratxtEditar"],"email"=>$_POST["uemailtxtEditar"]);

            	$respuesta = Datos::actualizarUsuarioModel($datosController,"users");
        		if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Usuario editado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de editar.
							</div>
						</div>
					';
				}
        	}
        }

        /*Este controlador sirve para eliminar el usuario que se acabd de ingresar y notifica si se relaizo dicha actividad o si hubo algun error*/
        public function eliminarUsuarioController(){
        	if(isset($_GET["idBorrar"])){
        		$datosController=$_GET["idBorrar"];
        		//Manda parametros al modelo
        		$respuesta=Datos::eliminarUsuarioModel($datosController,"users");
        		if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Usuario eliminado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de eliminar.
							</div>
						</div>
					';
				}
        	}

        }

        // CNTROLADORES PARA EL TABLERO //
        /*Este controlador sirve para mostrale al usuaroo las cajas done se tiene inforamcion sobre los usuarios, prpductos, ventas registradas, asi com los movimientos que se tienen en el historial, y las ganacinas que se tienen*/
        public function contarFilas(){
        	$respuesta_users=Datos::contarFilasModel("users");
        	$respuesta_p=Datos::contarFilasModel("products"); 
        	$respuesta_c=Datos::contarFilasModel("categories"); 
        	//$respuesta_users=Datos::contrarFilasModel("users"); //historial
        	//tablero visualizacion del cont
			echo '
				<div class="row">
					<div class="col-lg-2 col-8">
						<div class="btn btn-secondary">
							<div class="inner">
								<h3>'.$respuesta_users["filas"].'</h3>
								<p>Total Usuarios</p>
							</div>
							<div class="icon">
								<i class="fas fa-users"></i>
							</div>
							<a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
                ';
                echo '
                	<div class="col-lg-2 col-6">
						<div class="btn btn-success">
							<div class="inner">
							<h3>.</h3>
								<p>Realizar Venta</p>
							</div>
							<div class="icon">
								<i class="fas fa-money-bill-alt"></i>
							</div>
							<a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
                ';
                echo '
					<div class="col-lg-2 col-6">
						<div class="btn btn-danger">
							<div class="inner">
								<h3>'.$respuesta_c["filas"].'</h3>
								<p>Total Categorias</p>
							</div>
							<div class="icon">
								<i class="fas fa-file-invoice"></i>
							</div>
							<a class="small-box-footer" href="index.php?action=categoria">Más <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				
				';
				echo '
					<div class="col-lg-2 col-6">
						<div class="btn btn-warning">
							<div class="inner">
								<h3>'.$respuesta_p["filas"].'</h3>
								<p>Total Productos</p>
							</div>
							<div class="icon">
								<i class="fas fa-shopping-bag"></i>
							</div>
							<a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
                ';         
        }


        //Vista de usuarios
		public  function vistaProductosController(){
            $respuesta=Datos::vistaProductsModel("products");
            foreach ($respuesta as $row => $item) {
                echo '<tr>
                        <td><a href=index.php?action=inventario&idProductEditar='.$item["id"].'><button class="btn btn-secondary btn-sm btn-icon "><i class="fa fa-edit"></i></button></td>
                        <td><a href=index.php?action=inventario&idBorrar='.$item["id"].'><button class="btn btn-secondary btn-sm btn-icon"><i class="fa fa-thash"></i><i class="fas fa-trash"></i></button></button></td>
                        <td>'.$item["id"].'</td>
                        <td>'.$item["codigo"].'</td>
                        <td>'.$item["producto"].'</td>
                        <td>'.$item["fecha"].'</td>
                        <td>'.$item["precio"].'</td>
                        <td>'.$item["stock"].'</td>
                        <td>'.$item["categoria"].'</td>
                        <td><a href=index.php?action=inventario&idProductAdd='.$item["id"].'><button class="btn btn-secondary  btn-sm btn-icon"><i class="fas fa-plus-circle"></i></button></td>
                        <td><a href=index.php?action=inventario&idProductDel='.$item["id"].'><button class="btn btn-secondary  btn-sm btn-icon"><i class="fas fa-minus-circle"></i></button></td>
                    </tr>';
            }
        }

		/*--Este controlador se encarga de mostrar el formualrio al producto para registrase*/
		public function registrarProductoController(){
			//formulario registrar producto
			?>
			<div class="col-md-6 mt-6">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de Productos </h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<div class="form-group">
								<label for="codigotxt">Codigo:</label>
								<input  class="form-control" type="text" name="codigotxt" id="codigotxt" required>
							</div>
							<div class="form-group">
								<label for="nombretxt">Nombre:</label>
								<input  class="form-control" type="text" name="nombretxt" id="nombretxt" required>
							</div>
							<div class="form-group">
								<label for="preciotxt">Precio:</label>
								<input  class="form-control" type="number" min="1" name="preciotxt" id="preciotxt" required> 
							</div>
							<div class="form-group">
								<label for="stocktxt">Stock:</label>
								<input  class="form-control" type="number" name="stocktxt" id="stocktxt" required>
							</div>
							<div class="form-group">
								<label for="motivotxt">Motivo:</label>
								<input  class="form-control" type="text" name="motivotxt" id="motivotxt" required>
							</div>
							<div class="form-group">
								<label for="categoria">Categoría:</label>
								<select class="form-control" type="text" name="categoria" id="categoria" required>
									<?php
										$respuesta_categoria= Datos::obtenerCategoryModel("categories");
										foreach ($respuesta_categoria as $row => $item) {
										 	?>
										 		<option value="<?php echo $item["id"]?>"><?php echo $item["categoria"]?></option>
										 	<?php
										 } 
									?>
								</select>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		/*-- Esta funcion permite insertar productos llamando al modelo  que se encuentra en  elarchivo crud de modelos confirma con un isset que la caja de texto del codigo este llena y procede a llenar en una variable llamada datos controller este arreglo se manda como parametro aligual que elnombre de la tabla,una vez se obtiene una respuesta de la funcion del modelo de inserccion 
        tenemos que checar si la respuesta fue afirmativa hubo un error y mostrara los respectivas alerta,para insertar datos en la tabla de historial se tiene que mandar a un modelollamado ultimoproductmodel este traera el ultimo dato insertado que es el id del producto que se manda en elarray de datoscontroller2 junto al nombre de la tabla asi insertando los datos en la tabla historial --*/
		public function insertarProductoController(){
			if(isset($_POST["codigotxt"])){

				//Almacenar en un array los valores de los text del metodo "registrarUserController"
				$datosController=array("codigo"=>$_POST["codigotxt"],"precio"=>$_POST["preciotxt"],"stock"=>$_POST["stocktxt"],"categoria"=>$_POST["categoria"],"nombre"=>$_POST["nombretxt"]);

				$respuesta=Datos::insertarProductsModel($datosController,"products");

				if ($respuesta=="success") {
					$respuesta3= Datos::ultimoProductsModel("products");
					$datoscontroller2=array("user"=>$_SESSION["id"],"cantidad"=>$_POST["stocktxt"],"producto"=>$respuesta3["id"],"note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["motivotxt"]);
					$respuesta2=Datos::insertarHistorialModel($datoscontroller2,"historial");
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Producto agregado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de agregar.
							</div>
						</div>
					';
				}
			}
		}

		/*--Este controlador se encarga de mostrar el formualrio al producto para registrase*/
		public function editarProductoController(){
			$datosController = $_GET["idProductEditar"];
            //envío de datos al mododelo
            $respuesta = Datos::editarProductsModel($datosController,"products");
			?>
			<div class="col-md-6 mt-6">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Editar</b> de Productos </h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<input  class="form-control" type="hidden" name="idProductEditar" id="idProductEditar" value="<?php echo $respuesta["id"] ?>" required>
							<div class="form-group">
								<label for="codigotxtEditar">Codigo:</label>
								<input  class="form-control" type="text" name="codigotxtEditar" id="codigotxtEditar" value="<?php echo $respuesta["codigo"] ?>" required>
							</div>
							<div class="form-group">
								<label for="nombretxt">Nombre:</label>
								<input  class="form-control" type="text" name="nombretxtEditar" id="nombretxtEditar" value="<?php echo $respuesta["nombre"] ?>" required>
							</div>
							<div class="form-group">
								<label for="preciotxt">Precio:</label>
								<input  class="form-control" type="number" min="1" name="preciotxtEditar" id="preciotxtEditar" value="<?php echo $respuesta["precio"] ?>" required> 
							</div>
							<div class="form-group">
								<label for="stocktxt">Stock:</label>
								<input  class="form-control" type="number" name="stocktxtEditar" id="stocktxtEditar" value="<?php echo $respuesta["stock"] ?>"  required>
							</div>
							<div class="form-group">
								<label for="motivotxt">Motivo:</label>
								<input  class="form-control" type="text" name="referenciatxtEditar" id="referenciatxtEditar" value="<?php echo $respuesta["motivo"] ?>" required>
							</div>
							<div class="form-group">
								<label for="categoria">Categoría:</label>
								<select class="form-control" type="text" name="categoriaEditar" id="categoriaEditar" required>
									<?php
										$respuesta_categoria= Datos::obtenerCategoryModel("categories");
										foreach ($respuesta_categoria as $row => $item) {
										 	?>
										 		<option value="<?php echo $item["id"]?>"><?php echo $item["categoria"]?></option>
										 	<?php
										 } 
									?>
								</select>
							</div>
							<button class="btn btn-primary" type="submit">Editar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		 /*-- Esta funcion permite actualizar los datos en la tabla productos a partir del metodo form anterior mandando atravez del modelo del crud a traves del arreglo  y con la variable respuesta mandamos dichos datos porque se llama al modelo actualizarproductsmodel si en el modelo se realizo correctamente entonces mandara una alerta decorrecto y pasara allenar dichos datos en elmodelo de insertar historial model en caso contrario no se hara nada y mostrara mensaje de error --*/
		public function actualizarProductoController(){
        	if(isset($_POST["codigotxtEditar"])){
        		$datosController=array("id"=>$_POST["idProductEditar"],"codigo"=>$_POST["codigotxtEditar"],"precio"=>$_POST["preciotxtEditar"],"stock"=>$_POST["stocktxtEditar"],"categoria"=>$_POST["categoriaEditar"],"nombre"=>$_POST["nombretxtEditar"]);
				
            	$respuesta = Datos::actualizarProductsModel($datosController,"products");
            	$datoscontroller2=array("user"=>$_SESSION["id"],"cantidad"=>$_POST["stocktxtEditar"],"producto"=>$_POST["idProductEditar"],"note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxtEditar"]);
				$respuesta2=Datos::insertarHistorialModel($datoscontroller2,"historial");
        		if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Producto editado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de editar.
							</div>
						</div>
					';
				}
        	}
        }

        /*Permite agregar productos al stock atraves del boton y un formulariopara agregar dicha canidad al producto se llama al modelo correspondiente para si apsar al contolador qye actulliza dicho modelo*/
        public function addStockController(){
        	$datosController=$_GET["idProductAdd"];
        	$respuesta=Datos::editarProductoModel("products");
        	?>
        	<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Agregar</b> stock de Productos </h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<input  class="form-control" type="hidden" name="idProductEditar" id="idProductEditar" value="<?php echo $respuesta["id"] ?>" required>
							<div class="form-group">
								<label for="stocktxt">Stock:</label>
								<input  class="form-control" type="number" name="addstocktxt" min="1" value="1" id="addstocktxt" required>
							</div>
							<div class="form-group">
								<label for="motivotxt">Motivo:</label>
								<input  class="form-control" type="text" name="addreferenciatxt" id="motivotxt"  required>
							</div>
							<button class="btn btn-primary" type="submit">Guardar</button>
						</form>
					</div>
				</div>
			</div>
        	<?php
		}
		

		public function actualizar1StockController(){
			if (isset($_POST["addstocktxt"])){
				$datosController = array("id"=>$_POST["idProductAdd"],"stock"=>$_POST["addstocktxt"]);
				$respuesta = Datos::pushProductsModel($datosController,"products");
				if ($respuesta == "success"){
					$datosController2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["addstocktxt"],"producto"=>$_POST
					["idProductAdd"],"note"=>$_SESSION["nombre_usuario"],"agrego/compro","reference"=>$_POST
					["addreferenciatxt"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2,"historial");
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Producto editado con éxito.
							</div>
						</div>
					';
					}else{
						echo ' 
							<div class="col-md-6 mt-3">
								<div class="alert alert-danger alert-dismissible">
									<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-ban"></i>
										Error!
									</h5>
									Se ha producido un error al momento de editar.
								</div>
							</div>
						';
				}
			}
		}

		//Esta funcion actualiza y llama al modelo de la tabla producto a su bez inserta una nueva fila historial, si el updadte sle correcto elimina los productos entonces insetara la actualizacion en la tabla historial si todo sale bien mostrara un mensaje de error o de corrrecto dependiendo de la repsuesta/
        public function actualizar2StockController(){
        	if(isset($_POST["delstocktxt"])){
        		$datosController=array("id"=>$_POST["idProductDel"],"stock"=>$_POST["delstocktxt"]);

            	$respuesta = Datos::pullProductsModel($datosController,"products");

            	
        		if ($respuesta=="success") {
        			$datoscontroller2=array("user"=>$_SESSION["id"],"cantidad"=>$_POST["delstocktxt"],"producto"=>$_POST["idProductDel"],"note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxtdel"]);
					$respuesta2=Datos::insertarHistorialModel($datoscontroller2,"historial");
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Stock disminuido con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de restar.
							</div>
						</div>
					';
				}
        	}
        }
		public function delProductController(){
			$datosController = $_GET["idProductDel"];
			$respuesta = Datos::editarProductsModel($datosController,"products");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-danger">
					<div class="card-header">
						<h4><b>Eliminar</b> stock al producto</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<div class="form-group">
								<input type="hidden" name="idProductDel" class="form-control" value="<?php echo $respuesta
								["id"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="codigotxtEditar">Stock: </label>
								<input class="form-control" name="delstocktxt" id="delstocktxt" type="number" min="1"
								max="<?php echo $respuesta["stock"];?>" value="<?php echo $respuesta["stock"];?>"
								required placeholder="Stock de producto">
							</div>
							<div class="form-group">
								<label for="referenciatxtdel">Motivo: </label>
								<input class="form-control" name="referenciatxtdel" id="referenciatxtdel" type="text"
								required placeholder="Referencia del producto">
							</div>
							<button class="btn btn-primary" type="submit">Realizar cambio</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		//Permite agregar productos al stock atraves del boton y un formulariopara agregar dicha canidad al producto se llama al modelo correspondiente para si apsar al contolador qye actulliza dicho modelo/
        public function addProductoController(){
            $datosController=$_GET["idProductAdd"];
            $respuesta=Datos::editarProductsModel($datosController,"products");
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Agregar</b> stock de Productos </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=inventario">
                            <input  class="form-control" type="hidden" name="idProductAdd" id="idProductAdd" value="<?php echo $respuesta["id"] ?>" required>
                            <div class="form-group">
                                <label for="stocktxt">Stock:</label>
                                <input  class="form-control" type="number" name="addstocktxt" min="1" value="1" id="addstocktxt" required>
                            </div>
                            <div class="form-group">
                                <label for="motivotxt">Motivo:</label>
                                <input  class="form-control" type="text" name="addreferenciatxt" id="motivotxt"  required>
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        //ELIMINAR EL PRODUCTO
		public function eliminarProductoController(){
            if(isset($_GET["idBorrar"])){
                $datosController=$_GET["idBorrar"];
                //Manda parametros al modelo
                $respuesta=Datos::eliminarProductsModel($datosController,"products");
                if ($respuesta=="success") {
                    echo ' 
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-check"></i>
                                    Exito!
                                </h5>
                                Producto eliminado con éxito.
                            </div>
                        </div>
                    ';
                }else{
                    echo ' 
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    Error!
                                </h5>
                                Se ha producido un error al momento de eliminar.
                            </div>
                        </div>
                    ';
                }
            }

        }
        //VISTA DEL HISTORIAL 
		public function vistaHistorialController(){
			$respuesta = Datos::vistaHistorialModel("historial");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>'.$item["usuario"].'</td>
						<td>'.$item["producto"].'</td>
						<td>'.$item["nota"].'</td>
						<td>'.$item["cantidad"].'</td>
						<td>'.$item["referencia"].'</td>
						<td>'.$item["fecha"].'</td>
					</tr>
				';
			}
		}

//VISTA DE LA CATEGORIA LO QUE PODEMOS VISUALIZAR
		public function vistaCategoriesController(){
			$respuesta = Datos::vistaCategoriesModel("categories");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?action=categoria&idCategoryEditar='.$item["idc"].'" class="btn btn-secondary
							btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
						</td>
						<td>
							<a href="index.php?action=categoria&idBorrar='.$item["idc"].'" class="btn btn-secondary
							btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
						</td>
						<td>'.$item["idc"].'</td>
						<td>'.$item["ncategoria"].'</td>
						<td>'.$item["dcategoria"].'</td>
						<td>'.$item["fcategoria"].'</td>
					</tr>
				';
			}
		}
		//formulario para el regisro de ctegoria
		public function registrarCategoryController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de categorias</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=categoria">
							<div class="form-group">
								<label for="ncategoriatxt">Nombre de la Categoria: </label>
								<input class="form-control" type="text" name="ncategoriatxt" id="ncategoriatxt"
								placeholder="Ingrese el nombre de la categoria">
							</div>
							<div class="form-group">
								<label for="dcategoriatxt">Descripcion de la Categoria: </label>
								<input class="form-control" type="text" name="dcategoriatxt" id="dcategoriatxt"
								placeholder="Ingrese la descripcion de la categoria">
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						<form>
					</div>
				</div>
			</div>
			<?php
		}
		
		public function insertarCategoryController(){
			if(isset($_POST["ncategoriatxt"]) && isset($_POST["dcategoriatxt"])){
				$datosController = array("nombre_categoria"=>$_POST["ncategoriatxt"],
				"descripcion_categoria"=>$_POST["dcategoriatxt"]);
				$respuesta = Datos::insertarCategoryModel($datosController,"categories");
				if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Categoria agregada con exito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de registrar categoria.
							</div>
						</div>
					';
				}
			}
		}

		public function editarCategoryController(){
			$datosController = $_GET["idCategoryEditar"];
			$respuesta = Datos::editarCategoryModel($datosController,"categories");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Editor</b> de categorias</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=categoria">
							<div class="form-group">
								<input type="hidden" name="idCategoryEditar" class="form-control" value="<?php
								echo $respuesta["id"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="ncategoriatxt">Nombre de la categoria: </label>
								<input class="form-control" type="text" name="ncategoriatxteditar"
								id="ncategoriatxt" placeholder="Ingrese el nombre de la categoria" value="<?php
								echo $respuesta["nombre_categoria"];?>" required>
							</div>
							<div class="form-group">
								<label for="dcategoriatxt">Descripcion de la categoria: </label>
								<input class="form-control" type="text" name="dcategoriatxteditar"
								id="dcategoriatxt" placeholder="Ingrese la descripcion de la categoria" value="<?php
								echo $respuesta["descripcion_categoria"];?>" required>
							</div>
							<button class="btn btn-primary" type="submit">Editar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}
		public function actualizarCategoryController(){
			if (isset($_POST["ncategoriatxteditar"]) && isset($_POST["dcategoriatxteditar"])){
				$datosController = array("id"=>$_POST["idCategoryEditar"],"nombre_categoria"=>$_POST
				["ncategoriatxteditar"],"descripcion_categoria"=>$_POST["dcategoriatxteditar"]);
				$respuesta = Datos::actualizarCategoryModel($datosController, "categories");
				if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Categoria actualizada con exito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de actualizar categoria.
							</div>
						</div>
					';
				}
			}
		}

		public function eliminarCategoryController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta = Datos::eliminarCategoryModel($datosController,"categories");
				if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Categoria eliminada con exito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<divs class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de eliminar categoria.
							</div>
						</div>
					';
				}
			}
		}

//****************************************************************************************************
		//Vista de VENTA
		public function vistaProductsController_ventas(){ //Crea la función para visualizar los productos que están registrados
			$respuesta = Datos::vistaProductsModel("products"); 		
			return $respuesta;
		}


		public function update_products(){	

			if( isset($_POST['datos_ocultos']) ){


				$datos=json_decode($_POST['datos_ocultos']);


				for($i=0; $i < sizeof($datos); $i++ )
				{
					$datosModel = array('stock' => ($datos[$i][2] * -1),
										'id' => $datos[$i][0]);

					Datos::pullProductsMode($datosModel, "products");

					$datosModel = array('producto' => $datos[$i][1],
										'cantidad' => $datos[$i][2],
										'precio_unidad' => $datos[$i][4],
										'total' => ($datos[$i][4] * $datos[$i][2]),
										'fecha' => date("Y-m-d H:i:s") );
					
					Datos::insertarVentaModel($datosModel, "sales");
				}

			}


		}



		public function vistaVentasController(){
        	$respuesta = Datos::vistaVentasModel();
        	foreach ($respuesta as $row => $item) {
        		echo '
        			<tr>
        				<td>'.$item["producto"].'</td>
        				<td>'.$item["cantidad"].'</td>
        				<td>'.$item["precio_unidad"].'</td>
        				<td>'.$item["total"].'</td>
        				<td>'.$item["fecha"].'</td>
        			</tr>';
        	}
		}

	}

?>