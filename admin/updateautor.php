<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  $nombre= $_POST['autor'];
  $estado= $_POST['estado'];
  
  
  if (isset($nombre) && !empty($nombre) && !empty($estado)){
    $sql="UPDATE autor 
    SET nombreAutor ='$nombre'
    WHERE idAutor= '$estado' ";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: modautor.php");
}else{
    $error="Debe ingresar un nombre de autor para agregarlo";
	header("Location: modautor.php?ERROR=$error");
}

?>