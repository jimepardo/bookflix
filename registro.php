<?php
	session_start();
	include "BaseDatosYConex\conexion.php";
	require "claseSesion.php";
	$sesion = new manejadorSesiones;
	$link='registrarse.php?return';
	$empty = 0; 
	$error = array('email' => false,'nombre' => false,'password' =>false ,'apellido' => false);//vector para errores
	$campos= array("email","nombre","password","apellido" );//vector de names de los inputs
	for ($i=0; $i <4 ; $i++) { 
		if ( (empty($_POST[($campos[$i])])) && !isset($_POST[$campo[$i]]) ) {				
			$empty++;	//si el name campos[$i] esta seteado en post, se carga en el link,si no esta seteado cargo el error
			$link.="&error-".$campos[$i]."= Debe cargar el campo ".$campos[$i];
		}else{
			$link.="&exito-".$campos[$i]."=".$_POST[$campos[$i]];
		}
	}
	if ($empty!=0) {
		header("Location: $link");
		die();
	}else{
		$email=$_POST["email"];
		$nombre=$_POST["nombre"];
		$password=$_POST["password"];
		$apellido=$_POST["apellido"];
		$sql="SELECT * FROM usuario WHERE emailUsuario='$email'";
		$query=mysqli_query($conexion,$sql);
		$cantQ=mysqli_num_rows($query);
		if( ($cantQ)==0 ){
			$sql="INSERT INTO usuario (`nombreUsuario`,`emailUsuario`,`password`,`apellido`,`permisoUsuario`)VALUES('$nombre','$email','$password','$apellido',0)";
			$query=mysqli_query($conexion,$sql);
			$sesion->set('EMAIL',$email);
			header("Location: listaprecios.php");	
			die();
		}else{
			$error="El mail ya existe";
			$link.="&duplicado=$error";
			header("Location: $link");
			die();
		}
	}
?>
	
	