<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$novedad = (isset($_POST['novedad'])) ? $_POST['novedad'] : '';
$borrado = (isset($_POST['borrado'])) ? $_POST['borrado'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$desde = (isset($_POST['desde'])) ? $_POST['desde'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$hoy = date("Y-m-d");

switch($opcion){
    case 1: //alta
        if ($desde< $hoy){
            $data="error";
        }else{
                $consulta = "INSERT INTO novedadlibro (idLibro, descripcion, fechaNovedad) VALUES('$novedad', '$descripcion', '$desde') ";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute(); 

                $consulta = "SELECT n.*, l.nombreLibro, l.idLibro FROM novedadlibro n INNER JOIN libro l ON (l.idLibro=n.idLibro) ORDER BY l.idNovedadLibro DESC LIMIT 1";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            }
        break;
    case 2: //modificación
        if($desde < $hoy){
            $data="error";
        }else{
            $consulta = "UPDATE novedadlibro SET  descripcion='$descripcion', fechaNovedad='$desde', idLibro='$novedad' WHERE idNovedadLibro='$id' and borradoLogico=0 ";        
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT n.*, l.nombreLibro, l.idLibro FROM novedadlibro n INNER JOIN libro l ON (l.idLibro=n.idLibro) WHERE l.idNovedadLibro='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;        
    case 3://baja
        $consulta = "UPDATE novedadlibro SET borradoLogico='$borrado' WHERE idNovedadLibro='$id'";      
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT n.*, l.nombreLibro, l.idLibro FROM novedadlibro n INNER JOIN libro l ON (l.idLibro=n.idLibro) WHERE l.idNovedadLibro='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                           
        break;   
    case 4:    
        $consulta = "SELECT n.*, l.nombreLibro, l.idLibro FROM novedadlibro n INNER JOIN libro l ON (l.idLibro=n.idLibro)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;     
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
