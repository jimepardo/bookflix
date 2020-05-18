<?php 
include_once "../BaseDatosYConex/conexion.php";
$nombre= $_POST['nombreAutor'];
if (isset($nombre) && !empty($nombre)){
    $sql="INSERT INTO autor (nombreAutor) VALUES ('$nombre')";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: cargarautor.php");
}else{
    $error="Debe ingresar un nombre de autor para agregarlo";
	header("Location: cargarautor.php?ERROR=$error");
}

?>