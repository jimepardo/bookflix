<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar género</h3>
<!--Inicio del contenido principal-->
<div class="container"> 


<form action="insertargen.php" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre género</label>
    <input type="text" class="form-control" name="nombreGenero" placeholder="Ingrese el nombre del género">
  </div>
  <input class="btn btn-danger" type="submit" value="Cargar género">


</form>

</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>