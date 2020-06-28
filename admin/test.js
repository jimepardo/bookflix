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
            {"data": "idLibro"},
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
        /* isbn     =  $.trim($("#isbn").val());
        nombre   =  $.trim($("#nombre").val());
        desc     =  $.trim($("#desc").val());
        borrado  =  $.trim($("#borrado").val());
        portada  =  $.trim($("#portada").val());
      //  fechaL   =  $.trim($("#fechaL").val());
        idGen    =  $.trim($("#idGen").val());
        idAu     =  $.trim($("#idAu").val());  
        idEd     =  $.trim($("#idEd").val());  
        fechaD   =  $.trim($("#fechaD").val());
        fechaH   =  ($("#fechaH").val());  */
        
        var form_data2 = new FormData(document.getElementById("formLibros")); 
        console.log(Array.from(form_data2));
        form_data2.getAll("formLibros");
        form_data2.append("opcion", opcion); 
        form_data2.append("id", id);                                     
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
                            alerify.notify('¡Error! El ISBN ya se encuentra registrado', 'error',3);
                        }else{
                            if (data == "error4"){
                                alerify.notify('¡Error! La portada es muy pesada', 'error',3);
                            }else{
                                if(data == "error5"){
                                    alerify.notify('¡Error! Hubo un error al subir la foto', 'error',3);
                                }else{
                                    if (data == "error6"){
                                        alerify.notify('¡Error! Formato invalido', 'error',3);
                                    }else{                                      
                                        alertify.notify('¡Cambios guardados exitosamente!','success',3);
                                        tablaLibros.ajax.reload(null, false); 
                                        document.getElementById("isbn").disabled = false;
                                        document.getElementById("nombre").disabled = false;
                                        document.getElementById("desc").disabled = false;
                                        document.getElementById("portada").disabled = false;
                                        document.getElementById("idGen").disabled = false;
                                        document.getElementById("idAu").disabled = false;
                                        document.getElementById("idEd").disabled = false;
                                        document.getElementById("fechaD").disabled = false;
                                        document.getElementById("fechaH").disabled = false;  
                                        document.getElementById("borrado").disabled = false;  
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
    document.getElementById("borrado").disabled = true;
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
    id = parseInt(fila.find('td:eq(0)').text());
    //isbn = parseInt(find('td:eq(1)').text());
    nombre = fila.find('td:eq(2)').text();
    desc = fila.find('td:eq(3)').text();
    //borrado= parseInt(find('td:eq(4)').text());
    portada = fila.find('td:eq(5)').text();
   // fechaL= fila.find('td:eq(6)').text();
    idGen = parseInt(fila.find('td:eq(7)').text());
    idAu = parseInt(fila.find('td:eq(8)').text());
    idEd = parseInt(fila.find('td:eq(9)').text());
    fechaD = fila.find('td:eq(10)').text();
    fechaH = fila.find('td:eq(11)').text();
    
    
  //  $("#isbn").val(isbn);
    $("#nombre").val(nombre);
    $("#desc").val(desc);
   // $("#borrado").val(borrado);
   // $("#portada").val(portada);
    //$("#fechaL").val(fechaL);
    $("#idGen").val(idGen);
    $("#idAu").val(idAu);
    $("#idEd").val(idEd);
    $("#fechaD").val(fechaD);
    $("#fechaH").val(fechaH);
        
    $(".modal-header").css("background-color", "#7D7A7A");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Modificar libro");            
    $("#modalCRUD").modal("show");  
  //  document.getElementById("portada").disabled=true; 
    document.getElementById("borrado").disabled= true;
    document.getElementById("isbn").disabled=true;    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){ 
    opcion = 3 //borrar   
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    borrado= fila.find('td:eq(4)').text();
    
    $("#borrado").val(borrado);
    
    $(".modal-header").css("background-color", "#CE0909");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Borrar libro");            
    $('#modalCRUD').modal('show'); 
    document.getElementById("isbn").disabled = true;
    document.getElementById("nombre").disabled = true;
    document.getElementById("desc").disabled = true;
    document.getElementById("portada").disabled = true;
    document.getElementById("idGen").disabled = true;
    document.getElementById("idAu").disabled = true;
    document.getElementById("idEd").disabled = true;
    document.getElementById("fechaD").disabled = true;
    document.getElementById("fechaH").disabled = true;  
});
   
});