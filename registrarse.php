<?php
    include "BaseDatosYConex\conexion.php";
    session_start();
    require "claseSesion.php";
    $sesion = new manejadorSesiones;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookflix - Registrarse</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/precios.css">
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

<body style="margin-top:6%;">
  <div class="d-flex justify-content-center"> 
    <?php if (isset($_GET['error1'])){?>
                    <div class="alert alert-warning">Si desea acceder a nuestro catálogo de libros, lo invitamos a registrarse, sumese!</div>
                    <br><br><br>
              <?php  }
            ?>
    </div>
        <div class="d-flex justify-content-center">

            <form class="text-center" id="formRegistro" action="registro.php" method="POST">  
                    <h3><strong>Registrarse</strong></h3><br>
                    <div class="row">
                        <div class="form-group col-6">
                        <label  class="form-label">Nombre</label>
                        <input class="form-control" id="nombre" type="text" name="nombre" <?php if (isset($_GET['exito-nombre'])) {
                            echo "value=".$_GET['exito-nombre']; }?> required>

                        <?php
                            if(isset($_GET['error-nombre'])){
                        ?> 
                            <div  class="alert alert-danger" role="alert">
                                <?= $_GET['error-nombre'] ?>
                            </div>                
                        <?php
                            }
                        ?>
                        </div>
                        <div class="form-group col-6">
                            <label  class="form-label">Apellido</label>
                        <input class="form-control" id="apellido" type="text" name="apellido" <?php if (isset($_GET['exito-apellido'])) {
                            echo "value=".$_GET['exito-apellido'];
                        }?> required>
                        <?php
                            if(isset($_GET['error-apellido'])){
                        ?> 
                            <div  class="alert alert-danger" role="alert">
                                <?= $_GET['error-apellido'] ?>
                            </div>                
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label  class="form-label">Email </label>
                        <input class="form-control mb-2 mr-sm-2" id="email" type="text" name="email" <?php if (isset($_GET['exito-email'])) {
                        echo "value=".$_GET['exito-email'];
                    }?> pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                    <?php
                        if(isset($_GET['duplicado'])){
                    ?> 
                        <div  class="alert alert-danger" role="alert">
                            <?= $_GET['duplicado'] ?>
                        </div>                
                    <?php
                        }
                    ?>
                    <?php
                        if(isset($_GET['error-email'])){
                    ?> 
                        <div  class="alert alert-danger" role="alert">
                            <?= $_GET['error-email'] ?>
                        </div>                
                    <?php
                        }
                    ?>
                    </div>

                    <div class="form-group">
                    <label class="form-label" for="inlineFormInputName2">Contraseña</label>
                    <input class="form-control" id="password" type="password" name="password" <?php if (isset($_GET['exito-password'])) {
                        echo "value=".$_GET['exito-password'];
                    }?> required>
                    <?php
                        if(isset($_GET['error-password'])){
                    ?> 
                        <div  class="alert alert-danger" role="alert">
                            <?= $_GET['error-password'] ?>
                        </div>                
                    <?php
                        }
                    ?><br>
                    <button type="submit" class="btn btn-danger btn-block" id="submit">Registrate !</button></a>            
                    </div>
                    <div class="footer">
                        <div class="d-flex justify-content-center links" style="color:#332f2c">
                            ¿Ya tenés una cuenta?&nbsp <a href="login.php" style="color:#221f1f">Inicia Sesión</a><br><br>
                        </div>
                    </div>
            </form>
        
            <div class="row d-flex justify-content-center">
                <?php
                        if(isset($_GET['exito'])){
                    ?> 
                        <h3  class="alert alert-success" role="alert">
                            Se ha registrado con exito un nuevo usuario
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
    <!-- pie de pagina -->
    <br><br>
    <hr width="93.5% ">
    <footer>
    <a class="pfrecuentes" href="preguntasfrecuentes.php" style="margin-left:65px; color:gray;"><u>Preguntas Frecuentes</u></a>
    </footer>
</body>

</html>