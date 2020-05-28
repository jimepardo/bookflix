<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Modificar género</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

	<form method="POST" action="updategen.php">
		<div class="form-group">
			<select name="estado"> 
				<option value="0">Seleccione el género que desea modificar </option>
				<?php
					$query = mysqli_query ($conexion,"SELECT idGenero,nombreGenero FROM genero");
					while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
						echo '<option value="'.$valores['idGenero'].'"'; 
						if (isset($_GET['ESTADO']) && $valores['idGenero'] == $_GET['ESTADO']){
							echo " selected > ".$valores['nombreGenero']." </option>";
						}else{
							
							echo '>'.$valores['nombreGenero'].'</option>';
						}
					}
				?>
			</select>

		</div>
		<div class="form-group">
		<label for="formGroupExampleInput">Nuevo nombre género</label>
		<input type="text" class="form-control" name="nombreGen" placeholder="Ingrese el nuevo nombre del género"
		<?php

		if (isset($_GET['NOMBRE'])) {
			$name=$_GET['NOMBRE'];
			echo "value=$name";			
		}

		?>
		>
		</div>


  <input class="btn btn-danger" type="submit" value="Guardar cambios " > 
  

 <form>
 <?php
	if(isset($_GET['ERROR'])){
?> 
  <div  class="alert alert-danger" role="alert">
     <?= $_GET['ERROR'] ?>
  </div>                
<?php
    }else if(isset($_GET['EXITO'])){
?>
	<div class="alert alert-success">
		<?= $_GET['EXITO'] ?>		
	</div>
<?php 
}
?>

</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>