<?php 
	/*Se verifica que exista la sesion, en caso de que no sea aso, se muestta el login*/
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
	}
	/*Llamada a los controladres para insertar/modificar/eliminar usuarios*/
	$usuarios= new MvcController();
	$usuarios->insertarUsuarioController();
	$usuarios->actualizarUsuarioController();
	$usuarios->eliminarUsuarioController();
	/*Se verifica que el usuario haya pulsado sobre el boton de registro de registar o editar para mostrarle su resperivo formulario*/

	if(isset($_GET['registar'])){
		$usuarios->registrarUsuarioController();
	}else if(isset($_GET['idUserEditar'])){
		$usuarios->editarUsuarioController();
	}
?>
<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Usuarios</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=usuarios&registar" class="btn btn-info">Agregar</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap">
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-hover m-0 table-bordered">
							<thead class="table-info"> 
								<tr>
									<th>Editar</th>
									<th>Eliminar</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Usuario</th>
									<th>Email</th>
									<th>Fecha inserción</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									/*Se llama al controlador que muestra todas las categoras que exiten*/
									$usuarios->vistaUsuarioController();
								?>
							</tbody>
						</table>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</div> <!--/.container-fluid-->