<?php require_once "vistas/parte_superior.php" ?>

<!--Inicio del contenido principal-->

            <!-- Begin Page Content -->
            <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Opciones</h1>
</div>

<div class="row">


  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Libro</div>
            <a href="cargarlibro.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cargar libro</span>
                  </a>
                  <a href="modlibro.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Modificar libro</span>
                  </a>
                  <a href="agregarlibro.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Agregar capitulo</span>
                  </a>
                  <a href="borrarlibro.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Borrar libro</span>
                  </a>
          </div>
          <div class="col-auto">
            <i class="fas fa-book fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Autor</div>
            <a href="cargarautor.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cargar autor</span>
                  </a>
                  <a href="modautor.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Modificar autor</span>
                  </a>
                  <a href="borrarautor.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Borrar autor</span>
                  </a>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-edit fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Editorial</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
              <a href="cargareditorial.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cargar editorial</span>
                  </a>
                  <a href="modeditorial.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Modificar editorial</span>
                  </a>
                  <a href="borrareditorial.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Borrar editorial</span>
                  </a>
              </div>
              <div class="col">               
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Género</div>
            
            <a href="#cargargen.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cargar género</span>
                  </a>
                  <a href="modgen.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Modificar género</span>
                  </a>
                  <a href="borrargen.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Borrar género</span>
                  </a>
          </div>
          <div class="col-auto">
          
            <i class="fas fa-genderless fa-2x text-gray-300"></i>
          </div>
        </div>


        
      </div>
    </div>
  </div>
</div>


<!-- aca va otra fila-->

<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Novedades/Sugerencias</div>
            <a href="cargarnovedades.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cargar novedades/ sugerencias</span>
                  </a>
                  
          </div>
          <div class="col-auto">
            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Listas</div>
            <a href="listareditorial.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Listar editoriales</span>
                  </a>
                  <a href="listarautor.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Listar autores</span>
                  </a>
                  <a href="listargen.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Listar géneros</span>
                  </a>
          </div>
          <div class="col-auto">
            <i class="fas fa-list-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Adicional</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
              <a href="buscarusuarios.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Buscar usuarios registrados</span>
                  </a>
                  <a href="home.php" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Pagina principal del user</span>
                  </a>
                
              </div>
              <div class="col">               
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-search fa-2x text-gray-300"></i>
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
               

          