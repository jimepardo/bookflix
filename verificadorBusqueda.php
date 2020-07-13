<?php 
	
function resultadoBusqueda(){
    include('BaseDatosYConex/conexion.php');

    if(isset($_POST['busca'])){
   
	$result=mysqli_query($conexion,"SELECT * 
                FROM libro l
                    INNER JOIN genero g ON (g.idGenero = l.idGenero)
                    INNER JOIN editorial e ON (e.idEditorial = l.idEditorial)
                    INNER JOIN autor a ON (a.idAutor = l.idAutor)
                WHERE a.nombreAutor LIKE '%".$_POST['busca']."%'  OR e.nombreEditorial LIKE '%".$_POST['busca']."%'  OR g.nombreGenero LIKE '%".$_POST['busca']."%'  OR l.nombreLibro LIKE '%".$_POST['busca']."%' AND l.borradoLogico = 0 AND e.borradoLogico=0 AND e.borradoParanoagregar=0 AND g.borradoLogico=0 AND g.borradoParanoagregar=0 AND a.borradoLogico=0 AND a.borradoParanoagregar=0 AND ((l.fechaDesde BETWEEN l.fechaDesde AND l.fechaHasta) OR (l.fechaHasta='0000-00-00'))");
    return $result;
    exit;
    }
}

?>