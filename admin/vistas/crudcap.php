<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//include "compararFechas.php";

// Recepción de los datos enviados mediante POST desde el JS libro  
$data= "no entro a nada";
$hoy = date("Y-m-d");
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$num = (isset($_POST['num'])) ? $_POST['num'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$borrado = (isset($_POST['borrado'])) ? $_POST['borrado'] : ''; 
$pdf = (isset($_FILES['pdf'])) ? $_FILES['pdf'] : '';
$vistaprevia = (isset($_FILES['vistaprevia'])) ? $_FILES['vistaprevia'] : '';
$libro = (isset($_POST['libro'])) ? $_POST['libro'] : '';
$fechaD = (isset($_POST['fechaD'])) ? $_POST['fechaD'] : '';
$fechaH = (isset($_POST['fechaH'])) ? $_POST['fechaH'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

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
                $data="error1"; //error la fecha desde es menor a la fecha Hasta               
        }else{
            $consulta1= "SELECT fechaD FROM libro WHERE idLibro=$libro";
            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();
            if ($data= $resultado1->fetch()){
                $result2= compararFechas($fechaD,$data);
            }



            else{
                $nomPdf=$_FILES['pdf']["name"];
                $tipoPdf=$_FILES['pdf']['type'];
                $tamanio=$_FILES['pdf']['size'];
              
                $nombrePdf= $id."-".$libro."-".$nomPdf;
                if ($tamanio<= 999999){
                    if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen
                        //$path=$pathImg.$isbn.$archName;
                        $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                        //$fileDestination = '../../'.$path;
                        //$carpetaDestino= $carpetaDestino.$nombreImagen;
                        //Mover imagen del directorio temporal al directorio escogido
                        move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
                        //vista previa opcional
                        if (isset ($_FILES['vistaprevia'])){
                            $nomVp=$_FILES['vistaprevia']["name"];
                            $tipovistaprevia=$_FILES['vistaprevia']['type'];
                            $tamanio=$_FILES['vistaprevia']['size'];
                          
                            $nombreVprevia= $id."-".$libro."-".$nomVp;
                            if ($tamanio<= 999999){
                                if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen
                                    //$path=$pathImg.$isbn.$archName;
                                    $carpetaDestino2=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                                    //$fileDestination = '../../'.$path;
                                    //$carpetaDestino= $carpetaDestino.$nombreImagen;
                                    //Mover imagen del directorio temporal al directorio escogido
                                    move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino2.$nombreVprevia);
                                    //realizo la insercion
                                }else{
                                    $data="error3"; // no es un archivo pdf
                                }
                            }else{
                                $data="error4"; // el pdf pesa mucho
                            }
                        }
                        
                        $consulta = "INSERT INTO capitulo (numeroCapitulo, nombreCapitulo, borradoLogico, pdf, pdfPrevisualizacion, idLibro, fechaDesde, fechaHasta) VALUES('$num', '$nombre', '0', '$nombrePdf', '$nombreVprevia', '$libro', '$fechaD', '$fechaH')";          
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute(); 

                        $consulta = "SELECT * FROM capitulo ORDER BY idCapitulo DESC LIMIT 1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $data="error6"; // El tipo de la pdf no esta permitido, intente con jpg 
                    }
                }else{
                    $data="error4";// La pdf pesa demasiado
                }
            }
        }
                
        break;
    case 2: //modificación
        $result= compararFechas($fechaD,$fechaH);
        if ( $result < 0 ) {
                $data="error2";
        }else{
            $consulta = "UPDATE capitulo SET numeroCapitulo='$num', nombreCapitulo= '$nombre', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idCapitulo='$id' AND borradoLogico=0   ";     
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();       
            
            $consulta = "SELECT * FROM capitulo WHERE idCapitulo='$id' ";              
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
        }
        break;        
    case 3://baja logica, solo modifica
        $consulta = "UPDATE capitulo SET borradoLogico='$borrado' WHERE idCapitulo='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                 
        
        $consulta = "SELECT * FROM capitulo WHERE idCapitulo='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);         
        break;        
    case 4:    
        $consulta = "SELECT * FROM capitulo";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final el formato json a AJAX

$conexion = NULL;
?>