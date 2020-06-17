<?php

	session_start();
	require "claseSesion.php";
	$sesion = new manejadorSesiones;
	unset($_SESSION['PERFIL']);
	$sesion->set('PERFILIMG',$_GET['PERFILIMG']);
	$sesion->set('IDPERFIL',$_GET['IDPERFIL']);
	$sesion->set('GENEROFAV',$_GET['GENEROFAV']);
	$sesion->set('AUTORFAV',$_GET['AUTORFAV']);
	$sesion->set('PERFIL',$_GET['PERFIL']);
<<<<<<< HEAD
	$sesion->set('IDPERFIL',$_GET['IDPERFIL']);
=======

>>>>>>> 273d0fb6a45b2db5bedd6375ba7ab8b7d5dc4e59
	header('Location: home.php');

?>