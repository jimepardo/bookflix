<?php 
    
    include "BaseDatosYConex\conexion.php";
    session_start();
    require "claseSesion.php";
    $sesion = new manejadorSesiones;
    unset($_SESSION['EMAIL']);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
     <!--Detección  de pantalla en cual se abre el dispositivo.Para hacer responsive-->
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!--  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--los iconos de FontAwesome-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> -->

    <title>Iniciar Sesion</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 

    <!-- Custom styles for this template -->
    <link href="css/iniciarsesion.css" rel="stylesheet">

    <nav class="navbar navbar-dark" style="background-color: #221f1f;">
        <a class="navbar-brand" href="home.php"> <object data="img/Recurso 1.svg" width=140px style="padding-top: 10px; " type="image/svg+xml"></object></a>
    </nav>
</head>

<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <?php
                if (isset($_GET['cuentaRegistrada'])) {                
            ?>
                    <div class="alert alert-success">SE HA CREADO SU CUENTA !</div>
                    <br><br><br>
            <?php
            }
            ?>
            <div class="modal-content">
            
                <div class="col-12 user-img">
                    <svg class="bi bi-person-bounding-box" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.5 1a.5.5 0 00-.5.5v3a.5.5 0 01-1 0v-3A1.5 1.5 0 011.5 0h3a.5.5 0 010 1h-3zM11 .5a.5.5 0 01.5-.5h3A1.5 1.5 0 0116 1.5v3a.5.5 0 01-1 0v-3a.5.5 0 00-.5-.5h-3a.5.5 0 01-.5-.5zM.5 11a.5.5 0 01.5.5v3a.5.5 0 00.5.5h3a.5.5 0 010 1h-3A1.5 1.5 0 010 14.5v-3a.5.5 0 01.5-.5zm15 0a.5.5 0 01.5.5v3a1.5 1.5 0 01-1.5 1.5h-3a.5.5 0 010-1h3a.5.5 0 00.5-.5v-3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/> 
                      </svg>
                </div>
                <legend> 
                <h4> Iniciar Sesión </h4>
                </legend>
                
                <form class="col-12" action="BaseDatosYConex/loguear.php" method="POST">
                    <div class="form-group" id="user-group"><i class="fas fa-user icon"></i>
                        <input type="text" class="form-control" placeholder="E-mail" id="email" name="email" required>
                    </div>
                    <div class="form-group" id="contrasena-group"><i class="fas fa-lock icon"></i>
                        <input type="password" class="form-control" placeholder="Contraseña" minlength="3" maxlength="12" id="pass" name="pass" required>
                    </div>
                    <button type="submit" class="btn btn-danger" href="home.php" >Ingresar <svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 010-.708L10.793 8 8.146 5.354a.5.5 0 11.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9A.5.5 0 011 8z" clip-rule="evenodd"/>
                         <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0015 13V3a1.5 1.5 0 00-1.5-1.5h-8A1.5 1.5 0 004 3v1.5a.5.5 0 001 0V3a.5.5 0 01.5-.5h8a.5.5 0 01.5.5v10a.5.5 0 01-.5.5h-8A.5.5 0 015 13v-1.5a.5.5 0 00-1 0V13a1.5 1.5 0 001.5 1.5h8z" clip-rule="evenodd"/>
                      </svg></button>

                </form>
                <div class="footer">
				<div class="d-flex justify-content-center links">
					¿No tenés una cuenta?&nbsp <a href="registrarse.php">Regístrate</a><br><br>
				</div>
			</div>
            </div>
                <?php
                if(isset($_GET['ERROR'])){
                ?> 
                <div  class="alert alert-danger" role="alert">
                    <?= $_GET['ERROR'] ?>
                </div>                
                <?php
                }
                ?>
            </div>
        </div>






        <!--Scripts de bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
</body>

</html>