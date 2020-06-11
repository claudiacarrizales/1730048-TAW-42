<center>
<div class="container">
    <div class="jumbotron">
        <strong><h1>INICIAR SESIÓN</h1></strong>


    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <form action="" method="post">
                <?php if(isset($_GET["res"])){ ?>
                    <div class="alert alert-danger">
                        Error con usuario y/o contraseña
                    </div>
                <?php } ?>
                <div class="form-group">
                    <!--<label class=" col-sm-2 control-label" for="usuarioIngreso">Usuario:</label>-->
                    <i class="fas fa-user"></i>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="usuarioIngreso" placeholder="Usuario" required>
                    </div>
                </div>
                <div class="form-group">
                    <!--<label class=" col-sm-2 control-label" for="passwordIngreso">Contraseña:</label>-->
                    <i class="fas fa-key"></i>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="passwordIngreso" placeholder="Contraseña" required>
                    </div>
                    
                </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                
                        <input type="submit" class="btn btn-secondary form-control" name="" value="Entrar">
                
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
</center>
<?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();
?>