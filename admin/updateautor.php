<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  $location="Location: modautor.php?redirect";
  if(isset($_POST['autor'])){
    $nombre= $_POST['autor'];
    $location.="&NOMBRE=$nombre";
  } 
  if (isset($_POST['estado'])) {
  $estado= $_POST['estado'];
  $location.="&ESTADO=$estado" ;
   } 

  if ($_POST['nombreGen']==0) {
    $error="Debe seleccionar un nombre de editorial para agregarla";
    $location.="&ERROR=$error";
    header($location);
    die();
  }
  
  if (isset($nombre) && !empty($nombre) && !empty($estado)){
    $sql="UPDATE autor 
    SET nombreAutor ='$nombre'
    WHERE idAutor= '$estado' ";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: modautor.php");
}else{
    $error="Debe ingresar un nombre de autor para agregarlo";
	header($location);
}

?>