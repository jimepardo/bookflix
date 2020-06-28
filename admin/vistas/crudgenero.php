<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$borrado = (isset($_POST['borrado'])) ? $_POST['borrado'] : '';
$borrado2 = (isset($_POST['borrado2'])) ? $_POST['borrado2'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "SELECT * FROM genero WHERE nombreGenero='$nombre' AND borradoLogico='0' ";           
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data= $resultado->fetch()){
            $data="error";
        }else{
            $consulta = "INSERT INTO genero (nombreGenero) VALUES('$nombre') ";         
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT * FROM genero ORDER BY idGenero DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    case 2: //modificación
        $consulta = "SELECT * FROM genero WHERE nombreGenero='$nombre' AND borradoLogico='0' ";           
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data= $resultado->fetch()){
            $data="error";
        }else{
            $consulta = "UPDATE genero SET nombreGenero='$nombre' WHERE idGenero='$id' and borradoLogico='0' ";     
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM genero WHERE idGenero='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;        
    case 3://baja
        $consulta = "UPDATE genero SET borradoLogico='1' WHERE idGenero='$id'";     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM genero WHERE idGenero='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);                           
        break;   
    case 4:    
        $consulta = "SELECT * FROM genero ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;     
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
