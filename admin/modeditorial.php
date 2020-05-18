<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Modificar editorial</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form>
    <div class="form-group">
    <label for="formGroupExampleInput2">Editorial</label>
    <select class="custom-select" required>
      <option value="">Seleccione una editorial para modificar</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Nuevo nombre editorial</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese el nuevo nombre del autor">
  </div>
 

  <input class="btn btn-danger" type="submit" value="Guardar cambios">
</form>

</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>