<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  $location="Location: modeditorial.php?redirect";
  if(isset($_POST['editorial'])){
    $nombre= $_POST['editorial'];
    $location.="&NOMBRE=$nombre";
  } 
  if (isset($_POST['estado'])) {
  $estado= $_POST['estado'];
  $location.="&ESTADO=$estado" ;
  } 
  if ($_POST['estado']==0) {
    $error="Debe seleccionar un nombre de editorial para agregarla";
    $location.="&ERROR=$error";
    header($location);
    die();
  }
  if (isset($_POST['editorial']) && !empty($_POST['editorial']) && ($_POST['estado']!=0) ){
    $sql="UPDATE editorial 
    SET nombreEditorial ='$nombre'
    WHERE idEditorial= '$estado' ";  
    $query = mysqli_query($conexion, $sql); 
    $exito="Se modificado el genero";
    header("Location: modeditorial.php?EXITO=$exito");
}else{
    $error="Debe ingresar un nombre de editorial para agregarla";
    $location.="&ERROR=$error";
	header($location);
}

?>