<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/css/estiloo.css">
</head>
<!--EL HEADR (CABECERA) DEL SISTEMA EN DONDE VENDRÁN LAS OPERACIONES RESPECTIVAS DEL PROGRAMA-->
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--agregacion del inicio de sesion al header-->
              

              <?php 
               
                if(!isset($_SESSION['validar'])){
              ?>
              <li class="active"><a href="index.php?m=login">Iniciar sesion</a></li>

              <?php
                }else{ 
              ?>
              <li class="active"><a href="index.php?m=estudiante">Nuevo registro</a></li>
              <!--agregar al menu registrar carrera-->
              <li class="active"><a href="index.php?m=carrera">Nueva carrera</a></li>
              <!--agregar al menu registrar universidad-->
              <li class="active"><a href="index.php?m=universidad">Nueva universidad</a></li>


              

              <li class="active">
                <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registros estudiantes<span class="caret"></span></a>
              </li>

              <li class="active">
                <a href="index.php?m=carreraTable" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registros carrera<span class="caret"></span></a>
              </li>


              <li class="active">
                <a href="index.php?m=universidadTable" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registros universidad<span class="caret"></span></a>
              </li>
                  
               <li class="active"><a href="index.php?m=salir">Salir</a></li>
              <?php
                }
              ?>

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</header>