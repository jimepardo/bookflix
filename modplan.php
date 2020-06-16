<?php
	include_once "BaseDatosYConex/conexion.php";
    session_start();
	require_once "claseSesion.php";
	$sesion = new manejadorSesiones;
	$idUser=$_GET["idUser"];
	$permiso=$_GET["permiso"];
	if ($permiso==1 ) {
		$sql="UPDATE usuario SET permisoUsuario = 2 WHERE id = $idUser";	
		$query=mysqli_query($conexion,$sql);
		$sql="UPDATE suscripcion SET montoSuscripcion = 280 WHERE idUsuario = $idUser";	
		$query=mysqli_query($conexion,$sql);
		$_SESSION["PERMISO"]=2;
	}else{
		$sql="UPDATE usuario SET permisoUsuario = 1 WHERE id = $idUser";
		$query=mysqli_query($conexion,$sql);	
		$sql="UPDATE suscripcion SET montoSuscripcion = 160 WHERE idUsuario = $idUser";	
		$query=mysqli_query($conexion,$sql);
		$_SESSION["PERMISO"]=1;
	}
	header("Location: cambiarplan.php?exito");
?>