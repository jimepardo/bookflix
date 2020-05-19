<?php
	function uploadImg($name){
		$fileName=$_FILES['file']['name'];
		if (isset($fileName) && !empty($fileName)) {
		session_start();
		$id= strval($_SESSION['ID']);
		$fileName=$_FILES['file']['name'];
		$fileTempName=$_FILES['file']['tmp_name'];
		$fileSize=$_FILES['file']['size'];		
		$fileError=$_FILES['file']['error'];
		//para sacar la extension del archivo
		$fileExt= explode('.', $fileName);
		$fileExtLow= strtolower(end($fileExt));
		$allow=array('jpg','png','jpeg');
		if (in_array($fileExtLow, $allow)) {
			if ($fileError===0) {
				if ($fileSize<1000000) {
					$fileNameNew= $id."-".$name."-".$fileName;
					$fileDestination = 'profileImages/'.$fileNameNew;
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
		$fileName="avatar.png";
		return $fileName;
	}

}

?>