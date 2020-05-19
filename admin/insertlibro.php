<?php
	include "../BaseDatosYConex/conexion.php";

	if (isset($_POST['nombre'])) {
		$nombre=$_POST['nombre'];
	}else{
		$error="El nombre no puede estar vacio";
		header("Location: cargarlibro.php?errorNombre=$error");
	}


?>