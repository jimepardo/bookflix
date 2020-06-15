<?php
session_start();
include('conexion.php');
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");

$sql2="SELECT nombrePerfil from leyendo where idLibro = '".$_GET['id']."' AND nombrePerfil = '" .$_GET['nombrePerfil']."' ";
$result2=mysqli_query($conexion,$sql2);

if( mysqli_num_rows($result2) == 0 ){

$sql1= "INSERT INTO leyendo(idPerfil, idLibro) VALUES ('" .$_GET['nombrePerfil']."','" .$_GET['id']."')";
mysqli_query($conexion,$sql1);

}

$sql="SELECT pdf FROM capitulo WHERE idLibro = '".$_GET['id']."' AND numeroCapitulo = '".$_GET['numeroCapitulo']."' ";
$result=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($result);
readfile('/pdfs/'.$mostrar['pdf']);

/*SELECT p.nombrePerfil, p.idPerfil FROM perfil p INNER JOIN leyendo ley ON (ley.idPerfil= p.idPerfil) INNER JOIN libro l ON (ley.idLibro = l.idLibro) WHERE p.idLibro = '".$_GET['id']."' AND p.nombrePerfil = '" .$_GET['nombrePerfil']."' "sql2 */
?>

