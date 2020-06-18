<?php
include_once "BaseDatosYConex/conexion.php";
session_start();

$conexion = mysqli_connect('localhost','root','','bookflix');

$sql="UPDATE leyendo SET borradoLogico='1' WHERE idCapitulo='".$_GET['num']."' AND idLibro='".$_GET['id']."' AND idPerfil='".$_GET['nombrePerfil']."'  ";
$query=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($query);

$sql2="SELECT nombreLibro FROM libro WHERE idLibro='".$_GET['id']."' AND borradoLogico='0'";
$query2=mysqli_query($conexion,$sql2);
$mostrar2=mysqli_fetch_array($query2);
$id=$_GET['id'];
$nom=$mostrar2['nombreLibro'];
header("Location: detallelibro.php?nombreLibro=$nom&idLibro=$id ");
?>