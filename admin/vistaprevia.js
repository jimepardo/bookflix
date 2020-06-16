$(document).ready(function(){
    var id, opcion;
    opcion = 4;
    tablaCap = $("#tablaCap").DataTable({
        "ajax":{            
            "url": "vistas/crudvistap.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "idVistap"},
            {"data": "numeroVistap"},
            {"data": "nombreVistap"},
            {"data": "borradoLogico"},
            {"data": "pdf"},
            {"data": "idLibro"},
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
        console.log(Array.from(form_data2));
        form_data2.getAll("formcap");
        form_data2.append("opcion", opcion); 
        form_data2.append("id", id);                                     
        console.log(Array.from(form_data2));

        $.ajax({
            url: "vistas/crudvistap.php",            
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data2,
            type: "post",    
           success: function(data){  
                if (data =="error1"){
                    alertify.notify('¡Error! La fecha ingresada desde es menor a la fecha hasta ingresada ', 'error',3);
                }else{
                    if (data=="error2"){
                        alertify.notify('¡Error! El numero de capitulo ingresado para el libro seleccionado ya existe', 'error',3);
                    }else{
                        if (data == "error3"){
                            alertify.notify('¡Error! El archivo es invalido, intente con un PDF ', 'error',3);
                        }else{
                            if (data == "error4"){
                                alertify.notify('¡Error! El archivo PDF pesa mucho, elija otro', 'error',3);
                            }else{
                                //if(data == "error5"){ ¡Error! La fecha de hasta cuando estara disponible es inferior a la fecha de publicacion
                                //    alerify.notify('¡Error! El archivo PDF de la vista previa no es un archivo PDF', 'error',3);
                                //}else{
                                //    if (data == "error6"){¡Error! La fecha ingresada DESDE es menor a la fecha de disponibilidad desde cuando esta disponible el libro seleccionado
                                //        alerify.notify('¡Error! El archivo PDF de la vista previa pesa mucho, elija otro', 'error',3);
                                //    }else{ 
                                //         if (data == "error7"){La fecha ingresada HASTA es mayor a la fecha de disponibilidad de hasta cuando estara disponible el libro seleccionado
                                //            alerify.notify('¡Error! El archivo del PDF es invalido, intente con un PDF', 'error',3);
                                //        }else{
                                //            if (data == "error8"){
                                //                alerify.notify('¡Error! El archivo PDF pesa mucho, elija otro', 'error',3);
                                //          }else{
                                                alertify.notify('¡Cambios guardados exitosamente!','success',3);
                                                tablaCap.ajax.reload(null, false); 
                                                document.getElementById("num").disabled = false;
                                                document.getElementById("nombre").disabled = false;
                                                document.getElementById("pdf").disabled = false;
                                                document.getElementById("libro").disabled = false;
                                                document.getElementById("fechaD").disabled = false;
                                                document.getElementById("fechaH").disabled = false;  
                                                document.getElementById("borrado").disabled = false;  
                                                $("#modalCRUD").modal("hide");
                                            //}
                                       // }                                             
                                    //}
                                //}
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
    $("#formcap").trigger("reset");
    $(".modal-header").css("background-color", "#CE0909");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Nueva vista previa");            
    $("#modalCRUD").modal("show");           
});    
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    opcion = 2; //editar
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    num = parseInt(fila.find('td:eq(1)').text());
    nombre = fila.find('td:eq(2)').text();
     //borrado= parseInt(find('td:eq(3)').text());
   // pdf = fila.find('td:eq(4)').text();
  
   // libro= fila.find('td:eq(5)').text();
    fechaD = fila.find('td:eq(6)').text();
    fechaH = fila.find('td:eq(7)').text();
    
    
    $("#num").val(num);
    $("#nombre").val(nombre);
  //  $("#pdf").val(pdf);
   // $("#vistaprevia").val(vistaprevia);
   // $("#libro").val(libro);
    $("#fechaD").val(fechaD);
    $("#fechaH").val(fechaH);
        
    $(".modal-header").css("background-color", "#7D7A7A");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Modificar vista previa");            
    $("#modalCRUD").modal("show");  
    document.getElementById("pdf").disabled= true;
    document.getElementById("borrado").disabled= true;
    document.getElementById("libro").disabled=true;    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){ 
    opcion = 3 //borrar   
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    borrado= fila.find('td:eq(3)').text();
    
    $("#borrado").val(borrado);
    
    $(".modal-header").css("background-color", "#CE0909");
    $(".modal-header").css("color", "#F5F5F1");
    $(".modal-title").text("Borrar vista previa");            
    $('#modalCRUD').modal('show'); 
    document.getElementById("num").disabled = true;
    document.getElementById("nombre").disabled = true;
    document.getElementById("pdf").disabled = true;
    document.getElementById("libro").disabled = true;
    document.getElementById("fechaD").disabled = true;
    document.getElementById("fechaH").disabled = true;  
});
   
});