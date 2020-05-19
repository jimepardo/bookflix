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
						echo "Fallo la consulta $queryPassword";
					}
				}else{
					echo "Fallo la consulta porque $contraseña1 es distinta a $contraseña2";
				}	
			}else{
				echo "Fallo la consulta porque no se ingreso la contraseña actual correcta";
			}	
		}else{
			echo "Fallo la consulta $query";
		}
	}else{
		echo "Fallo la consulta porque no se ingreso alguno de los parametros";
	}


 
?>