<?php
	include "BaseDatosYConex\conexion.php";
	$idLibro=(isset($_GET["idLibro"])) ? $_GET["idLibro"] : "" ;
	$nombreLibro= (isset($_GET["nombreLibro"])) ? $_GET["nombreLibro"] : "" ;
	$idCap= (isset($_GET["idCap"])) ? $_GET["idCap"] : "" ;
	$idPerfil= (isset($_GET["idPerfil"])) ? $_GET["idPerfil"] : "" ;	

	$sqlLeidos="SELECT count(*) as cant FROM leidos WHERE idPerfil='$idPerfil' AND idLibro='$idLibro' AND idCapitulo='$idCap'";
	$queryLeidos=mysqli_query($conexion,$sqlLeidos);
	$validar=mysqli_fetch_array($queryLeidos);
	if ($validar["cant"]==0) {
		$sqlInsertar="INSERT INTO leidos (idLibro,idPerfil,idCapitulo,borradoLogico) VALUES ('$idLibro','$idPerfil','$idCap','0')";
		$queryInsertar=mysqli_query($conexion,$sqlInsertar);
	}else{
		$sqlAct="UPDATE leidos SET borradoLogico=0 WHERE idPerfil=$idPerfil AND idLibro=$idLibro AND idCapitulo=$idCap";
		$queryAct=mysqli_query($conexion,$sqlAct);
	}	
	$sqlHistorial="SELECT count(*) as cant FROM historial WHERE idPerfil=$idPerfil AND idLibro=$idLibro AND borradoLogico=0";
	$queryHistorial=mysqli_query($conexion,$sqlHistorial);
	$validarHistorial=mysqli_fetch_array($queryHistorial);

	if ($validarHistorial["cant"]==0) {

		$sqlCantCap="SELECT count(*) as cant FROM capitulo WHERE idLibro=$idLibro";
		$queryCantCap=mysqli_query($conexion,$sqlCantCap);
		$mostrarCantCap=mysqli_fetch_array($queryCantCap);

		$sqlCantCapLeidos="SELECT count(*) as cant FROM leidos WHERE idLibro=$idLibro AND idPerfil=$idPerfil AND borradoLogico=0";
		$queryCantCapLeidos=mysqli_query($conexion,$sqlCantCapLeidos);
		$mostrarCantCapLeidos=mysqli_fetch_array($queryCantCapLeidos);


		if ($mostrarCantCapLeidos["cant"]==$mostrarCantCap["cant"]) {
			$sqlInsertarH="INSERT INTO historial (idLibro,idPerfil,borradoLogico) VALUES ('$idLibro','$idPerfil','0')";
			$queryInsertarH=mysqli_query($conexion,$sqlInsertarH);

		}
	}
	header("Location: detalleLibro.php?nombreLibro=$nombreLibro&idLibro=$idLibro");
	
?>