<?php 
    include_once "../BaseDatosYConex/conexion.php";
  
  $nombre= $_POST['editorial'];
  $estado= $_POST['estado'];
  
  
  if (isset($nombre) && !empty($nombre) && !empty($estado)){
    $sql="UPDATE editorial 
    SET nombreEditorial ='$nombre'
    WHERE idEditorial= '$estado' ";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: modeditorial.php");
}else{
    $error="Debe ingresar un nombre de editorial para agregarla";
	header("Location: modeditorial.php?ERROR=$error");
}

?>