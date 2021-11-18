/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

console.log("perfiCodigo", perfiCodigo);

var table = $(".tablasSolicitudesArco").DataTable({
   
    "ajax":"ajax/datatable-adjuntosSolicitudesArco.php?perfilOcultoUsuario="+perfilOcultoUsuario+"perfiCodigo"+perfiCodigo,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
     "scrollY": 450,
     "scrollX": true,
       
     "language": {
  
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      },  
  
    }
  
  });

  /* ============== ELIMINAR REGISTRO - SOLICTUD ARCO ================ */

  $(".tablasSolicitudesArco").on("click", ".btnEliminarSolicitudArco", function(){

    var idSAR = $(this).attr("idSAR");
  
    swal({
  
      title: '¿Está seguro de borrar el Registro?',
      text: "¡Realizar está Acción!..¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Confirmar Eliminación!'
          }).then(function(result) {
          if (result.value) {
  
            window.location = "index.php?ruta=solicitudes-arco&idSAR="+idSAR;
  
          } // if 
  
      }) // then
  
   }) // Evento