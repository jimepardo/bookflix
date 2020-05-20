<?php
	include "../BaseDatosYConex/conexion.php";
	include "compararFechas.php";	
	$nombre=$_POST['nombre'];
	$desc=$_POST['desc'];
	$isbn=(int)$_POST['isbn'];
	$desde=$_POST['desde'];
	$hasta=$_POST['hasta'];
	$genero=$_POST['genero'];
	$autor=$_POST['autor'];
	$editorial=$_POST['editorial'];
	$pathImg="../bookImages/";
	if (!empty($nombre)) {
		if (!empty($desc)) {
			$result=uploadImg($isbn);
			if (!is_int($result)) {	
					$path=$pathImg.$result;		
					if (!empty($isbn)) {
						if (!empty($desde)) {
							if ($genero!=0) {
								if ($autor!=0) {
									if ( $editorial!=0) {
										if (empty($hasta)) {
											$hasta="NULL";
											//header("Location: cargarlibro.php?vacio");
										}else if ( (compararFechas($desde,$hasta)<0) ) {
											$error="Las fechas no deben cruzarse";
											header("Location: cargarlibro.php?errorDesde=$error");		
										}
										$sql="SELECT ISBN FROM libro Where ISBN=$isbn";
										$query=mysqli_query($conexion,$sql);
										if( (mysqli_num_rows($query))!=0 ){
											$error="El isbn no es unico";
											header("Location: cargarlibro.php?errorIsbn=$error");		
										}
										$sql="INSERT INTO `libro` (`ISBN`, `nombreLibro`, `descripcionLibro`, `borradoLogico`, `portadaLibro`, `fechaLanzamiento`, `idGenero`, `idAutor`, `idEditorial`, `fechaDesde`, `fechaHasta`) VALUES ('$isbn', '$nombre', '$desc', '0', '$path', CURRENT_DATE(), '$genero', '$autor', '$editorial', '$desde', $hasta)";
										$query=mysqli_query($conexion,$sql);
										header("Location: cargarlibro.php?exito=$query");											
																		
									}else{
										$error="Debe seleccionar una editorial";
										header("Location: cargarlibro.php?errorEditorial=$error");		
									}
								}else{
									$error="Debe seleccionar un autor";
									header("Location: cargarlibro.php?errorAutor=$error");		
								}
								
							}else{
								$error="Debe seleccionar un genero";
								header("Location: cargarlibro.php?errorGenero=$error");	
							}					
						}else{
							$error="El principio del periodo no puede estar vacio";
							header("Location: cargarlibro.php?errorDesde=$error");		
						}
					}else{
						$error="El isbn no puede estar vacio";
						header("Location: cargarlibro.php?errorIsbn=$error");		
					}

				}else{
					header("Location: cargarlibro.php?resultado=$result");
					switch ($result) {
						case 1:
							$error="La portada pesa demasiado";
							header("Location: cargarlibro.php?errorPortada=$error");		
						  	break;

						case 2:
							$error="Hubo un error al subir el archivo";
							header("Location: cargarlibro.php?errorPortada=$error");		
							break;

						case 3:
							$error="El tipo de la portada no esta permitido, intente con jpg";
							header("Location: cargarlibro.php?errorPortada=$error");		
							break;

						case 4:
							$error="Debe incluir una portada";
							header("Location: cargarlibro.php?errorPortada=$error");		
							break;
					}
				}
			}else{
				$error="La descripcion no puede estar vacia";
				header("Location: cargarlibro.php?errorDesc=$error");	
			}
	}else{
		$error="El nombre no puede estar vacio";
		header("Location: cargarlibro.php?errorNombre=$error");
	}
?>