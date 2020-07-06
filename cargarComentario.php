<?php
	include_once "BaseDatosYConex/conexion.php";
	$idPerfil = (isset($_POST["idPerfil"])) ? $_POST["idPerfil"] : "" ;
	$comentario = (isset($_POST["comentario"])) ? $_POST["comentario"] : "" ;
	$idLibro=(isset($_POST["idLibro"])) ? $_POST["idLibro"] : "" ;
	$nombreLibro= (isset($_POST["nombreLibro"])) ? $_POST["nombreLibro"] : "" ;
	if(empty($comentario) || $comentario==""){
		$error="No puede cargar un comentario vacio";
		header("Location: detallelibro.php?ERR_COMENT=$error&nombreLibro=$nombreLibro&idLibro=$idLibro");
		die();
	}
	$consulta="SELECT count(*) as count FROM comentario WHERE idPerfil=$idPerfil AND idLibro=$idLibro AND borradoLogico=0";
	$query = mysqli_query($conexion,$consulta);
	$mostrar = mysqli_fetch_array($query, MYSQLI_ASSOC);
	if($mostrar["count"]==1){
		$error="Ya ha comentado el libro";
		header("Location: detallelibro.php?ERR_COMENT=$error&nombreLibro=$nombreLibro&idLibro=$idLibro");
		die();
	}
	$sql="INSERT INTO comentario (textoComentario,idLibro,idPerfil,borradoLogico) VALUES('$comentario','$idLibro','$idPerfil','0')";
	$query = mysqli_query($conexion,$sql);
	header("Location: detallelibro.php?nombreLibro=$nombreLibro&idLibro=$idLibro")
?>