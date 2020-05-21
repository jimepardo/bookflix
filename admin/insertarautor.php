<?php 
include_once "../BaseDatosYConex/conexion.php";
$nombre= $_POST['nombreAutor'];
$sql="SELECT * FROM autor WHERE nombreAutor='$nombre'";
$query=mysqli_query($conexion,$sql);
$result=mysqli_num_rows($query);
if (($result>0)) {
	$error="Ya existe un autor con ese nombre";
	header("Location: cargarautor.php?ERROR=$error");
	die();
}
if (isset($nombre) && !empty($nombre)){
    $sql="INSERT INTO autor (nombreAutor) VALUES ('$nombre')";  
    $query = mysqli_query($conexion, $sql); 
    header("Location: cargarautor.php?exito=");
}else{
    $error="Debe ingresar un nombre de autor para agregarlo";
	header("Location: cargarautor.php?ERROR=$error");
}

?>