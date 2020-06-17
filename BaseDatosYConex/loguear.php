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
			if (validarSuscripcion($conexion)) {
				header("Location: ../seleccionarPerfil.php");
				die();
			}else{
				session_destroy();
				session_start();
				$_SESSION["EMAIL"]=$_POST["email"];
				$error="?ERROR=No tiene su suscripcion al dia";
				$link="../listaprecios.php".$error;
				header("Location: $link");
				die();
			}
			break;
		case 2:
			if (validarSuscripcion($conexion)) {
			header("Location: ../seleccionarPerfil.php");
			die(); 
			}else{
				session_destroy();
				session_start();
				$_SESSION["EMAIL"]=$_POST["email"];
				$error="?ERROR=No tiene su suscripcion al dia";
				$link="../listaprecios.php".$error;
				header("Location: $link");
				die();
			}
			break;
		case 3:
			header("Location:  ../admin/index.php");
			break;
		case 4:
			unset($_SESSION["PERMISO"]);
			header("Location: ../registrarse.php?regis");
			break;
		case 5:
			$error=$_SESSION['ERROR'];
			unset($_SESSION["PERMISO"]);
			$link="../login.php".$error;
			header("Location: $link");
			break;
	}	
		
				
	function validarSuscripcion($conexion){	
	$idUser=$_SESSION["ID"];
	$sql="SELECT * FROM suscripcion WHERE idUsuario=$idUser AND borradoLogica= 0";
	$query=mysqli_query($conexion,$sql);
	$cant=mysqli_num_rows($query);
	if ($cant==1) {
	  return true;
	}
	return false;
	}


?>