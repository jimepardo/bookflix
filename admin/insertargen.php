<?php 
include_once "../BaseDatosYConex/conexion.php";
$nombre= $_POST['nombreGenero'];
$sql="SELECT * FROM genero WHERE nombreGenero='$nombre'";
$query=mysqli_query($conexion,$sql);
$result=mysqli_num_rows($query);
if (($result>0)) {
	$error="Ya existe un genero con ese nombre";
	header("Location: cargarautor.php?ERROR=$error");
	die();
}
if (isset($nombre) && !empty($nombre)){
    $sql="INSERT INTO genero (nombreGenero) VALUES ('$nombre')";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: cargargen.php");
}else{
    $error="Debe ingresar un nombre de género para agregarlo";
	header("Location: cargargen.php?ERROR=$error");
}

?>