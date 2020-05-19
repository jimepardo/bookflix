

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <!--Detección  de pantalla en cual se abre el dispositivo.Para hacer responsive-->
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Preguntas frecuentes</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <nav class="navbar navbar-dark" style="background-color: #f1f1f5;">
        <a class="navbar-brand" href="home.html"> <object data="img/Recurso 1.svg" width=140px type="image/svg+xml"></object></a>
    </nav>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <style>
        h1, h4, .btn{
            font-family: Arial;
            
            color: #221f1f;
            padding-top: 10px;
            margin: 20px;
        }
    </style>
     
    
</head>

<body style="background-color: #f1f1f5;">

<h1>Preguntas Frecuentes</h1>
<h4>Sacate todas tus dudas aquí</h4>

<div class="containeer-fluid col-12">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                <button class="btn btn-outline-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                ¿Cómo me registro?
                </button>
            </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                Podés registrarte haciendo click en el siguiente enlace 
                <a href="registrarse.php"><button type="button" class="btn btn-link">Registrate</button></a>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-outline-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
                <button class="btn btn-outline-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
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
                <button class="btn btn-outline-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
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
                <button class="btn btn-outline-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
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
                <button class="btn btn-outline-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
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

<br><br>
<a href="home.php">
<button type="button" class="btn btn-link">Volver</button></a>

<!--Scripts de bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
</body>

</html>