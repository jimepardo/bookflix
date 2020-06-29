<?php require_once "vistas/parte_superior.php" ?>

<h3>&nbsp &nbsp Ingresar fechas para realizar búsqueda de usuarios</h3>
<div class="container-fluid">
  <form id="formuser" action="tablausuarios.php" method="POST" >    
    
    <div class="form-group">                
      <input type="hidden" class="form-control" id="id" name="id"  >
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="form-group">
          <label for="desde" class="col-form-label">Desde la fecha:</label>
          <input type="date" class="form-control" id="desde" name="desde" value="<?= $_GET['desde']?>" required>
        </div>  
      </div>
      <div class="col-lg-3">
        <div class="form-group">                
          <label for="hasta" class="col-form-label">Hasta la fecha:</label>
          <input type="date" class="form-control" id="hasta" name="hasta"  value="<?= $_GET['hasta']?>" required>
        </div>
      </div>  
    </div>  
    <button type="submit" href="tablausuarios.php" class="btn btn-danger">Consultar</button>
  </form>  <br>
  <div class="d-flex justify-content-left">
        
    <?php
      if(isset($_GET['ERROR'])){
      ?> 
      <div  class="alert alert-danger" role="alert">
          <?= $_GET['ERROR'] ?>
      </div>                
      <?php
      }
      ?>
  </div>  
</div>
<?php require_once "vistas/parte_inferior.php" ?>