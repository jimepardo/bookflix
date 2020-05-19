<?php
	include "../BaseDatosYConex/conexion.php";

function compararFechas($primera, $segunda)
 {
  $valoresPrimera = explode ("-", $primera);   
  $valoresSegunda = explode ("-", $segunda); 
  $anyoPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $diaPrimera   = $valoresPrimera[2]; 
  $anyoSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $diaSegunda  = $valoresSegunda[2];
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es v&aacute;lida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es v&aacute;lida";
    return 0;
  }else{
    return  $diasSegundaJuliano - $diasPrimeraJuliano ;
  } 

}

function uploadImg($isbn){
		$fileName=$_FILES['portada']['name'];
		if (isset($_FILES['file']) && !empty($fileName)) {
		session_start();
		$id= strval($_SESSION['ID']);
		$fileName=$_FILES['portada']['name'];
		$fileTempName=$_FILES['portada']['tmp_name'];
		$fileSize=$_FILES['portada']['size'];		
		$fileError=$_FILES['portada']['error'];
		//para sacar la extension del archivo
		$fileExt= explode('.', $fileName);
		$fileExtLow= strtolower(end($fileExt));
		$allow=array('jpg','png','jpeg');
		if (in_array($fileExtLow, $allow)) {
			if ($fileError===0) {
				if ($fileSize<1000000) {
					$fileNameNew= $isbn."-".$fileName;
					$fileDestination = '../bookImages/'.$fileNameNew;
					move_uploaded_file($fileTempName, $fileDestination);
					return $fileNameNew;
				}else{
					return 1;
				}
			}else{
				return 2;
			}
		}else{
			return 3;
		}
	}else{
		return 4;
	}

}
?>