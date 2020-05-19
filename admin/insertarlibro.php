<?php
	include "../BaseDatosYConex/conexion.php";
	header("Location:cargarlibro.php");
	if (isset($_POST['nombre'])) {
		$nombre=$_POST['nombre'];
		header("Location: cargarlibro.php?exito");
	}else{
		$error="Debe estar seteada la variable";
		header("Location: cargarlibro.php");
	}
	$nombre=$_POST['nombre'];
	$desc=$_POST['desc'];
	$portada=$_POST['portada'];
	$isbn=$_POST['isbn'];
	$desde=$_POST['desde'];
	$hasta=$_POST['hasta'];
	$genero=$_POST['genero'];
	$autor=$_POST['autor'];
	$editorial=$_POST['editorial'];
	if (!empty($nombre)) {
		if (!empty($desc)) {
			if (!empty($isbn)) {
				if (!empty($desde)) {
					if ($genero!=0) {
						if ($autor!=0) {
							if ( $editorial!=0) {
								if (empty($hasta)) {
									$hasta="NULL";
								}else if ($desde>$hasta) {
										$error="Las fechas no deben cruzarse";
										header("Location : cargarlibro.php?errorDesde=$error");		
								}
								$sql="SELECT ISBN FROM libro Where ISBN=$isbn";
								$query=mysqli_query($conexion,$sql);
								if( (mysqli_num_rows($query))!=0 ){
									$error="El isbn no es unico";
									header("Location : cargarlibro.php?errorIsbn=$error");		
								}else{
									$sql="INSERT INTO `libro` (`ISBN`, `nombreLibro`, `descripcionLibro`, `borradoLogico`, `portadaLibro`, `fechaLanzamiento`, `idGenero`, `idAutor`, `idEditorial`, `fechaDesde`, `fechaHasta`) VALUES ('$isbn', '$nombre', '$desc', '0', '', CURRENT_DATE(), '$genero', '$autor', '$editorial', '$desde', $hasta)";
									$query=mysqli_query($conexion,$sql);
									header("Location: cargarlibro.php?exito");
								}								
							}else{
								$error="Debe seleccionar una editorial";
								header("Location : cargarlibro.php?errorEditorial=$error");		
							}
						}else{
							$error="Debe seleccionar un autor";
							header("Location : cargarlibro.php?errorAutor=$error");		
						}
						
					}else{
						$error="Debe seleccionar un genero";
						header("Location : cargarlibro.php?errorGenero=$error");	
					}					
				}else{
					$error="El principio del periodo no puede estar vacio";
					header("Location : cargarlibro.php?errorDesde=$error");		
				}
			}else{
				$error="El isbn no puede estar vacio";
				header("Location : cargarlibro.php?errorIsbn=$error");		
			}		
		}else{
			$error="La descripcion no puede estar vacia";
			header("Location : cargarlibro.php?errorDesc=$error");	
		}		
	}else{
		$error="El nombre no puede estar vacio";
		header("Location : cargarlibro.php?errorNombre=$error");
	}
?>