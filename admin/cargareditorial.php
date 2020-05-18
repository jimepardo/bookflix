<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar editorial</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form action="insertareditorial.php" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre editorial</label>
    <input type="text" class="form-control" name="nombreEditorial" placeholder="Ingrese el nombre de la editorial">
  </div>
  <input class="btn btn-danger" type="submit" value="Cargar editorial">


</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>