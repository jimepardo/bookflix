<?php 
    include_once "BaseDatosYConex/conexion.php";
    session_start();
	require_once "claseSesion.php";
	$sesion = new manejadorSesiones;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookflix</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    

    <!-- Demo styles -->
    <link rel="stylesheet" type="text/css" href="css/modificarcuenta.css">
    
   <?php     
    if (isset($_SESSION['PERMISO'])) {   
   
    switch ($_SESSION['PERMISO']) {
        case "1":?>
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
                    <li class="nav-item "> <a class="nav-link" href="home.php">Inicio </a> </li>
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
                    <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                  </svg></a>
                    </li>

                    <li class="nav-item dropdown " style="display: inline-block;  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="bi bi-gear-wide" width="1.5em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
                          </svg> <b class="caret"></b></a>
                        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="seleccionarPerfil.php">Administrar perfiles</a>
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
                    <li class="nav-item "> <a class="nav-link" href="home.php">Inicio </a> </li>
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
                    <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                  </svg></a>
                    </li>

                    <li class="nav-item dropdown " style="display: inline-block;  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="bi bi-gear-wide" width="1.5em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.928 1.723c-.243-.97-1.62-.97-1.863 0l-.072.286a.96.96 0 01-1.622.435l-.204-.212c-.695-.718-1.889-.03-1.614.932l.08.283a.96.96 0 01-1.186 1.187l-.283-.081c-.961-.275-1.65.919-.932 1.614l.212.204a.96.96 0 01-.435 1.622l-.286.072c-.97.242-.97 1.62 0 1.863l.286.071a.96.96 0 01.435 1.622l-.212.205c-.718.695-.03 1.888.932 1.613l.283-.08a.96.96 0 011.187 1.187l-.081.283c-.275.96.919 1.65 1.614.931l.204-.211a.96.96 0 011.622.434l.072.286c.242.97 1.62.97 1.863 0l.071-.286a.96.96 0 011.622-.434l.205.212c.695.718 1.888.029 1.613-.932l-.08-.283a.96.96 0 011.187-1.188l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205A.96.96 0 0115.983 10l.286-.071c.97-.243.97-1.62 0-1.863l-.286-.072a.96.96 0 01-.434-1.622l.212-.204c.718-.695.029-1.889-.932-1.614l-.283.08a.96.96 0 01-1.188-1.186l.081-.283c.275-.961-.918-1.65-1.613-.932l-.205.212A.96.96 0 0110 2.009l-.071-.286zm-.932 12.27a4.998 4.998 0 100-9.994 4.998 4.998 0 000 9.995z" clip-rule="evenodd"/>
                          </svg> <b class="caret"></b></a>
                        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="seleccionarPerfil.php">Administrar perfiles</a>
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

<body>

<?php
    if (isset($_SESSION['PERFIL'])) {
        
?>
<div class="container-fluid">

    <h2><strong>PERFIL : <?= $_SESSION['PERFIL']?></strong></h2><br>
    <p> &nbsp Tus datos de perfil</p>

   
    <form action="modificarPerfil.php" method="POST" enctype="multipart/form-data">  
        <div class="form">
            <input type="hidden" name="idUser" value="<?=$_SESSION['ID']?>">
            <div class="col-3">
                <label  class="col-form-label">Nombre de Perfil</label>
            <input class="form-control mb-2 mr-sm-2" name="nombrePerfil" type="text" placeholder="<?php echo $_SESSION['PERFIL'] ?>">
                <?php
                if(isset($_GET['ERRORUSR'])){
                ?> 
                <div  class="alert alert-danger" role="alert">
                    <?= $_GET['ERRORUSR'] ?>
                </div>                
                <?php
                }
                ?>
            </div>
         
            <div class="col-3">
                <label  class="col-form-label">Autor Favorito</label>
                <select class="custom-select" required name="autor">
                <option value="0">Seleccione un Autor</option>
                 <?php  
                 $query = mysqli_query ($conexion,"SELECT idAutor,nombreAutor FROM autor WHERE borradoLogico=0 AND borradoParanoagregar=0");
                  while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                  echo '<option value="'.$valores['idAutor'].'"';
                  if (isset($_SESSION['AUTORFAV']) && ($_SESSION['AUTORFAV']==$valores['idAutor']) ) {
                    echo " selected > ".$valores['nombreAutor']." </option>";
                  }else{                
                    echo '>'.$valores['nombreAutor'].'</option>';
                  }
                  }
                  ?>
                </select>
            </div>

            <div class="col-3">
                <label  class="col-form-label">Genero Favorito</label>
                <select class="custom-select" required name="genero">
                <option value="0">Seleccione un Genero</option>
                <?php  
                 $query = mysqli_query ($conexion,"SELECT idGenero,nombreGenero FROM genero WHERE borradoLogico=0 AND borradoParanoagregar=0 ");
                  while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                  echo '<option value="'.$valores['idGenero'].'"';
                  if (isset($_SESSION['GENEROFAV']) && ($_SESSION['GENEROFAV']==$valores['idGenero']) ) {
                    echo " selected > ".$valores['nombreGenero']." </option>";
                  }else{                
                    echo '>'.$valores['nombreGenero'].'</option>';
                  }
                  }
                ?>
                </select>
            </div>

            <div class="col-3">
                <label class="col-form-label">Foto de Perfil</label>
                <img src="<?=$_SESSION['PERFILIMG']?>"  style= "height: 241px;width: 214px;margin-bottom: 20px;">          
            </div>
            <div class="col-3">
                <label class="col-form-label">Modificar foto de perfil</label>
                <input type="file" name="file" value="Seleccionar foto de perfil">
                <?php
                if(isset($_GET['ERRORIMG'])){
                ?> 
                <br>
                <br>
                <div  class="alert alert-danger" role="alert">
                    <?= $_GET['ERRORIMG'] ?>
                </div> 
                <br><br>               
            <?php
            }
            ?>
            </div>
            <br>
            <input type="submit" class="btn btn-danger" name="submit" value="Cambiar Datos">
        </div>
    </form>

</div>

     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #221f1f;">
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

   

    <!--Scripts de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
    <!-- pie de pagina -->
    <br><br>
    <hr width="92.5% " color="gray ">
    <footer>
        <a class="pfrecuentes" href="preguntasFrecuentes.php"><u>Preguntas Frecuentes</u></a>
        <hr>
        <hr>
    </footer>
    <?php
    }else{
        echo "No tenes permisos para estar ak JUUIRAA ";
    }
    ?>
</body>

</html>