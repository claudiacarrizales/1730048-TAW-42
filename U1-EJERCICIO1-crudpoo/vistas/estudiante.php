<div class="container">
    <div class="jumbotron">
        <h2><strong>Formulario registro</strong></h2>
        <!--FORMULARIO DEL REGISTRO DE ESTUDIANTES-->
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?m=get_datosE" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosE&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>

                <!--<div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_id" value="<?php echo $data['id']; ?>">
                    </div>-->
                
                <!--campos del llenado del registro para dar de alta un estudiante-->
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_cedula">CEDULA:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_cedula" value="<?php echo $data['cedula']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_apellidos">APELLIDOS:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_apellidos" value="<?php echo $data['apellidos']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_promedio">PROMEDIO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_promedio" value="<?php echo $data['promedio']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_edad">EDAD:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_edad" value="<?php echo $data['edad']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">FECHA:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="txt_fecha" value="<?php echo $data['fecha']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_pass">PASSWORD:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="txt_pass" value="<?php echo $data['password']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_pass">CARRERA:</label>
                    <div class="col-sm-10">
                        <?php
                            echo '<select class="form-control" class="form-control"  name="carrera" id="tipo" >';

                            foreach($queryC as $row => $item){
                                echo '<option value="'.$item["id_carrera"].'">'.$item["nombre"].'</option>';
                            }
                            echo '</select>';
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-sm-3 control-label" for="txt_pass">UNIVERSIDAD:</label>
                    <div class="col-sm-9">
                        <?php
                            echo '<select class="form-control" class="form-control"  name="universidad" id="tipoUni" >';

                            foreach($queryU as $row => $item){
                                echo '<option value="'.$item["id_uni"].'">'.$item["nombre"].'</option>';
                            }
                            echo '</select>';
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
                    <?php }  ?>
                    <?php if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>