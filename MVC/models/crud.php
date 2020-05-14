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
	}

?>