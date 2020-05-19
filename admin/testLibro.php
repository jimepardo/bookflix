<?php
	include "compararFechas.php";
	$isbn="132";
	var_dump($_FILES);
	$result=uploadImg($isbn);
	var_dump($result);

?>