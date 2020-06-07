<?php require_once "vistas/parte_superior.php"?>
 
<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1> &nbsp Libros</h1>
          
    <br> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablaLibros" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>ISBN</th>
                                <th>Nombre libro</th>
                                <th>Descripción</th>                  
                                <th>Borrado</th>
                                <th>Portada path</th>  
                                <th>Fecha lanzamiento</th>
                                <th>Genero ID</th>
                                <th>Autor ID</th>
                                <th>Editorial ID</th>
                                <th>Disponible desde</th>
                                <th>Disponible hasta</th>
                            </tr>
                        </thead>
                        <tbody>                             
                        </tbody>        
                    </table>                    
                </div>
            </div>   
        </div>    
    </div>       
        
</div>
<?php require_once "vistas/parte_inferior.php"?>

<script type="text/javascript" src="listadolibros.js"></script>
    
