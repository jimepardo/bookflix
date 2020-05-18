<?php require_once "vistas/parte_superior.php" ?>
<?php 
  $consulta = "SELECT idAutor, nombreAutor, borradoLogico, borradoParanoagregar FROM autor";
  $query= mysqli_query($conexion,$consulta);

?>
<!--Inicio del contenido principal-->
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lista de autores</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Autores</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre editorial</th>
            <th>Borrado lógico</th>
            <th>Borrado para no agregar</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>ID</th>
            <th>Nombre editorial</th>
            <th>Borrado lógico</th>
            <th>Borrado para no agregar</th>
          </tr>
        </tfoot>
        <tbody>
        <?php  
          while ($name = mysqli_fetch_array($query)){
        ?>
          <tr>
            <td><?php echo $name['idAutor'] ?></td>
            <td><?php echo $name['nombreAutor'] ?></td>
            <td><?php echo $name['borradoLogico'] ?></td>
            <td><?php echo $name['borradoParanoagregar'] ?></td>
          </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>