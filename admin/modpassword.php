<?php
	include_once "../BaseDatosYConex/conexion.php";
	$location="Location: cuentamodadmi.php?redirect";
	if ( !empty($_POST['pass']) ) {
		$contraseñaActual=$_POST['pass'];
		$location.="&PASSW=$contraseñaActual";
	}
	if ( !empty($_POST['pass1']) ) {
		$contraseña1=$_POST['pass1'];
		$location.="&PASSW1=$contraseña1";
	}
	if ( !empty($_POST['pass2']) ) {
		$contraseña2=$_POST['pass2'];
		$location.="&PASSW2=$contraseña2";
	}

	if (!empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
		$contraseñaActual=$_POST['pass'];
		$contraseña1=$_POST['pass1'];
		$contraseña2=$_POST['pass2'];
		$id = $_POST['id'];

		$sql="SELECT * FROM usuario WHERE permisoUsuario=3 AND password = '".$contraseñaActual."' ";
		$query=mysqli_query($conexion,$sql);
		if ($query){
			$cantRows=mysqli_num_rows($query);
			if ($cantRows > 0){
				if ($contraseña1==$contraseña2){
					$sql_password="UPDATE usuario SET password='$contraseña1' WHERE id='$id' ";
					$queryPassword=mysqli_query($conexion,$sql_password);
					if ($queryPassword){
						$exito="Se han guardado los cambios";
						header("Location: index.php?EXITO=$exito");
					}else{
						$error="Fallo la consulta $queryPassword";
						$location.="&ERROR=$error";
						header($location);
					}
				}else{
					$error="Fallo la consulta porque su nueva contraseña no coincide";
					$location.="&ERROR=$error";
					header($location);
				}	
			}else{
				$error="Fallo la consulta porque no se ingreso la contraseña actual correcta";
				$location.="&ERROR=$error";
				header($location);
			}	
		}else{
			$error="Fallo la consulta $query";
			$location.="&ERROR=$error";
			header($location);
		}
	}else{
		$error="Fallo la consulta porque no se ingreso alguno de los parametros";
		$location.="&ERROR=$error";
		header($location);
	}


 
?>