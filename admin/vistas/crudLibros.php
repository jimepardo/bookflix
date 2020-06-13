<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//include "compararFechas.php";

// Recepción de los datos enviados mediante POST desde el JS libro  
$data= "no entro a nada";
$hoy = date("Y-m-d");
$isbn = (isset($_POST['isbn'])) ? $_POST['isbn'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$desc = (isset($_POST['desc'])) ? $_POST['desc'] : '';
$borrado = (isset($_POST['borrado'])) ? $_POST['borrado'] : ''; 
$portada = (isset($_FILES['portada'])) ? $_FILES['portada'] : '';
//$fechaL = (isset($_POST['fechaLanzamiento'])) ? $_POST['fechaLanzamiento'] : '';
$idGen = (isset($_POST['idGen'])) ? $_POST['idGen'] : '';
$idAu = (isset($_POST['idAu'])) ? $_POST['idAu'] : '';
$idEd = (isset($_POST['idEd'])) ? $_POST['idEd'] : '';
$fechaD = (isset($_POST['fechaD'])) ? $_POST['fechaD'] : '';
$fechaH = (isset($_POST['fechaH'])) ? $_POST['fechaH'] : 'NULL';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$fechaL = date("Y-m-d");
$pathImg="bookImages/";


switch($opcion){
    case 1: //alta
        if ($fechaD< $hoy){
            $data="error1";
        }else{
            if( ($fechaH!="NULL") && ($fechaH < $fechaD) ){
                $data="error2";
            }else{
                $consulta="SELECT ISBN FROM libro WHERE ISBN= $isbn";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                if ($data= $resultado->fetch()){
                    $data="error3"; // isbn existente
                }else{
                    $fileTempName=$portada['tmp_name'];
                    $fileName=$portada['name'];
                    $fileExt= explode('.', $fileName);
                    $img=$fileExt[0];
                    $fileExtLow= strtolower(end($fileExt));
                    $fileNameNew= $isbn."-".$fileName;;
                    if (!is_int($fileNameNew)) {    // si no es error, devuelve el string
                        $path=$pathImg.$img;
                        $fileDestination = '../../bookImages/'.$img;
                        move_uploaded_file($fileTempName, $fileDestination);
                        //realizo la insercion
                        $consulta = "INSERT INTO libro (ISBN, nombreLibro, descripcionLibro, borradoLogico, portadaLibro, fechaLanzamiento, idGenero, idAutor, idEditorial, fechaDesde, fechaHasta) VALUES('$isbn', '$nombre', '$desc', '0', '$path', CURRENT_DATE(), '$idGen', '$idAu', '$idEd', '$fechaD', '$fechaH') ";          
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute(); 

                        $consulta = "SELECT * FROM libro ORDER BY ISBN DESC LIMIT 1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
                        $data="exito";                      
                    }else{
                        switch ($result){
                            case 1: 
                                $data="error4";// La portada pesa demasiado
                            break;
                            case 2:
                                $data="error5"; //Hubo un error al subir el archivo
                            break;
                            case 3: 
                                $data="error6"; // El tipo de la portada no esta permitido, intente con jpg 
                            break;
                        }
                    }
                }
            }
        }        
        break;
    case 2: //modificación
        $consulta = "UPDATE libro SET ISBN='$isbn', nombreLibro='$nombre', descripcionLibro='$desc', portadaLibro='$portada', idGenero='$idGen', idAutor='$idAu', idEditorial='$idEd', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE ISBN='$isbn' ";     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();       
        
        $consulta = "SELECT * FROM libro WHERE ISBN='$isbn' ";              
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
        break;        
    case 3://baja logica, solo modifica
        $consulta = "UPDATE libro SET borradoLogico='1' WHERE ISBN='$isbn' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                 
        
        $consulta = "SELECT * FROM libro WHERE ISBN='$isbn' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);         
        break;        
    case 4:    
        $consulta = "SELECT * FROM libro";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final el formato json a AJAX

$conexion = NULL;
