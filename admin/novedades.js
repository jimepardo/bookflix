$(document).ready(function(){
    var id, opcion;
    opcion = 4;
    tablaNov = $('#tablaNov').DataTable({ 
        "ajax":{            
            "url": "vistas/crudnovedad.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "idNovedadLibro"},
            {"data": "idLibro"},
            {"data": "descripcion"},
            {"data": "fechaNovedad"},
            {"data": "borradoLogico"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-secondary btn-sm btnEditar'><i class='material-icons'>Modificar</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Borrar</i></button></div></div>"
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
    
    var fila; //capturar la fila para editar o borrar el registro
    
    $("#formNov").submit(function(e){
        e.preventDefault();    
        novedad = $.trim($("#novedad").val());
        descripcion =$.trim($("#descripcion").val());
        desde = $.trim($("#desde").val());
        borrado= $.trim($("#borrado").val());
        var hoy             = new Date();
        var fechaFormulario = new Date(desde);

        $.ajax({
            url: "vistas/crudnovedad.php",
            type: "POST",
            dataType: "json",
            data: {novedad:novedad, borrado:borrado, descripcion:descripcion, desde:desde, id:id, opcion:opcion},
            success: function(data){
                if (data=="error") {
                    alertify.notify('¡Error! La fecha de publicacion no puede ser menor a la del dia de hoy','error',3);
                }
                else {
                    alertify.notify('¡Cambios guardados exitosamente!','success',3);
                } 
                tablaNov.ajax.reload(null,false);
                document.getElementById("novedad").disabled = false;
                document.getElementById("descripcion").disabled = false;
                document.getElementById("desde").disabled = false;
                document.getElementById("borrado").disabled = false;
            }        
        });
        $('#modalCRUD').modal('hide');     
    }); 
        
    $("#btnNuevo").click(function(){
        opcion = 1; //alta
        id=null;
        document.getElementById("borrado").disabled = true;
        $("#formNov").trigger("reset");
        $(".modal-header").css("background-color", "#CE0909");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Nueva novedad");            
        $('#modalCRUD').modal('show');         
    });    
        
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function(){
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        descripcion = fila.find('td:eq(2)').text();
        desde = fila.find('td:eq(3)').text();

        $("#descripcion").val(descripcion);
        $("#desde").val(desde);
        
        $(".modal-header").css("background-color", "#7D7A7A");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Modificar novedad");            
        $('#modalCRUD').modal('show');  
    
        document.getElementById("novedad").disabled = true;
        document.getElementById("borrado").disabled = true;    
    });
    
    //botón BORRAR
    $(document).on("click", ".btnBorrar", function(){    
        opcion = 3; //borrar
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        borrado = fila.find('td:eq(4)').text();
        
        $("#borrado").val(borrado);
        $("#borrado2").val(borrado2);
    
        $(".modal-header").css("background-color", "#CE0909");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Borrar novedad");            
        $('#modalCRUD').modal('show'); 
        document.getElementById("novedad").disabled = true;
        document.getElementById("descripcion").disabled = true;
        document.getElementById("desde").disabled = true;
    });
    
    });