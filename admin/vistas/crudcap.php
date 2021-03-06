<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS libro  spaksoa
$data= "no entro a nada";
$hoy = date("Y-m-d");
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$num = (isset($_POST['num'])) ? $_POST['num'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$borrado = (isset($_POST['borrado'])) ? $_POST['borrado'] : ''; 
$pdf = (isset($_FILES['pdf'])) ? $_FILES['pdf'] : '';

$libro = (isset($_POST['libro'])) ? $_POST['libro'] : '';
$fechaD = (isset($_POST['fechaD'])) ? $_POST['fechaD'] : '';
$fechaH = (isset($_POST['fechaH'])) ? $_POST['fechaH'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$ter = (isset($_POST['ter'])) ? $_POST['ter'] : '';
if (empty($fechaH)){
    $fechaH="NULL";
}
else{
    //$fechaH="'$fechaH'";
}


function compararFechas1($primera, $segunda)// desde y hasta del capitulo
 {

    
  if ($segunda == 'NULL' || empty($segunda)) {
      return 0;
  }else if( empty($primera) || $primera== 'NULL'){
        return -1;
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

function compararFechasD($libro, $capitulo)// libroDesde y capituloDesde
 {
    if ($libro<=$capitulo){
        return 1;//sigue ejecutando
    }else{
        return -1; // error libroDesde>capDesde
    }
 }

 function compararFechasDH($desde, $hasta)// capituloDesde y capituloHasta
 {
    if ($hasta=="NULL"){
        return 1; // sigo ejecutando
    }else{
        if($desde<=$hasta){
            return 1; // sigue ejecutando
        }else{
            return -1; // sino error desde> hasta
        } 
    }
 }

function compararFechasHH($capitulo, $libro)// capituloHasta y libroHasta
{

    if(empty($libro) || $libro == "NULL"){
        return 1;
    }
    if ($capitulo == "NULL"){
        if (empty($libro) || $libro == "NULL"){
            return 1; // sigo ejecutando
        }else{
            return -1; //error capituloHasta > libroHasta
        }
    }else{
        if ($capitulo <= $libro){
            return 1; // sigo ejecutando 
        }else{
            return -1; //error capituloHasta > libroHasta
        }
    }
}

switch($opcion){
    case 1: //alta
        $consulta="SELECT * FROM capitulo WHERE numeroCapitulo='$num' AND idLibro='$libro' AND borradoLogico='0' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if ($data=$resultado->fetch()){
            $data="error4";
        }else{
           $consulta2="SELECT DISTINCT fechaDesde, fechaHasta FROM libro WHERE idLibro='$libro' ";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();
        $fechas= $resultado2->fetch();
        $libroDesde=$fechas['fechaDesde'];
        $libroHasta=$fechas['fechaHasta'];
        $result= compararFechasD($libroDesde,$fechaD);
        if($result < 0){
            $data="error2";  // libroDesde> capituloDesde
        }else{
            $result2=compararFechasHH($fechaH,$libroHasta);
            if ($result2 < 0){
                $data="error1"; //capituloDesde > libroHasta
            }else{
                $result3=compararFechasDH($fechaD,$fechaH);
                if ($result3 < 0){
                    $data="error3"; // capituloHasta > capituloHasta
                }else{
                        $nomPdf=$_FILES['pdf']["name"];
                        $tipoPdf=$_FILES['pdf']['type'];
                        $tamanio=$_FILES['pdf']['size'];                  
                        $nombrePdf= $num."-".$nomPdf;
                        if ($tamanio<= 1262074){
                            if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen   
                                $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                                //Mover imagen del directorio temporal al directorio escogido
                                move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
                                $consulta = "INSERT INTO capitulo (numeroCapitulo, nombreCapitulo, borradoLogico, pdf, idLibro, fechaDesde, fechaHasta) VALUES('$num', '$nombre', '0', '$nombrePdf', '$libro', '".$fechaD."', ".$fechaH.")";       
                                $resultado = $conexion->prepare($consulta);
                                $resultado->execute();       
                                
                                $consulta = "SELECT c.*,l.nombreLibro, l.idLibro, l.borradoLogico AS borradoLibro, l.terminar FROM capitulo c INNER JOIN libro l ON (c.idLibro=l.idLibro) WHERE c.idCapitulo='$id' AND l.borradoLogico='0' ";              
                                $resultado = $conexion->prepare($consulta);
                                $resultado->execute();
                                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                            }else{
                                $data="error5"; // El tipo de la portada no esta permitido, intente con jpg 
                            }
                        }else{
                            $data="error6";// La portada pesa demasiado
                        }
                    }
                }
            } 
        }
        

        break;
    case 2: //modificacion
        /*  $consulta2="SELECT DISTINCT fechaDesde, fechaHasta FROM libro WHERE idLibro='$libro'";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();
        $fechas= $resultado2->fetch();*/
        if (isset($_POST['ter'])){
                $termina= '1';
        }else{
                $termina='0';
        }
        
        $consulta2="SELECT DISTINCT fechaDesde, fechaHasta FROM libro WHERE idLibro='$libro' ";
        $resultado2 = $conexion->prepare($consulta2);
        $resultado2->execute();
        $fechas= $resultado2->fetch();
        $libroDesde=$fechas['fechaDesde'];
        $libroHasta=$fechas['fechaHasta'];
        $consulta="SELECT * FROM capitulo WHERE numeroCapitulo='$num' AND borradoLogico='0' AND idLibro='$libro' AND NOT EXISTS (SELECT * FROM capitulo WHERE idCapitulo='$id' AND numeroCapitulo='$num') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        if($data=$resultado->fetchAll(PDO::FETCH_ASSOC)){
            $data="error4";
        }else{
            
            $result= compararFechasD($libroDesde,$fechaD);
            if($result < 0){
                $data="error2";  // libroDesde> capituloDesde
            }else{
                $result2=compararFechasHH($fechaH,$libroHasta);
                if ($result2 < 0){
                    $data="error1"; //capituloDesde > libroHasta
                }else{
                    $result3=compararFechasDH($fechaD,$fechaH);
                    if ($result3 < 0){
                        $data="error3"; // capituloHasta > capituloHasta
                    }else{
                        if ($_FILES['pdf']['name'] != null){
                            $nomPdf=$_FILES['pdf']["name"];
                            $tipoPdf=$_FILES['pdf']['type'];
                            $tamanio=$_FILES['pdf']['size'];
                        
                            $nombrePdf= $num."-".$nomPdf;
                            if ($tamanio<= 1262074){
                                if ($tipoPdf=="application/pdf" || $tipoPdf=="pdf") {    // compara que sea un tipo correcto de imagen   
                                    $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                                    //Mover imagen del directorio temporal al directorio escogido
                                    move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
                                    
                                    $consulta = "UPDATE capitulo, libro SET capitulo.numeroCapitulo='$num', capitulo.nombreCapitulo= '$nombre', capitulo.pdf='$nombrePdf', capitulo.fechaDesde='$fechaD', capitulo.fechaHasta='$fechaH', libro.terminar='$termina' WHERE capitulo.idCapitulo='$id' AND capitulo.borradoLogico='0'   ";  

                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();       
                                    
                                    $consulta = "SELECT c.*,l.nombreLibro, l.idLibro, l.terminar, l.borradoLogico AS borradoLibro FROM capitulo c INNER JOIN libro l ON (c.idLibro=l.idLibro) WHERE c.idCapitulo='$id' ";              
                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                }else{
                                    $data="error5"; // El tipo de la portada no esta permitido, intente con jpg 
                                }
                            }else{
                                $data="error6";// La portada pesa demasiado
                            }
                        }else{
                            $consulta = "UPDATE capitulo SET numeroCapitulo='$num', nombreCapitulo= '$nombre', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idCapitulo='$id' AND borradoLogico='0'   ";     
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute(); 
                            $consulta = "UPDATE libro SET terminar='$termina' WHERE idLibro='$libro' AND borradoLogico='0'   ";     
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();       
                            
                            $consulta = "SELECT c.*,l.nombreLibro, l.idLibro, l.terminar, l.borradoLogico AS borradoLibro FROM capitulo c INNER JOIN libro l ON (c.idLibro=l.idLibro) WHERE c.idCapitulo='$id' ";              
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();
                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        }
                    }
                }
            }
       
        }
        break;        
    case 3://verifica que el capitulo no este siendo leido
        $consulta = "SELECT COUNT(*) as cantidad FROM leyendo ley INNER JOIN capitulo c ON (c.idCapitulo=ley.idCapitulo) WHERE ley.idLibro='$libro' AND ley.idCapitulo='$id' AND ley.borradoLogico='0' AND c.numeroCapitulo='$num'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $data= $resultado->fetchAll(PDO::FETCH_ASSOC);
        if ($data[0]["cantidad"]> 0){
            $data="errorleyendo";
        }
         
        break;        
    case 4:    

        $consulta = "SELECT c.*,l.nombreLibro, l.idLibro, l.terminar, l.borradoLogico as borradoLibro FROM capitulo c INNER JOIN libro l ON (c.idLibro=l.idLibro) ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "UPDATE capitulo SET borradoLogico='1' WHERE idCapitulo='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                 
        
        $consulta = "SELECT c.*,l.nombreLibro, l.idLibro, l.terminar, l.borradoLogico AS borradoLibro FROM capitulo c INNER JOIN libro l ON (c.idLibro=l.idLibro) WHERE c.idCapitulo='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final el formato json a AJAX

$conexion = NULL;
?>