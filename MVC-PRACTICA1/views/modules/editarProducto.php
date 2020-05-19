


<!--Forumario donde se editaran los datos de un usuario previamente registrado-->
<?php

    $r = array();
    $datos = new MvcController();
    $r = $datos->traerDatosProducto();
    $categorias = array();
	$categorias = $datos->traerDatosCategorias();
?>

<?php

	//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
	$registro = new MvcController();

	//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
	$registro -> actualizarDatosProducto();

?>
<!--Formulario en donde se ponen los datos existentes para que el usuario los edite y luego los guarde con el boton-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">EDITAR DATOS DEL PRODUCTO</h2>
        <!--Formulario de inicio-->

		<form method="post">
			<div class="form-group">
		    	<label for="exampleInputEmail1"><strong>Id</strong></label>
		    	<input type="text" class="form-control" name="id" value="<?= $r[0]['id'] ?>" disabled>
		  	</div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Nombre</strong></label>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?= $r[0]['nombre'] ?>" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Descripcion</strong></label>
            <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="<?= $r[0]['descripcion'] ?>" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Precio compra</strong></label>
            <input type="text" class="form-control" placeholder="precio compra" name="precioCompra" value="<?= $r[0]['precio_compra'] ?>" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Precio venta</strong></label>
            <input type="text" class="form-control" placeholder="precio venta" name="precioVenta" value="<?= $r[0]['precio_venta'] ?>" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Inventario</strong></label>
            <input type="text" class="form-control" placeholder="inventario" name="inventario" value="<?= $r[0]['inventario'] ?>" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Categoria</strong></label>
           <select class="form-control" name="categoria">
                  <?php for($i=0; $i < count($categorias); $i++ ) { ?>
                      <option value="<?php echo $categorias[$i]['id_categoria'] ?>">  <?php echo $categorias[$i]['categoria'] ?> </option>
                  <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</section>

