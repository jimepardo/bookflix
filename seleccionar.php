<?php

	session_start();
	require "claseSesion.php";
	$sesion = new manejadorSesiones;
	$sesion->set('PERFIL',$_GET['PERFIL']);
	header('Location: home.php');

?>