<?php
	include_once "BaseDatosYConex/conexion.php";


	if (!empty($_POST['pass']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
		$contraseñaActual=$_POST['pass'];
		$contraseña1=$_POST['pass1'];
		$contraseña2=$_POST['pass2'];
		$id = $_POST['id'];

		$sql="SELECT * FROM usuario WHERE (permisoUsuario=1 OR permisoUsuario=2)  AND password = '".$contraseñaActual."' ";
		$query=mysqli_query($conexion,$sql);
		if ($query){
			$cantRows=mysqli_num_rows($query);
			if ($cantRows > 0){
				if ($contraseña1==$contraseña2){
					$sql_password="UPDATE usuario SET password='$contraseña1' WHERE id='$id' ";
					$queryPassword=mysqli_query($conexion,$sql_password);
					if ($queryPassword){
						echo "Se modifico la contraseña";
						header("Location: modificarcuenta.php");
					}else{
						$error="Fallo la consulta $queryPassword";
						header("Location: cambiarpass.php?ERROR=$error");
					}
				}else{
					$error="Fallo la consulta porque sus nuevas contraseñas no coinciden";
					header("Location: cambiarpass.php?ERROR=$error");
				}	
			}else{
				$error="Fallo la consulta porque no se ingreso la contraseña actual correcta";
				header("Location: cambiarpass.php?ERROR=$error");
			}	
		}else{
			$error="Fallo la consulta $query";
			header("Location: cambiarpass.php?ERROR=$error");
		}
	}else{
		$error="Fallo la consulta porque no se ingreso alguno de los parametros";
		header("Location: cambiarpass.php?ERROR=$error");
	}


 
?>