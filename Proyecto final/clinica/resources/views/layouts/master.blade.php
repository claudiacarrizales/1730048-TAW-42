
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Clinica Dino</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://kit.fontawesome.com/4e3c5501e7.js" crossorigin="anonymous"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    

    <nav class="main-header navbar navbar-light navbar-light" style="background-color: #e3f2fd;">
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            
        </ul>
    
        <div class="btn-group">
            

            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-bell"></i> </a>

            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button">Perfil</button>
              <button class="dropdown-item" type="button">Editar datos</button>
              <button class="dropdown-item" type="button">Cerrar sesion</button>
            </div>

        </div>

        <div class="btn-group">

            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i> </a>

            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button">Perfil</button>
              <button class="dropdown-item" type="button">Editar datos</button>
              <button class="dropdown-item" type="button">Cerrar sesion</button>
            </div>
          </div>
        
        
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-blue sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light"> Clina Dino </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard

                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Managment
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/user" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User Managment</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="/profile" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Profile
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper">-->

        <!-- Main content -->
        <!--<div class="content">
            <div class="container-fluid"> -->

                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>

            <!-- </div> /.container-fluid -->
        <!-- </div> -->
        <!-- /.content -->
    <!--</div> -->
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
