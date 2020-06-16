<?php
	include "BaseDatosYConex/conexion.php";
	//$sql="DELETE FROM `perfil` WHERE `perfil`.`idPerfil` = '".$_GET['ID']."'";
	$sql="UPDATE `perfil` SET `borradoLogico` = '1' WHERE `perfil`.`idPerfil` = '".$_GET['ID']."'";
	$query= mysqli_query($conexion,$sql);
	if (isset($_GET["cambiarPlan"])) {
		header("Location: cambiarPlan.php");		
	}else{
		header("Location: seleccionarPerfil.php");
	}
?>