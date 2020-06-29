<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS libro  spaksoa
$data= "no entro a nada";
$hoy = date("Y-m-d");
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : ''; 

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$desde = (isset($_POST['desde'])) ? $_POST['desde'] : '';
$hasta = (isset($_POST['hasta'])) ? $_POST['hasta'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';



switch($opcion){
    case 1: //todos los usuarios
        $consulta = "SELECT * FROM usuario WHERE permisoUsuario !='3' AND borradoLogico='0'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        $consulta = "SELECT id, nombreUsuario, emailUsuario, fechaReg, permisoUsuario FROM usuarios WHERE borradoLogico='0' AND permisoUsuario !='3' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();       
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;       
    case 2:           
        $consulta = "SELECT * FROM usuario WHERE fechaReg BETWEEN '$desde' AND '$hasta' AND permisoUsuario !='3' AND borradoLogico='0'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  
        
        $consulta = "SELECT * FROM usuario WHERE permisoUsuario !='3' AND borradoLogico='0'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
    break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final el formato json a AJAX

$conexion = NULL;
?>