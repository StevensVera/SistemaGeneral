/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

console.log("perfiCodigo", perfiCodigo);

var table = $(".tablasSolicitudesInformacion").DataTable({
   
    "ajax":"ajax/datatable-adjuntosSolicitudesInformacion.php?perfilOcultoUsuario="+perfilOcultoUsuario+"perfiCodigo"+perfiCodigo,
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

  /* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

  $(".tablasAdjuntosInformatica").on("click", ".btnEliminarAdjuntosInformatica", function(){

    var idAdjuntos = $(this).attr("idAdjuntosInformatica");
    var nombre = $(this).attr("nombre");
    var anios = $(this).attr("anios");
    //var correo = $(this).attr("correo");
    var taller = $(this).attr("taller");

    swal({

    title: '¿Está seguro de borrar el Usuario?',
    text: "¡Realizar está Acción, Puede Perjudicar grave al Sistema!..¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar Eliminación!'
        }).then(function(result) {
        if (result.value) {

          window.location = "index.php?ruta=taller-informatica-SISAI-2&idAdjuntosInformatica="+idAdjuntos+"&nombre="+nombre+"&anios="+anios+"&taller="+taller;

        } // if 

    }) // then

 }) // Evento