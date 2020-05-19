<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar libro</h3>
<!--Inicio del contenido principal-->
<div class="container"> 

<form action="insertarlibro.php" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese un nombre para el libro" name="nombre">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Descripción</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese una descripción" name="desc">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Portada del libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el link de la portada del libro" name="portada">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">ISBN</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese ISBN del libro " name="isbn">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Desde</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input" name="desde">
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Hasta</label>
    <input class="form-control" type="date" value="date" id="example-date-input" name="hasta">
  </div>
  <div class="form-group">
  <label for="formGroupExampleInput2">Género</label>
    <select class="custom-select" required name="genero">
      <option value="0">Seleccione un género</option>
      <?php  
        $query = mysqli_query ($conexion,"SELECT idGenero,nombreGenero FROM genero WHERE borradoLogico=0 AND borradoParanoagregar=0 ");
          while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
              echo '<option value="'.$valores['idGenero'].'"';                
                echo '>'.$valores['nombreGenero'].'</option>';
              }
      ?>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
  <label for="formGroupExampleInput2">Autor</label>
    <select class="custom-select" required name="autor">
      <option value="0">Seleccione un autor</option>
      <?php  
        $query = mysqli_query ($conexion,"SELECT idAutor,nombreAutor FROM autor WHERE borradoLogico=0 AND borradoParanoagregar=0");
          while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
              echo '<option value="'.$valores['idAutor'].'"';                
                echo '>'.$valores['nombreAutor'].'</option>';
              }
      ?>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <div class="form-group">
  <label for="formGroupExampleInput2">Editorial</label>
    <select class="custom-select" required name="editorial">
      <option value="0">Seleccione una editorial</option>
       <?php  
        $query = mysqli_query ($conexion,"SELECT idEditorial,nombreEditorial FROM editorial");
          while ($valores = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
              echo '<option value="'.$valores['idEditorial'].'"';                
              echo '>'.$valores['nombreEditorial'].'</option>';
          }
      ?>
    </select>
    <div class="invalid-feedback">Campo inválido</div>
  </div>
  <input class="btn btn-danger" type="submit" value="Cargar libro">

</form>



</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>