<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Modificar libro</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form>
    <div class="form-group">
    <label for="formGroupExampleInput2">Libro</label>
    <select class="custom-select" required>
      <option value="">Seleccione un libro para modificar</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Nuevo nombre libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el nuevo nombre del autor">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Nueva descripción</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese una descripción">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Nueva portada del libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el link de la portada del libro">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">ISBN</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ISBN no se puede modificar" readonly>
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha lanzamiento</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input" readonly>
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

  <input class="btn btn-danger" type="submit" value="Guardar cambios">
</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>