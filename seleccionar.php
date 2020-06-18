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
	$sesion->set('IDPERFIL',$_GET['IDPERFIL']);
	header('Location: home.php');

?>