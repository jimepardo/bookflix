<?php 
    
    include_once "BaseDatosYConex/conexion.php";
    session_start();
	require_once "claseSesion.php";
    $sesion = new manejadorSesiones;
    
    function recortar_texto($texto, $limite=100){  
        $texto = trim($texto);
        $texto = strip_tags($texto);
        $tamano = strlen($texto);
        $resultado = '';
        if($tamano <= $limite){
            return $texto;
        }else{
            $texto = substr($texto, 0, $limite);
            $palabras = explode(' ', $texto);
            $resultado = implode(' ', $palabras);
            $resultado .= '...';
        }  
        return $resultado;
        }

     $consulta2="SELECT g.nombreGenero FROM genero g WHERE g.idGenero= '".$_GET['idGenero']."' AND g.borradoLogico='0' ";
    $query2= mysqli_query($conexion, $consulta2);
    $data=mysqli_fetch_array($query2);    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookflix - <?php echo $data['nombreGenero']?></title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="package/css/swiper.min.css">
    <link rel="stylesheet" href="css/styles.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    

    <!-- Demo styles -->
 

    <?php     
    if (isset($_SESSION['PERMISO'])) {   
   
    switch ($_SESSION['PERMISO']) {
        case "1":?>
            <!--Esta es la barra de navegacion del usuario registrado basico-->
            <div class="barranavegacion">
                <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color:#221f1f;">
                    <a class="navbar-brand" href="home.php">
                    <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">
                    <!-- Imagen alternativa si el SVG no puede cargarse -->
                    <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa"> </object></a>
                    <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto text-center">
                            <li class="nav-item active"> <a class="nav-link" href="home.php">Inicio </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="novedades.php">Novedades</a> </li>
                            <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Géneros </a>
                                <div class="dropdown-menu text-center " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="generos.php">Todos</a>
                                    <div class="dropdown-divider"></div>
                                        <?php
                                        $query = mysqli_query ($conexion,"SELECT nombreGenero, idGenero FROM genero WHERE borradoLogico = 0 AND EXISTS( SELECT * FROM libro l INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN autor a ON (a.idAutor=l.idAutor) WHERE l.terminar='1' AND l.idGenero=genero.idGenero AND l.borradoLogico=0 AND e.borradoParanoagregar='0' AND a.borradoParanoagregar='0') ORDER BY nombreGenero");
                                        while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {?>
                                            <a class="dropdown-item" href="gridgeneros.php?idGenero=<?php echo $valores['idGenero'] ?>" value="<?php echo $valores['idGenero'] ?>"<?php 
                                            if (isset($_GET['genero']) && $valores['idGenero'] == $_GET['genero']){
                                                echo ' selected > '.$valores['nombreGenero'].' </a>';
                                            }else{
                                                
                                                echo '>'.$valores['nombreGenero'].'</a>';
                                            }
                                        }
                                        ?>
                                </div>
                            <li class="nav-item"> <a class="nav-link" href="miLista.php">Mi lista</a> </li>
                             <li class="nav-item"> <a class="nav-link" href="miHistorial.php">Mi Historial</a> </li>
                            </li>
                        </ul>

                        <form class="form-inline my-2 my-lg-0" action="busqueda.php" method="POST"> 
                            <input class="form-control mr-sm-2 " type="search" name="busca" value="<?php if(isset($_POST['busca'])) echo $_POST['busca'];?>" autocomplete="on" placeholder="Buscar..." aria-label="Search"> 
                            <button class="btn btn-outline-danger my-2 my-sm-0" name="enviar" type="submit">
                                <svg class="bi bi-search" width="1.4em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                                </svg>
                            </button> 
                        </form>

                    <ul class="navbar-nav d-flex flex-row justify-content-center ">

                        <li class="nav-item ">
                            <a class="nav-link mr-2" href="#">
                                <svg class="bi bi-bell-fill" width="1.5em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/> </svg></a>
                        </li>
                        <div style="border-left:1px solid gray;height:43px; margin-right:10px;"></div>
                        <li class="nav-item dropdown " style="display: inline-block;  ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 19px;"> <?php echo $_SESSION['PERFIL'] ?>
                            <svg class="bi bi-gear-wide" width="1.5em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
                            </svg> <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"href="cambiarPerfil.php">Cambiar Perfil</a>
                                <a class="dropdown-item" href="verPerfil.php">Administrar perfiles</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cuenta.php">Cuenta</a>
                                <a class="dropdown-item" href="preguntasfrecuentes.php">Preguntas Frecuentes</a>                            
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" >Cerrar sesión</a>
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
                        <a class="navbar-brand" href="home.php">
                        <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">
                            <!-- Imagen alternativa si el SVG no puede cargarse -->
                            <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                        </object></a>
                        <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto text-center">
                                <li class="nav-item active"> <a class="nav-link" href="home.php">Inicio </a> </li>
                                <li class="nav-item"> <a class="nav-link" href="novedades.php">Novedades</a> </li>
                                <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Géneros </a>
                                    <div class="dropdown-menu text-center " aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="generos.php">Todos</a>
                                        <div class="dropdown-divider"></div>
                                        <?php
                                        $query = mysqli_query ($conexion,"SELECT nombreGenero, idGenero FROM genero WHERE borradoLogico = 0 AND EXISTS( SELECT * FROM libro l INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN autor a ON (a.idAutor=l.idAutor) WHERE l.terminar='1' AND l.idGenero=genero.idGenero AND l.borradoLogico=0 AND e.borradoParanoagregar='0' AND a.borradoParanoagregar='0') ORDER BY nombreGenero");
                                        while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {?>
                                            <a class="dropdown-item" href="gridgeneros.php?idGenero=<?php echo $valores['idGenero'] ?>" value="<?php echo $valores['idGenero'] ?>"<?php 
                                            if (isset($_GET['genero']) && $valores['idGenero'] == $_GET['genero']){
                                                echo ' selected > '.$valores['nombreGenero'].' </a>';
                                            }else{
                                                
                                                echo '>'.$valores['nombreGenero'].'</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <li class="nav-item"> <a class="nav-link" href="miLista.php">Mi lista</a> </li>
                                     <li class="nav-item"> <a class="nav-link" href="miHistorial.php">Mi Historial</a> </li>
                                </li>
                            </ul>

                            <form class="form-inline my-2 my-lg-0" action="busqueda.php" method="POST"> 
                                <input class="form-control mr-sm-2 " type="search" name="busca" value="<?php if(isset($_POST['busca'])) echo $_POST['busca'];?>" autocomplete="on" placeholder="Buscar..." aria-label="Search"> 
                                <button class="btn btn-outline-danger my-2 my-sm-0" name="enviar" type="submit">
                                    <svg class="bi bi-search" width="1.4em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                                    </svg>
                                </button> 
                            </form>

                            <ul class="navbar-nav d-flex flex-row justify-content-center ">

                                <li class="nav-item ">
                                    <a class="nav-link mr-2" href="#">
                                        <svg class="bi bi-bell-fill" width="1.5em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/> </svg></a>
                                </li>
                                <div style="border-left:1px solid gray;height:43px; margin-right:10px;"></div>
                                <li class="nav-item dropdown " style="display: inline-block;">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 19px;"> <?php echo $_SESSION['PERFIL'] ?>
                                        <svg class="bi bi-gear-wide" width="1.5em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
                                    </svg> <b class="caret"></b></a>
                                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"href="cambiarPerfil.php">Cambiar Perfil</a>    
                                        <a class="dropdown-item" href="verPerfil.php">Administrar perfiles</a>                                   
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="cuenta.php">Cuenta</a>
                                        <a class="dropdown-item" href="preguntasfrecuentes.php">Preguntas Frecuentes</a>
                                        
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" >Cerrar sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                 </nav>
         </div>

        <?php
        break;
        case "3":
            header("Location: admin/index.php");
            break;
        }  
     
    }else{
        header("Location: home.php");
    }
    ?>
               
</head>

<body style="background-color: #221f1f;">
    

<?php 
    $consulta1="SELECT * FROM genero g INNER JOIN libro l ON (g.idGenero=l.idGenero)
    INNER JOIN editorial on l.idEditorial=editorial.idEditorial
    INNER JOIN autor on autor.idAutor=l.idAutor
     WHERE l.terminar='1' AND editorial.borradoParanoagregar='0' AND autor.borradoParanoagregar='0' AND g.idGenero= '".$_GET['idGenero']."' ";
    $query1= mysqli_query($conexion, $consulta1);
?>
<div class="container-fluid">
    <strong class="text-uppercase pl-2" style="font-size: 24pt; color: #f5f5f1;">Género <?php echo $data['nombreGenero']?></strong><br><br>
   <?php 
        while ($mostrar=mysqli_fetch_array($query1)){
            $desc= $mostrar['descripcionLibro'];
    ?>
<div class="card-deck ml-2 mb-4">
    <div class="row">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/bookflix/bookImages/<?php echo $mostrar['portadaLibro']?>" class="card-img" alt="foto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $mostrar['nombreLibro']?></h5>
                        <p class="card-text"><?php echo recortar_texto($desc, 170)?></p>
                        
                    </div>
                    <div class="card-footer">
                    <a href="detallelibro.php?nombreLibro=<?php echo $mostrar['nombreLibro']?>&idLibro=<?php echo $mostrar['idLibro']?>" class="btn btn-outline-danger float-right">Ver detalle</a><br><br>
                        <!-- <a href="#" class="btn btn-outline-danger">Agregar a Mi lista</a>
                        <a href="#" class="btn btn-outline-danger float-right">Leer</a>  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
       
    
</div>  
        <?php }?>  
</div>





     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que querés cerrar la sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
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

   

    <!--Scripts de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
    <!-- pie de pagina -->
    <br><br>
    <hr width="95.5% " color="gray ">
    <footer>
        <a class="pfrecuentes pl-5" href="preguntasFrecuentes.php"><u>Preguntas Frecuentes</u></a>
        <hr>
        <hr>
    </footer>
</body>

</html>