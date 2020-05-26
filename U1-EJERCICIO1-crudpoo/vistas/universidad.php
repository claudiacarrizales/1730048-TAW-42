<div class="container">
    <div class="jumbotron">
        <h2><strong>Formulario universidad</strong></h2>
        <!--FORMULARIO DEL REGISTRO DE UNIVERSIDADES-->
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id_uni']==""){ ?>
            <form action="index.php?m=get_datosUniversidad" method="post">
            <?php } ?>
            <?php if($data['id_uni']!=""){ ?>
            <form action="index.php?m=get_datosUniversidad&id_uni=<?php echo $data['id_uni'];?>" method="post">
            <?php } ?>
                </div>  
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_nomU">Nombre Universidad:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txt_nomU" value="<?php echo $data['nombre']; ?>">
                        </div>            
                    </div>
                   
                    <!--BOTONES-->
                   <div class="form-group">
                        <div class="col-md-12 col-md-off-set-3">
                            <?php if($data['id_uni']==""){ ?>
                                <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
                            <?php }  ?>
                            <?php if($data['id_uni']!=""){ ?>
                                <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                            <?php }  ?>
                        </div>
                    </div>
            </form> 
        </div>
    </div>
    
</div>