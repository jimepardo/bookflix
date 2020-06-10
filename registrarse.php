<?php
    include "BaseDatosYConex\conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <nav class="navbar navbar-dark" style="background-color: #221f1f;">
        <a class="navbar-brand" href="home.php"> <object data="img/Recurso 1.svg" width=140px style="padding-top: 10px; " type="image/svg+xml"></object></a>
    </nav>
</head>

<body style="background-color: #221f1f; color: #f5f5f1; padding-left: 20px;"  >
    <div class="content" style="display: inline;"> 
    <div class="col-6">
    <h1>Registrarse</h1>

    <form id="formRegistro" action="registro.php" method="POST">  
            <div class="col-6 form-group">
            <label  class="col-form-label">Nombre</label>
            <input class="form-control mb-2 mr-sm-2" id="nombre" type="text" name="nombre" <?php if (isset($_GET['exito-nombre'])) {
                echo "value=".$_GET['exito-nombre'];
            }?>>

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
            <div class="col-6 form-group">
                <label  class="col-form-label">Apellido</label>
            <input class="form-control mb-2 mr-sm-2" id="apellido" type="text" name="apellido" <?php if (isset($_GET['exito-apellido'])) {
                echo "value=".$_GET['exito-apellido'];
            }?>>
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
            <div class="col-6 form-group">
                <label  class="col-form-label">Email </label>
                <input class="form-control mb-2 mr-sm-2" id="email" type="text" name="email" <?php if (isset($_GET['exito-email'])) {
                echo "value=".$_GET['exito-email'];
            }?>>
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

            <div class="col-6 form-group">
            <label class="col-form-label" for="inlineFormInputName2">Contraseña</label>
            <input class="form-control mb-2 mr-sm-2" id="password" type="password" name="password" <?php if (isset($_GET['exito-password'])) {
                echo "value=".$_GET['exito-password'];
            }?>>
            <?php
                if(isset($_GET['error-password'])){
            ?> 
                <div  class="alert alert-danger" role="alert">
                    <?= $_GET['error-password'] ?>
                </div>                
            <?php
                }
            ?>
            <button type="submit" class="btn btn-danger" id="submit">Registrate !</button></a>            
            </div>
    </form>
    </div>
    <div class="col-6">
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

<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>