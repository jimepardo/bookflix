<?php require_once "vistas/parte_superior.php" ?>

<?php
  $consulta= "SELECT * FROM usuario WHERE borradoLogico='0' AND permisoUsuario!='3' ";
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();        
 
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC)
?>
<!--Inicio del contenido principal-->
<div class="container-fluid">
    <h1> &nbsp Listado de usuarios</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">            
                    <button id="btnEditar" type="button" class="btn btn-danger" data-toggle="modal">Consultar Usuarios registrados</button>   
                 
                </div>    
            </div>    
        </div>   
    <br> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablauser" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th hidden>ID Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>E-mail</th>                  
                                <th>Fecha en que se registró</th>
                                <th>Tipo de usuario</th>
                            </tr>
                        </thead>
                        <?php// foreach ($datos as $dato) { ?>
                        <tbody>
                        
                          <!-- <tr>
                            <th hidden><?php //echo $dato['id']?></th>
                            <th><?php //echo $dato['nombreUsuario']?></th>
                            <th><?php// echo $dato['apellido']?></th>
                            <th><?php// echo $dato['emailUsuario']?></th>                  
                            <th><?php// echo $dato['fechaReg']?></th>
                            <th><?php// if( $dato['permisoUsuario'] == 1) echo "Usuario Básico"; else echo "Usuario Premium";?></th> 
                          </tr>      -->                
                        </tbody> 
                        <?php// } ?>
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
                <form id="formuser" >    
                    <div class="modal-body">
                        <div class="form-group">                
                            <input type="hidden" class="form-control" id="id" name="id" >
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="desde" class="col-form-label">Desde la fecha:</label>
                                    <input type="date" class="form-control" id="desde" name="desde" required>
                                </div>  
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">                
                                    <label for="hasta" class="col-form-label">Hasta la fecha:</label>
                                    <input type="date" class="form-control" id="hasta" name="hasta" required>

                                </div>
                            </div>
                            
                        </div>  
                        
                    </div> <!--modal body-->
                    <div class="modal-footer">
                        <button type="button" id="btnCancelar" onclick="window.location='buscarusuarios.php';return false;" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-danger">Guardar</button>
                    </div>
                </form>    
            </div> <!--modal content-->
        </div><!--modal dialog-->
    </div> <!--modal termina-->
</div>

<?php require_once "vistas/parte_inferior.php" ?>
<script type="text/javascript" src="buscarusuarios.js"></script>