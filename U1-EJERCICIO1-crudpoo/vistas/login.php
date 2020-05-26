<div class="container">
    <div class="jumbotron">
        <h2><strong>Iniciar sesion</strong></h2>
        <!--FORMULARIO DEL REGISTRO DE ESTUDIANTES-->
    </div>
    <?php if(isset($_GET['e'])) { ?> 
        <div class="alert alert-danger" role="alert">
        Te equivocaste!, revisa tu usario y/o contraseña :c
</div>
    <?php } ?>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <form action="index.php?m=iniciar_sesion" method="post">
                </div>  
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txt_nombre" value="">
                        </div>            
                    </div>
                   
                    
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_contrasena">PASSWORD:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="txt_contrasena" value="">
                        </div>         
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-md-off-set-3">
                        
                            <input type="submit" class="btn btn-primary form-control" name="" value="Entrar">
                        
                        </div>
                    </div>

                </div>
            </form>
            
        </div>
    </div>
    
</div>