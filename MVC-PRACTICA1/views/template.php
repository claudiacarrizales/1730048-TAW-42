<!--Plantilla que vera el usuario al entrar en la applicacion-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Plantilla</title>
    <!-- Bootstrap core CSS -->
      <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom fonts for this template -->
      <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
      <link href="views/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="views/css/resume.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <?php
        include('modules/navegacion.php');
    ?>



      <div class="container-fluid p-0">



    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="awards">
      <?php

        //Mostraremos un controlador que muestra la plantilla 
        $mvc = new MvcController();

        //Mostramos la funcion 
        $mvc -> enlacesPaginasController();

    ?>
    </section>

  </div>


     <!-- Bootstrap core JavaScript -->
      <script src="views/vendor/jquery/jquery.min.js"></script>
      <script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Plugin JavaScript -->
      <script src="views/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for this template -->
      <script src="views/js/resume.min.js"></script>
</body>
</html>