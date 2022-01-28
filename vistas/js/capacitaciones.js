/* ========================= MOSTRAR DATOS DE CAPACITACIONES =============================== */

var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

var perfiCodigo = $("#perfiCodigo").val();

var table = $(".tablasCapacitaciones").DataTable({
   
    "ajax":"ajax/datatable-adjuntosCapacitacion.php?perfilOcultoUsuario="+perfilOcultoUsuario+"perfiCodigo"+perfiCodigo,
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

  /*=====================  MOSTRAR ARCHIVO PDF ======================= */

  $(".tablasCapacitaciones tbody").on('click', '.btnImprimirReportexCapacitaciones', function() {

    var idCapacitaciones = $(this).attr("idCapacitaciones");
  
    window.open("extensiones/tcpdf/pdf/reporteCapacitaciones.php?idCA="+idCapacitaciones,"_blank");
    
  });

  /* ============== ELIMINAR REGISTRO - SOLICTUD ARCO ================ */

  $(".tablasCapacitaciones").on("click", ".btnEliminarCapacitacion", function(){

    var idCA = $(this).attr("idCA");

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
  
            window.location = "index.php?ruta=capacitaciones&idCA="+idCA;
  
          } // if 
  
      }) // then

  }) //Evento

  /* =========== MOSTRAR - EDITAR - CAPACITACIONES ================= */

$(".tablasCapacitaciones").on("click", ".btnEditarCapacitaciones", function() {

  var idCapacitaciones = $(this).attr("idCapacitaciones");

  var datos = new FormData();

  datos.append("idCapacitaciones", idCapacitaciones);
  console.log("idCapacitaciones",idCapacitaciones);

  $.ajax({

    url: "ajax/adjuntosCapacitaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
      success: function(respuesta){

        console.log("respuesta",respuesta);
        $("#EditarTipoCapacitaciones").html(respuesta["CA_Informe_Presentado"]);
        $("#EditarTipoCapacitaciones").val(respuesta["CA_Informe_Presentado"]);
        $("#EditarAnioCapacitaciones").val(respuesta["CA_Anios"]);
        $("#EditarCapacitaciones_Total").val(respuesta["CA_Total_Capacitacion"]);
        $("#EditarCapacitaciones_Recibidas").val(respuesta["CA_Capacitaciones_Recibidas"]);
        $("#EditarCapacitaciones_Ortogadas").val(respuesta["CA_Capacitaciones_Ortogadas"]);
        $("#EditarCapacitaciones_Total_Servidores_Publicos").val(respuesta["CA_Total_Servidores_Publicos"]);
        $("#EditarCapacitaciones_Acciones_Realizadas_Transparencia").val(respuesta["CA_Acciones_Realizadas_Transparencia"]);

        }

  })
  
}) // End Evento

/* =========================== ACTIVAR ESTADO DE LA CAPACITACION ==================== */

$(".tablasCapacitaciones").on("click", ".btnActivarCapacitaciones", function() {

  var idCA = $(this).attr("idCA");

  var estadoCapacitaciones = $(this).attr("estadoCapacitaciones");

  var datos = new FormData();

  datos.append("activarId", idCA);
  datos.append("activarCapacitaciones", estadoCapacitaciones);

  //console.log("activarId",idSI);
  //console.log("activarolicitudesInformacion",estadoSolicitudesInformacion);

  $.ajax({

    url:"ajax/Capacitaciones.ajax.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData: false,
    success: function (respuesta) {

      swal({

            title: "El Registro ha sido enviado para Revisión",
            type: "success",
            confirmButtonText: "¡Cerrar!"
    
         }).then(function(result) {
    
             if (result.value) {
    
               window.location = "capacitaciones";
    
             }
       });
       
     } // End Success
     
  }) // End Ajax

}) // End Function