<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Modificar editorial</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form action="updateeditorial.php" method="POST">
    <div class="form-group">
    <select name="estado"> 
				<option value="0">Seleccione la editorial que desea modificar </option>
				<?php
					$query = mysqli_query ($conexion,"SELECT idEditorial, nombreEditorial FROM editorial");
					while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
						echo '<option value="'.$valores['idEditorial'].'"'; 
						if (isset($_GET['ESTADO']) && $valores['idEditorial'] == $_GET['ESTADO']){
							echo " selected > ".$valores['nombreEditorial']." </option>";
						}else{
							
							echo '>'.$valores['nombreEditorial'].'</option>';
						}
					}
				?>
        <div class="invalid-feedback">Campo inválido</div>
			</select>

    </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Nuevo nombre editorial</label>
    <input type="text" class="form-control" name="editorial" placeholder="Ingrese el nuevo nombre del autor">
  </div>
   <input class="btn btn-danger" type="submit" value="Guardar cambios">
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
</form>

</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>