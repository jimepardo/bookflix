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
    <title>Bookflix - Cambiar Plan</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/modificarcuenta.css">

    <!-- Demo styles -->
    <style>
           
    </style>



<?php     
    if (isset($_SESSION['PERMISO'])) {   
   
    switch ($_SESSION['PERMISO']) {
        case "1":?>
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
                    <li class="nav-item "> <a class="nav-link" href="home.php">Inicio </a> </li>
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
                    <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                  </svg></a>
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
                            <a class="dropdown-item active" href="cuenta.php">Cuenta</a>
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
                    <li class="nav-item "> <a class="nav-link" href="home.php">Inicio </a> </li>
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
                    <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                  </svg></a>
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


<div class="container-fluid pl-5">
    <?php
    if (isset($_GET["exito"])) {
    ?>
        <h2 class="alert alert-success">Se ha cambiado el plan de su cuenta</h2>
    <?php
    }
    ?>
    <h2 style="color:#f1f1f5">Cambiar Plan </h2>
    <hr width="100% " color="gray "><br>
   
        <?php
            if ($_SESSION["PERMISO"]==2) {   
            $sql="SELECT * FROM perfil WHERE   borradoLogico = 0 AND idUsuario = '" . $_SESSION['ID'] . "' ";
            $query= mysqli_query($conexion,$sql);
            $cantidad= mysqli_num_rows($query);            
        ?>
        <div class="row d-flex justify-content-center" >
        <div class="col-md-4">
            <div class="card text-center" style="background-color: gray">                
                <div class="card-block">
                    <div class="py-3">
                        <span class="h1">$</span><span class="display-1 align-middle">160</span>
                    </div>
                    <h1 class="card-title py-2">Plan Básico</h1><hr width="90% ">
                    <p class="card-text">Pantallas en las que puedes<br> ver al mismo tiempo: 2</p>                       
                    <p class="card-text">Libros ilimitados</p>
                    <p class="card-text">Disfruta dónde quieras, cuando quieras</p>
                    <p class="card-text">Cancela en cualquier momento</p>
                </div><br>
                <?php 
                    if ($cantidad>2) {
                ?>   
                    <div class="alert alert-danger">Debe tener solo 2 perfiles para cambiar su plan</div>     
                <?php
                    }else{
                ?>
                <a href="modplan.php?permiso=<?= $_SESSION["PERMISO"] ?> &idUser=<?= $_SESSION["ID"] ?>" id="bas" name="bas" class="card-footer btn bg-danger text-white">Contratar</a> 
                <?php
                    }
                ?>
            </div>                
        </div> 
        </div> 
        <div class="row ">
        <?php
        if ($cantidad<=2) {
        }else{
        while ($result= mysqli_fetch_array($query) ) { 
        $name=$result['nombrePerfil'];
        $id=$result['idPerfil'];
        $img=$result['imagenPerfil'];
        $genfav=$result['idGenero'];
        $autorfav=$result['idAutor'];
        if ($name!=$_SESSION["PERFIL"]) {
            
         ?>
    <div class="modal-dialog text-center  ">    
            <div class="modal-content" style="height: 15em;width: 15em;background-color: grey">    
                <div class="col-12">   
                <div class="form-group" id="user-group">
                </div>        
                <div class=" user-img ">
                    <svg class="bi bi-person-bounding-box" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
                        <img style="width: 150px; height: 133px;" src=<?=$img ?> >
                      </svg>
                </div>
                <legend>
                    <h4> <?= $name ?></h4>
                </legend>
                <div class="col-12">   
                <div class="form-group" id="user-group">
                </div>
                <div class="form-group" id="user-group">
                   <a href="borrarPerfil.php?ID=<?= $id ?>&cambiarPlan=1" class="btn btn-danger"> Borrar </a>
                </div>
                </div>
            </div>
    </div>
</div>
<?php
}//if de si no es el perfil que estoy usando
}//while tenga mas de dos perfiles
}//else fuera del while, si tiene mas de 2 perfiles
?>

        <?php
        }else{
        ?>
        <div class="row d-flex justify-content-center" >
        <div class="col-md-4">
            <div class="card text-center" style="background-color: gray">                
                <div class="card-block">
                    <div class="py-3">
                        <span class="h1">$</span><span class="display-1 align-middle">280</span>
                    </div>
                    <h1 class="card-title py-2">Plan Premium</h1><hr width="90% ">
                    <p class="card-text">Pantallas en las que puedes<br> ver al mismo tiempo: 4</p>                        
                    <p class="card-text">Libros ilimitados</p>
                    <p class="card-text">Disfruta dónde quieras, cuando quieras</p>
                    <p class="card-text">Cancela en cualquier momento</p>
                </div><br>
                <a href="modplan.php?permiso=<?= $_SESSION["PERMISO"] ?> &idUser=<?= $_SESSION["ID"] ?>" id="bas" name="bas" class="card-footer btn bg-danger text-white">Contratar</a> 
            </div>                
        </div>
    </div>
    <?php
    }
    ?>
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
    <hr width="93.5% " color="gray ">
    <footer>
        <a class="pfrecuentes" href="preguntasFrecuentes.php"><u>Preguntas Frecuentes</u></a>
        <hr>
        <hr>
    </footer>
</body>

</html>