

<?php

    //Array que almacena todos los datos traidos de la tabla
    $r = array();
    $datos = new MvcController();
    $r = $datos->traerDatosProductos();

?>

<!--Tabla dinamica que lista a todos los usuarios registrados en dicha tabla-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">PRODUCTOS</h2>
        <table  class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio compra</th>
                    <th>Precio venta</th>
                    <th>Inventario</th>
                    <th>Categoria</th>
                    <th>Modificar</th>
                    <th>Eliminar</th> 
                </tr>
                
            </thead>
            
            <tbody>

                <!--Se recorre con un for a todos los datos devueltos en un arreglo por parte de la funcion traerUsuarios() -->
                <?php for($i=0; $i < count($r); $i++ ) { ?>
                <tr>
                    <td><?php echo $r[$i]['id'] ?></td>
                    <td><?php echo $r[$i]['nombre'] ?></td>
                    <td><?php echo $r[$i]['descripcion'] ?></td>
                    <td><?php echo $r[$i]['precio_compra'] ?></td>
                    <td><?php echo $r[$i]['precio_venta'] ?></td>
                    <td><?php echo $r[$i]['inventario'] ?></td>
                    <td><?php echo $r[$i]['id_categoria'] ?></td>
                    <td><a href="index.php?action=editarProducto&id=<?=$r[$i]['id']?>">Modificar</a></td>
                    <td><a href="index.php?action=eliminarProducto&id=<?=$r[$i]['id']?>">Eliminar</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</section>





