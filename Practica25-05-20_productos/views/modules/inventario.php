<?php 
	/*Se verifica que exista la sesion, en caso de que no sea aso, se muestta el login*/
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
	}
	/*Llamada a los controladres para insertar/modificar/eliminar usuarios*/
	$inventario= new MvcController();
	$inventario->insertarProductoController();
	$inventario->actualizarProductoController();
	$inventario->eliminarProductoController();
	$inventario->actualizar1StockController();
	$inventario->actualizar2StockController();
	/*Se verifica que el usuario haya pulsado sobre el boton de registro de registar o editar para mostrarle su resperivo formulario*/

	if(isset($_GET['registar'])){
		$inventario->registrarProductoController();
	}else if(isset($_GET['idProductEditar'])){
		$inventario->editarProductoController();
	}else if(isset($_GET['idProductAdd'])){
		$inventario->addProductoController();
	}else if(isset($_GET['idProductDel'])){
		$inventario->delProductoController();
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
					<a href="index.php?action=inventario&registar" class="btn btn-info">Agregar Nuevo Producto</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap">
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-hover m-0 table-bordered">
							<thead class="table-info"> 
								<tr>
									<th>¿Editar?</th>
									<th>¿Eliminar?</th>
									<th>Id</th>
									<th>Código</th>
									<th>Nombre</th>
									<th>Fecha del producto</th>
									<th>Precio</th>
                                    <th>Stock</th>
									<th>Categoria</th>
									<th>¿Añadir Stock?</th>
									<th>¿Eliminar Stock?</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									/*Se llama al controlador que muestra todas las categoras que exiten*/
									$inventario->vistaProductosController();
								?>
							</tbody>
						</table>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</div> <!--/.container-fluid-->
<?php $historial= new MvcController();?>
<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Historial</h3>
		</div>
		<div class="card-body">
			
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table id="example2" class="table table-bordered m-0 table-striped">
							<thead class="table-dark"> 
								<tr>
									<th>Usuario</th>
									<th>Producto</th>
									<th>Nota</th>
									<th>Cantidad</th>
                                    <th>Motivo</th>
									<th>Fecha de Inserción</th>
							
								</tr>
							</thead>
							<tbody>
								<?php 
									/*Se llama al controlador que muestra todas las categoras que exiten*/
									$historial->vistaHistorialController();
								?>
							</tbody>
						</table>	
					</div>
				</div>	
			</div>
		</div>
	</div>
	<div class="col-md-12 text-center">
		<ul class="pagination pagination-sm pager" id="historial_page"></ul>
	</div>
</div> <!--/.container-fluid-->