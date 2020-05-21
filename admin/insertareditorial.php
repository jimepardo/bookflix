<?php 
include_once "../BaseDatosYConex/conexion.php";
$nombre= $_POST['nombreEditorial'];
$sql="SELECT * FROM editorial WHERE nombreEditorial='$nombre'";
$query=mysqli_query($conexion,$sql);
$result=mysqli_num_rows($query);
if (($result>0)) {
	$error="Ya existe una editorial con ese nombre";
	header("Location: cargarautor.php?ERROR=$error");
	die();
}
if (isset($nombre) && !empty($nombre)){
    $sql="INSERT INTO editorial (nombreEditorial) VALUES ('$nombre')";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: cargareditorial.php");
}else{
    $error="Debe ingresar un nombre de una editorial para agregarla";
	header("Location: cargareditorial.php?ERROR=$error");
}

?>