<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventarios | TAW | UPV</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="views/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="views/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="views/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="views/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="views/assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body>
    <?php 
        /* Se inicia la sesión que se haya iniciado sesion correctamente para mostrar el tablero y el menu principal*/
        session_start();
        if (isset($_SESSION['validar']) && $_SESSION['validar']==true) {
            # code...
            include "modules/navegacion.php";
    ?>
    <div class="wrapper">
        <!--Content wrapper. contains pag content-->
        <div class="content-wrapper">
            <!--Main content-->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mr-3 mt-2 mb-2">
                        <?php 
                            /*Se verifica que la vista actual sea el tablero, en el caso se muestra el titulo del a vista*/
                            if($_GET['action']=='tablero'){
                        ?>
                        <div class="col-sm-12">
                            <h1><b>Tablero</b></h1>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                    <!--Aqui va el conenido de la pagina-->
                    <?php 
                        }

                        $mvc = new MvcController();
                        $mvc -> enlacesPaginasController();
                    ?>
                </div>
            </section>
            
        </div>
    </div>
    <?php 
        /*Se verifica que la vista actual no se el login, en caso de que se ael login, el footer no se muestra*/
        //if($_GET['action']!='ingresar'){
    ?>
    <?php 
        //}
    ?>
    <!-- jQuery -->
    <script src="views/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="views/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="views/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="views/assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="views/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="views/assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="views/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="views/assets/plugins/moment/moment.min.js"></script>
    <script src="views/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="views/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="views/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/assets/dist/js/adminlte.js"></script>
    <!-- DataTables -->
    <script src="views/assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- page script -->
    <script>
    $(function () {
        $("#example1").DataTable();
        $("#example2").DataTable();
    });
    </script>
</body>
</html>
