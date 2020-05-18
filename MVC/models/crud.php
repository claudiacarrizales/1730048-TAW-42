<?
	require_once "conexion.php";
	//heredar la clase conexxio.php para poder accesar y utilizar la conexion a la BD, se extiende cuando se requiera manipular una funcion metodo, en este caso manipularemos la funcion "conectar de models/conexion.php"

	class Datos extends Conexion{
		//registro de usuarios
		public function registroUsuarioModel($datosModel, $tabla){
			//prepare() prepara la sentencia de sql para que sea ejecutada por el método posteriormente la sentencia de sql para que sea ejecutada por el meodo POSStantement la sentencia de sql se puede coteer desde 0 para ejecutar mas para metros

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) 
			VALUES (:usuario, :password, :email)");

			//bindParam() vincula una variable de PHP a un parametro de sustitucion con nombre correspondiente a la sentencia SQL que fue usada para preparar la senencia 
			$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_sTR);
			$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_sTR);
			$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_sTR);

			//regresar una respuesta satisfactoria o no
			if($stmt->execute()){
				return "succes";
			}else{
				return "error";
			}
			$stmt->cose();
		}
		//modelo ingresoUsuarioModel login
		public function ingresoUsuarioModel($datosModel, $tabla){
			$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario=:usuario");
			$stmt = bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_sTR);

			$stmt = execute();

			//fetch () obtiene una fila de un conjunto de resultados asociado al objeto $stmt
			return $stmt->fetch();

			$stmt->close(); 
		}
		//MODELO VISTA USUARIO
		public function vistaUsuariosModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");
			$stmt->execute();

			//fetchAll(): obtiene todas las filas de un conjunto de resultados asociado al objeto PDO stmt
			return $stmt->fetchAll();

			$stmt->close();
		}

		//MODELO EDITAR USUARIO
		public function editarUsuarioModel($datosModel, $tabla){
			$stmt = Conexion::conectar()->prepare ("SELECT id, usuario, password, email FROM $tabla WHERE id=:id");

			$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}
		//MODELO ACTUALIZAR USUARIOS
		public function actualizarUsuarioModel($datosModel, $tabla){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, email=:email WHERE id=:id");

			$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

			if($stmt->execute()){
				return "secces";
			}else{
				return "error";
			}
			$stmt->close();
		}

		//MODELO BORRAR USUARIO
		public function borrarUsuarioModel($datosModel, $tabla){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

			$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

			if($stmt->execute()){
				return "secces";
			}else{
				return "error";
			}
			$stmt->close();
		}

	}

?>