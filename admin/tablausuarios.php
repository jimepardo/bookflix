<?php
    $desde=$_POST['desde'];
    $hasta=$_POST['hasta'];
    if($desde>$hasta){
        $error="Hubo un error la fecha hasta es menor a la fecha desde";
		header("Location: buscarusuarios.php?ERROR=$error&hasta=$hasta&desde=$desde");
		die();
        
    }
        
    
?>
<?php require_once "vistas/parte_superior.php" ?>


<!--Inicio del contenido principal-->
<div class="container-fluid">
        
    <h3 class="text-dark"> &nbspListado de usuarios registrados entre <?php echo $desde?> y <?php echo $hasta?></h3>
    <?php 
        
        $consulta= "SELECT * FROM usuario WHERE (fechaReg BETWEEN '$desde' AND '$hasta') AND permisoUsuario !='3' AND borradoLogico='0' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
                
        if ($datos=$resultado->fetchAll(PDO::FETCH_ASSOC)){

        
      
    ?>
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
                        <?php foreach ($datos as $dato) { ?>
                        <tbody>
                        
                           <tr>
                            <th hidden><?php echo $dato['id']?></th>
                            <th><?php echo $dato['nombreUsuario']?></th>
                            <th><?php echo $dato['apellido']?></th>
                            <th><?php echo $dato['emailUsuario']?></th>                  
                            <th><?php echo $dato['fechaReg']?></th>
                            <th><?php if( $dato['permisoUsuario'] == 1) echo "Usuario Básico"; else{ if($dato['permisoUsuario'] == 2) echo "Usuario Premium"; else{ echo "No contrato plan todavia";  } } ?></th> 
                          </tr>                    
                        </tbody> 
                        <?php } 
                        }else{?>                   
                            <br> 
                            <h5> &nbsp<?php echo "No se encontraron resultados para su búsqueda"?>
                                
                            </h5>
                            
                            <?php }?>
                    </table>                    
                </div>
            </div>   
        </div>    
    </div>
    <br>&nbsp&nbsp&nbsp&nbsp&nbsp       
    <a  class="btn btn-danger" href="buscarusuarios.php" class="btn btn-danger">Consultar otras fechas</a>
</div>

<?php require_once "vistas/parte_inferior.php" ?>