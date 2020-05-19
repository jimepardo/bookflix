<?php
	include "BaseDatosYConex/conexion.php";
	include "uploadImage.php";
	session_start();	
	$id=$_SESSION['ID'];
	$pathImg="profileImages/";
	$perfilNombre=$_POST['perfil'];
	$result=uploadImg($perfilNombre);
	if (is_int($result)) {
		switch ($result) {
			case 1:
				$error="El archivo es muy grande";
				header("Location: seleccionarPerfil.php?ERROR=$error");
				break;
		
			case 2:
				$error="Hubo un error al cargar el archivo,vuelva a intentarlo";
				header("Location: seleccionarPerfil.php?ERROR=$error");
				break;
		
			case 3:
				$error="El tipo de archivo no esta permitido";
				header("Location: seleccionarPerfil.php?ERROR=$error");
				break;
		}
		$error="Hubo un error al cargar la imagen,seleccione una imagen jpg";
		header("Location: seleccionarPerfil.php?ERROR=$error");
	}
	$pathImg=$pathImg.$result;
	$sql="SELECT nombrePerfil FROM perfil WHERE idUsuario='$id' AND nombrePerfil='$perfilNombre' AND borradoLogico=0";
	$query=mysqli_query($conexion,$sql);
	if($perfilNombre!='' && (mysqli_num_rows($query)==0)){
	$sql="INSERT INTO perfil (nombrePerfil,idUsuario,imagenPerfil) VALUES ('$perfilNombre','$id','$pathImg')";
	$query= mysqli_query($conexion,$sql);
	header("Location: seleccionarPerfil.php");
	}else{
		$error="Debe ingresar un nombre para el perfil,el mismo no puede repetirse";
		header("Location: seleccionarPerfil.php?ERROR=$error");
	}		
?>