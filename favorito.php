<?php
	include_once "BaseDatosYConex/conexion.php";
	$idLibro=(isset($_POST["idLibro"])) ? $_POST["idLibro"] : "" ;
	$nombreLibro= (isset($_POST["nombreLibro"])) ? $_POST["nombreLibro"] : "" ;
	$opcion= (isset($_POST["opcion"])) ? $_POST["opcion"] : "" ;
	$idPerfil= (isset($_POST["idPerfil"])) ? $_POST["idPerfil"] : "" ;
	if ($opcion==0) {
			$sql="INSERT INTO favoritos (idPerfil,idLibro,borradoLogico) values ('$idPerfil','$idLibro','0')";
		}else{
			$sql="UPDATE favoritos SET borradoLogico=1 WHERE idPerfil=$idPerfil AND idLibro=$idLibro";
		}
	$query=mysqli_query($conexion,$sql);
	header("Location: detallelibro.php?idLibro=$idLibro&nombreLibro=$nombreLibro");
?>