<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//include "compararFechas.php";

// Recepción de los datos enviados mediante POST desde el JS libro  
$data= "no entro a nada";
$hoy = date("Y-m-d");
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
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
$fechaH = (isset($_POST['fechaH'])) ? $_POST['fechaH'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$fechaL = date("Y-m-d");
//$archName= (isset($_FILES['portada'])) ? $_FILES['portada']["name"] : '';
//$pathImg="bookImages/";

function compararFechas($primera, $segunda)
 {
  if ($segunda == "0000-00-00" || empty($segunda)) {
      return 0;
  }else{
      $valoresPrimera = explode ("-", $primera);   
      $valoresSegunda = explode ("-", $segunda); 
      $anyoPrimera    = intval($valoresPrimera[0]);  
      $mesPrimera  = intval($valoresPrimera[1]);  
      $diaPrimera   = intval($valoresPrimera[2]); 
      $anyoSegunda   = intval($valoresSegunda[0]);  
      $mesSegunda = intval($valoresSegunda[1]);  
      $diaSegunda  = intval($valoresSegunda[2]);
      $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
      $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);
      if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
        // "La fecha ".$primera." no es v&aacute;lida";
        return -1;
      }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
        // "La fecha ".$segunda." no es v&aacute;lida";
        return -1;
      }else{
        return  $diasSegundaJuliano - $diasPrimeraJuliano ;
      } 
  }

}

switch($opcion){
    case 1: //alta
        $result= compararFechas($fechaD,$fechaH);
        if ( $result < 0 ) {
                $data="error2";                
        }else{
            $consulta="SELECT ISBN FROM libro WHERE ISBN= $isbn";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            if ($data= $resultado->fetch()){
                $data="error3"; // isbn existente
            }else{
                $nombreIm=$_FILES['portada']["name"];
                $tipoImagen=$_FILES['portada']['type'];
                $tamanio=$_FILES['portada']['size'];
              
                $nombreImagen= $isbn.$nombreIm;
                if ($tamanio<= 30000000){
                    if (($tipoImagen=="image/jpg") || ($tipoImagen =="image/png") || ($tipoImagen=="image/jpeg") ) {    // compara que sea un tipo correcto de imagen
                        //$path=$pathImg.$isbn.$archName;
                        $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/bookImages/';

                        //$fileDestination = '../../'.$path;
                        //$carpetaDestino= $carpetaDestino.$nombreImagen;
                        //Mover imagen del directorio temporal al directorio escogido
                        move_uploaded_file($_FILES['portada']['tmp_name'], $carpetaDestino.$nombreImagen);
                        //realizo la insercion
                        $consulta = "INSERT INTO libro (ISBN, nombreLibro, descripcionLibro, borradoLogico, portadaLibro, fechaLanzamiento, idGenero, idAutor, idEditorial, fechaDesde, fechaHasta) VALUES('$isbn', '$nombre', '$desc', '0', '$nombreImagen', CURRENT_DATE, '$idGen', '$idAu', '$idEd', '$fechaD', '$fechaH') ";          
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute(); 

                        $consulta = "SELECT g.idGenero,g.nombreGenero, a.idAutor, a.nombreAutor, e.idEditorial, e.nombreEditorial, l.* FROM libro l INNER JOIN autor a ON (a.idAutor=l.idAutor) INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN genero g ON (g.idGenero=l.idGenero) ORDER BY l.idLibro DESC LIMIT 1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $data="error6"; // El tipo de la portada no esta permitido, intente con jpg 
                    }
                }else{
                    $data="error4";// La portada pesa demasiado
                }
            }
        }
                
        break;
    case 2: //modificación
        $result= compararFechas($fechaD,$fechaH);
        if ( $result < 0 ) {
                $data="error2";
        }else{
            if ($_FILES['portada']['name'] != null){

                $nombreIm=$_FILES['portada']["name"];
                $tipoImagen=$_FILES['portada']['type'];
                $tamanio=$_FILES['portada']['size'];
              
                $nombreImagen= $isbn.$nombreIm;
                if ($tamanio<= 30000000){
                    if (($tipoImagen=="image/jpg") || ($tipoImagen =="image/png") || ($tipoImagen=="image/jpeg")) {    // compara que sea un tipo correcto de imagen
                        //$path=$pathImg.$isbn.$archName;
                        $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/bookImages/';

                        //$fileDestination = '../../'.$path;
                        //$carpetaDestino= $carpetaDestino.$nombreImagen;
                        //Mover imagen del directorio temporal al directorio escogido
                        move_uploaded_file($_FILES['portada']['tmp_name'], $carpetaDestino.$nombreImagen);
                        //realizo la insercion
                        $consulta = "UPDATE libro SET nombreLibro='$nombre', descripcionLibro='$desc', portadaLibro='$nombreImagen', idGenero='$idGen', idAutor='$idAu', idEditorial='$idEd', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idLibro='$id' AND borradoLogico=0   ";     
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();       
                        
                        $consulta = "SELECT g.idGenero,g.nombreGenero, a.idAutor, a.nombreAutor, e.idEditorial, e.nombreEditorial, l.* FROM libro l INNER JOIN autor a ON (a.idAutor=l.idAutor) INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN genero g ON (g.idGenero=l.idGenero) WHERE l.idLibro='$id' ";              
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
                    }else{
                        $data="error6"; // El tipo de la portada no esta permitido, intente con jpg 
                    }
                }else{
                    $data="error4";// La portada pesa demasiado
                }

            }else{
                $consulta = "UPDATE libro SET nombreLibro='$nombre', descripcionLibro='$desc', idGenero='$idGen', idAutor='$idAu', idEditorial='$idEd', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idLibro='$id' AND borradoLogico=0   ";     
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();       
                
                $consulta = "SELECT g.idGenero,g.nombreGenero, a.idAutor, a.nombreAutor, e.idEditorial, e.nombreEditorial, l.* FROM libro l INNER JOIN autor a ON (a.idAutor=l.idAutor) INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN genero g ON (g.idGenero=l.idGenero) WHERE l.idLibro='$id' ";              
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
            }
                
            }
        break;        
    case 3://consulta si lo esta leyendo
        $consulta = "SELECT COUNT(*) as cantidad FROM leyendo ley INNER JOIN libro l ON (l.idLibro=ley.idLibro) WHERE ley.idLibro='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $data= $resultado->fetchAll(PDO::FETCH_ASSOC);
        if ($data[0]["cantidad"]> 0){
            $data="errorleyendo";
        }
        break;        
    case 4:    
        $consulta = "SELECT g.idGenero,g.nombreGenero, a.idAutor, a.nombreAutor, e.idEditorial, e.nombreEditorial, l.* FROM libro l INNER JOIN autor a ON (a.idAutor=l.idAutor) INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN genero g ON (g.idGenero=l.idGenero)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "UPDATE libro SET borradoLogico='1' WHERE idLibro='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                 
        
        $consulta = "SELECT g.idGenero,g.nombreGenero, a.idAutor, a.nombreAutor, e.idEditorial, e.nombreEditorial, l.* FROM libro l INNER JOIN autor a ON (a.idAutor=l.idAutor) INNER JOIN editorial e ON (e.idEditorial=l.idEditorial) INNER JOIN genero g ON (g.idGenero=l.idGenero) WHERE l.idLibro='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
    break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final el formato json a AJAX

$conexion = NULL;
?>