<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2><strong>Registro de carreras</strong></h2>

    <!--Cuerpo de la tabla donde se visualizará la informacion la cual es de los estudiantes--> 
    </div>
    <div class="container">
        <table class="table table-striped" border="3">
            <thead>
                <tr>
                    <!--nombres de las colunas de la tabla-->
                    <th>id</th>
                    <th>Nombre</th>
                    <th>acción</th>
                </tr>
            </thead>
            <tbody>
                <!--manda a llamar la consula de los datos paaa que se pueda visualizarlos en la respectiva pantalla-->
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id_carrera']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th>
                            <!--por si quiere eliminar o iditar algun regstro ya realizado se utilizara el id para poder realizar la dicha operaciń-->
                            <a href="index.php?m=carrera&id_carrera=<?php echo $data['id_carrera']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDeleteCarrera&id_carrera=<?php echo $data['id_carrera']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>