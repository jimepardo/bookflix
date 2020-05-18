<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Agregar libro pdf</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form>
    <div class="form-group">
    <label for="formGroupExampleInput2">Libro</label>
    <select class="custom-select" required>
      <option value="">Seleccione un libro para agregar libro/capitulo</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Direccion donde se encuentra el archivo .pdf</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el path de donde se encuentra el pdf">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Número de capítulo del libro</label>
    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el numero del capítulo">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Vista previa en .pdf</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el path de donde se encuentra la vista previa en pdf">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha disponibilidad desde</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha disponibilidad hasta</label>
    <input class="form-control" type="date" value="date" id="example-date-input">
  </div>
  <input class="btn btn-danger" type="submit" value="Subir">
</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>