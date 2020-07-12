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
            {"data": "idGenero", "bSearchable": false, "bVisible": false},
            {"data": "nombreGenero"},
            {"render": function(data,type,full){
                var eventId = full['borradoLogico'];
                if(eventId == '0')
                return 'Activo';
                else   
                    return 'No activo';
               }},
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-secondary btn-sm btnEditar'><i class='material-icons'>Modificar</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Borrar</i></button></div></div>"
        }], //
         
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
      /*  nombre = $.trim($("#nombre").val());
        borrado =$.trim($("#borrado").val());
        borrado2 =$.trim($("#borrado2").val());  */

        var form_data2 = new FormData(document.getElementById("formGenero")); 
        console.log(Array.from(form_data2));
        form_data2.getAll("formGenero");
        form_data2.append("opcion", opcion); 
        $.ajax({
            url: "vistas/crudgenero.php",
            type: "POST",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data2,   
            success: function(data){  
                 if (data == "error"){
                    alertify.notify('¡Error! El género ya se encuentra registrado','error',3);
                }else{ 
                    alertify.notify('¡Cambios guardados exitosamente!','success',3);   
                    tablaGenero.ajax.reload(null,false);
                    document.getElementById("nombre").disabled = false;
                    
                    $('#modalCRUD').modal('hide');
                }             
            }        
        });
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
        var data = $('#tablaGenero').DataTable().row(fila).data();//cpn esta linea accedo a toda una fila de la tabla
        if (data["borradoLogico"] == 0){
            nombre = fila.find('td:eq(0)').text();
            $("#id").val(data["idGenero"]);
            $("#nombre").val(nombre);
            $(".modal-header").css("background-color", "#7D7A7A");
            $(".modal-header").css("color", "#F5F5F1");
            $(".modal-title").text("Modificar género");            
            $('#modalCRUD').modal('show'); 
        }else{
            alertify.notify('¡Error! No se puede modificar si esta borrado','error',3);
        } 
           
    });
    
    $(document).on("click", ".btnBorrar", function(){
        opcion = 3; //eliminar    
        fila = $(this).closest("tr"); 
        var data = $('#tablaGenero').DataTable().row(fila).data();  
        id=data["idGenero"];
        nombre = fila.find('td:eq(0)').text();
        console.log(nombre);
        console.log(data["idGenero"]);
        if (data["borradoLogico"]==0){
            var respuesta = confirm("¿Está seguro de borrar el genero "+nombre+"?");                
            if (respuesta) {            
                $.ajax({
                    url: "vistas/crudgenero.php",
                    type: "POST",
                    dataType: "json",
                    data: {id:id, opcion:opcion},      
                success: function(data) {
                        alertify.notify('¡Genero borrado exitosamente!','success',3); 
                        tablaGenero.ajax.reload(null,false);                  
                }
                });	
            }else{
                alertify.notify('Cancelado','error',3);
            }
        }else{
            alertify.notify('¡Error! El género ya se borró previamente','error',3);
        }
     });
    
    });