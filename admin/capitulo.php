<?php require_once "vistas/parte_superior.php"?>
 
<!-- copia aa INICIO del cont principal-->

<div class="container-fluid">
    <h1> &nbsp Capitulos de libros</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">            
                    <button id="btnNuevo" type="button" class="btn btn-danger" data-toggle="modal">Cargar Capitulo</button>   
                 
                </div>    
            </div>    
        </div>   
    <br> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablaCap" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>ID Capitulo</th>
                                <th>N° capitulo</th>
                                <th>Nombre capitulo</th>
                                <th>Borrado</th>                  
                                <th>Archivo PDF</th>
                                <th>ID Libro</th>
                                <th>Disponible desde</th>
                                <th>Disponible hasta</th>
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
                <form id="formcap" enctype="multipart/form-data">    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="libro">Libro </label>
                                    <select class="custom-select" id="libro" name="libro" required>
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
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">                
                                    <label for="num" class="col-form-label">N° Cap</label>
                                    <input type="number" class="form-control" id="num" name="num" required>

                                </div>
                            </div>
                            
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="nombre" class="col-form-label">Nombre capitulo:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>  
                            </div>
                            
                        </div>  
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="borrado" class="col-form-label">Borrado:</label>
                                    <input type="number" class="form-control" name="borrado" id="borrado" required>
                                </div> 
                            </div>           
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="pdf" class="col-form-label">PDF:</label>
                                    <input type="file" class="form-control" name="pdf" id="pdf" accept="application/pdf" >
                                </div>
                            </div>                            
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fechaD" class="col-form-label">Fecha Desde</label>
                                    <input class="form-control" type="date" value="" id="fechaD" name="fechaD" required min=<?php 
                        $hoy=date("Y-m-d");
                        echo $hoy;?>>     
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fechaH" class="col-form-label">Fecha Hasta</label>
                                    <input class="form-control" type="date" value="" id="fechaH" name="fechaH" min=<?php 
                        $hoy=date("Y-m-d");
                        echo $hoy;?>> 
                                </div>  
                            </div>   
                        </div>
                    </div> <!--modal body-->
                    <div class="modal-footer">
                        <button type="button" id="btnCancelar" onclick="window.location='capitulo.php';return false;" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-danger">Guardar</button>
                    </div>
                </form>    
            </div> <!--modal content-->
        </div><!--modal dialog-->
    </div> <!--modal termina-->
</div>
<?php require_once "vistas/parte_inferior.php"?>

<script type="text/javascript" src="capitulo.js"></script>
    
