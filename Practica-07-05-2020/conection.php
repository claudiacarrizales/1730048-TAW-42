<!-- -la informacion para la conexionde la base de dato al sistema-->
<?php
	$database="practicaCRUD";
	$user='root';
	$password='';

	try{
		$conection = new PDO('mysql:host=localhost;dbname='.$database, $user, $password);
	}catch(PDOException $e){
		echo "Error".$e->getMessage();
	}
?>