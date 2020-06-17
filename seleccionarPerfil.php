<?php
	include "BaseDatosYConex/conexion.php";
	session_start();
	require "claseSesion.php";
	$sesion = new manejadorSesiones;
?>
<!DOCTYPE html>
<html>
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

    <title>Bookflix - Seleccionar Perfil</title>
    <link rel="icon" href="img/logo2.png" style="width:10px;"> 

    <!-- Custom styles for this template -->
    <link href="css/iniciarsesion.css" rel="stylesheet">

<?php    
if ($_SESSION['PERMISO'] == 1 || $_SESSION['PERMISO'] == 2){?>
    <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-sm navbar-dark" style="background-color:#221f1f;">
            <a class="navbar-brand" href="#">
                <object data="img/Recurso 1.svg" width=130px type="image/svg+xml">
                <!-- Imagen alternativa si el SVG no puede cargarse -->
                <img src="img/logo1.png" width=110px alt="Imagen PNG alternativa">
                </object></a>
            <!-- esto es para decirle q cree el boton al costado cuando se colapse-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">     
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                <!-- <a href="home.php">
                <button type="button" class="btn btn-danger " style="width: max-content;">Inicio </button>
                </a> &nbsp &nbsp -->
                <a data-toggle="modal" data-target="#logoutModal">
                <button type="button" href="#" class="btn btn-danger " style="width: max-content;">Cerrar Sesión</button>
                </a>
                </ul>                      
                </div>
            </div>
    </nav>
<?php
} else{
    if($_SESSION['PERMISO'] == 3){
        header("Location: admin/index.php");
    }else{
        header("Location: home.php");
    }
}
    
?>
</head>
<body style="background-color: #221f1f;margin-top: 6%">

    <div class="container">

    <div class="row">
        <?php
        $sql="SELECT * FROM perfil WHERE   borradoLogico = 0 AND idUsuario = '" . $_SESSION['ID'] . "' ";
        $query= mysqli_query($conexion,$sql);
        $cantidad= mysqli_num_rows($query);
        while ($result= mysqli_fetch_array($query)) { 
        $name=$result['nombrePerfil'];
        $id=$result['idPerfil'];
        $img=$result['imagenPerfil'];
        $genfav=$result['idGenero'];
        $autorfav=$result['idAutor'];
        ?>
    <div class="modal-dialog text-center  ">    

        <div class="col-sm-3 " >
            <div class="modal-content" style="height: 24em;width: 15em;">
            
                <div class="col-6 user-img">
                    <svg class="bi bi-person-bounding-box" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
                        <img style="width: 150px; height: 133px;" src=<?=$img ?> >
                      </svg>
                </div>
                <legend>
                    <h4> <?= $name ?></h4>
                </legend>
                <div class="col-12">
                    
                <div class="form-group" id="user-group">

                    <a href="seleccionar.php?PERFIL=<?= $name ?>&PERFILIMG=<?= $img?>&GENEROFAV=<?= $genfav ?>&AUTORFAV=<?= $autorfav ?>&IDPERFIL=<?= $id ?>" class="btn btn-danger"> Seleccionar<svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 010-.708L10.793 8 8.146 5.354a.5.5 0 11.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9A.5.5 0 011 8z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0015 13V3a1.5 1.5 0 00-1.5-1.5h-8A1.5 1.5 0 004 3v1.5a.5.5 0 001 0V3a.5.5 0 01.5-.5h8a.5.5 0 01.5.5v10a.5.5 0 01-.5.5h-8A.5.5 0 015 13v-1.5a.5.5 0 00-1 0V13a1.5 1.5 0 001.5 1.5h8z" clip-rule="evenodd"/>
                    </svg></a>

                  </div>

                  <div class="form-group" id="user-group">

                   <a href="borrarPerfil.php?ID=<?= $id ?>" class="btn btn-danger"> Borrar </a>

                  </div>

                </div>

  
            </div>
        </div>
    </div>
        <?php
        }
        ?>


    <?php
    if ($cantidad < ($_SESSION['PERMISO']*2) ) {
    ?>
    <div class="modal-dialog text-center "> 

        <div class="col-sm-3 " >
            <div class="modal-content" style="
            <?php if (isset($_GET['ERROR'])){

                echo "height: 34em";
            }else{
                echo "height:24em";}?>;width: 15em;">
            
                <form class="col-12" action="crearPerfil.php" method="POST" enctype="multipart/form-data">
                <div class="col-12">
             <div class="form-group" id="user-group">                     
              </div>
                <legend>
                    <h4 style="font-size: 27px;">Crear Perfil</h4>
                </legend>            
                <div class="form-group" id="user-group">
                    
                    <div class="col-6 user-img">
                        <img src="profileImages/avatar.png" style="width: 138px;height: 131px;margin-top: 42px;margin-left: -13px;">                  
                    </div>
                    <label for="file-upload" class="btn btn-danger ">
                     Subir Foto!
                    </label>
                    <input name="file" id="file-upload" type="file" style="display:none" />
                </div>
                <div class="form-group" id="user-group">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre Perfil" name="perfil" style="width: 141px" />
                    </div>
                    <button type="submit" class="btn btn-danger" style="width: max-content"> Crear Perfil</button>
                  </div>
                </form>
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
        </div>
    </div>
    <?php
    }
    ?>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    <div class="modal-header ">
                        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que querés salir?</h5>
                        <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" >×</span></button> -->
                    </div>
                    <div class="modal-body">Selecciona "Cerrar sesión" abajo si estás listo para cerrar la sesión actual.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-danger" href="BaseDatosYConex/salir.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
</body>
</html>