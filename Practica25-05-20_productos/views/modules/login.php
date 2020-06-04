<div class="container">
    <div class="jumbotron">
        <h2>Login</h2>

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
                    <label class=" col-sm-2 control-label" for="usuarioIngreso">Usuario:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="usuarioIngreso" placeholder="Usuario" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="passwordIngreso">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="passwordIngreso" placeholder="Contraseña" required>
                    </div>
                    
                </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                
                        <input type="submit" class="btn btn-primary form-control" name="" value="Entrar">
                
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();
?>