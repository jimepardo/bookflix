<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar libro</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese un nombre para el libro">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Descripción</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese una descripción">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Portada del libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el link de la portada del libro">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">ISBN</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese ISBN del libro ">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha lanzamiento</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Desde</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Hasta</label>
    <input class="form-control" type="date" value="date" id="example-date-input">
  </div>
  <div class="form-group">
  <label for="formGroupExampleInput2">Género</label>
    <select class="custom-select" required>
      <option value="">Seleccione un género</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
  <label for="formGroupExampleInput2">Autor</label>
    <select class="custom-select" required>
      <option value="">Seleccione un autor</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
  <label for="formGroupExampleInput2">Editorial</label>
    <select class="custom-select" required>
      <option value="">Seleccione una editorial</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <input class="btn btn-danger" type="submit" value="Cargar libro">

</form>



</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>