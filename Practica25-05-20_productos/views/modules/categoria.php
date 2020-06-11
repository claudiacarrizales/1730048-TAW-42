<?php 
	/*Se verifica que exista la sesion, en caso de que no sea aso, se muestta el login*/
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
	}
	/*Llamada a los controladres para insertar/modificar/eliminar usuarios*/
	$categorias = new MvcController();
	$categorias->insertarCategoryController();
	$categorias->actualizarCategoryController();
	$categorias->eliminarCategoryController();
	/*Se verifica que el usuario haya pulsado sobre el boton de registro de registar o editar para mostrarle su resperivo formulario*/

	if(isset($_GET['registar'])){
		$categorias->registrarCategoryController();
	}else if(isset($_GET['idCategoryEditar'])){
		$categorias->editarCategoryController();
	}
?>
<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Inventario</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=categoria&registar" class="btn btn-info">Agregar Nueva Categoria</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-striped dispaly">
							<thead class="table-info"> 
								<tr>
									<th>Editar</th>
									<th>Eliminar</th>
									<th>Id</th>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Fecha insercion</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									/*Se llama al controlador que muestra todas las categoras que exiten*/
									$categorias->vistaCategoriesController();
								?>
							</tbody>
						</table>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</div> <!--/.container-fluid-->