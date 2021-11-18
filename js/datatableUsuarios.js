$(document).ready( function () {
   $('#tablaUsuarios').DataTable({
      "columnDefs":[{
      "targets": -1,
      "data": null,
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

   $("#btnNuevo").click(function(){
      $(".modal-header").css("background-color", "#28a745");
      $("#modalCRUD").modal("show");
   });
   

});

// $(document).on('click', '.nuevo', function(){
//    $('#modalCRUD').modal('show')
// });