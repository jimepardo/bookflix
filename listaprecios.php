<?php 
    
    include "BaseDatosYConex\conexion.php";
    session_start();
	require "claseSesion.php";
    $sesion = new manejadorSesiones;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookflix</title>
    <link rel="icon" href="img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/precios.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php     
    if (isset($_SESSION['PERMISO'])) {
        if ($_SESSION['PERMISO'] ==1 || $_SESSION['PERMISO'] == 2){
            header("Location: home.php");
        }
        if ($_SESSION['PERMISO'] == 3){
            header("Location: admin/index.php");
        }
    }else{ ?>
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
                <ul class="nav navbar-nav ml-auto">        
                </ul>        
            </div>
        </nav>
    </div>
    <?php } ?>
</head>

<body >
<div class="d-flex justify-content-center"> 
    <?php if (isset($_GET['completar'])){?>
    <div class="alert alert-warning">Complete el registro para poder acceder a Bookflix</div>
    <br><br><br>
    <?php  }
    ?>
</div>
<?php
    $user=$_SESSION["EMAIL"];
    $sql="SELECT * FROM usuario WHERE emailUsuario='" . $user . "'";
    $query = mysqli_query($conexion,$sql);
    $id = mysqli_fetch_array($query);
    $_SESSION["USERID"]=$id["id"];
?>
<hr> 
 <div class="container-fluid ">
    <div class="container py-5">
        <h3><strong>Elige el plan de Bookflix ideal para ti.</strong></h3>
        <p style="font-size: 20px'">&nbspCambia de un plan a otro cuando quieras.<br><br></p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card text-center">                
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
                    <a href="/bookflix/formulariotarjeta.php?plan=1" id="bas" name="bas" class="card-footer btn bg-danger text-white">Contratar</a> 
                </div>                
            </div> <!-- precio 1-->
            <div class="col-md-4"> <!-- precio 2-->
                <div class="card text-center">
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
                    <a href="/bookflix/formulariotarjeta.php?plan=2" id="prem" name="prem" class="card-footer btn bg-danger text-white" style="color:#000;">Contratar</a>
                </div>                
            </div> <!-- precio 2-->
        </div>
    </div>
 </div><!--precios-->

    <!--Scripts de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
    <!-- pie de pagina -->
    <br><br>
    <hr width="93.5% ">
    <footer>
    <a class="pfrecuentes" href="preguntasfrecuentes.php" style="margin-left:65px; color:gray;"><u>Preguntas Frecuentes</u></a>
    </footer>
    
</body>

</html>