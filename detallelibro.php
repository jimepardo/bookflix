<?php 
    include_once "BaseDatosYConex/conexion.php";
    session_start();
    require_once "claseSesion.php";
    $sesion = new manejadorSesiones;
    
    $idl=$_GET['idLibro'];
    $consulta= "SELECT * FROM libro l INNER JOIN genero g ON (l.idGenero=g.idGenero) INNER JOIN autor a ON (l.idAutor=a.idAutor) INNER JOIN editorial e ON (l.idEditorial=e.idEditorial) WHERE l.idLibro ='$idl' AND l.terminar='1' ";
    $query = mysqli_query($conexion,$consulta);
    $mostrar = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $consulta10= "SELECT l.fechaHasta, l.fechaDesde FROM libro l WHERE l.idLibro ='$idl' AND l.borradoLogico='0' AND l.terminar='1'";
    $query10 = mysqli_query($conexion,$consulta10);
    $mostrar10 = mysqli_fetch_array($query10, MYSQLI_ASSOC);
    $libroDesde= $mostrar10['fechaDesde'];
    $libroHasta= $mostrar10['fechaHasta'];
     if(empty($libroHasta)){ // el libro no tiene vencimiento
        //el capitulo tiene vencimiento O NO 
        $consulta2=mysqli_query($conexion, "SELECT * FROM libro l INNER JOIN capitulo c ON (c.idLibro=l.idLibro) WHERE l.idLibro ='$idl' AND l.borradoLogico='0' AND c.borradoLogico='0' AND c.fechaDesde>='$libroDesde' AND (c.fechaDesde BETWEEN '$libroDesde' AND CURRENT_DATE()) AND (c.fechaHasta>=CURRENT_DATE() OR c.fechaHasta IS NULL) AND l.terminar='1'" );
      
     }else{
        //el capitulo tiene vencimiento y tiene que compararse con el libro.fechaHasta
        $consulta2=mysqli_query($conexion, "SELECT * FROM libro l INNER JOIN capitulo c ON (c.idLibro=l.idLibro) WHERE l.idLibro ='$idl' AND l.borradoLogico='0' AND c.borradoLogico='0' AND (c.fechaDesde BETWEEN '$libroDesde' AND CURRENT_DATE()) AND (c.fechaHasta is NULL OR (c.fechaHasta BETWEEN CURRENT_DATE() AND '$libroHasta') ) AND l.terminar='1' ORDER BY c.numeroCapitulo ASC" );
     }

    //traerme los pdf de todos los capitulos
   // $consulta2=mysqli_query($conexion,"SELECT * FROM libro l INNER JOIN capitulo c ON (c.idLibro= l.idLibro) WHERE l.idLibro ='".$_GET['idLibro']."' AND c.borradoLogico='0' ");
   // $mostrar2=mysqli_fetch_array($consulta2);
    $nombreLibro=$mostrar['nombreLibro'];
    $idLibro=$mostrar['idLibro'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookflix - <?php echo $mostrar['nombreLibro']?></title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Demo styles -->
    <link href="css/detalle.css" rel="stylesheet">
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
                                        $query = mysqli_query ($conexion,"SELECT nombreGenero, idGenero FROM genero WHERE borradoLogico = 0 AND EXISTS( SELECT * FROM libro l INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN autor a ON (a.idAutor=l.idAutor) WHERE l.idGenero=genero.idGenero AND l.borradoLogico=0 AND e.borradoParanoagregar='0' AND a.borradoParanoagregar='0' l.terminar='1') ORDER BY nombreGenero");
                                        while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {?>
                                            <a class="dropdown-item" href="gridgeneros.php?idGenero=<?php echo $valores['idGenero'] ?>" value="<?php echo $valores['idGenero'] ?>" <?php 
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
                                        $query = mysqli_query ($conexion,"SELECT nombreGenero, idGenero FROM genero WHERE borradoLogico = 0 AND EXISTS( SELECT * FROM libro l INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN autor a ON (a.idAutor=l.idAutor) WHERE l.idGenero=genero.idGenero AND l.borradoLogico=0 AND e.borradoParanoagregar='0' AND a.borradoParanoagregar='0' AND l.terminar='1') ORDER BY nombreGenero");
                                        while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {?>
                                            <a class="dropdown-item" href="gridgeneros.php?idGenero=<?php echo $valores['idGenero'] ?>" value="<?php echo $valores['idGenero'] ?>" <?php 
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
  
    <header>
        <div class="container-fluid">
            <h2 class="text-uppercase"><strong><?php echo $mostrar['nombreLibro']?></strong></h2>
        </div>
    </header>
    <div class="container-fluid">
        <section class="main">
            <article class="w-75 float-left pr-4">
                <p class="desc"><?php echo $mostrar['descripcionLibro']?></p>
            </article>
            <aside class="text-justify w-25 float-right p-2">
                <img src="/bookflix/bookImages/<?php echo $mostrar['portadaLibro']?>" class="d-flex justify-content-end  " alt="foto" style="heigth:180pt; width:180pt;">
                <br>
                <div class="media-body ">
                    <p class=" gen "><i>ISBN: <?php echo $mostrar['ISBN']?></i></p>
                    <p class=" gen "><i>Género: <?php echo $mostrar['nombreGenero']?></i></p>
                    <p class=" gen "><i>Autor: <?php echo $mostrar['nombreAutor']?></i></p>
                    <p class=" gen "><i>Editorial: <?php echo $mostrar['nombreEditorial']?></i></p>
                    <p class=" gen lanza"><i>Fecha de lanzamiento: &nbsp; <?php echo $mostrar['fechaLanzamiento']?></i></p>
                    <p class=" gen lanza "><i>Disponibilidad desde el <br> <?php echo $mostrar['fechaDesde']?> &nbsp;a&nbsp;  <?php if((isset($mostrar['fechaHasta'])) && (!empty($mostrar['fechaHasta']))) echo $mostrar['fechaHasta']; else{ echo "∞"; }?> </i></p>
                    <?php
                    $sqlPromedio="SELECT AVG(numero)as prom FROM calificacion 
                    INNER JOIN libro ON libro.idLibro=calificacion.idLibro 
                    WHERE libro.idLibro=$idLibro";
                    $queryPromedio=mysqli_query($conexion,$sqlPromedio);
                    $mostrarPromedio=mysqli_fetch_array($queryPromedio);
                    $i = $mostrarPromedio["prom"];
                    round($i);
                    switch ($i) {
                        case NULL:
                                echo "<p class=\" gen\"><i>Calificación: No hay calificacion</i></p>";
                            break;
                        case 1:
                                echo "<p class=\" gen\"><i>Calificación: ★</i></p>";
                            break;
                        case 2:
                                echo "<p class=\" gen\"><i>Calificación: ★★</i></p>";
                            break;
                        case 3:
                                echo "<p class=\" gen\"><i>Calificación: ★★★</i></p>";
                            break;
                        case 4:
                                echo "<p class=\" gen\"><i>Calificación: ★★★★</i></p>";
                            break;
                        case 5:
                                echo "<p class=\" gen\"><i>Calificación: ★★★★★</i></p>";
                            break;
                    }
                    ?>
                    
                </div>
            </aside>
        </section>
        <div class="container-fluid">
            <div class="flex-row">
               
                <?php $cant=mysqli_num_rows($consulta2); 
                if ($cant == 1){
                     ?><h4>Libro</h4><?php
                    $mostrar2=mysqli_fetch_array($consulta2)?>
                    <?php
                        $sqlEstaLeido="SELECT count(*) as count FROM leidos WHERE idLibro='$idl' AND idCapitulo='".$mostrar2['idCapitulo']."' AND idPerfil='".$_SESSION["IDPERFIL"]."' ";
                        $queryEstaLeido=mysqli_query($conexion,$sqlEstaLeido);
                        $estaLeido=mysqli_fetch_array($queryEstaLeido); 
                        if ($estaLeido["count"]<1) {
                    ?>
                     <a href="verLibro.php?&id=<?php echo $mostrar2['idLibro'];?>&nombrePerfil=<?php echo $_SESSION['IDPERFIL'];?>&nombrepdf=<?php echo $mostrar2['nombreCapitulo'];?>&num=<?php echo $mostrar2['idCapitulo'];?>" class=" btn btn-outline-danger">Leer libro </a>
                    <?php
                    }else{
                    ?>
                     <a href="verLibro.php?&id=<?php echo $mostrar2['idLibro'];?>&nombrePerfil=<?php echo $_SESSION['IDPERFIL'];?>&nombrepdf=<?php echo $mostrar2['nombreCapitulo'];?>&num=<?php echo $mostrar2['idCapitulo'];?>" class=" btn btn-outline-success">Leer libro </a>
                    <?php
                    }
                    ?>
<?php           }else{ 
                    if($cant>1){
                        ?> <h4>Capitulos</h4> <?php
                     while($mostrar2=mysqli_fetch_array($consulta2)) {?>
                     <?php
                        $sqlEstaLeido="SELECT count(*) as count FROM leidos WHERE idLibro='$idl' AND idCapitulo='".$mostrar2['idCapitulo']."' AND idPerfil='".$_SESSION["IDPERFIL"]."' ";
                        $queryEstaLeido=mysqli_query($conexion,$sqlEstaLeido);
                        $estaLeido=mysqli_fetch_array($queryEstaLeido);

                        if ($estaLeido['count']<1) { ?>
                            <a href="verLibro.php?&id=<?php echo $mostrar2['idLibro'];?>&nombrePerfil=<?php echo $_SESSION['IDPERFIL'];?>&nombrepdf=<?php echo $mostrar2['nombreCapitulo'];?>&num=<?php echo $mostrar2['idCapitulo'];?>" class=" btn btn-outline-danger">Capitulo <?php echo $mostrar2['numeroCapitulo']; ?>  </a>
                        <?php
                        }else{ ?>
                            <a href="verLibro.php?&id=<?php echo $mostrar2['idLibro'];?>&nombrePerfil=<?php echo $_SESSION['IDPERFIL'];?>&nombrepdf=<?php echo $mostrar2['nombreCapitulo'];?>&num=<?php echo $mostrar2['idCapitulo'];?>" class=" btn btn-outline-success">Capitulo <?php echo $mostrar2['numeroCapitulo']; ?>  </a>
                        <?php } ?>
                <?php 
                     }
                    }else{
                        ?><h4>Leer</h4> <?php 
                        echo $mostrar="No hay nada para leer";
                    }
                } ?>
            </div>
            <div class="flex-row">            
                    <br>
                    <h4>Continuar leyendo</h4>
                    <?php
                        $sql4="SELECT * FROM leyendo l INNER JOIN capitulo c ON (c.idCapitulo=l.idCapitulo) WHERE l.idPerfil='".$_SESSION['IDPERFIL']."' AND l.idLibro='".$_GET['idLibro']."' AND l.idCapitulo=c.idCapitulo AND l.borradoLogico='0'";
                        $query4=mysqli_query($conexion,$sql4);
                        $mostrar4=mysqli_fetch_array($query4);
                        $num2=mysqli_num_rows($query4);
                        if ($num2 == 1 ){
                            ?>

                            <a href="verLibro.php?&id=<?php echo $mostrar4['idLibro'];?>&nombrePerfil=<?php echo $_SESSION['IDPERFIL'];?>&nombrepdf=<?php echo $mostrar4['nombreCapitulo'];?>&num=<?php echo $mostrar4['idCapitulo'];?>" class="btn btn-danger">
                               Seguir leyendo  
                            </a><br>

                            <p><br>Si desea borrarlo de la lista que esta leyendo, seleccione el botón Borrar</p>
                            <a href="borrarleyendo.php?&id=<?php echo $mostrar4['idLibro'];?>&nombrePerfil=<?php echo $_SESSION['IDPERFIL'];?>&num=<?php echo $mostrar4['idCapitulo'];?>" class="btn btn-secondary">Borrar</a>

                            <?php
                        }else{
                            ?>

                            <p>Todavia no leyo nada</p>
                            <?php
                        }
                    ?>

            </div>
             <div class="flex-row"><br>
                <h5 class="clasif">Vista previa:</h5>
                <?php 

                $sql6= "SELECT l.idLibro FROM libro l INNER JOIN vistaprevia v ON (v.idLibro=l.idLibro)  WHERE v.idLibro='$idl' ";
                $query6=mysqli_query($conexion, $sql6);
                $mostrar6=mysqli_fetch_array($query6);
                $cant6=mysqli_num_rows($query6);
                if ($cant6 > 0){
                ?>
                <a href="verVistapreviaReg.php?idLibro=<?php echo $mostrar['idLibro']; ?>"><button type="button" class="btn btn-danger content-left" >Ver adelanto</button> </a><br><br>
                <?php
            }else{
                ?>
                <p>No hay adelanto para este libro</p>
                <?php
            }?>
            </div>
            <br>
            <?php
            $idperf=$_SESSION["IDPERFIL"];
            $sqlFavorito="SELECT count(*) as count FROM favoritos WHERE  idLibro=$idLibro AND idPerfil=$idperf AND borradoLogico=0";
            $queryFavorito=mysqli_query($conexion, $sqlFavorito);
            $mostrarFavorito=mysqli_fetch_array($queryFavorito);
            if ($mostrarFavorito["count"]==0) {
            ?>
                <form action="favorito.php" method="POST">
                    <input type="hidden" name="opcion" id="opcion" value="0">
                    <input type="hidden" name="idPerfil" id="idPerfil" value="<?= $_SESSION["IDPERFIL"] ?>">
                    <input type="hidden" name="idLibro" id="idLibro" value="<?= $idLibro?> " >
                    <input type="hidden" name="nombrePerfil" id="nombrePerfil" value="<?= $nombreLibro ?>">
                    <button type="submit" class="btn btn-outline-warning">Agregar a Mi lista de Favoritos ☆</button>
                </form>
            <?php
            }else{
            ?>
                <form action="favorito.php" method="POST">
                    <input type="hidden" name="opcion" id="opcion" value="1">
                    <input type="hidden" name="idPerfil" id="idPerfil" value="<?= $_SESSION["IDPERFIL"] ?>">
                    <input type="hidden" name="idLibro" id="idLibro" value="<?= $idLibro?> " >
                    <input type="hidden" name="nombrePerfil" id="nombrePerfil" value="<?= $nombreLibro ?>">
                    <button type="submit" class="btn btn-outline-warning">Borrar de Mi lista de Favoritos ★</button>
                </form>
            <?php
            }
            ?>
            <br>
            <?php
            $idperf=$_SESSION["IDPERFIL"];
            $consultaHistorial= "SELECT count(*)as count FROM historial WHERE idLibro=$idLibro AND idPerfil=$idperf";
            $queryHistorial=mysqli_query($conexion, $consultaHistorial);
            $mostrarHistorial=mysqli_fetch_array($queryHistorial);
            if ($mostrarHistorial["count"]!=0) {
                $consultaCalificacion= "SELECT numero,count(*)as count FROM calificacion WHERE idLibro=$idLibro AND idPerfil=$idperf";
                $queryCalificacion=mysqli_query($conexion, $consultaCalificacion);
                $mostrarCalificacion=mysqli_fetch_array($queryCalificacion);
            ?>
            
            <div class="row"> 
                <form method="POST" action="calificarLibro.php">
                <input type="hidden" name="idPerfil" id="idPerfil" value="<?= $_SESSION["IDPERFIL"] ?>">
                <input type="hidden" name="idLibro" id="idLibro" value="<?= $idLibro?> " >
                <input type="hidden" name="nombrePerfil" id="nombrePerfil" value="<?= $nombreLibro ?>">
                <input type="hidden" name="actualizacion" id="actualizacion" value="<?= $mostrarCalificacion["count"] ?>">
                <div class="form-group">
                    <label for="clasif" class="col-form-label"><h5>Calificar:<h5></label>
                <select class="custom-select" name="calificacion" id="calificacion">
                    <option value="0">Seleccione una calificacion</option>
                    <option value="1" <?php if($mostrarCalificacion["numero"]==1){ ?> selected <?php } ?> >★</option>
                    <option value="2" <?php if($mostrarCalificacion["numero"]==2){ ?> selected <?php } ?>>★★</option>
                    <option value="3" <?php if($mostrarCalificacion["numero"]==3){ ?> selected <?php } ?>>★★★</option>
                    <option value="4" <?php if($mostrarCalificacion["numero"]==4){ ?> selected <?php } ?>>★★★★</option>
                    <option value="5" <?php if($mostrarCalificacion["numero"]==5){ ?> selected <?php } ?>>★★★★★</option>
                </select> 
                 <button type="submit" class="btn btn-outline-light mt-2">Calificar</button>
                </div>
            </form>
            </div>
           <br>
           <?php 
            } 
                $consulta20=mysqli_query($conexion, "SELECT * FROM comentario WHERE idPerfil='$idperf' AND borradoLogico='0' AND idLibro=$idl ");
                $comentarios=mysqli_fetch_array($consulta20);
                $coments=mysqli_num_rows($consulta20);
                if ($mostrarHistorial["count"]!=0){ 
                    if($coments == 0){ ?>
        <form id="comentar" method="POST" action="cargarComentario.php"> 
            <h5>Comentar:</h5>
            <input type="hidden" name="nombreLibro" id="nombreLibro" value="<?= $nombreLibro ?>">
            <input type="hidden" name="idLibro" id="idLibro" value="<?= $idLibro ?>">
            <input type="hidden" name="idPerfil" id="idPerfil" value="<?= $_SESSION["IDPERFIL"] ?>">
            <textarea id="comentario" name="comentario" style="height:200px ;width: 500px"></textarea>
            <br>  
            <button type="submit" name="submit-comentar" class="btn btn-outline-light mt-2">Comentar</button>
            <?php
            if(isset($_GET["ERR_COMENT"])){ ?>
                <div class="alert alert-danger mt-2" style="width: 500px"> <?= $_GET["ERR_COMENT"] ?></div>  
            <?php }?> 
        </form>
            <?php }else{ ?>
                <h5>Comentar:</h3>
                <p>Ya realizó su comentario, si quiere cambiarlo, primero debe borrarlo</p>
             <?php 
            }
        }else{ ?>
            <div class="alert alert-warning mt-2" style="width: 600px;"> Debe terminar de leer el libro antes de comentarlo o calificarlo !</div>
                <?php 
            } ?>
        __________________________________________________________________________________________________________
        <br> <br>
        <div class="flex-row"> 
            <h5>Comentarios: </h5> <pre class="pre-scrollable text-danger col-6 "> 
                <?php $consulta="SELECT *  FROM comentario WHERE borradoLogico=0 AND idLibro=$idLibro";
                $query = mysqli_query($conexion,$consulta);               
                while ($mostrar = mysqli_fetch_array($query)) {
                $auxIdPerfil=$mostrar["idPerfil"];
                $sql="SELECT nombrePerfil,idPerfil FROM perfil WHERE idPerfil=$auxIdPerfil";
                $query2= mysqli_query($conexion,$sql);
                $name=mysqli_fetch_array($query2);
                ?><div><p style="color:#f5f5f1;"><?= $mostrar["textoComentario"] ?><footer style="font-style:italic; color:#e50914;"><?= $name["nombrePerfil"] ?></footer></p>_____
                 <?php if($_SESSION["IDPERFIL"]==$name["idPerfil"]){?>
                    <form action="borrarComentario.php" method="POST"><button type="submit" name="borrar-Comentario" class="btn btn-outline-light" style="font-family: Helvetica, Arial, sans-serif; ">Borrar comentario</button>
                    <input type="hidden" name="nombreLibro" id="nombreLibro" value="<?= $nombreLibro ?>">
                    <input type="hidden" name="idPerfil" id="idPerfil" value="<?= $_SESSION["IDPERFIL"] ?>" dissable>
                    <input type="hidden" name="idLibro" id="idLibro" value="<?= $idLibro ?>" dissable>
                </form><?php } ?></div><?php  } ?>
            </pre>
        </div> 
        </div> 
    </div>   
    
           
                 
    



  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
        <div class="modal-dialog" role="document" >
            <div class="modal-content" style="background-color: ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">¿Estás seguro que querés cerrar la sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body" style="color: black;">Selecciona "Cerrar sesión" abajo si estás listo para terminar con la sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="BaseDatosYConex/salir.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

   

    <!--Scripts de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- pie de pagina -->
    <br><br>
    <hr width="93.5% " color="gray ">
    <footer>
        <a class="pfrecuentes pl-5 text-white" href="preguntasFrecuentes.php"><u>Preguntas Frecuentes</u></a>
        <hr>
        <hr>
    </footer>
</body>

</html>