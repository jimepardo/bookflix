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
        $consulta = "SELECT * FROM editorial WHERE nombreEditorial='$nombre' AND borradoLogico='0' AND borradoParanoagregar='0' ";           
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data= $resultado->fetch()){
            $data="error";
        }else{
            $consulta = "INSERT INTO editorial (nombreEditorial) VALUES('$nombre') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT * FROM editorial ORDER BY idEditorial DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    case 2: //modificación
        $consulta = "SELECT * FROM editorial WHERE nombreEditorial='$nombre' AND borradoLogico='0' AND borradoParanoagregar='0' ";           
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data= $resultado->fetch()){
            $data="error";
        }else{
            $consulta = "UPDATE editorial SET nombreEditorial='$nombre' WHERE idEditorial='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM editorial WHERE idEditorial='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;        
    case 3://baja
        $consulta = "SELECT * FROM editorial WHERE idEditorial='$id' AND borradoLogico='1' ";           
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data= $resultado->fetch()){
            $data="error";
        }else{
            $consulta = "UPDATE editorial SET borradoLogico='1' WHERE idEditorial='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM editorial WHERE idEditorial='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);   
        }                        
        break;   
    case 4:    
        $consulta = "SELECT * FROM editorial ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5://baja y ocultar
        $consulta = "SELECT * FROM editorial WHERE idEditorial='$id' AND borradoParanoagregar='1' ";           
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data= $resultado->fetch()){
            $data="error";
        }else{
            $consulta = "UPDATE editorial SET borradoParanoagregar='1' WHERE idEditorial='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM editorial WHERE idEditorial='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
        }                          
        break;     
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
