<?php require_once "vistas/parte_superior.php" ?>

<h3> &nbsp Cargar autor</h3>
<!--Inicio del contenido principal-->
<div class="container"> 


<form action="insertarautor.php" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre autor</label>
    <input type="text" class="form-control" placeholder="Ingrese el nombre del autor" name='nombreAutor'>
  </div>
<?php
if(isset($_GET['ERROR'])){
?> 
<div  class="alert alert-danger" role="alert">
    <?= $_GET['ERROR'] ?>
</div>                
<?php
}
?>

  <input class="btn btn-danger" type="submit" value="Cargar autor">


</form>

</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>