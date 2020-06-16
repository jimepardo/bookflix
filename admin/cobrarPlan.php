<?php
	require "vistas/conexion.php";
	$objeto = new Conexion();
    $conexion = $objeto->Conectar();
	$sql="SELECT * FROM usuario WHERE numeroTarjeta like '%1'";
	$resultado = $conexion->prepare($sql);
    $resultado->execute(); 
 	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $valores) {
        $id=$valores['id'];      
    	$sql="UPDATE suscripcion SET borradoLogica = 1 WHERE idUsuario = $id";
		$resultado = $conexion->prepare($sql);
   		$resultado->execute(); 
    }
    header("Location: index.php?borrado")
?>