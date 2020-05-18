<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar novedades</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Descripción de novedada/sugerencia </label>
    <!--
    <input type="textarea" class="form-control" id="formGroupExampleInput" placeholder="Ingrese una desripción de la novedad/sugerencia">-->
    <p><textarea name="mensaje" placeholder="Ingrese una descripción de la novedad/sugerencia " cols="40" rows="5"></textarea></p>
  </div>
  <input class="btn btn-danger" type="submit" value="Cargar novedad">


</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>