<?php
  $categorias = array();
  $datos = new MvcController();
  $categorias = $datos->traerDatosCategorias();
?>

<?php

//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$registro = new MvcController();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$registro -> registroProductoController();

if(isset($_GET["action"])){

    if($_GET["action"] == "ok"){
        echo "Registro Exitoso";
    }

}
?>

<!--Vista del formulario del login-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">REGISTRO PRODUCTO</h2>
        <!--Formulario de inicio-->
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Nombre</strong></label>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Descripcion</strong></label>
            <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Precio compra</strong></label>
            <input type="text" class="form-control" placeholder="precio compra" name="precioCompra" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Precio venta</strong></label>
            <input type="text" class="form-control" placeholder="precio venta" name="precioVenta" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Inventario</strong></label>
            <input type="text" class="form-control" placeholder="inventario" name="inventario" required>
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
