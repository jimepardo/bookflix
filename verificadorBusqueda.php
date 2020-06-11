<?php 
	
function resultadoBusqueda(){
    include('BaseDatosYConex/conexion.php');

    if(isset($_POST['busca'])){
   
	$result=mysqli_query($conexion,"SELECT * 
                FROM libro l
                    INNER JOIN genero g ON (g.idGenero = l.idGenero)
                    INNER JOIN editorial e ON (e.idEditorial = l.idEditorial)
                    INNER JOIN autor a ON (a.idAutor = l.idAutor)
                WHERE a.nombreAutor ='".$_POST['busca']."'  OR e.nombreEditorial='".$_POST['busca']."'  OR g.nombreGenero='".$_POST['busca']."'  OR l.nombreLibro= '".$_POST['busca']."' ");
    return $result;
    exit;
    }
}

?>