<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  
  
  $location="Location: modgen.php?redirect";
  if(isset($_POST['nombreGen'])){
    $nombre= $_POST['nombreGen'];
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
  
  if (isset($_POST['nombreGen']) && !empty($_POST['nombreGen']) && ($_POST['estado']!=0)){
    $sql="UPDATE genero 
    SET nombreGenero ='$nombre'
    WHERE idGenero= '$estado' ";  
    $query = mysqli_query($conexion, $sql);
    $exito="Se ha cargado el nuevo genero"; 
    header("Location: modgen.php?EXITO=$exito");
}else{
    $error="Debe ingresar un nombre de género para modificarlo";
    $location.="&ERROR=$error";
	header($location);
}

?>