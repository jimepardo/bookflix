<?php require_once "vistas/parte_superior.php" ?>


<!--Inicio del contenido principal-->
<div class="container-fluid">
        
    <h3 class="text-dark"> &nbsp Estadísticas de libros según cantidad de lecturas </h3>
    <?php   
        $consulta= "SELECT l.nombreLibro, l.idLibro FROM libro l WHERE l.borradoLogico='0'  ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        

        
                
        if ($datos=$resultado->fetchAll(PDO::FETCH_ASSOC)){
    ?>
    <br> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre Libro</th>
                                <th>Cantidad de lecturas</th>
                            </tr>
                        </thead>
                        <?php foreach ($datos as $dato) { 
                            $id=$dato['idLibro'];
                            $consulta2= "SELECT DISTINCT ley.idPerfil, l.nombreLibro, COUNT(*) as cant FROM libro l INNER JOIN leyendo ley ON (ley.idLibro=l.idLibro) WHERE l.borradoLogico='0' AND ley.borradoLogico='0' AND ley.idLibro='$id'  ";
                            $resultado2 = $conexion->prepare($consulta2);
                            $resultado2->execute();
                            $datos2=$resultado2->fetch();
                            ?>
                        <tbody>
                           <tr>
                            <th><?php echo $dato['nombreLibro']?></th>
                            <th><?php echo $datos2['cant']?></th>
                          </tr>                    
                        </tbody> 
                        <?php } 
                        }else{?>                   
                            <br> 
                            <h5> &nbsp<?php echo "No se encontraron resultados para su búsqueda"?></h5>
                            <?php }?>
                    </table>                    
                </div>
            </div>   
        </div>    
    </div>
    
</div>

<?php require_once "vistas/parte_inferior.php" ?>