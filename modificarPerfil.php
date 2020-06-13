<?php
	session_start();
	include "BaseDatosYConex\conexion.php";
	include "uploadImage.php";
	$link="verPerfil.php?nombrePerfil=".$_POST["nombrePerfil"]."&genero=".$_POST["genero"]."&autor=".$_POST["autor"];
	$nombrePerfil=$_SESSION['PERFIL'];
	$pathImg="profileImages/";
	$cantArg=0;
	if (isset($_POST['idUser']) && !empty($_POST['idUser'])) {
		$id=$_POST['idUser'];
		$sql="UPDATE perfil SET idUsuario=$id";
	}else{
		$error="Debe logearse para utilizar la mayoria de las funcionalidades";
		header("Location: login.php/ERROR=$error");
	}
	if (isset($_POST['nombrePerfil']) && !empty($_POST['nombrePerfil'])) {	
		$nombre=$_POST['nombrePerfil'];	
		$sql="SELECT * FROM perfil WHERE nombrePerfil='$nombre' AND idUsuario='$id' AND borradoLogico=0";
		$query=mysqli_query($conexion,$sql);
		$cantQ=mysqli_num_rows($query);
		if ($cantQ == 1 ) {
			$error="Ya existe un usuario con ese nombre";
			$link.="&ERRORUSR=$error";
			header("Location: $link");
			die();
		}
		if (strlen($nombre)>8) {
			$error="El nombre excede los 8 caracteres";
			$link.="&ERRORUSR=$error";
			header("Location: $link");
			die();
		}
		$sql="UPDATE perfil SET ";
		$sqlName="nombrePerfil ='$nombre'";
		$arg[$cantArg]=$sqlName;
		$cantSeteado++;
		$cantArg++;
		
		$result=uploadImg($_POST['nombrePerfil']);
	}else{
		$result=5;
	}
	if (isset($_POST['autor']) ) {
		if ($_POST['autor'] != 0)	{
			$autor=$_POST['autor'];
			$sqlAutor="idAutor =$autor";
			
		}else{
			$sqlAutor="idAutor=NULL";
			$autor="NULL";
		}
		$arg[$cantArg]=$sqlAutor;
		$cantArg++;				
	}
	if (isset($_POST['genero'])  ) {
		if ($_POST['genero'] != 0) {
			$genero=$_POST['genero'];
			$sqlGenero="idGenero=$genero";
			
		}else{
			$sqlGenero="idGenero=NULL";
			$genero="NULL";
		}	
		$arg[$cantArg]=$sqlGenero;
		$cantArg++;
		
	}
	if (is_int($result)) {
		switch ($result) {
			case 1:
				$error="El archivo es muy grande";
				$link.="&ERRORIMG=$error";
				header("Location: $link");
				die();
			break;

			case 2:
				$error="Hubo un error al cargar el archivo,vuelva a intentarlo";
				header("Location: verPerfil.php?ERRORIMG=$error");
				die();
			break;

			case 3:
				$error="El tipo de archivo no esta permitido";
				$link.="&ERRORIMG=$error";
				header("Location: $link");
				die();
			break;

			case 4:
				
			break;	
			case 5:
				$pathImg=$_SESSION["PERFILIMG"];
			break;	
			}
	}else{
		$pathImg.=$result;
		$sqlImg="imagenPerfil='$pathImg'";
		$arg[$cantArg]=$sqlImg;
		$cantArg++;		
	}	
	$sql.=$arg[0];
	for ($i=1; $i <$cantArg ; $i++) { 
		$sql.=" , ".$arg[$i];	
	}
	
	$sql.=" WHERE nombrePerfil='$nombrePerfil' AND idUsuario=$id";
	$query=mysqli_query($conexion,$sql);
	echo $sql;
	$_SESSION['AUTORFAV']=$autor;
	$_SESSION['GENEROFAV']=$genero;
	$_SESSION['PERFIL']=$nombre;
	$_SESSION['PERFILIMG']=$pathImg;
	header("Location: verPerfil.php?Exito");


?>