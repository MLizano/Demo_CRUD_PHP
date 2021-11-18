
//da propiedades a la tabla y la declara -------------------------------------
$(document).ready( function () {
   tablaUsuarios = $("#tablaUsuarios").DataTable({
      "columnDefs":[{
       "targets": -1,
       "data":null,
       "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
      }],

   "lengthMenu":[[8,20,50,-1], [8,20,50, "Todos"]],
   responsive: true,
   autowidth: false,
   "language": {
         "lengthMenu": "Mostrar _MENU_ registros por pagina",
         "zeroRecords": "No se encontraron registros",
         "info": "Mostrando página _PAGE_ de _PAGES_",
         "infoEmpty": "No hay registros disponibles",
         "infoFiltered": "(filtrando _MAX_ registros)",
         "search": 'Buscar:',
         'paginate': {
            'next': 'Siguiente',
            'previous': 'Anterior'
         },
         "sProcesing": "Procesando...",
   }
   });

   //abre el modal para crear usuario nuevo --------------------------------------
   $("#btnNuevo").click(function(){
      $("#formUsuarios").trigger("reset");
      $(".modal-header").css("background-color", "#28a745");
      $(".modal-header").css("color", "white");
      $(".modal-tittle").text("Nueva Persona");            
      $("#modalCRUD").modal("show");        
      id=null;
      opcion = 1; //crear
   });

   var fila; //capturar la fila para editar o borrar el registro

   //edita el usuario seleccionado ---------------------------------------------------   
   $(document).on("click", ".btnEditar", function(){
      fila = $(this).closest("tr");
      id = parseInt(fila.find('td:eq(0)').text());
      usuario = fila.find('td:eq(1)').text();
      password = fila.find('td:eq(2)').text();
      idRol = fila.find('td:eq(3)').text();
      // idRol = parseInt(fila.find('td:eq(3)').text());
      
      $("#usuario").val(usuario);
      $("#clave").val(password);
      $("#rol").val(idRol);
      opcion = 2; //editar
      
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white");
      $(".modal-tittle").text("Editar Usuario");            
      $("#modalCRUD").modal("show");  
      
   });

   //elimina el usuario seleccionado ---------------------------------------------------  
   $(document).on("click", ".btnBorrar", function(){    
      fila = $(this);
      id = parseInt($(this).closest("tr").find('td:eq(0)').text());
      opcion = 3 //borrar
      var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+" ?");
      if(respuesta){
         $.ajax({
            url: "../db/db_usuarios.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
               tablaUsuarios.row(fila.parents('tr')).remove().draw();
            }
         });
      }   
   });

   //registra al nuevo usuario ---------------------------------------------------
   $("#formUsuarios").submit(function(e){
      e.preventDefault();    
      usuario = $.trim($("#usuario").val());
      password = $.trim($("#clave").val());
      idRol = $.trim($("#rol").val());    
      $.ajax({
         url: "../db/db_usuarios.php",
         type: "POST",
         dataType: "json",
         data: {id:id, usuario:usuario, password:password, idRol:idRol, opcion:opcion},
         success: function(data){  
            console.log(data);
            id = data[0].id;            
            usuario = data[0].usuario;
            passwrod = data[0].passwrod;
            idRol = data[0].idRol;

            if(idRol == 1){
               rol = 'Administrador';
            }else{
               rol = 'Colaborador';
            }
            
            if(opcion == 1){
               tablaUsuarios.row.add([id,usuario,password,rol]).draw();
            }else{
               tablaUsuarios.row(fila).data([id,usuario,password,rol]).draw();
            }
         }        
      });
      $("#modalCRUD").modal("hide");      
   });




});
