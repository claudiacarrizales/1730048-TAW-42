<?php
	class MvcController{
		#llamada a la plantlla
		#metodo pagina
		public function pagina(){
			include"views/template.php";
		}
		//enlaces a la pagina
		public function enlacesPaginasController(){
			if(isset(($_GET['action']))){
				$enlaces=$GET['action'];
			}else{
				$enlaces = 'index';
			}
			//ES EL MOMENTO EN EL QUE EL CONTROLADOR INVOCA AL MODELO LLAMADA ENLACES PAGNAS MODEL PARA QUE MUESTRE 
			//EL LISTADO PAGINAS
			$respuesta = paginas::enlacesPaginasModel($enlaces);
			INCLUDE $respuesta;
		}
		//REGISTRO DE USUARIOS
		Public function registroUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){
				//RECIBE A TRAVES DEL METODO POST EL NAME HTML DE USUARIO, PASS, EMAIL SE ALMACENAN LOS DATOS DE UNA VARIABLE O PROPIEDAD DE TIPO ARRAY ASOCIATIVO CON SUS RESPECTIVAS PROPIEDADES (USUARIO, PASS, EMAIL).
				$datosController = array("usuario"=>$_POST["usuarioRegistro"],
					"password"=>$_POST["passwordRegistro"],
					"email"=>$_POST["emailRegistro"]);
				//se le dice al odelo models/crud.php (Datos::registroUsuariosMOdel) que en modelo de datos el metodo registroUsuariosModel reciba en ss parametros los valores $datosController y el nombre de la tabla la cual debe conectarse(usuarios)
				$respuesta = Datos::registroUsuariosModel($datosController,"usuarios");

				//se imprime la respuesta ala lista de la vista
				if($respuesta == "success"){
					header(string:"location:index.php?acion=ok");
				}else{
					header(string:"location:index.php");
				}
			}
		}
		//INGRESO DE USARIOS 
		public function ingresoUsuarioController(){
			if (isset($_POST["usuarioIngreso"])){
				$datosController = array("usuario"=> $_POST["usuarioIngreso"],
					"password"=> $_POST["passwordIngreso"]);

				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//validar la respuesta de modelo para ver si es un usuario correcto
				if ($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]) {
					session_start();
					$_SESSION["validar"]=true;
					header("location:index.php?action=usuarios");
				}else{
					header("location:index.php?action=fallo");
				}
			}
		}
		//vista usuarios
		public function vistaUsuariosController(){
			$respuesta = Datos::vistaUsuarioModel("usuarios");
			//utilizar un foreach para iterar un array e imprimir la consulta del modelo 
			foreach($respuesta as $row => $item){
				echo'<tr>
					<td>'.$item["usuario"].'</td>
					<td>'.$item["password"].'</td>
					<td>'.$item["email"].'</td>
					<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
					<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Eliminar</button></a></td>
				</tr>';
			}
		}
		//editar usuarios
		public function editarUsuarioController(){
			$datosController = $_GET["id"];
			$respuesta=Datos::editarUsuarioModel($datosController, "usuarios");

			//diseñar ña estructura de un formulario para que se muestren los datos de la consulta generada en el modelo
			echo '<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
				<input type="text" value="'.$respuesta["usuario"].'" name="uduarioEditar" required>
				<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
				<input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>
			';
		}
		//ACTUALIZAR USUARIO
		public function actualizarUsuarioController(){
			if(isset($_POST["usuarioEditar"])){
				$datosController=array("id"=>$_POST["idEditar"], 
					"usuario"=>$_POST["usuarioEditar"], 
					"password"=>$_POS["usuarioPassword"], 
					"email"=>$_POST["emailEditar"]);
				$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");


				if ($respuesta == "success") {
					header("location:index.php?action=cambio");
				}else{
					echo "error";
				}

			}
		}

		//BORRAR USUARIO
		public function borrarUsuarioController(){
			if(isset($_GET["idBorrar"])){
				$datosController=$_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {
					header("location:index.php?action=usuarios");
				}
			}
		}
		//LISTA DE MÉTODOS DE MODELOS POR DESARROLLAR
		/*
			1. registroUsuarioMOdel  - listo
			2. ingresoUsuarioModel  - listo
			3. vistaUsuarioModel
			4. editarUsuarioModel
			5. actualizarUsuarioModel
			6. borrarUsuarioModel

		*/
	}
?>