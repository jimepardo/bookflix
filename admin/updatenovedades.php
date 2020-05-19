<?php
	include "../BaseDatosYConex/conexion.php";
	header("Location:cargarnovedades.php");


if (isset($_POST['descripcion']) ) {
		$nombre=$_POST['descripcion'];
		header("Location: cargarnovedades.php?exito");
	}else{
		$error="Debe estar seteada la variable";
		header("Location: cargarnovedades.php");

$desde=$_POST['desde'];
$isbn=$_POST['estado'];

    if (!empty($desde)) {
        if (!empty($estado)) {
            $sql="SELECT ISBN FROM libro Where ISBN=$isbn";
            $query=mysqli_query($conexion,$sql);
            if( (mysqli_num_rows($query))!=0 ){
                $sql="INSERT INTO `novedadlibro` (`idNovedadLibro`, `borradoLogico`, `fechaNovedad`, `idLibro`, `descripcion`) VALUES ('', '0', '$desde', '$isbn', '$nombre')";
                $query=mysqli_query($conexion,$sql);
                header("Location: cargarnovedades.php?exito");							
            }
        }else{
            $error="El isbn no puede estar vacio";
            header("Location : cargarnovedades.php?errorIsbn=$error");	
        }			
    }else{
        $error="El principio del periodo no puede estar vacio";
        header("Location: cargarnovedades.php?errorDesde=$error");	
    }	
?>
