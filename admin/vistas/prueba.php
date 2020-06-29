<?php 
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <?php
      
            $consulta1="SELECT * FROM capitulo WHERE idCapitulo='1'";
            $resultado1= $conexion->prepare($consulta1);
            $resultado1->execute();
            $datos=$resultado1->fetch();
            $fechaD=$datos['fechaDesde'];
            $fechaH=$datos['fechaHasta'];
            //si las fechas estan bien y el numero de capitulo no se repiten para ese libro seleccionado entonces pregunto por los pdf y agrego
            $consulta2="SELECT DISTINCT fechaHasta, fechaDesde FROM libro WHERE idLibro='2'";
        if (fechaD< fechaH)
            $resultado2 = $conexion->prepare($consulta2);
            $resultado2->execute();
            $fechaDlibro= $resultado2->fetch();
            if ($fechaD <= $fechaDlibro['fechaDesde']){
               echo  $data="error5"." ". $fechaD . "menos esta fecha " . $fechaDlibro['fechaDesde'];// la fecha de dispobibilidad del capitulo es menor a la del libro
            }else{
                echo "las fechas estan bien"." la fecha desde cuando esta disponible el capitulo-->  ". $fechaD . " es mayor o igual a la fecha desde cuando esta disponible el libro--> " . $fechaDlibro['fechaDesde'] .'<br>';
              /*   $consulta3="SELECT DISTINCT idLibro, fechaHasta FROM libro  WHERE idLibro='2'";
        
                $resultado2 = $conexion->prepare($consulta3);
                $resultado2->execute();
                $fechaDlibro2= $resultado2->fetch(); */
                if ($fechaH >= $fechaDlibro['fechaHasta']){
                    echo $data="error6"." esta fecha ". $fechaH . " - esta otra fecha " . $fechaDlibro['fechaHasta']. " da como resultado que se pasa".'<br>'; // la fecha de disponibilidad del capitulo es mayor a la del libro
                }else{
                    echo "las fechas estan bien" . " las fecha de hasta cuando esta disponible el capitulo es--> " . $fechaH  . " y la fecha hasta cuando esta disponible el libro es--> " .$fechaDlibro['fechaHasta'] . '<br>';
                    if ($fechaD >= $fechaH){
                        echo " error5 las fechas son validas, la fecha hasta es menor o igual a la fecha desde ".'<br>'."la fecha desde cuando esta disponible es--> ".$fechaD." y la fecha hasta cuando esta disponible el capitulo es--> ". $fechaH ;
                    }else{
                        echo "la fecha hasta cuando esta disponible el capitulo es--> ". $fechaH . " que es mayor o igual, a la fecha desde cuando esta disponible el capitulo " . $fechaD;
                    }
                }
            }
            
    /*else{
                $consulta3="SELECT DISTINCT l.idLibro, l.fechaHasta FROM libro l INNER JOIN capitulo c ON (c.idLibro=l.idLibro) WHERE l.idLibro=$libro";
           
                $resultado2 = $conexion->prepare($consulta2);
                $resultado2->execute();
                $fechaDlibro= $resultado2->fetch();
                $result3=compararFechas($fechaDlibro['fechaHasta'],$fechaD);
                if ($result3 < 0){
                    $data="error6"; // la fecha de disponibilidad del capitulo es mayor a la del libro
                }else{
                    $consulta="SELECT * FROM capitulo WHERE numeroCapitulo=$num AND idLibro=$libro";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    if ($data= $resultado->fetch()){
                        $data="error2"; // numero de capitulo existente
                    }else{
                        if((isset($_FILES['pdf'])) && (!empty($_FILES['pdf']))){
                            $nomPdf=$_FILES['pdf']["name"];
                            $tipoPdf=$_FILES['pdf']['type'];
                            $tamanio=$_FILES['pdf']['size'];
                        
                            $nombrePdf= $num."-".$nomPdf;
                            if ($tamanio<= 1262074){
                                if ($tipoPdf=="application/pdf") {    // compara que sea un tipo correcto de imagen   
                                    $carpetaDestino=$_SERVER ['DOCUMENT_ROOT'].'/bookflix/pdfs/';

                                    //Mover imagen del directorio temporal al directorio escogido
                                    move_uploaded_file($_FILES['pdf']['tmp_name'], $carpetaDestino.$nombrePdf);
                                    $consulta = "INSERT INTO capitulo (numeroCapitulo, nombreCapitulo, borradoLogico, pdf, idLibro, fechaDesde, fechaHasta) VALUES('$num', '$nombre', '0', '$nombrePdf', '$libro', '$fechaD', '$fechaH')";          
                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute(); 

                                    $consulta = "SELECT * FROM capitulo ORDER BY idCapitulo DESC LIMIT 1";
                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                }else{
                                    $data="error3"; // El tipo de la portada no esta permitido, intente con jpg 
                                }
                            }else{
                                $data="error4";// La portada pesa demasiado
                            }
                        }                
                    }
                }
            }*/

            
        
        ?>

        
	<div style="height: 100%; width: 100%" class="containter">
    <button id="boton" style="position: fixed; width: 30px; height: 30px"></button>


	<iframe id="frame" src="pdfs/2-2147483647-sentido_y_sensibilidad.pdf#toolbar=0&navpanes=0&scrollbar=0&page=10" style="width: 100%;height: 645px" ></iframe>

    </div>
   <!--Scripts de bootstrap -->
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- pie de pagina -->
    <br><br>
    <hr width="92.5% " color="gray ">
    <footer>
    <a class="pfrecuentes" href="preguntasfrecuentes.php" style="margin-left:65px; color:gray;"><u>Preguntas Frecuentes</u></a>
    </footer>
</body>
</html>