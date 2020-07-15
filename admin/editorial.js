$(document).ready(function(){
    var id, opcion;
    opcion = 4;
    tablaEditorial = $('#tablaEditorial').DataTable({ 
        "ajax":{            
            "url": "vistas/crudeditorial.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "idEditorial", "bSearchable": false, "bVisible": false},
            {"data": "nombreEditorial"},
            {"render": function(data,type,full){
                var eventId = full['borradoLogico'];
                var eventId2= full['borradoParanoagregar'];
                if((eventId == '0') && (eventId2 == '0'))
                return 'Activo';
                else{
                    if ((eventId == '1') && (eventId2 == '0')){
                        return 'No activo, NO se ocultan libros';
                    }else{
                        return 'No activo, SI se ocultan libros';
                    }
                }
               }},
            
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-secondary btn-sm btnEditar'><i class='material-icons'>Modificar</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Borrar</i></button><button class='btn btn-dark btn-sm btnBorrarF'><i class='material-icons'>Borrar y ocultar</i></button></div></div>"
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
    
    $("#formEditorial").submit(function(e){
        e.preventDefault();    
        nombre = $.trim($("#nombre").val());  
        $.ajax({
            url: "vistas/crudeditorial.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre, id:id, opcion:opcion},
            success: function(data){ 
                if (data == "error"){
                    alertify.notify('¡Error! La editorial ya se encuentra registrada','error',3);
                }else{
                    alertify.notify('¡Cambios guardados exitosamente!','success',3);   
                    tablaEditorial.ajax.reload(null,false);
                     $('#modalCRUD').modal('hide');
                }    
            }        
        });        
    }); 
        
    $("#btnNuevo").click(function(){
        opcion = 1; //alta
        id=null;
        $("#formEditorial").trigger("reset");
        $(".modal-header").css("background-color", "#CE0909");
        $(".modal-header").css("color", "#F5F5F1");
        $(".modal-title").text("Nueva Editorial");            
        $('#modalCRUD').modal('show');         
    });    
        
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function(){
        opcion = 2; //editar
        fila = $(this).closest("tr");
        var data = $('#tablaEditorial').DataTable().row(fila).data();
        if(data["borradoLogico"] == 0){
            if (data["borradoParanoagregar"] == 0){
            nombre = fila.find('td:eq(0)').text();
            $("#id").val(data["idEditorial"]);
            $("#nombre").val(nombre); 

            $(".modal-header").css("background-color", "#7D7A7A");
            $(".modal-header").css("color", "#F5F5F1");
            $(".modal-title").text("Modificar editorial");            
            $('#modalCRUD').modal('show'); 
            }else{
                alertify.notify('¡Error! No se puede modificar si esta borrado','error',3);
            } 
        }else{
            alertify.notify('¡Error! No se puede modificar si esta borrado','error',3);
        }    
    });
    
    $(document).on("click", ".btnBorrar", function(){
        opcion = 6; //eliminar      
        fila = $(this).closest("tr"); 
        var data = $('#tablaEditorial').DataTable().row(fila).data();  
        id=data["idEditorial"];
        nombre = fila.find('td:eq(0)').text();
        console.log(nombre);
        console.log(data["idEditorial"]);
        if (data["borradoLogico"] == 0){
            var respuesta = confirm("¿Está seguro de borrar la editorial "+nombre+"?");                
            if (respuesta) {            
                $.ajax({
                    url: "vistas/crudeditorial.php",
                    type: "POST",
                    dataType: "json",
                    data: {id:id, opcion:opcion},      
                success: function(data) {
                    if (data== "errorleyendo"){
                        var respuesta2 = confirm("¿Está seguro de borrar la editorial "+nombre+"? Hay personas que estan leyendo libros de la editorial "+nombre);
                        if (respuesta2){
                            $.ajax({
                                url: "vistas/crudeditorial.php",
                                type: "POST",
                                dataType: "json",
                                data: {id:id, opcion:3},      
                            success: function() {
                                alertify.notify('¡Editorial borrada exitosamente, se mantienen los libros con esta editorial!','success',3); 
                                tablaEditorial.ajax.reload(null,false);
                            }
                            });
                        }else{
                            alertify.notify('Cancelado','error',3);
                        }
                    }else{
                        var respuesta3 =confirm("¿Está seguro de borrar la editorial "+nombre+"? NO hay personas que esten leyendo libros de la editorial "+nombre);
                        if (respuesta3){
                            $.ajax({
                                url: "vistas/crudeditorial.php",
                                type: "POST",
                                dataType: "json",
                                data: {id:id, opcion:3},      
                            success: function() {
                                alertify.notify('¡Capitulo borrado exitosamente!','success',3); 
                                tablaCap.ajax.reload(null,false);
                            }
                            });
                        }else{
                            alertify.notify('Cancelado','error',3);
                        }
                    }
                }
                }); 
            }else{
                alertify.notify('Cancelado','error',3);
            }
        }
        else{
            alertify.notify('¡Error! La editorial ya se borro sin ocultar los libros de esta editorial','error',3);
        }
     });

     $(document).on("click", ".btnBorrarF", function(){
        opcion = 6; //eliminar y ocultar libros   
        fila = $(this).closest("tr"); 
        var data = $('#tablaEditorial').DataTable().row(fila).data();  
        id=data["idEditorial"];
        nombre = fila.find('td:eq(0)').text();
        console.log(nombre);
        console.log(data["idEditorial"]);
        if (data["borradoParanoagregar"] == 0){
            var respuesta = confirm("¿Está seguro de borrar la editorial "+nombre+"?");                
            if (respuesta) {            
                $.ajax({
                    url: "vistas/crudeditorial.php",
                    type: "POST",
                    dataType: "json",
                    data: {id:id, opcion:opcion},      
                success: function(data) {
                    if (data== "errorleyendo"){
                        var respuesta2 = confirm("¿Está seguro de borrar la editorial "+nombre+"? Hay personas que estan leyendo libros de la editorial "+nombre);
                        if (respuesta2){
                            $.ajax({
                                url: "vistas/crudeditorial.php",
                                type: "POST",
                                dataType: "json",
                                data: {id:id, opcion:5},      
                            success: function() {
                                alertify.notify('¡Editorial borrada exitosamente, ocultando libros!','success',3); 
                                tablaEditorial.ajax.reload(null,false);
                            }
                            });
                        }else{
                            alertify.notify('Cancelado','error',3);
                        }
                    }else{
                        var respuesta3 =confirm("¿Está seguro de borrar la editorial "+nombre+"? NO hay personas que esten leyendo libros de la editorial "+nombre);
                        if (respuesta3){
                            $.ajax({
                                url: "vistas/crudeditorial.php",
                                type: "POST",
                                dataType: "json",
                                data: {id:id, opcion:5},      
                            success: function() {
                                alertify.notify('¡Capitulo borrado exitosamente!','success',3); 
                                tablaCap.ajax.reload(null,false);
                            }
                            });
                        }else{
                            alertify.notify('Cancelado','error',3);
                        }
                    }
                }
                });	
            }else{
                alertify.notify('Cancelado','error',3);
            }
        }
        else{
            alertify.notify('¡Error! La editorial ya se borro para ocultar los libros de esta editorial','error',3);
        }
     });
    
    

    });