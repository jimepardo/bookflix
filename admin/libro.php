<?php require_once "vistas/parte_superior.php"?>
 
<!--INICIO del cont principal-->
<div class="container-fluid">
    <h1> &nbsp Libros</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">            
                    <button id="btnNuevo" type="button" class="btn btn-danger" data-toggle="modal">Cargar libro</button>    
                </div>    
            </div>    
        </div>   
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
                <form id="formLibros" enctype="multipart/form-data">    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">                
                                    <label for="isbn" class="col-form-label">ISBN:</label>
                                    <input type="number" class="form-control" id="isbn" name="isbn" required>

                                </div>
                            </div>
                             <!-- <div class="col-lg-6">
                                <div class="form-group">                
                                    <input type="hidden" name="opcion" value="1">
                                </div>
                            </div> -->
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-form-label">Descripción:</label>
                            <input type="text" class="form-control" id="desc" name="desc" required>
                        </div>   
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="borrado" class="col-form-label">Borrado:</label>
                                    <input type="number" class="form-control" name="borrado" id="borrado" required>
                                </div> 
                            </div>           
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="portada" class="col-form-label">Path portada:</label>
                                    <input type="file" class="form-control" name="portada" id="portada">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="idGen" class="col-form-label">Género</label>
                                    <select class="custom-select" required id="idGen" name="idGen">
                                        <option value="">Seleccione un género</option>
                                        <?php  
                                            $consulta= "SELECT idGenero, nombreGenero FROM genero WHERE (borradoLogico=0 AND borradoParanoagregar=0)";
                                            $resultado= $conexion->prepare($consulta);
                                            $resultado->execute();
                                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($data as $valores){
                                                echo'<option value="'.$valores['idGenero'].'"';
                                                echo '>'.$valores['nombreGenero'].'</option>';                       
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="idAu"  class="col-form-label">Autor</label>
                                    <select class="custom-select" name="idAu" required id="idAu">
                                        <option value="">Seleccione un autor</option>
                                        <?php  
                                            $consulta = "SELECT idAutor,nombreAutor FROM autor WHERE borradoLogico=0 AND borradoParanoagregar=0";
                                            $resultado= $conexion->prepare($consulta);
                                            $resultado->execute();
                                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($data as $valores){
                                                echo '<option value="'.$valores['idAutor'].'"';                
                                                echo '>'.$valores['nombreAutor'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="idEd" class="col-form-label">Editorial</label>
                                <select class="custom-select" name="idEd" required id="idEd">
                                    <option value="">Seleccione una editorial</option>
                                    <?php  
                                        $consulta = "SELECT idEditorial,nombreEditorial FROM editorial WHERE borradoLogico=0 AND borradoParanoagregar=0";
                                        $resultado= $conexion->prepare($consulta);
                                        $resultado->execute();
                                        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($data as $valores){
                                            echo '<option value="'.$valores['idEditorial'].'"';                
                                            echo '>'.$valores['nombreEditorial'].'</option>';
                                        }
                                    ?>
                                </select>
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
                        <button type="button" id="btnCancelar" onclick="window.location='libro.php';return false;" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-danger">Guardar</button>
                    </div>
                </form>    
            </div> <!--modal content-->
        </div><!--modal dialog-->
    </div> <!--modal termina-->
</div>
<?php require_once "vistas/parte_inferior.php"?>

<script type="text/javascript" src="libro.js"></script>
    
