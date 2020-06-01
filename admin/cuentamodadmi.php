<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cuenta</h3>
<!--Inicio del contenido principal-->
<div class="container-fluid">
<form action="modpassword.php" method="POST">
<div class="form-group">
    <label for="formGroupExampleInput2">Modificar contraseña</label>
    <input type="password" class="form-control col-5" id="formGroupExampleInput2" name="pass" required placeholder="Ingrese su antigua contraseña" 
    <?php 

    if(isset($_GET['PASSW']) ){
        $val=$_GET['PASSW'];
        echo "value=$val";
    }?>

    >
    <br>
    <input type="password" class="form-control col-5" id="formGroupExampleInput2" name="pass1" required placeholder="Ingrese su nueva contraseña"
    <?php 

    if(isset($_GET["PASSW1"]) ){
        $val=$_GET['PASSW1'];
        echo "value=$val";
    }?>

    >
    <br>
    <input type="password" class="form-control col-5" id="formGroupExampleInput2" name="pass2" required placeholder="Repita su nueva contraseña"
    <?php 

    if(isset($_GET["PASSW2"]) ){
        $val=$_GET['PASSW2'];
        echo "value=$val";
    }?>

    >
    <br>
    <input type="hidden" name="id" value="<?php echo $_SESSION['ID'] ?>">
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
  <input class="btn btn-danger" type="submit" value="Guardar cambios">
</form>
</div>

<?php require_once "vistas/parte_inferior.php" ?>