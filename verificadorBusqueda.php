<?php 
	
function resultadoBusqueda(){
    include('BaseDatosYConex/conexion.php');
    
    if(isset($_POST['busca'])){
    $busca= $_POST['busca'];
	$result=mysqli_query($conexion,"SELECT * 
                FROM libro l
                    INNER JOIN genero g ON (g.idGenero = l.idGenero)
                    INNER JOIN editorial e ON (e.idEditorial = l.idEditorial)
                    INNER JOIN autor a ON (a.idAutor = l.idAutor)
                WHERE (a.nombreAutor LIKE '%$busca%'  OR e.nombreEditorial LIKE '%$busca%' OR g.nombreGenero LIKE '%$busca%'  OR l.nombreLibro LIKE '%$busca%') AND l.borradoLogico = '0' AND e.borradoParanoagregar='0' AND a.borradoParanoagregar='0' AND ((l.fechaDesde<=l.fechaHasta) OR (l.fechaHasta IS NULL )) AND l.fechaDesde<=CURRENT_DATE() AND l.terminar='1' ");
    return $result;
    exit;
    }
}

?>