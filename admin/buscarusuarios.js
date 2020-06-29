$(document).ready(function(){
    var id, opcion;
    opcion = 1;
    tablaUser = $('#tablauser').DataTable({ 
        "ajax":{            
            "url": "vistas/cruduser.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 1 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id", "bSearchable": false, "bVisible": false}, //id usuario 0
            {"data": "nombreUsuario"},  // 1
            {"data": "apellido"}, // 2
            {"data": "emailUsuario"},  //3
            {"render": function(data,type,full){
                var eventId = full['permisoUsuario'];
                if(eventId == '1')
                return 'Usuario Básico';
                else{
                    if(eventId == '2')
                        return 'Usuario Premium';
                }     
               }}, 
            ], //
         
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
    
    $("#formuser").submit(function(e){
        e.preventDefault();    
        desde = $.trim($("#desde").val());
        hasta =$.trim($("#hasta").val());
        id =$.trim($("#id").val());
      
        $.ajax({
            url: "vistas/cruduser.php",
            type: "POST",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: {desde:desde, hasta:hasta, opcion:opcion},   
            success: function(){   
                tablaUser.ajax.reload(null,false);                  
            }      
        });
        $('#modalCRUD').modal('hide');
    }); 
    $("#btnEditar").click(function(){
        opcion = 2; //buscar
        
        fila = $(this).closest("tr");
        var data = $('#tablauser').DataTable().row(fila).data();//con esta linea accedo a toda una fila de la tabla
        //console.log(data['id']); //con esta linea imprimo la columna escondida del ID,asi el cliente no la ve
        id=data['id'];
 //       $("#id").val(data["id"]);
   
        $("#desde").val(desde);
        $("#hasta").val(hasta);
        
      //  $("#formuser").trigger("reset");
        $(".modal-header").css("background-color", "#CE0909");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Busqueda de usuarios");            
        $('#modalCRUD').modal('show');         
    }); 


   
    });