$(document).ready(function(){
    var id, opcion;
    opcion = 4;
    tablaGenero = $('#tablaGenero').DataTable({ 
        "ajax":{            
            "url": "vistas/crudgenero.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "idGenero"},
            {"data": "nombreGenero"},
            {"data": "borradoLogico"},
            {"data": "borradoParanoagregar"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-secondary btn-sm btnEditar'><i class='material-icons'>Modificar</i></button></div></div>"
        }], //<button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Borrar</i></button>
         
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
    
    $("#formGenero").submit(function(e){
        e.preventDefault();    
        nombre = $.trim($("#nombre").val());
        borrado =$.trim($("#borrado").val());
        borrado2 =$.trim($("#borrado2").val());  
        $.ajax({
            url: "vistas/crudGenero.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre, borrado:borrado, borrado2:borrado2, id:id, opcion:opcion},
            success: function(data){  
                 if (data == "error"){
                    alertify.notify('¡Error! El género ya se encuentra registrado','error',3);
                }else{ 
                    alertify.notify('¡Cambios guardados exitosamente!','success',3);   
                    tablaGenero.ajax.reload(null,false);
                }
                document.getElementById("nombre").disabled = false;
                document.getElementById("borrado").disabled = false;
                document.getElementById("borrado2").disabled = false;
            }        
        });
        $('#modalCRUD').modal('hide');     
    }); 
        
    $("#btnNuevo").click(function(){
        opcion = 1; //alta
        id=null;
        document.getElementById("borrado").disabled = true;
        document.getElementById("borrado2").disabled = true;
        $("#formGenero").trigger("reset");
        $(".modal-header").css("background-color", "#CE0909");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Nuevo Género");            
        $('#modalCRUD').modal('show');         
    });    
        
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function(){
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        
        $("#nombre").val(nombre);
        
        $(".modal-header").css("background-color", "#7D7A7A");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Modificar género");            
        $('#modalCRUD').modal('show');  
    
        document.getElementById("borrado").disabled = true;
        document.getElementById("borrado2").disabled = true;    
    });
    
    //botón BORRAR
    $(document).on("click", ".btnBorrar", function(){    
        opcion = 3; //borrar
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        borrado = fila.find('td:eq(2)').text();
        borrado2 = fila.find('td:eq(3)').text();
        
        $("#borrado").val(borrado);
        $("#borrado2").val(borrado2);
    
        $(".modal-header").css("background-color", "#CE0909");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Borrar género");            
        $('#modalCRUD').modal('show'); 
        document.getElementById("nombre").disabled = true;
    });
    
    });