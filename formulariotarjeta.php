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
                    <a href="login.php"><button type="button" class="btn btn-outline-danger " style="margin-right: 25px; text-align: center;">Iniciar Sesión</button></a>        
                </ul>        
            </div>
        </nav>
    </div>
</head>
<hr> 
<body>
  
<div class="container-fluid"> 
    <div class="container-fluid py-5">
        
        <div class="row d-flex justify-content-center">
        
            <form class="needs-validation " novalidate>
            <h3><strong>Configura tu tarjeta de crédito</strong></h3><br>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nombre" class="col-form-label">Nombre </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre"  value="<?php if(isset($_POST['nombre'])){ echo $_POST['nombre'];}?>" required>
                        <div class="valid-feedback">Campo completado</div>
                        <div class="invalid-feedback">Debe ingresar su nombre</div>
                    </div>
                    <div class="form-group col-6">
                        <label for="apellido" class="col-form-label">Apellido </label>
                        <input type="text" class="form-control" id="nombre" name="apellido" placeholder="Ingrese su apellido"  value="<?php if(isset($_POST['apellido'])){ echo $_POST['apellido'];}?>" required>
                        <div class="valid-feedback">Campo completado</div>
                        <div class="invalid-feedback">Debe ingresar su apellido</div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="tarjeta" class="col-form-label">Número de tarjeta </label>
                        <input type="number" class="form-control" id="tarjeta" name="tarjeta" placeholder="Ingrese su número de tarjeta"  value="<?php if(isset($_POST['tarjeta'])){ echo $_POST['tarjeta'];}?>" required>
                        <div class="valid-feedback">Campo completado</div>
                        <div class="invalid-feedback">Debe ingresar su número de tarjeta</div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="fecha" class="col-form-label">Fecha de vencimiento </label>
                        <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha de vencimiento de su tarjeta"  value="<?php if(isset($_POST['fecha'])){ echo $_POST['fecha'];}?>" required>
                        <div class="valid-feedback">Campo completado</div>
                        <div class="invalid-feedback">Debe ingresar la fecha de vencimiento su tarjeta</div>
                    </div>
                    <div class="form-group col-6">
                        <label for="codigo" class="col-form-label">Código de seguridad (CVV) </label>
                        <input type="number" class="form-control" id="tarjeta" name="tarjeta" placeholder="Ingrese el código de seguridad (CVV)"  value="<?php if(isset($_POST['codigo'])){ echo $_POST['codigo'];}?>" required>
                        <div class="valid-feedback">Campo completado</div>
                        <div class="invalid-feedback">Debe ingresar el código de seguridad de la tarjeta</div>
                    </div>
                </div>
                <button type="submit" id="btnGuardar" class="btn btn-danger btn-block">Iniciar membresía</button>
            </form>
        </div>
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
    <a class="pfrecuentes" href="preguntasfrecuentes.php" style="margin-left:65px;"><u>Preguntas Frecuentes</u></a><br><br><br>
    
    </footer>
    
</body>

</html>