<div class="container">
    <div class="jumbotron">
        <h2><strong>Formulario carrera</strong></h2>
        <!--FORMULARIO DEL REGISTRO DE CARRERAS-->
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id_carrera']==""){ ?>
            <form action="index.php?m=get_datosCarrera" method="post">
            <?php } ?>
            <?php if($data['id_carrera']!=""){ ?>
            <form action="index.php?m=get_datosCarrera&id_carrera=<?php echo $data['id_carrera'];?>" method="post">
            <?php } ?>
                </div>  
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_nomC">Nombre Carrera:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txt_nomC" value="<?php echo $data['nombre']; ?>">
                        </div>            
                    </div>
                </div>
                
                <!--BOTONES-->
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                        <?php if($data['id_carrera']==""){ ?>
                            <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
                        <?php }  ?>

                        <?php if($data['id_carrera']!=""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                        <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>