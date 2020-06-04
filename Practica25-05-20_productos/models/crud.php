<?php
	require_once "conexion.php";


	//heredar la calse conexion.php para poder acccesar y ttilizar la conexion a la base de dats, s extiende cuando se quiere manipular una funcion o méotod, en este caso manipularemos la funcion "conectar" de models/conexion.php
	class Datos extends Conexion{

		//modelo ingresoUsuarioModel
		public static function ingresoUsuarioModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT CONCAT(firstname, ' ', lastname) AS 'nombre_usuario', user_name AS 'usuario', user_password AS 'contrasena', user_id AS 'id' FROM $tabla WHERE user_name=:usuario");
			$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
			$stmt->execute();
			//fetch() Obtiene una fila de un conjunto de resultados 
			return $stmt->fetch();

			$stmt->close();
		}

		//MOdelo vistaUsuarioModel
		public static function vistaUsuarioModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT user_id, firstname,lastname,user_name, user_password,user_email,date_added FROM $tabla");
			$stmt->execute();
			//fetchAll: obtiene todas las fils de un conjunto asociado al objeto PDO statment (stmt)

			return $stmt->fetchAll();
			$stmt->close();

		}

		//registo de usuarios
		public static function insertarUsuarioModel($datosModel,$tabla){
			date_default_timezone_set('America/Mexico_City');
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$fecha=date("Y").'/'.date("m").'/'.date("d");
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (firstname,lastname,user_name, user_password,user_email, date_added) VALUES(:nusuario,:ausuario,:usuario,:contra,:email,:added)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":nusuario",$datosModel["nusuario"], PDO::PARAM_STR);
			$stmt->bindParam(":ausuario",$datosModel["ausuario"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":contra",$datosModel["contra"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":added",$fecha, PDO::PARAM_STR);

			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				//echo();
				return $datosModel["nusuario"]." ".$datosModel["ausuario"]." ".$datosModel["usuario"]." ".$datosModel["contra"]." ".$datosModel["email"]." ".$fecha;
			}
			$stmt->close();
		}
		
		

		//Editar usuarios
		public static function editarUsuarioModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname AS 'nusuario', lastname AS 'ausuario', user_name AS 'usuario', user_password AS 'contra', user_email AS 'email' FROM $tabla WHERE user_id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
		}

		public static function actualizarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET firstname=:nusuario, lastname=:ausuario, user_name=:usuario, user_password=:contra, user_email=:email WHERE user_id=:id");

			$stmt->bindParam(":nusuario",$datosModel["nusuario"], PDO::PARAM_STR);
			$stmt->bindParam(":ausuario",$datosModel["ausuario"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":contra",$datosModel["contra"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return $datosModel["nusuario"]." ".$datosModel["ausuario"]." ".$datosModel["usuario"]." ".$datosModel["contra"]." ".$datosModel["email"]." ".$datosModel["id"];
			}
			$stmt->close();

		}

		public static function eliminarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id=:id");
			$stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		// MODELO PARA EL TABLERO //
        /*-- Este modelo permite conocer el numero de filas en determinada tabla, se utiliza para mostrar información en el tablero --*/
        public function contarFilasModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS 'filas' FROM $tabla");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

	}
?>