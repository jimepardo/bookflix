<?php
	include_once "BaseDatosYConex/conexion.php";
	$idPerfil = (isset($_POST["nombreLibro"])) ? $_POST["nombreLibro"] : "" ;
	$idPerfil = (isset($_POST["idPerfil"])) ? $_POST["idPerfil"] : "" ;
	$idLibro = (isset($_POST["idLibro"])) ? $_POST["idLibro"] : "" ;
	$sql = "UPDATE comentario SET borradoLogico=1 WHERE idLibro=$idLibro AND idPerfil=$idPerfil";
	$query = mysqli_query($conexion,$sql);
	header("Location: detallelibro.php?nombreLibro=$nombreLibro&idLibro=$idLibro");