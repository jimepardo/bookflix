<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Buscar usuarios</h3>
<!--Inicio del contenido principal-->
<div class="container"> 
<form>
<div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Desde</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Hasta</label>
    <input class="form-control" type="date" value="date" id="example-date-input">
  </div>

  <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Usuarios registrados entre las fechas ...</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>E-mail</th>
            
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>E-mail</th>
    
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <td>1</td>
            <td>Juliana</td>
            <td>juliana@gmail.com</td>
 
          </tr>
          <tr>
            <td>2</td>
            <td>Andrea</td>
            <td>Andrea@hotmail.com</td>
 
          </tr>
          <tr>
            <td>3</td>
            <td>Patricio</td>
            <td>patricio@gmail.com</td>

          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

</form>
</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>