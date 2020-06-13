<?php require_once "vistas/parte_superior.php"?>
<!--INICIO del cont principal-->
<div class="container-fluid">
    <h2><strong>Novedades sobre libros</strong></h2>

<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-danger" data-toggle="modal">Cargar novedad</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaNov" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID Novedad</th>
                            <th>ID Libro</th>
                            <th>Descripcion</th>     
                            <th>Fecha de publicación</th>                            
                            <th>Borrado Lógico</th>
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
        <form id="formNov">    
            <div class="modal-body">
                    <div class="form-group">
                        <label for="novedad">Novedad del libro </label>
                        <select class="custom-select" id="novedad" name="estado" required>
                            <option value="">Seleccione un libro</option>
                            <?php  
                            $consulta = "SELECT idLibro,ISBN,nombreLibro FROM libro WHERE borradoLogico=0";
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();        
                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data as $valores) {
                                echo '<option value="'.$valores['idLibro'].'"';                
                                echo '>'.$valores['nombreLibro'].'</option>';
                            }
                            ?>
                        </select>
                    </div>  
                    <div class=form-group>                
                        <label for="descripcion">Descripción de la novedadad </label>
                        <input type="text" class="form-control" id="descripcion" placeholder="Ingrese una descripción" name="descripcion" required> 
                    </div> 
                    <div class="form-group">
                        <label for="desde" class="col-form-label">Fecha disponibilidad</label>
                        <input class="form-control" type="date"  id="desde" name="desde" required>
                    </div>            
                    <div class="form-group">
                        <label for="borrado" class="col-form-label">Borrado Lógico </label>
                        <input type="number" class="form-control" id="borrado" required>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCancelar" onclick="window.location='novedades.php';return false;" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-danger">Guardar cambios</button>
                </div>
            </form>    
        </div>
    </div>
</div>  
          
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>

<script type="text/javascript" src="novedades.js"></script> 