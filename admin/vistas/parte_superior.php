<?php 
    
    include_once "../BaseDatosYConex/conexion.php";
    session_start();

	require_once "../claseSesion.php";
	$sesion = new manejadorSesiones;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bookflix</title>
    <link rel="icon" href="../img/logo2.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bookflix </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel de control</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Carga, edición y borrado</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Libro:</h6>
                        <a class="collapse-item" href="cargarlibro.php">Cargar libro</a>
                        <a class="collapse-item" href="modlibro.php">Modificar libro</a>
                        <a class="collapse-item" href="agregarlibro.php">Agregar capítulo</a>
                        <a class="collapse-item" href="borrarlibro.php">Borrar libro</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Autor:</h6>
                        <a class="collapse-item" href="cargarautor.php">Cargar autor</a>
                        <a class="collapse-item" href="modautor.php">Modificar autor</a>
                        <a class="collapse-item" href="borrarautor.php">Borrar autor</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Editorial:</h6>
                        <a class="collapse-item" href="cargareditorial.php">Cargar editorial</a>
                        <a class="collapse-item" href="modeditorial.php">Modificar editorial</a>
                        <a class="collapse-item" href="borrareditorial.php">Borrar editorial</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Género:</h6>
                        <a class="collapse-item" href="cargargen.php">Cargar género</a>
                        <a class="collapse-item" href="modgen.php">Modificar género</a>
                        <a class="collapse-item" href="borrargen.php">Borrar género</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Novedades/Sugerencias:</h6>
                        <a class="collapse-item" href="cargarnovedades.php">Cargar Novedades/sug.</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-list-ul"></i>
                    <span>Listas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Usos:</h6>
                        <a class="collapse-item" href="listareditorial.php">Listar editoriales</a>
                        <a class="collapse-item" href="listarautor.php">Listar autores</a>
                        <a class="collapse-item" href="listargen.php">Listar géneros</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Adicionales
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="buscarusuarios.php">
                <i class="fas fa-search"></i>
                    <span>Buscar usuarios registrados</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../home.php">
                <i class="fas fa-home"></i>
                    <span>Pagina principal user</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                      
                        </li>

                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span><div>Configuración &nbsp <i class="fas fa-cog"></i></div>
                                
                            </a>
                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="cuentamodadmi.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Administrar cuenta
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="salir.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->