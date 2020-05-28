<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Modificar autor</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form action="updateautor.php" method="POST">
    <div class="form-group">
    <select name="estado"> 
				<option value="0">Seleccione el autor que desea modificar </option>
				<?php
					$query = mysqli_query ($conexion,"SELECT idAutor,nombreAutor FROM autor");
					while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
						echo '<option value="'.$valores['idAutor'].'"'; 
						if (isset($_GET['ESTADO']) && $valores['idAutor'] == $_GET['ESTADO']){
							echo " selected > ".$valores['nombreAutor']." </option>";
						}else{
							
							echo '>'.$valores['nombreAutor'].'</option>';
						}
					}
				?>
        <div class="invalid-feedback">Campo inválido</div>
			</select>

    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">Nuevo nombre autor</label>
      <input type="text" class="form-control" name="autor" placeholder="Ingrese el nuevo nombre del autor"
      		<?php

		if (isset($_GET['NOMBRE'])) {
			$name=$_GET['NOMBRE'];
			echo "value=$name";			
		}

		?>


      >
    </div>

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
    
    <input class="btn btn-danger" type="submit" value="Guardar cambios">
  </form>


</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>