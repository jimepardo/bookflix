<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cuenta</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form action="modpassword.php" method="POST">
<div class="form-group">
    <label for="formGroupExampleInput2">Modificar contraseña</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="pass" placeholder="Ingrese su antigua contraseña">
    <br>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="pass1" placeholder="Ingrese su nueva contraseña">
    <br>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="pass2" placeholder="Repita su nueva contraseña">
    <br>
    <input type="hidden" name="id" value="<?php echo $_SESSION['ID'] ?>">
  </div>
  <input class="btn btn-danger" type="submit" value="Guardar cambios">
</form>
</div>

<?php require_once "vistas/parte_inferior.php" ?>