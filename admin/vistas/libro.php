<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "SELECT * FROM libro";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final el formato json a AJAX
$conexion = NULL;