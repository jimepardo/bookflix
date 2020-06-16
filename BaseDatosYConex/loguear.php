<?php 

	include "conexion.php";
	require "../claseSesion.php";
	session_start();
	$sesion= new manejadorSesiones();
	$sesion->iniciarSesion($_POST['email'],$_POST['pass']);
	switch ($_SESSION['PERMISO']) {
		case 0:
			header("Location: ../listaprecios.php/completar");
			break;
		case 1:
			if (validarSuscripcion()) {
				header("Location: ../seleccionarPerfil.php");
				die();
			}else{
				session_destroy();
				$error="?ERROR=No tiene su suscripcion al dia";
				$link="../login.php".$error;
				header("Location: $link");
			}
			break;
		case 2:
			if (validarSuscripcion()) {
			header("Location: ../seleccionarPerfil.php");
			die(); 
			}else{
				session_destroy();
				$error=;
				$link="../login.php".$error;
				header("Location: $link");
			}
			break;
		case 3:
			header("Location:  ../admin/index.php");
			break;
		case 4:
			unset($_SESSION["PERMISO"]);
			header("Location: ../registrarse.php?regis");
			break;
		case false:
			$error=$_SESSION['ERROR'];
			unset($_SESSION["PERMISO"]);
			$link="../login.php".$error;
			header("Location: $link");
			break;
	}
		
				
	function validarSuscripcion(){	
	$idUser=$_SESSION["ID"];
	$sql="SELECT * FROM suscipcion WHERE idUsuario=$idUser AND borradoLogica= 0";
	$query=mysqli_query($conexion,$sql);
	if (mysqli_num_rows($query)==1) {
	  return true;
	}
	return false;
	}


?>