<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2><strong>Registro de estudiantes</strong></h2>

    <!--Cuerpo de la tabla donde se visualizará la informacion la cual es de los estudiantes--> 
    </div>
    <div class="container">
        <table class="table table-striped" border="3">
            <thead>
                <tr>
                    <!--nombres de las colunas de la tabla-->
                    <th>id</th>
                    <th>cedula</th>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>promedio</th>
                    <th>edad</th>
                    <th>fecha</th>
                    <th>password</th>
                    <th>carrera</th>
                    <th>universidad</th>
                    <th>acción</th>
                </tr>
            </thead>
            <tbody>
                <!--manda a llamar la consula de los datos paaa que se pueda visualizarlos en la respectiva pantalla-->
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['cedula']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $data['apellidos']; ?></th>
                        <th><?php echo $data['promedio']; ?></th>
                        <th><?php echo $data['edad']; ?></th>
                        <th><?php echo $data['fecha']; ?></th>
                        <th><?php echo $data['password']; ?></th>
                        <th><?php echo $data['nombreC']; ?></th>
                        <th><?php echo $data['nombreU']; ?></th>

                        <th>
                            <!--por si quiere eliminar o iditar algun regstro ya realizado se utilizara el id para poder realizar la dicha operaciń-->
                            <a href="index.php?m=estudiante&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>