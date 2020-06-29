$(document).ready(function(){
    var id, opcion;
    opcion = 4;
    tablaCap = $("#tablaCap").DataTable({
        "ajax":{            
            "url": "vistas/crudcap.php", 
            "method": 'POST', //usamos el metodo POST copiaaaa
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"render": function(data,type,full){
                var eventId = full['nombreLibro'];
                return eventId;
            }},
            {"data": "idCapitulo","bSearchable": false, "bVisible": false},
            {"data": "numeroCapitulo"},
            {"data": "nombreCapitulo"},
            {"render": function(data,type,full){
                var eventId = full['borradoLogico'];
                if(eventId == '0')
                return 'No esta borrado';
                else   
                    return 'Capitulo Borrado';
               }},
            {"data": "pdf"},
            {"data": "idLibro" ,"bSearchable": false, "bVisible": false},
            {"data": "fechaDesde"},
            {"data": "fechaHasta"},
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

    $("#formcap").submit(function(e){ //submit para el alta y actualizacion
        e.preventDefault();    
        
        var form_data2 = new FormData(document.getElementById("formcap")); 
       // console.log(Array.from(form_data2));
        form_data2.getAll("formcap");
        form_data2.append("opcion", opcion); 
        form_data2.append("libro", libro);                          
        console.log(Array.from(form_data2));    
        $.ajax({
            url: "vistas/crudcap.php",            
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data2,
            type: "post",    
           success: function(data){  
               console.log(data);
                if (data=="error1"){
                    alertify.notify('¡Error! La fecha HASTA cuando esta disponible el capitulo es MAYOR a la fecha HASTA cuando esta disponible el libro', 'error',6);
                }else{
                    if (data=="error2"){
                        alertify.notify('¡Error! La fecha DESDE cuando esta disponible el capitulo es MENOR a la fecha a partir de cuando esta disponible el libro ', 'error',6);
                    }else{
                        if (data=="error3"){
                            alertify.notify('¡Error! La fecha inicio es superior a la fecha de fin ', 'error',6);
                        }else{
                            if (data=="error4"){
                                alertify.notify('¡Error! El numero de capitulo ingresado para el libro seleccionado ya existe', 'error',6);
                            }else{
                                if(data=="error5"){ 
                                    alertify.notify('¡Error! No se admite este tipo de archivo, intente con un PDF', 'error',4);
                                }else{
                                    if (data=="error6"){
                                        alertify.notify('¡Error! El archivo es muy grande, intente con otro PDF', 'error',3);
                                    }else{ 
                                        alertify.notify('¡Cambios guardados exitosamente!','success',3);
                                        tablaCap.ajax.reload(null, false); 
                                        document.getElementById("libro").disabled = false;
                                          
                                        $("#modalCRUD").modal("hide");                                         
                                    }
                                }
                            }
                        }       
                    }
                }                
                                         
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
            //alert();
      }       
        });
        //      
    });    


    //limpiar os campos antes de dar de alta un libro
$("#btnNuevo").click(function(){
    opcion = 1; //alta
    id=null;
    $("#pdf").attr("required", true);
    $("#formcap").trigger("reset");
    $(".modal-header").css("background-color", "#CE0909");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Nuevo Capitulo");            
    $("#modalCRUD").modal("show");           
});    
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    opcion = 2; //editar
    fila = $(this).closest("tr");

    var data = $('#tablaCap').DataTable().row(fila).data();//cpn esta linea accedo a toda una fila de la tabla
   // console.log(data); //con esta linea imprimo la columna escondida del ID,asi el cliente no la ve

    libro=data["idLibro"];
    id=data["idCapitulo"];
    num = fila.find('td:eq(1)').text();
    nombre = fila.find('td:eq(2)').text();
    pdf = fila.find('td:eq(3)').text();
    fechaD = fila.find('td:eq(5)').text();
    fechaH = fila.find('td:eq(6)').text();
    
  //  console.log(data["idCapitulo"]);
   // console.log(num);    
   // console.log(data["idLibro"]);
        
    $("#id").val(data["idCapitulo"]);
    $("#libro").val(data["idLibro"]);
    $("#num").val(num);
    $("#nombre").val(nombre);
    $("#fechaD").val(fechaD);
    $("#fechaH").val(fechaH);

    $("#pdf").removeAttr("required");    
    $(".modal-header").css("background-color", "#7D7A7A");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Modificar capitulo");            
    $("#modalCRUD").modal("show");  
    
   document.getElementById("libro").disabled=true;    
});


//botón BORRAR
$(document).on("click", ".btnBorrar", function(){
    opcion = 3; //eliminar    
    fila = $(this).closest("tr"); 
    var data = $('#tablaCap').DataTable().row(fila).data();
    if (data["borradoLogico"] == 0){
        id=data["idCapitulo"];
        num = fila.find('td:eq(1)').text();
        nombre = fila.find('td:eq(2)').text();
        libro=data["idLibro"];
        nombrel=data["nombreLibro"]
        console.log(nombre);
        console.log(data["idLibro"]);
        var respuesta = confirm("¿Está seguro de borrar el capitulo "+nombre+" del libro "+nombrel +"?");                
        if (respuesta) {            
            $.ajax({
                url: "vistas/crudcap.php",
                type: "POST",
                dataType: "json",
                data: {id:id, opcion:opcion, num:num, libro:libro},      
            success: function(data) {
                console.log(data);
                if (data=="errorleyendo"){
                    var respuesta2 = confirm("¿Está seguro de borrar el capitulo "+nombre+" del libro "+nombrel +"? Hay personas que lo estan leyendo");
                   
                    if (respuesta2){
                        $.ajax({
                            url: "vistas/crudcap.php",
                            type: "POST",
                            dataType: "json",
                            data: {id:id, opcion:5, num:num, libro:libro},      
                        success: function() {
                            alertify.notify('¡Capitulo borrado exitosamente!','success',3); 
                            tablaCap.ajax.reload(null,false);
                        }
                        });
                    }else{
                        alertify.notify('Cancelado','error',3);
                    }
                }else{
                    var respuesta3 = confirm("¿Está seguro de borrar el capitulo "+nombre+" del libro "+nombrel +"? No hay nadie leyendo este capitulo");
                    if (respuesta3){
                        $.ajax({
                            url: "vistas/crudcap.php",
                            type: "POST",
                            dataType: "json",
                            data: {id:id, opcion:5, num:num, libro:libro},      
                        success: function() {
                            alertify.notify('¡Capitulo borrado exitosamente!','success',3); 
                            tablaCap.ajax.reload(null,false);
                        }
                        });
                    }
                    else{
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
        alertify.notify('¡Error! El capitulo ya se borró','error',3);
    }
 });
   
});