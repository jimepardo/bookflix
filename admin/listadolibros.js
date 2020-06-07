$(document).ready(function(){
    var opcion;
    opcion = 1;
    tablaLibros = $("#tablaLibros").DataTable({
        "ajax":{            
            "url": "vistas/libro.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 1 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ISBN"},
            {"data": "nombreLibro"},
            {"data": "descripcionLibro"},
            {"data": "borradoLogico"},
            {"data": "portadaLibro"},
            {"data": "fechaLanzamiento"},
            {"data": "idGenero"},
            {"data": "idAutor"},
            {"data": "idEditorial"},
            {"data": "fechaDesde"},
            {"data": "fechaHasta"
        }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        },
    });
   
});