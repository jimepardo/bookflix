<?php
	session_start();
	include "BaseDatosYConex\conexion.php";
	include "uploadImage.php";
	//UPDATE `perfil` SET `nombrePerfil` = 'ernsa', `borradoLogico` = '0', `idAutor` = '1' WHERE `perfil`.`idPerfil` = 94;
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
			header("Location: verPerfil.php?ERRORUSR=$error");
			die();
		}
		$sqlName="nombrePerfil ='$nombre'";
		$arg[$cantArg]=$sqlName;
		$cantArg++;
		$_SESSION['PERFIL']=$nombre;
		$result=uploadImg($_POST['nombrePerfil']);
	}else{
		$result=uploadImg($_SESSION['PERFIL']);
	}
	if (isset($_POST['autor']) ) {
		if ($_POST['autor'] != 0)	{
			$autor=$_POST['autor'];
			$sqlAutor="idAutor =$autor";
		}else{
			$sqlAutor="idAutor=NULL";
		}
		$arg[$cantArg]=$sqlAutor;
		$cantArg++;		
		$_SESSION['AUTORFAV']=$autor;
	}
	if (isset($_POST['genero'])  ) {
		if ($_POST['genero'] != 0) {
			$genero=$_POST['genero'];
			$sqlGenero="idGenero=$genero";
		}else{
			$sqlGenero="idGenero=NULL";
		}	
		$arg[$cantArg]=$sqlGenero;
		$cantArg++;
		$_SESSION['GENEROFAV']=$genero;
	}
	if (is_int($result)) {
		switch ($result) {
			case 1:
				$error="El archivo es muy grande";
				header("Location: verPerfil.php?ERRORIMG=$error");
			break;

			case 2:
				$error="Hubo un error al cargar el archivo,vuelva a intentarlo";
				header("Location: verPerfil.php?ERRORIMG=$error");
			break;

			case 3:
				$error="El tipo de archivo no esta permitido";
				header("Location: verPerfil.php?ERRORIMG=$error");
			break;

			case 4:
				
			break;		
			}
	}else{
		$pathImg.=$result;
		$sqlImg="imagenPerfil='$pathImg'";
		$arg[$cantArg]=$sqlImg;
		$cantArg++;
		$_SESSION['PERFILIMG']=$pathImg;
	}	
	for ($i=0; $i <$cantArg ; $i++) { 
		$sql.=" , ".$arg[$i];	
	}
	
	$sql.=" WHERE nombrePerfil='$nombrePerfil' AND idUsuario=$id";
	$query=mysqli_query($conexion,$sql);
	header("Location: verPerfil.php?Exito=$cantQ");


?>