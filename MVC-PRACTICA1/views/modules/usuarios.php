<?php

    //Array que almacena todos los datos traidos de la tabla
    $r = array();
    $datos = new MvcController();
    $r = $datos->traerUsuarios();

?>

<!--Tabla dinamica que lista a todos los usuarios registrados en dicha tabla-->
<section class="resume-section p-3 p-lg-8 d-flex align-items-center" id="interests">
    <div class="w-100">
        <h2 class="mb-8">USUARIOS</h2>
        <table  class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Modificar</th>
                    <th>Eliminar</th> 
                </tr>
                
            </thead>
            
            <tbody>

                <!--Se recorre con un for a todos los datos devueltos en un arreglo por parte de la funcion traerUsuarios() -->
                <?php for($i=0; $i < count($r); $i++ ) { ?>
                <tr>
                    <td><?php echo $r[$i]['id'] ?></td>
                    <td><?php echo $r[$i]['usuario'] ?></td>
                    <td><?php echo $r[$i]['password'] ?></td>
                    <td><?php echo $r[$i]['email'] ?></td>
                    <td><a href="index.php?action=editar&id=<?=$r[$i]['id']?>">Modificar</a></td>
                    <td><a href="index.php?action=eliminar&id=<?=$r[$i]['id']?>">Eliminar</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</section>





