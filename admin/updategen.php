<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  $nombre= $_POST['nombreGen'];
  $estado= $_POST['estado'];
  
  
  if (isset($nombre) && !empty($nombre) && !empty($estado)){
    $sql="UPDATE genero 
    SET nombreGenero ='$nombre'
    WHERE idGenero= '$estado' ";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: modgen.php");
}else{
    $error="Debe ingresar un nombre de género para agregarlo";
	header("Location: modgen.php?ERROR=$error");
}

?>