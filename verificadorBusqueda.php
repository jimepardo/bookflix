<?php 
	
function resultadoBusqueda(){
    include('BaseDatosYConex/conexion.php');
    $busca= $_POST['busca'];
    if(isset($_POST['busca'])){
   
	$result=mysqli_query($conexion,"SELECT * 
                FROM libro l
                    INNER JOIN genero g ON (g.idGenero = l.idGenero)
                    INNER JOIN editorial e ON (e.idEditorial = l.idEditorial)
                    INNER JOIN autor a ON (a.idAutor = l.idAutor)
                WHERE (a.nombreAutor LIKE '%$busca%'  OR e.nombreEditorial LIKE '%$busca%' OR g.nombreGenero LIKE '%$busca%'  OR l.nombreLibro LIKE '%$busca%') AND l.borradoLogico = '0' AND e.borradoParanoagregar='0' AND a.borradoParanoagregar='0' AND ((l.fechaDesde BETWEEN l.fechaDesde AND l.fechaHasta) OR (l.fechaHasta='0000-00-00'))");
    return $result;
    exit;
    }
}

?>