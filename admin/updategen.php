<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  $nombre= $_POST['genero'];
  $id= $_get['idGenero'];
  
  
  if (isset($nombre) && !empty($nombre)){
    $sql="UPDATE genero 
    SET nombreGenero ='$nombre'
    WHERE idGenero= '$id'  ";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: modgen.php");
}else{
    $error="Debe ingresar un nombre de género para agregarlo";
	header("Location: modgen.php?ERROR=$error");
}

?>