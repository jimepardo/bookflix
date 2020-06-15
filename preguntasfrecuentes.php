
<?php
 include "BaseDatosYConex\conexion.php";
    session_start();
    require "claseSesion.php";
    $sesion = new manejadorSesiones;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <!--Detección  de pantalla en cual se abre el dispositivo.Para hacer responsive-->
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Bookflix - Preguntas frecuentes</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
 <?php if (isset($_SESSION['PERMISO'] )){
        if ($_SESSION['PERMISO'] == 1 || $_SESSION['PERMISO'] == 2 ){?>
            <div class="barranav">
            <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark"  style="background-color:#f5f5f1;">
                <a class="navbar-brand" href="home.php">
                    <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">  
                        <!-- Imagen alternativa si el SVG no puede cargarse -->
                        <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                    </object></a>
                    <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="#" data-toggle="modal" data-target="#logoutModal">
                                <button type="button" class="btn btn-outline-danger " style="margin-right: 25px; text-align: center;">Cerrar Sesión</button>
                            </a>
                        </ul>
                    </div>
            </nav>
            </div>
    <?php
    }else{
        if($_SESSION['PERMISO'] == 3){?>
        <div class="barranav">
            <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark"  style="background-color:#f5f5f1;">
                <a class="navbar-brand" href="home.php">
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
   <?php }/*termina if permiso 3*/
        
     }/*termina else de los permisos*/
    
    ?>

<?php } /*termina if del permiso*/
else{?>

<div class="barranav">
            <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark"  style="background-color:#f5f5f1;">
                <a class="navbar-brand" href="home.php">
                    <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">  
                        <!-- Imagen alternativa si el SVG no puede cargarse -->
                        <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                    </object></a>
                    <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            </nav>
            </div>
<?php }?>
    <style>
        .algo{
            font-family: Arial;
            color: #221f1f; 
            margin: 5px;
        }
        h2, .card-body{
            margin-left:2%;
        }
        
    </style>
     
    
</head>

<body style="background-color: #f1f1f5; paddign-top:6%">
<br><br> <br>   
<h2><strong>Preguntas Frecuentes</strong></h2><br>


<div class="containeer-fluid col-12" >
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger algo" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                ¿Quiénes somos?
                </button>
            </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                Bookflix es una plataforma digital donde tenes al alcance de tu mano los libros que mas te gustan.
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed algo" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                ¿Cómo me registro?
                </button>
            </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                Podés registrarte haciendo click en el siguiente enlace <p>
                <a href="registrarse.php"><button type="button" class="btn btn-link">Registrate</button></a></p>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed algo" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Si no soy de Latinoamérica, ¿puedo acceder a la plataforma?
                </button>
            </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                Por supuesto, cualquier persona alrededor del mundo que posea una tarjeta puede registrarse en nuestra plataforma.
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed algo" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                ¿Cuántos perfiles puedo crear?
                </button>
            </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <p>Si elegis el plan básico, te ofrecemos 2 perfiles para que lo compartas con alguien más.</p>
                <p>Si elegis el plan premium, te ofrecemos 4 perfiles para que puedan disfrutar del contenido exclusivo toda la familia.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed algo" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                ¿Es necesario ser mayor de 18 años?
                </button>
            </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <p>No, con contar con un medio de pago habilitado, podés suscribirte sin problemas</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingSix">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed algo" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                ¿A través de qué medios de pago puedo abonar la suscripción?
                </button>
            </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <p>Aceptamos solamente tarjetas de crédito</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingSeven">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed algo" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                ¿Puedo cambiarme de plan?
                </button>
            </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
                <p>Si, siempre que termine el mes de facturación en curso, puede solicitar el cambio de plan.</p>
            </div>
        </div>

  </div>

    </div>

</div>

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

<br>
<a href="home.php">
<button type="button" class="btn btn-link">Volver al home</button></a>

<!--Scripts de bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
</body>

</html>