<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$borrado = (isset($_POST['borrado'])) ? $_POST['borrado'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$desde = (isset($_POST['desde'])) ? $_POST['desde'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$d=date("d");
$m=date("m");
$a=date("Y");
$hoy = date("Y-m-d");


switch($opcion){
    case 1: //alta
        if ($desde < $hoy){ //si desde es 6/6/20 y hoy es 6/6/20 
            $data="error";
        }else{
            $consulta = "INSERT INTO novedadgeneral (descripcion, fechaNovedad) VALUES('$descripcion', '$desde') ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT * FROM novedadgeneral ORDER BY idGeneral DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    }
        break;
    case 2: //modificación
        if($desde < $hoy){
            $data="error";
        }else{
            $consulta = "UPDATE novedadgeneral SET descripcion='$descripcion', fechaNovedad='$desde' WHERE idGeneral='$id' and borradoLogico='0' ";        
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM novedadgeneral WHERE idGeneral='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;        
    case 3://baja
        $consulta = "UPDATE novedadgeneral SET borradoLogico='$borrado' WHERE idGeneral='$id'";      
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM novedadgeneral WHERE idGeneral='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                           
        break;   
    case 4:    
        $consulta = "SELECT * FROM novedadgeneral";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;     
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
