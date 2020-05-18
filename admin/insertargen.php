<?php 
include_once "../BaseDatosYConex/conexion.php";
$nombre= $_POST['nombreGenero'];
if (isset($nombre) && !empty($nombre)){
    $sql="INSERT INTO genero (nombreGenero) VALUES ('$nombre')";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: cargargen.php");
}else{
    $error="Debe ingresar un nombre de género para agregarlo";
	header("Location: cargargen.php?ERROR=$error");
}

?>