/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

//console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

//console.log("perfiCodigo", perfiCodigo);

var table = $(".tablasAdministracionSujetosObligadosGeneral").DataTable({
   
    "ajax":"ajax/datable-adjuntosAdministracionSOGeneral.ajax.php?perfilOcultoUsuario="+perfilOcultoUsuario+"perfiCodigo"+perfiCodigo,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "scrollY": 450,
    "scrollX": true,

    initComplete: function () {
      this.api().columns([1, 2, 3, 4, 5]).every( function () {
          var column = this;
          var select = $('<select style="width:120px"><option value=""></option></select>')
              .appendTo( $(column.footer()).empty() )
              .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                  );

                  column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
              } );

          column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
      } );
  },
       
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

  $(".tablaAdministrativa3xSO").on("click", ".btnActivar", function() {

    var valueSI = $(this).attr("value");
    console.log("valueSI", valueSI)

    var estadoAdministracionxSOSI = $(this).attr("estadoAdministracionxSOSI");
    console.log("estadoAdministracionxSOSI", estadoAdministracionxSOSI);
 
    var datos = new FormData();

    datos.append("activarIdSI", valueSI);
    datos.append("activarAdministracionxSOSI", estadoAdministracionxSOSI);

    //console.log("activarId",idUsuario);
  	//console.log("activarUsuario",estadoUsuario);

    $.ajax({

      url:"ajax/administracionxSO.ajax.php",
      method:"POST",
      data:datos,
      cache:false,
      contentType:false,
      processData: false,
      success: function (respuesta) {

        console.log("respuesta", respuesta);
        
       } // End Success
       
    }) // End Ajax


    if(estadoAdministracionxSOSI == 0){

  		$(this).removeClass('btn-warning');
  		$(this).addClass('btn-danger');
  		$(this).html('NO COMPLETADO');
  		$(this).attr('estadoAdministracionxSOSI',2);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('COMPLETADO');
  		$(this).attr('estadoAdministracionxSOSI',1);

  	} 

    if(estadoAdministracionxSOSI == 1){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-warning');
  		$(this).html('SIN ACCIONES');
  		$(this).attr('estadoAdministracionxSOSI',0);

  	}
    
  }) // End Function


/* ============== MOSTRAR LOS DATOS DE SOLICITUDES DE INFORMACIÓN ================ */ 

$(".tablasAdministracionSujetosObligadosGeneral").on("click", ".btnEditarAdministracionSO", function() {
  
  var idSolicitudesInformacion = $(this).attr("idSolicitudesInformacion");

  var datos = new FormData();

  datos.append("idSolicitudesInformacion", idSolicitudesInformacion);
  console.log("idSolicitudesInformacion",idSolicitudesInformacion);

    $.ajax({
      url:"ajax/adjuntosSolicitudesInformacion.ajax.php",
      method: "POST",  
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta) {

        console.log("respuesta", respuesta);

        $("#EditarSOBSI").val(respuesta["idSI"]);
        $("#EditarSORSI").val(respuesta["SI_Recepcion"]);
        $("#EditarSONSI").val(respuesta["SI_Nombre_Sujeto_Obligado"]);
        $("#EditarSOSI").val(respuesta["SI_Informe_Presentado"]);
        $("#EditarSOANIOSI").val(respuesta["SI_Anios"]);
        $("#EditarSOFSI").val(respuesta["SI_Fecha"]);
        $("#EditarSOTSI").val(respuesta["SI_TOTAL_SOLICITUDES"]);
       
        /*
        if (respuesta["SI_Calificacion"] == 2) {
          
          $(".btnActivar").attr("<button id='EditarSOBSI' name='EditarSOBSI'  type='button' class='btn btn-ls btnActivar btn-danger' estadoAdministracionxSOSI='2'>NO COMPLETADO</button>", respuesta["SI_Calificacion"]);

        }else{

          $(".btnActivar").attr("<button id='EditarSOBSI' name='EditarSOBSI'  type='button' class='btn btn-ls btnActivar btn-success' estadoAdministracionxSOSI='1'>COMPLETADO</button>", respuesta["SI_Calificacion"]);
  
        }

        if (respuesta["SI_Calificacion"] == 0) {
          
          $(".btnActivar").attr("<button id='EditarSOBSI' name='EditarSOBSI'  type='button' class='btn btn-ls btnActivar btn-warning' estadoAdministracionxSOSI='0'>SIN ACCIONES</button>", respuesta["SI_Calificacion"]);

        }
        */
   
      }

    })

  }) // EVENTO MOSTRAR LOS DATOS DE USUARIOS HA ACTUALIZAR 

  /* ============== MOSTRAR LOS DATOS DE SOLICITUDES ARCO ================ */ 

$(".tablasAdministracionSujetosObligadosGeneral").on("click", ".btnEditarAdministracionSO", function() {
  
  var idSolicitudesArco = $(this).attr("idSolicitudesArco");
   
  var datos = new FormData();

  datos.append("idSolicitudesArco", idSolicitudesArco);
  console.log("idSolicitudesArco",idSolicitudesArco);

    $.ajax({
      url:"ajax/adjuntosSolicitudesArco.ajax.php",
      method: "POST",  
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta) {

        console.log("respuesta", respuesta);

        $("#EditarSORSA").val(respuesta["SA_Recepcion"]);
        $("#EditarSOTSA").val(respuesta["SA_TOTAL_SOLICITUDES"]);

        $("#EditarSOSA").val(respuesta["SA_Informe_Presentado"]);
        $("#EditarSOANIOSA").val(respuesta["SA_Anios"]);
        $("#EditarSOFSA").val(respuesta["SA_Fecha"]);
        $("#EditarSOTSA").val(respuesta["SA_TOTAL_SOLICITUDES"]);
        
        /*

        if (respuesta["foto_Informe"] != "") {
          
          $(".previsualizarEditar").attr("src", respuesta["foto_Informe"]);

        }else{

          $(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");
  
        }

        if (respuesta["archivo_Informe"] != "") {
          
          $(".nuevoArchivo").attr("src", respuesta["archivo_Informe"]);

        }        

        */
        
      }

    })

  }) // EVENTO MOSTRAR LOS DATOS DE USUARIOS HA ACTUALIZAR 



/* ============== MOSTRAR LOS DATOS DE CAPACITACIONES ================ */ 

$(".tablasAdministracionSujetosObligadosGeneral").on("click", ".btnEditarAdministracionSO", function() {
  
  var idCapacitaciones = $(this).attr("idCapacitaciones");

  var datos = new FormData();

  datos.append("idCapacitaciones", idCapacitaciones);
  console.log("idCapacitaciones",idCapacitaciones);

    $.ajax({
      url:"ajax/adjuntosCapacitaciones.ajax.php",
      method: "POST",  
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta) {

        console.log("respuesta", respuesta);

        $("#EditarSORCA").val(respuesta["CA_Recepcion"]);
        $("#EditarSOCA").val(respuesta["CA_Informe_Presentado"]);
        $("#EditarSOANIOCA").val(respuesta["CA_Anios"]);
        $("#EditarSOFCA").val(respuesta["CA_Fecha"]);
        $("#EditarSOTCA").val(respuesta["CA_Total_Capacitacion"]);
        

        /*

        if (respuesta["foto_Informe"] != "") {
          
          $(".previsualizarEditar").attr("src", respuesta["foto_Informe"]);

        }else{

          $(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");
  
        }

        if (respuesta["archivo_Informe"] != "") {
          
          $(".nuevoArchivo").attr("src", respuesta["archivo_Informe"]);

        }        

        */
        
      }

    })

  }) // EVENTO MOSTRAR LOS DATOS DE USUARIOS HA ACTUALIZAR 




  

/* =========== MOSTRAR - EDITAR - ADMINISTRACIÓN GENERAL DE SUJETOS OBLIGADOS MOSTRAR SOLAMENTE POR GRUPOS DE 3 ================= */

/*

$(".tablasAdministracionSujetosObligadosGeneral").on("click", ".btnImprimerReporteAdministacionSO", function() {

  var idAdminstracionSOSI = $(this).attr("idAdminstracionSOSI");

  var idAdminstracionSOSA = $(this).attr("idAdminstracionSOSA");

  var idAdminstracionSOCA = $(this).attr("idAdminstracionSOCA");
   

  var datos = new FormData();

  datos.append("idAdminstracionSOSI", idAdminstracionSOSI);
  console.log("idAdminstracionSOSI",idAdminstracionSOSI);

  datos.append("idAdminstracionSOSA", idAdminstracionSOSA);
  console.log("idAdminstracionSOSA",idAdminstracionSOSA);

  datos.append("idAdminstracionSOCA", idAdminstracionSOCA);
  console.log("idAdminstracionSOCA",idAdminstracionSOCA);


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
        $("#EditarCapacitaciones_Suma_Total").val(respuesta["CA_Suma_Total"]);
        $("#EditarCapacitaciones_Suma_Total").val(respuesta["CA_Suma_Total"]);
        $("#archivoActualCA").val(respuesta["CA_Archivo"]);


        }

  })
  
}) // End Evento

*/

/*
  $('#nuevoAnioAdministracionSO').on( 'keyup', function () {

    table.search( this.value ).draw();

} );

*/

/*
var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

//console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

$(document).ready(function() {

    // Setup - add a text input to each footer cell

    $('#example tfoot th').each( function () {

        var title = $(this).text();

        $(this).html( '<input type="text" placeholder="'+title+'" />' );

    } );

        // DataTable
        var table = $('#example').DataTable({

            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });

} );    
*/