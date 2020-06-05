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


        //MODELO PRODUCTOS
        public function vistaProductsModel($tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT p.id_product AS 'id', p.code_product AS 'codigo', p.name_product AS 'producto', p.date_added AS 'fecha', p.price_product AS 'precio', p.stock AS 'stock', c.name_category AS 'categoria' FROM $tabla INNER JOIN categories c ON p.id_category = c.id_category");

        	$stmt->execute();
        	return $stmt->fetchAll();
        	$stmt->close();
        }


        public function insertarProductsModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (code_producto,name_product,price_product,,
			stock,id_category) VALUES(:codigo,:nombre,:precio,:stock,:categoria)");

			$stmt -> bindParam(":codigo",$datosModel["codigo"],PDO::PARAM_STR);
			$stmt -> bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
			$stmt -> bindParam(":precio",$datosModel["precio"],PDO::PARAM_INT);
			$stmt -> bindParam(":stock",$datosModel["stock"],PDO::PARAM_INT);
			$stmt -> bindParam(":categoria",$datosModel["categoria"],PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}


        public function editarProductsModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT id_product AS 'id', code_product AS 'codigo', name_product AS 'nombre', price_product AS 'precio', stock FROM $tabla WHERE id_product=:id");

        	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
        	$stmt->execute();
        	return $stmt->fetch();
        	$stmt->close();
        }

        public function pushProductsModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = stock + :stock WHERE id_product=:id");

        	$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
        	$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        	if($stmt->execute()){
        		return "succes":
        	}else{
        		return "error";
        	}
        	$stmt->close();
        }


        public function pullProductsModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("UPDATE $table SET stock = stock - :stock WHERE id_product=:id AND stock>=:stock");

        	$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
        	$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        	if($stmt->execute()){
        		return "succes":
        	}else{
        		return "error";
        	}
        	$stmt->close();
        }


        public function actualizarProductsModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("UPDATE $table SET code_product=:codigo, name_product=:nombre, price_product=:precio, id_category=:categoria, stock=:stock WHERE id_product=:id");


        	$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
        	$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        	$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_INT);
        	$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_INT);
        	$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
        	$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        	if($stmt->execute()){
        		return "succes":
        	}else{
        		return "error";
        	}
        	$stmt->close();
        }



        public function eliminarProductsModel($datosModel, $tabla){
        	$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_product=:id");

        	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        	if($stmt->execute()){
        		return "succes":
        	}else{
        		return "error";
        	}
        	$stmt->close();
        }


        public function ultimoProductsModel($tabla){
        	$stmt=Conexion::conectar()->prepare("SELECT id_product AS 'id' FROM $tabla ORDER BY id_product DESC LIMIT 1");

        	$stmt->execute();
        	return $stmt->fetch();
        	$stmt->close();
        }
	//*****************************************************************************************

    //VISTA HISTORIAL MODEL

    public function vistaHistorialModel($tabla){
    	$stmt=Conexion::conectar()->prepare("SELECT CONCAT(u.firstname, ':', u.user_name) AS 'usuario', p.name_product AS 'producto', h.date AS 'fecha', h.reference AS 'referencia', h.note AS 'nota', h.quantify AS 'cantidad' FROM $tabla h INNER JOIN products p ON h.id_product=p.id_product INNER JOIN users u ON h.user_id=u.user_id");

    	$stmt->execute();
    	return $stmt->fetchAll();
    	$stmt->close();
    }


    public function insertarHistorialModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (user_id,quantity,,id_producto,note,
			reference)VALUES(:user,:cantidad,:producto,:note,:reference)");

			$stmt -> bindParam(":user",$datosModel["user"],PDO::PARAM_INT);
			$stmt -> bindParam(":cantidad",$datosModel["cantidad"],PDO::PARAM_INT);
			$stmt -> bindParam(":producto",$datosModel["producto"],PDO::PARAM_INT);
			$stmt -> bindParam(":note",$datosModel["note"],PDO::PARAM_STR);
			$stmt -> bindParam(":reference",$datosModel["reference"],PDO::PARAM_STR);
			
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}


//*************************************************************************************************
        public function vistaCategoryModel($tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT id_category AS 'idc', name_category AS 'ncategoria', description_category AS 'dcategoria', date_added AS 'fcategoria' FROM $tabla");

        	$stmt->execute();
        	return $stmt->fetchAll();
        	$stmt->close();
        }

        public function inseratrCategoryModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name_category, description_category) VALUES (:ncategoria, :dcategoria)");

        	$stmt->bindParam(":ncategoria", $datosModel["nombre_categoria"], PDO::PARAM_STR);
        	$stmt->bindParam(":dcategoria", $datosModel["descripcion_categoria"], PDO::PARAM_STR);

        	if ($stmt->execute()) {
        		return "success";
        	}else{
        		return "error";
        	}
        	$stmt->close();
        }

        public function editarCategoryModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT id_category AS 'id', name_category AS 'nombre_categoria', description_category AS 'descripcion_categoria' FROM $tabla WHERE id_category=:id");

        	$stmt->bindParam(":id", $datosModel,PDO::PARAM_INT);
        	$stmt->execute();
        	return $stmt->fetch();
        	$stmt->close();
        }


        public function actualizarCategoryModel($datosModel,$tabla) {
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name_category = :nombre_categoria,
			description_category = :descripcion_categoria WHERE id_category = :id");

			$stmt->bindParam(":nombre_categoria",$datosModel["nombre_categoria"],PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_categoria",$datosModel["descripcion_categoria"],PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_STR);

			if ($stmt->execute()){
				return "success";
			} else{
				return "error";
			}
			$stmt -> close();
		}


        public function eliminarCategoryModel($datosModel, $tabla){
        	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_category = :id");
        	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        	if($stmt->execute()){
        		return "success";
        	}else{
        		return "error":
        	}
        	$stmt->close();
        }

        public function obtenerCategoryModel($tabla){
        	$stmt = Conexion::conectar()->prepare("SELECT id_category AS 'id', name_category AS 'categoria' FROM $tabla");
        	$stmt->execute();
        	return $stmt->fetchAll();
        }


	}
?>