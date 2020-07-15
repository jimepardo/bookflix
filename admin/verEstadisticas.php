<?php require_once "vistas/parte_superior.php" ?>


<!--Inicio del contenido principal-->
<div class="container-fluid">
        
    <h3 class="text-dark"> &nbsp Estadísticas de libros según cantidad de lecturas </h3>
    <?php   
        $consulta= "SELECT DISTINCT l.nombreLibro, l.idLibro, ley.idPerfil, COUNT( ley.idLibro) as cant 
        FROM libro l LEFT JOIN leyendo ley ON (ley.idLibro=l.idLibro)
        WHERE l.borradoLogico='0' AND terminar='1' AND (ley.borradoLogico='0' OR NOT EXISTS (Select *
                                           From Libro 
                                           Where  l.borradoLogico='1' AND ley.borradoLogico='1' ))
        GROUP BY l.idLibro
        ORDER BY COUNT(l.idlibro) DESC";
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
                        <thead class="text-center" >
                            <tr>
                                <th class="text-center" style="width:300pt"> Nombre Libro</th>
                                <th class="text-center" style="width:50pt">Cantidad de lecturas</th>
                            </tr>
                        </thead>
                        <?php foreach ($datos as $dato) { ?>
                        <tbody>
                           <tr>
                            <th><?php echo $dato['nombreLibro']?></th>
                            <th><?php echo $dato['cant']?></th>
                          </tr>                    
                        </tbody> 
                        <?php } 
                        }else{?>                   
                            <br> 
                            <h5> &nbsp<?php echo "No se encontraron resultados"?></h5>
                            <?php }?>
                    </table>                    
                </div>
            </div>   
        </div>    
    </div>
    
</div>

<?php require_once "vistas/parte_inferior.php" ?>
<script>

</script>