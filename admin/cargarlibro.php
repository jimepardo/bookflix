<?php require_once "vistas/parte_superior.php" ?>
<h3> &nbsp Cargar libro</h3>
<!--Inicio del contenido principal-->
<div class="container"> 


<form action="insertarLibro" method="POST" enctype="multipart/form-data" id="formLibro">
  <div class="form-group">
    <label for="formGroupExampleInput">Nombre libro</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese un nombre para el libro" name="nombre">
    <?php
      if (isset($_GET['errorNombre'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorNombre']?>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Descripción</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese una descripción" name="desc">
    <?php
      if (isset($_GET['errorDesc'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorDesc']?>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Portada del libro</label>
    <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese el link de la portada del libro" name="portada">
    <?php
      if (isset($_GET['errorPortada'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorPortada']?>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">ISBN</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ingrese ISBN del libro " name="isbn">
  <?php
      if (isset($_GET['errorIsbn'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorIsbn']?>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Desde</label>
    <input class="form-control" type="date" value="actual-date" id="example-date-input" name="desde">
  <?php
      if (isset($_GET['errorDesde'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorDesde']?>
    </div>
    <?php
    }
    ?>  
  </div>
  <div class="form-group">
  <label for="example-date-input" class="col-form-label">Fecha Hasta</label>
    <input class="form-control" type="date" value="date" id="example-date-input" name="hasta">
  <?php
      if (isset($_GET['errorHasta'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorHasta']?>
    </div>
    <?php
    }
    ?>
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
    <?php
      if (isset($_GET['errorGenero'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorGenero']?>
    </div>
    <?php
    }
    ?>
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
    <?php
      if (isset($_GET['errorAutor'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorAutor']?>
    </div>
    <?php
    }
    ?>
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
    <?php
      if (isset($_GET['errorEditorial'])) {     
    ?>
    <br>
    <div class="alert alert-danger">
        <?= $_GET['errorEditorial']?>
    </div>
    <?php
    }
    ?>
  </div>
  <input class="btn btn-danger" type="submit" value="Cargar libro">

</form>



</div>


<!--fin del contenido principal-->

<?php require_once "vistas/parte_inferior.php" ?>