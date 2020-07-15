<?php 
    include_once "BaseDatosYConex/conexion.php";
    session_start();
    require_once "claseSesion.php";
    $sesion = new manejadorSesiones;
   
    $consulta= "SELECT * FROM libro l INNER JOIN genero g ON (l.idGenero=g.idGenero) INNER JOIN autor a ON (l.idAutor=a.idAutor) INNER JOIN editorial e ON (l.idEditorial=e.idEditorial) WHERE l.idLibro ='".$_GET['idLibro']."' ";
    $query = mysqli_query($conexion,$consulta);
    $mostrar = mysqli_fetch_array($query, MYSQLI_ASSOC);

    //traerme los pdf de todos los capitulos
    $consulta2=mysqli_query($conexion,"SELECT pdf FROM libro l INNER JOIN vistaprevia c ON (c.idLibro= l.idLibro) WHERE l.idLibro ='".$_GET['idLibro']."' AND ((l.fechaDesde<=l.fechaHasta) OR (l.fechaHasta IS NULL )) AND l.fechaDesde<=CURRENT_DATE() ");
   // $mostrar2=mysqli_fetch_array($consulta2);

    $query3=mysqli_query($conexion,"SELECT * FROM novedadlibro n WHERE n.idLibro='".$_GET['idLibro']."' ");
    $mostrar3= mysqli_fetch_array($query3, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bookflix - Vista previa de <?php echo $mostrar['nombreLibro']?></title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Demo styles -->
    <link href="css/detalle.css" rel="stylesheet">
   <div class="barranavegacionNoReg">
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
                            <a href="registrarse.php"><button type="button" class="btn btn-danger" style="margin-right: 10px; text-align: center;">Registrarse</button></a>
        
                        </ul>
        
                    </div>
                </nav>
            </div>    
   
               
</head>

<body style="background-color: #221f1f;">
  
    <header>
        <div class="container-fluid">
            <h2 class="text-uppercase pl-2 pt-2"><strong><?php echo $mostrar['nombreLibro']?></strong></h2>
        </div>
    </header>
    <div class="container-fluid">
        <div class="main"><br>
            <div class=" pr-5">
                <p class="desc pl-3"><?php echo $mostrar3['descripcion']?></p>
            </div><br>
            
                   
<?php 
    $sql="SELECT pdf FROM vistaprevia WHERE idLibro='".$_GET['idLibro']."' ";
    $result=mysqli_query($conexion,$sql);
    $mostrar=mysqli_fetch_array($result);
if (mysqli_num_rows($result)!= 0){
?>
                <a href="home.php"> <button class="btn btn-outline-secondary" id="boton" style="position: fixed; width: 80px; height: 80px">Volver al home</button></a>
                <iframe id="frame" class="" src="pdfsVP/<?php echo $mostrar['pdf']?>#toolbar=0&navpanes=0&scrollbar=0&page=0" style="width: 100%;height: 650px" ></iframe>
                <?php
            } else{
                ?>

        </div>
         <div class="pl-5">
             
             <h5>Este libro no tiene una vista previa, pero te invitamos a suscribirte, no te pierdas esta nueva experiencia  <a href="registrarse.php"> registrate </a> o si ya tenés una cuenta <a href="login.php"> inicia sesión </a></h5>
            
                <?php
            }
            ?> 
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