<?php 
    
    include "BaseDatosYConex\conexion.php";
    session_start();
    require "claseSesion.php";
    $sesion = new manejadorSesiones;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Bookflix</title>
    <link rel="icon" href="img/logo2.png">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="css/styles.css"> -->

  <?php     
    if (isset($_SESSION['PERMISO'])) {   
   
    switch ($_SESSION['PERMISO']) {
        case "1":?>
            <!--Esta es la barra de navegacion del usuario registrado basico-->
            <div class="barranavegacion">
                <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color:#221f1f;">
                    <a class="navbar-brand" href="#">
                    <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">
                    <!-- Imagen alternativa si el SVG no puede cargarse -->
                    <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa"> </object></a>
                    <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto text-center">
                            <li class="nav-item active"> <a class="nav-link" href="home.php">Inicio </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">Novedades</a> </li>
                            <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Géneros </a>
                                <div class="dropdown-menu text-center " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="generos.php">Todos</a>
                                    <div class="dropdown-divider"></div>
                                    <?php
                                        $query = mysqli_query ($conexion,"SELECT idGenero,nombreGenero FROM genero");
                                        while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                                            echo '<a class="dropdown-item" href="gridgeneros.php" value="'.$valores['idGenero'].'"'; 
                                            if (isset($_GET['genero']) && $valores['idGenero'] == $_GET['genero']){
                                                echo " selected > ".$valores['nombreGenero']." </a>";
                                            }else{
                                                
                                                echo '>'.$valores['nombreGenero'].'</a>';
                                            }
                                        }
                                    ?>
                                </div>
                            <li class="nav-item"> <a class="nav-link" href="#">Mi lista</a> </li>
                            </li>
                        </ul>

                        <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2 " type="search" placeholder="Buscar..." aria-label="Search"> <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                        <svg class="bi bi-search" width="1.4em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg></button> </form>

                    <ul class="navbar-nav d-flex flex-row justify-content-center ">

                        <li class="nav-item ">
                            <a class="nav-link mr-2" href="#">
                                <svg class="bi bi-bell-fill" width="1.5em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/> </svg></a>
                        </li>

                        <li class="nav-item dropdown " style="display: inline-block;  ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="bi bi-gear-wide" width="1.5em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
                            </svg> <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="verPerfil.php">Administrar perfiles</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cuenta.php">Cuenta</a>
                                <a class="dropdown-item" href="preguntasfrecuentes.php">Preguntas Frecuentes</a>                            
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" >Cerrar sesión</a>
                            </div>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div>

        <?php   
        break;
        case "2":
        ?>
            <!--Esta es la barra de navegacion del usuario registrado premium -->
            <div class="barranavegacion">
                <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color:#221f1f;">
                        <a class="navbar-brand" href="#">
                        <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">
                            <!-- Imagen alternativa si el SVG no puede cargarse -->
                            <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                        </object></a>
                        <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto text-center">
                                <li class="nav-item active"> <a class="nav-link" href="home.php">Inicio </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#">Novedades</a> </li>
                                <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Géneros </a>
                                    <div class="dropdown-menu text-center " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="generos.php">Todos</a>
                                        <div class="dropdown-divider"></div>
                                        <?php
                                        $query = mysqli_query ($conexion,"SELECT idGenero,nombreGenero FROM genero");
                                        while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                                            echo '<a class="dropdown-item" href="gridgeneros.php" value="'.$valores['idGenero'].'"'; 
                                            if (isset($_GET['genero']) && $valores['idGenero'] == $_GET['genero']){
                                                echo " selected > ".$valores['nombreGenero']." </a>";
                                            }else{
                                                
                                                echo '>'.$valores['nombreGenero'].'</a>';
                                            }
                                        }
                                    ?>
                                    </div>
                                    <li class="nav-item"> <a class="nav-link" href="#">Mi lista</a> </li>
                                </li>
                            </ul>

                            <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2 " type="search" placeholder="Buscar..." aria-label="Search"> <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                            <svg class="bi bi-search" width="1.4em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                            </svg></button> </form>

                            <ul class="navbar-nav d-flex flex-row justify-content-center ">

                                <li class="nav-item ">
                                    <a class="nav-link mr-2" href="#">
                                        <svg class="bi bi-bell-fill" width="1.5em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/> </svg></a>
                                </li>

                                <li class="nav-item dropdown " style="display: inline-block;">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="bi bi-gear-wide" width="1.5em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
                                    </svg> <b class="caret"></b></a>
                                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="verPerfil.php">Administrar perfiles</a>
                                        <a class="dropdown-item"href="cambiarPerfil.php">Cambiar Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cuenta.php">Cuenta</a>
                                        <a class="dropdown-item" href="preguntasfrecuentes.php">Preguntas Frecuentes</a>                                        
                                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" >Cerrar sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                 </nav>
         </div>

        <?php
        break;
        case "3":
        ?>
            <!--Esta es la barra de navegacion para el administrador -->
            <div class="barranavegacionAdmi">
                <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color:#221f1f;">
                    <a class="navbar-brand" href="#">
                        <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">  
                            <!-- Imagen alternativa si el SVG no puede cargarse -->                
                            <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                        </object></a>
                    <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="admin/index.php"><button type="button" class="btn btn-danger " style="margin-right: 25px; text-align: center;">Volver al Panel de Control</button></a>        
                        </ul>        
                    </div>
                </nav>
            </div>

        <?php
            break;
        }  
     
    }else{
    ?>
                <!--Esta es la barra de navegacion para los usuarios no registrados  -->
            <div class="barranavegacionNoReg">
                <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color:#221f1f;">
                    <a class="navbar-brand" href="#">
                        <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">  
                <!-- Imagen alternativa si el SVG no puede cargarse -->
                
                <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                </object></a>
                    <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="login.php"><button type="button" class="btn btn-danger " style="margin-right: 25px; text-align: center;">Iniciar Sesión</button></a>
                            <a href="registrarse.php"><button type="button" class="btn btn-danger" style="margin-right: 10px; text-align: center;">Registrarse</button></a>
        
                        </ul>
        
                    </div>
                </nav>
            </div>
 <?php
}
?>
</head>
<body style="background-color: #221f1f; padding-top: 6%;">

<?php $sql="SELECT libro.ISBN, libro.nombreLibro, novedadlibro.descripcion, libro.portadaLibro FROM libro INNER JOIN novedadlibro ON libro.ISBN = novedadlibro.idLibro WHERE libro.borradoLogico = 0 AND libro.ISBN=novedadlibro.idLibro"; 
    $query= mysqli_query($conexion,$sql);  
    ?>
<h3 style="color:#f1f1f5"> &nbsp &nbsp NOVEDADES</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div id="inam" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $totalResultados=mysqli_num_rows($query); 
                    $cantidadResultados=3;
                    $totalDePaginas = ceil($totalResultados / $cantidadResultados);
                    ?>
                    <div class="carousel-item active ">
                        <div class="container">
                            <div class="row">
                             <?php 
                                while (($name = mysqli_fetch_array($query)) $$ ) {                           
                            ?>
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;margin: auto;">
						 				<img src="<?php echo $name["portadaLibro"]?>" class="card-img-top">
						 				<div class="card-body">
						 					<h4 class="card-title"><?php echo $name["nombreLibro"]?></h4>
						 					<p class="card-text"><?php echo $name["descripcion"]?></p>
                                            <a> <button type="button" class="btn btn-danger">Leer</button></a>
                                            <a> <button type="button" class="btn btn-danger">Agregar a Mi lista</button></a>                    
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12 col-lg-4">
                                    <div class="card" style="width: 300px;">
                                        <img src="<?php echo $name["portadaLibro"]?>" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $name["nombreLibro"]?></h4>
                                            <p class="card-text"><?php echo $name["descripcionLibro"]?></p>
                                             <a> <button type="button" class="btn btn-danger">Leer</button></a>
                                             <a> <button type="button" class="btn btn-danger">Agregar a Mi lista</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card" style="width: 300px;">
                                        <img src="<?php echo $name["portadaLibro"]?>" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $name["nombreLibro"]?></h4></h4>
                                            <p class="card-text"><?php echo $name["descripcionLibro"]?></p>
                                             <a> <button type="button" class="btn btn-danger">Leer</button></a>
                                             <a> <button type="button" class="btn btn-danger">Agregar a Mi lista</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>fin carousel-item active-->
                    <!-- <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card" style="width: 300px;margin: auto;">
                                        <img src="img/3.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title">Libro Z</h4>
                                            <p class="card-text">Skin masks help us to make are skin fresh and also they protect our skin from the harm rays of sun</p>
                                             <a> <button type="button" class="btn btn-danger">Leer</button></a>
                                             <a> <button type="button" class="btn btn-danger">Agregar a Mi lista</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card" style="width: 300px;">
                                        <img src="img/4.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title">Libro M</h4>
                                            <p class="card-text">Skin masks help us to make are skin fresh and also they protect our skin from the harm rays of sun</p>
                                             <a> <button type="button" class="btn btn-danger">Leer</button></a>
                                             <a> <button type="button" class="btn btn-danger">Agregar a Mi lista</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card" style="width: 300px;">
                                        <img src="img/10.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <h4 class="card-title">Libro N</h4>
                                            <p class="card-text">Skin masks help us to make are skin fresh and also they protect our skin from the harm rays of sun</p>
                                             <a> <button type="button" class="btn btn-danger">Leer</button></a>
                                             <a> <button type="button" class="btn btn-danger">Agregar a Mi lista</button></a>
                                        </div>                                      
                                    </div>                                  
                                </div>                              
                            </div>                          
                        </div>                      
                    </div> carousel-item fin -->
                    <?php
                    } 
                ?>
                </div> <!-- carousel-inner fin-->
                <a href="#inam" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#inam" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div> <!-- fin inam-->         
        </div> <!-- fin col-sm 12-->    
    </div> <!-- fin row-->  
</div> <!-- fin container-fluid-->  

               



 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que querés cerrar la sesión?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#f1f1f5;">×</span>
            </button>
                    </div>
                    <div class="modal-body">Selecciona "Cerrar sesión" abajo si estás listo para terminar con la sesión actual.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-danger" href="BaseDatosYConex/salir.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>

 <!-- pie de pagina -->
 <br><br>
    <hr width="92.5% " color="gray ">
    <footer style="margin: 20px auto 0;  padding: 0 4%;  display: flex; -webkit-box-direction: normal; text-align: center;">
    <a class="pfrecuentes" href="preguntasfrecuentes.php" style="margin: 0px 0px 14px 0px; padding: 0px; font-size: 13px; display: flex; color: #808080;
    text-align: center;"><u>Preguntas Frecuentes</u></a>
        <hr>
        <hr>
    </footer>
</body>
</html>