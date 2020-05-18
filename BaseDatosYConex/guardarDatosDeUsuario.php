<?php 
  include "conexion.php";
  $conexion = mysqli_connect('localhost','root','','bookflix'); //si lo hay , devuelve su tabla
  $pass= $_POST['pass'];
  $nombreUsuario= $_POST['nombreUsuario'];
  $email= $_POST['email'];
  $consulta="UPDATE usuario 
             SET nombreUsuario =" . $nombreUsuario . ", emialUsuario=".$email.",password=" .$pass."
             WHERE borradoLogico = 0 AND id =" . $_SESSION['id'] . " "; //sino devuelve falso
  $result = mysqli_query($conexion,$consulta);						
  if (mysqli_num_rows($result) == 1){
		header("Location: ../listarDatosDeUsuario.php");
  }
  else{			
	$error=" no se pudo modificar los datos del usuario especificado";
	header("Location: ../listarDatosDeUsuario.php?ERROR=$error");
  }

?>


