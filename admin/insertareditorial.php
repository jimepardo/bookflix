<?php 
include_once "../BaseDatosYConex/conexion.php";
$nombre= $_POST['nombreEditorial'];
if (isset($nombre) && !empty($nombre)){
    $sql="INSERT INTO editorial (nombreEditorial) VALUES ('$nombre')";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: cargareditorial.php");
}else{
    $error="Debe ingresar un nombre de una editorial para agregarla";
	header("Location: cargareditorial.php?ERROR=$error");
}

?>