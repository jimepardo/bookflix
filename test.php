<?php
	 include "BaseDatosYConex\conexion.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>TEST</title>
</head>
<body>
	<?php
		if (isset($_GET['genero'])) {
			$genero_id=$_GET['genero'];
			$sql="SELECT nombreGenero from genero where idGenero=$genero_id";
			$query= mysqli_query($conexion,$sql);
			if ($valores=mysqli_fetch_array($query)) {
				echo $valores['nombreGenero'];
			}
		}

	?>

	<form method="GET" action="test.php">
	<select name="genero"> 
		<option value="0">Seleccione:</option>
        <?php
          	$query = mysqli_query ($conexion,"SELECT idGenero,nombreGenero FROM genero");
          	while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
            	echo '<option value="'.$valores['idGenero'].'"'; 
            	if (isset($_GET['genero']) && $valores['idGenero'] == $_GET['genero']){
            		echo " selected > ".$valores['nombreGenero']." </option>";
            	}else{
            		
            		echo '>'.$valores['nombreGenero'].'</option>';
          		}
          	}
        ?>
    </select>
    <button type="submit">Buscar bruh</button>
    <form>
</body>
</html>