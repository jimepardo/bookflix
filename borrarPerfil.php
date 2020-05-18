<?php
	include "BaseDatosYConex/conexion.php";
	//$sql="DELETE FROM `perfil` WHERE `perfil`.`idPerfil` = '".$_GET['ID']."'";
	$sql="UPDATE `perfil` SET `borradoLogico` = '1' WHERE `perfil`.`idPerfil` = '".$_GET['ID']."'";
	$query= mysqli_query($conexion,$sql);
	header("Location: seleccionarPerfil.php");

?>