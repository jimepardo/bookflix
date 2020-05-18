<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Borrar género</h3>
<!--Inicio del contenido principal-->
<div class="container"> 


<form>
<div class="form-group">
    <label for="formGroupExampleInput2">Borrado logico</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="1 para borrar, 0 esta disponible">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Borrado para no agregar</label>
    <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="1 para borrar, 0 esta disponible">
  </div>

  <input class="btn btn-danger" type="submit" value="Guardar cambios">
</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>