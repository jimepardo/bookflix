$(document).ready(function(){
    var id, opcion;  
    opcion = 4;
    tablaLibros = $("#tablaLibros").DataTable({
        "ajax":{            
            "url": "vistas/crudLibros.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "idLibro","bSearchable": false, "bVisible": false},
            {"data": "ISBN"},
            {"data": "nombreLibro"},
            {"data": "descripcionLibro"},
            {"render": function(data,type,full){
                var eventId = full['borradoLogico'];
                if(eventId == '0')
                return 'No esta borrado';
                else   
                    return 'Borrado';
               }},
            {"data": "portadaLibro"},
            {"data": "fechaLanzamiento"},
            {"data": "idGenero","bSearchable": false, "bVisible": false},
            {"render": function(data,type,full){
                var eventId = full['nombreGenero'];
                return eventId;
            }},
            {"data": "idAutor","bSearchable": false, "bVisible": false},
            {"render": function(data,type,full){
                var eventId = full['nombreAutor'];
                return eventId;
            }},
            {"data": "idEditorial","bSearchable": false, "bVisible": false},
            {"render": function(data,type,full){
                var eventId = full['nombreEditorial'];
                return eventId;
            }},
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

    $("#formLibros").submit(function(e){ //submit para el alta y actualizacion
        e.preventDefault();    
               
        var form_data2 = new FormData(document.getElementById("formLibros")); 
        console.log(Array.from(form_data2));
        form_data2.getAll("formLibros");
        form_data2.append("opcion", opcion);                                    
        console.log(Array.from(form_data2));

        $.ajax({
            url: "vistas/crudLibros.php",            
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data2,
            type: "post",    
           success: function(data){  
                if (data =="error1"){
                    alertify.notify('¡Error! La fecha de publicacion no puede ser menor a la del dia del lanzamiento', 'error',3);
                }else{
                    if (data=="error2"){
                        alertify.notify('¡Error! La fecha de hasta cuando estara disponible es inferior a la fecha de publicacion', 'error',3);
                    }else{
                        if (data == "error3"){
                            var value= Array.from(form_data2)[1][1];
                            var string="¡Error! El ISBN "+value+" ya se encuentra registrado";
                            alertify.notify(string, 'error',3);
                        }else{
                            if (data == "error4"){
                                alertify.notify('¡Error! La portada es muy pesada', 'error',3);
                            }else{
                                if(data == "error5"){
                                    alertify.notify('¡Error! Hubo un error al subir la foto', 'error',3);
                                }else{
                                    if (data == "error6"){
                                        alertify.notify('¡Error! Formato invalido', 'error',3);
                                    }else{                                      
                                        alertify.notify('¡Cambios guardados exitosamente!','success',3);
                                        tablaLibros.ajax.reload(null, false); 
                                        document.getElementById("isbn").disabled = false;  
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
    $("#formLibros").trigger("reset");
    $(".modal-header").css("background-color", "#CE0909");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Nuevo Libro");            
    $("#modalCRUD").modal("show");           
});    
     
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    opcion = 2; //editar
    fila = $(this).closest("tr");
    var data = $('#tablaLibros').DataTable().row(fila).data();//con esta linea accedo a toda una fila de la tabla
    console.log(data["idLibro"]); //con esta linea imprimo la columna escondida del ID,asi el cliente no la ve

    isbn = fila.find('td:eq(0)').text();
    nombre = fila.find('td:eq(1)').text();
    desc = fila.find('td:eq(2)').text();
    portada = fila.find('td:eq(3)').text();
    fechaD = fila.find('td:eq(5)').text();
    fechaH = fila.find('td:eq(6)').text();
   
    idGen=data["idGenero"];
    idAu=data["idAutor"];
    idEd=data["idEditorial"];
      
    $("#id").val(data["idLibro"]);
    $("#isbn").val(isbn);
    $("#nombre").val(nombre);
    $("#desc").val(desc);
   // $("#borrado").val(borrado);
   // $("#portada").val(portada);
    //$("#fechaL").val(fechaL);
    $("#idGen").val(data["idGenero"]);
    $("#idAu").val(data["idAutor"]);
    $("#idEd").val(data["idEditorial"]);
    $("#fechaD").val(fechaD);
    $("#fechaH").val(fechaH);
        
    $(".modal-header").css("background-color", "#7D7A7A");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Modificar libro");            
    $("#modalCRUD").modal("show");  
  //  document.getElementById("portada").disabled=true; 
   document.getElementById("isbn").disabled=true;    
});
   

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){
    opcion = 3; //eliminar    
    fila = $(this).closest("tr"); 
    var data = $('#tablaLibros').DataTable().row(fila).data();
    if (data["borradoLogico"] == 0){
        id=data["idLibro"];
        nombre = fila.find('td:eq(1)').text();
        console.log(nombre);
        console.log(data["idLibro"]);
        var respuesta = confirm("¿Está seguro de borrar el libro "+nombre+"?");                
        if (respuesta) {            
            $.ajax({
                url: "vistas/crudLibros.php",
                type: "POST",
                dataType: "json",
                data: {id:id, opcion:opcion},      
            success: function(data) {
                if (data=="errorleyendo"){
                    var respuesta2 = confirm("¿Está seguro de borrar el libro "+nombre+"? Hay personas que lo estan leyendo");
                   
                    if (respuesta2){
                        $.ajax({
                            url: "vistas/crudLibros.php",
                            type: "POST",
                            dataType: "json",
                            data: {id:id, opcion:5},      
                        success: function() {
                            alertify.notify('¡Libro borrado exitosamente!','success',3); 
                            tablaLibros.ajax.reload(null,false);
                        }
                        });
                    }else{
                        alertify.notify('Cancelado','error',3);
                    }
                }else{
                    var respuesta3 = confirm("¿Está seguro de borrar el libro "+nombre+"? No hay nadie leyendo este libro");
                    if (respuesta3){
                        $.ajax({
                            url: "vistas/crudLibros.php",
                            type: "POST",
                            dataType: "json",
                            data: {id:id, opcion:5},      
                        success: function() {
                            alertify.notify('¡Libro borrado exitosamente!','success',3); 
                            tablaLibros.ajax.reload(null,false);
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
        alertify.notify('¡Error! El libro ya se borró','error',3);
    }
 });

});