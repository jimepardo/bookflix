<?php
	include "BaseDatosYConex/conexion.php";
	session_start();
	$user=$_SESSION["EMAIL"];
	$userid= $_SESSION["USERID"];
	$link='formularioTarjeta.php?return';
	$empty = 0; 
	$campos= array("fecha","tarjeta","nombre","apellido","cvv" );//vector de names de los inputs
	for ($i=0; $i <count($campos) ; $i++) { 
		if ( empty($_POST[($campos[$i])]))  {				
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
		$plan=$_POST["plan"];
		$link.="&plan=".$plan;
		if ($plan==1) {
		$precio=160;
		}else{
			$precio=280;
		}
		$cant= $_POST["cvv"].$_POST["tarjeta"];
		if (strlen($cant)!=19) {
			$link.="&error-tarjeta=La tarjeta junto al codigo debe tener 19 numeros en total";
			header("Location: $link");
			die();
		}
		if ($_POST["tarjeta"]=="2222222222222222") {
			$link.="&error-tarjeta=La tarjeta no tiene fondos";
			header("Location: $link");
			die();
		}
		if ($_POST["tarjeta"]=="4444444444444444") {
			$link.="&error-tarjeta=Conexion fallida con el servidor del banco";
			header("Location: $link");
			die();
		}
		$cvv=intval($_POST["cvv"]);
		$tarjeta=($_POST["tarjeta"]);
		$fecha=$_POST["fecha"];
		$sql="SELECT * FROM tarjeta WHERE numero='$tarjeta'";
		$query=mysqli_query($conexion,$sql);
		$cantQ=mysqli_num_rows($query);
		if( ($cantQ)==0 ){
			$sql="INSERT INTO tarjeta (`numero`,`fechaVencimiento`,`cvv`)VALUES('$tarjeta','$fecha','$cvv')";
			$query=mysqli_query($conexion,$sql);
			$sql="UPDATE usuario SET numeroTarjeta = $tarjeta , permisoUsuario = $plan WHERE id = $userid";
			$query=mysqli_query($conexion,$sql);
			$sql="INSERT INTO suscripcion (`fechaSuscripcion`,`montoSuscripcion`,`idUsuario`)VALUES(current_date,$precio,'$userid')";
			$query=mysqli_query($conexion,$sql);
			header("Location: login.php?cuentaRegistrada");
			die();
		}else{
			$error="La tarjeta ya existe";
			$link.="&duplicado=$error";
			header("Location: $link");
			die();
		}
	}
     
?>