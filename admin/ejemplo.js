$(document).ready(function(){
    var id, opcion;
    opcion = 4;
    tablaNov = $('#tablaNov').DataTable({ 
        
        "columns":[
            {"data": "idComentario"},
            {"data": "textoComentario"},
            {"data": "borradoLogico"},
            {"data": "idLibro"},
            {"data": "idPerfil"},
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
    
    $("#formNov").submit(function(e){
        e.preventDefault();    
        

       
            
    }); 
        
    $("#btnNuevo").click(function(){
        opcion = 1; //alta
        id=null;
                   
        $('#modalCRUD').modal('show');         
    });    
        
    //botón EDITAR    
    $(document).on("click", ".btnEditar", function(){
        opcion = 2; //editar
                    
        $('#modalCRUD').modal('show');      
    });
    
    //botón BORRAR
    $(document).on("click", ".btnBorrar", function(){    
        opcion = 3; //borrar
           
        $('#modalCRUD').modal('show'); 
        
    });
    
    });