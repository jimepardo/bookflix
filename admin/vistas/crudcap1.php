<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS libro  
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
                $data="error1"; //error la fecha hasta es menor a la fecha desde ingresada              
        }else{ //si las fechas estan bien y el numero de capitulo no se repiten para ese libro seleccionado entonces pregunto por los pdf y agrego
            
            $consulta="SELECT * FROM capitulo WHERE numeroCapitulo='$num' AND idLibro='$libro'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            if ($data= $resultado->fetch()){
                $data="error2"; // numero de capitulo existente
            }else{
                if($_FILES['pdf']['name'] != null){
                    $nomPdf=$_FILES['pdf']["name"];
                    $tipoPdf=$_FILES['pdf']['type'];
                    $tamanio=$_FILES['pdf']['size'];
                
                    $nombrePdf= $num."-".$nomPdf;
                    if ($tamanio<= 1262074){
                        if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen   
                            $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                            //Mover imagen del directorio temporal al directorio escogido
                            move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
                            $consulta = "INSERT INTO capitulo (numeroCapitulo, nombreCapitulo, borradoLogico, pdf, idLibro, fechaDesde, fechaHasta) VALUES('$num', '$nombre', '0', '$nombrePdf', '$libro', '$fechaD', '$fechaH')";          
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute(); 

                            $consulta = "SELECT * FROM capitulo ORDER BY idCapitulo DESC LIMIT 1";
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();
                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        }else{
                            $data="error3"; // El tipo de la portada no esta permitido, intente con jpg 
                        }
                    }else{
                        $data="error4";// La portada pesa demasiado
                    }
                }                
            }
        } 
        
                
        break;
    case 2: //modificación

	    $result= compararFechas($fechaD,$fechaH);
	        if ( $result < 0 ) {
	                $data="error1"; //error la fecha hasta es menor a la fecha desde ingresada              
	        }else{ //si las fechas estan bien y el numero de capitulo no se repiten para ese libro seleccionado entonces pregunto por los pdf y agrego
	            
	            $consulta="SELECT * FROM capitulo WHERE numeroCapitulo='$num' AND idLibro='$libro'";
	            $resultado = $conexion->prepare($consulta);
	            $resultado->execute();
	            if ($data= $resultado->fetch()){
	                $data="error2"; // numero de capitulo existente
	            }else{
	                if($_FILES['pdf']['name'] != null){
	                    $nomPdf=$_FILES['pdf']["name"];
	                    $tipoPdf=$_FILES['pdf']['type'];
	                    $tamanio=$_FILES['pdf']['size'];
	                
	                    $nombrePdf= $num."-".$nomPdf;
	                    if ($tamanio<= 1262074){
	                        if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen   
	                            $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

	                            //Mover imagen del directorio temporal al directorio escogido
	                            move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
	                            $consulta = "UPDATE capitulo SET numeroCapitulo='$num', nombreCapitulo= '$nombre', pdf='$nombrePdf', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idCapitulo='$id' AND borradoLogico='0'";       
	                            $resultado = $conexion->prepare($consulta);
	                            $resultado->execute(); 

	                            $consulta = "SELECT * FROM capitulo ORDER BY idCapitulo DESC LIMIT 1";
	                            $resultado = $conexion->prepare($consulta);
	                            $resultado->execute();
	                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	                        }else{
	                            $data="error3"; // El tipo de la portada no esta permitido, intente con jpg 
	                        }
	                    }else{
	                        $data="error4";// La portada pesa demasiado
	                    }
	                }                
	            }
	        } 
       



/*
        $result= compararFechas($fechaD,$fechaH);
        if ( $result < 0 ) {
                $data="error1"; //error la fecha desde es menor a la fecha Hasta ingresada              
        }else{ //si las fechas estan bien y el numero de capitulo no se repiten para ese libro seleccionado entonces pregunto por los pdf y agrego
            $consulta="SELECT * FROM capitulo WHERE numeroCapitulo=$num AND idLibro=$libro";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            if ($data= $resultado->fetch()){
                $data="error2"; // numero de capitulo existente
            }else{
                if($_FILES['pdf']['name'] != null){
                    $nomPdf=$_FILES['pdf']["name"];
                    $tipoPdf=$_FILES['pdf']['type'];
                    $tamanio=$_FILES['pdf']['size'];
                
                    $nombrePdf= $num."-".$nomPdf;
                    if ($tamanio<= 1262074){
                        if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen   
                            $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                            //Mover imagen del directorio temporal al directorio escogido
                            move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
                             $consulta = "UPDATE capitulo SET numeroCapitulo='$num', nombreCapitulo= '$nombre', pdf='$nombrePdf', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idCapitulo='$id' AND borradoLogico=0   ";     
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();       
                            
                            $consulta = "SELECT * FROM capitulo WHERE idCapitulo='$id' ";              
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();
                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        }else{
                            $data="error3"; // El tipo de la portada no esta permitido, intente con jpg 
                        }
                    }else{
                        $data="error4";// La portada pesa demasiado
                    }
                }else{
                    $consulta = "UPDATE capitulo SET numeroCapitulo='$num', nombreCapitulo= '$nombre', fechaDesde='$fechaD', fechaHasta='$fechaH' WHERE idCapitulo='$id' AND borradoLogico=0   ";     
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();       
                    
                    $consulta = "SELECT * FROM capitulo WHERE idCapitulo='$id' ";              
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                }                
            }
        }
*/

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