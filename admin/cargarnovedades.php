<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar novedades</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form action="updatenovedades.php" method="POST">
  <div class="form-group col-4">
    <label for="formGroupExampleInput2">Novedad del libro</label>
      <select class="custom-select col-12" name="estado" required>
        <option value="0">Seleccione un libro</option>
        <?php  
          $query = mysqli_query ($conexion,"SELECT ISBN,nombreLibro FROM libro WHERE borradoLogico=0 AND borradoParanoagregar=0 ");
            while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
              echo '<option value="'.$valores['ISBN'].'"';                
              echo '>'.$valores['nombreLibro'].'</option>';
            }
        ?>
      </select>
    </div>
    <div class="form-group col-4">
      <label for="formGroupExampleInput">Descripción de la novedadad </label>
      <p><textarea name="descripcion" placeholder="Ingrese una descripción de la novedad/sugerencia " cols="40" rows="5"></textarea></p>
    </div>
    <div class="form-group col-4">
    <label for="example-date-input" class="col-form-label">Fecha disponibilidad</label>
      <input class="form-control" type="date" value="actual-date" id="example-date-input" name="desde">
    </div>
    <input class="btn btn-danger" type="submit" value="Cargar novedad">


</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>