<?php 

include "conexion.php";
	require "../claseSesion.php";
	session_start();
	$sesion= new manejadorSesiones();
	$sesion->iniciarSesion($_POST['email'],$_POST['pass']);
	switch ($_SESSION['PERMISO']) {
		case 1:
			header("Location: ../seleccionarPerfil.php");
			break;
		case 2:
			header("Location: ../seleccionarPerfil.php");
			break;
		case 3:
			header("Location:  ../admin/index.php");
			break;
		case false:
			$error=$_SESSION['ERROR'];
			header("Location: ../login.php?ERROR=$error");
			break;
	}
		
				
	


?>