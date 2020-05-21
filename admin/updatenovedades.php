<?php
    include "compararFechas.php";
	include "../BaseDatosYConex/conexion.php";
	header("Location: cargarnovedades.php");


if (isset($_POST['descripcion']) && !empty($_POST['descripcion']) ) {
		$nombre=$_POST['descripcion'];
	}else{
		$error="La novedad debe tener una descripcion";
		header("Location: cargarnovedades.php?ERRORDESC=$error");
        die();
    }
$desde=$_POST['desde'];
$isbn=$_POST['estado'];
$date=getdate();
$today=$date['year'];
$today.="-".$date['mon'];
$today.="-".$date['mday'];
    if (!empty($desde)) {
        if ( (compararFechas($today,$desde)<0) ) {
            $error="Las fecha no puede ser inferior al dia de hoy";
            header("Location: cargarnovedades.php?ERRORDESDE=$error");  
            die();
        }
        if (!empty($isbn)) {
            $sql="SELECT ISBN FROM libro Where ISBN=$isbn";
            $query=mysqli_query($conexion,$sql);
            if( (mysqli_num_rows($query))!=0 ){
                $sql="INSERT INTO `novedadlibro` (`idNovedadLibro`, `borradoLogico`, `fechaNovedad`, `idLibro`, `descripcion`) VALUES ('', '0', '$desde', '$isbn', '$nombre')";
                $query=mysqli_query($conexion,$sql);
                header("Location: cargarnovedades.php?exito");							
            }
        }else{
            $error="El isbn no puede estar vacio";
            header("Location: cargarnovedades.php?ERRORISBN=$error");	
        }			
    }else{
        $error="El principio del periodo no puede estar vacio";
        header("Location: cargarnovedades.php?ERRORDESDE=$error");	
    }	
?>