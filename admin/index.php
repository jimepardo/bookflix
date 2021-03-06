<?php require_once "vistas/parte_superior.php" ?>

<!--Inicio del contenido principal-->

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
    if(isset($_GET['EXITO'])){
  ?>
    <div class="alert alert-success">
      <?= $_GET['EXITO'] ?>   
    </div>
  <?php 
  }
  ?>
  <?php
  if(isset($_GET["borrado"])){
  ?>
    <div class="alert alert-success"> Se han cobrado las suscripciones</div>
  <?php
  } 
  ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Opciones</h1>
</div>

<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Libro</div>
            <a href="libro.php" class="btn btn-light btn-icon-split">
              <span class="icon text-gray-600">
                <i class="fas fa-arrow-right"></i>
              </span>
              <span class="text">Alta, baja y modificación de Libros </span>
            </a><br> 
            <a href="capitulo.php" class="btn btn-light btn-icon-split">
              <span class="icon text-gray-600">
                <i class="fas fa-arrow-right"></i>
              </span>
              <span class="text">Alta, baja y modificación de Capitulos</span>
            </a><br>
            <a href="vistaprevia.php" class="btn btn-light btn-icon-split">
              <span class="icon text-gray-600">
                <i class="fas fa-arrow-right"></i>
              </span>
              <span class="text">Alta, baja y modificación de Vistas Previas </span>
            </a><br>
          </div>
          <div class="col-auto">
            <i class="fas fa-book fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Autores -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Listado de autores</div>
              <a href="autor.php" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Carga y modificación</span>
              </a>          
            </div>
            <div class="col-auto">
              <i class="fas fa-user-edit fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  <!-- Editorial -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Listado de editoriales</div>
              <a href="editorial.php" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Carga y modificación</span>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-book-reader fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- aca va otra fila-->

<div class="row">
  <!-- Generos -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Listado de género</div>
              <a href="genero.php" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Carga y modificación</span>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-genderless fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

        
  <!-- Novedades -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Listado de novedades</div>
              <a href="novedades.php" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Carga y modificación</span>
              </a>
            </div>
            <div class="col-auto">
            
              <i class="fas fa-rss-square fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Novedades Generales-->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Listado de novedades generales</div>
              <a href="novedadesgenerales.php" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Carga y modificación</span>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-table fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
 <!-- Adicional -->
 <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Adicional</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
              <a href="buscarusuarios.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Buscar usuarios registrados</span>
                  </a>
                  <a href="cobrarPlan.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cobrar Suscripciones</span>
                  </a>
                  <a href="verEstadisticas.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Estadisticas de lecturas</span>
                  </a>

                 
              </div>
              <div class="col">               
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Paginas -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Páginas</div>
            <a href="../home.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Pagina principal del user</span>
                  </a>
                  <a href="../novedades.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Todas las novedades</span>
                  </a>
            </div>
            <div class="col-auto">
            
              <i class="fas fa-rss fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Ejemplo tabla vacia</div>
              <a href="ejemplo.php" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Ejemplo listado sin resultados</span>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


</div>
<!--fin-->

</div>






<!--fin del contenido principal-->

    <?php require_once "vistas/parte_inferior.php" ?>
               

          