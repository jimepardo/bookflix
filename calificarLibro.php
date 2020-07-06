<?php
	include_once "BaseDatosYConex/conexion.php";
	$idLibro=(isset($_POST["idLibro"])) ? $_POST["idLibro"] : "" ;
	$nombreLibro= (isset($_POST["nombreLibro"])) ? $_POST["nombreLibro"] : "" ;
	$idPerfil = (isset($_POST["idPerfil"])) ? $_POST["idPerfil"] : "" ;
	$calificacion = (isset($_POST["calificacion"])) ? $_POST["calificacion"] : "" ;
	$actualizacion= (isset($_POST["actualizacion"])) ? $_POST["actualizacion"] : "" ;
	if($actualizacion==0) {
		$sqlInsertar="INSERT INTO calificacion (numero,borradoLogico,idPerfil,idLibro) VALUES('$calificacion','0','$idPerfil','$idLibro')";
	}else{
		$sqlInsertar="UPDATE calificacion SET numero=$calificacion WHERE idLibro=$idLibro AND idPerfil=$idPerfil";
	}
	$query = mysqli_query($conexion,$sqlInsertar);

	header("Location: detallelibro.php?nombreLibro=$nombreLibro&idLibro=$idLibro");
?>