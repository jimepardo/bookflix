<?php
	include "BaseDatosYConex/conexion.php";
	include "uploadImage.php";
	session_start();	
	$id=$_SESSION['ID'];
	$perfilNombre=$_POST['perfil'];
	$result=uploadImg($perfilNombre);

	$sql="SELECT nombrePerfil FROM perfil WHERE idUsuario='$id' AND nombrePerfil='$perfilNombre' AND borradoLogico=0";
	$query=mysqli_query($conexion,$sql);
	if($perfilNombre!='' && (mysqli_num_rows($query)==0)){
	$sql="INSERT INTO perfil (nombrePerfil,idUsuario) VALUES ('$perfilNombre','$id')";
	$query= mysqli_query($conexion,$sql);
	header("Location: seleccionarPerfil.php");
	}else{
		$error="Debe ingresar un nombre para el perfil,el mismo no puede repetirse";
		header("Location: seleccionarPerfil.php?ERROR=$error");
	}		
?>