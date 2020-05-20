<?php

	session_start();
	require "claseSesion.php";
	$sesion = new manejadorSesiones;
	$sesion->set('PERFILIMG',$_GET['PERFILIMG']);
	$sesion->set('GENEROFAV',$_GET['GENEROFAV']);
	$sesion->set('AUTORFAV',$_GET['AUTORFAV']);
	$sesion->set('PERFIL',$_GET['PERFIL']);
	header('Location: home.php');

?>