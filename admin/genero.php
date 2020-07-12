<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container-fluid">
    <h2><strong>Géneros</strong></h2>
    
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-danger" data-toggle="modal">Cargar Género</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaGenero" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th hidden>ID Género</th>
                            <th>Nombre género</th>
                            <th>Estado</th>                                
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                               
                    </tbody>        
                </table>                    
            </div>
        </div>
    </div>  
</div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formGenero">    
            <div class="modal-body">
                <div class="form-group">                
                    <input type="hidden" class="form-control" id="id" name="id" >
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
               <!-- <label for="borrado" class="col-form-label">Borrado:</label>-->
                <input type="hidden" class="form-control" id="borrado" name="borrado" required>
                </div>                
                <div class="form-group">
              <!--  <label for="borrado2" class="col-form-label">Borrado para no agregar mas:</label>-->
                <input type="hidden" class="form-control" id="borrado2" name="borrado2" required>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="window.location='genero.php';return false;" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>
<script type="text/javascript" src="genero.js"></script> 