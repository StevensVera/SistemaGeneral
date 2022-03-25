/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

//console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

//console.log("perfiCodigo", perfiCodigo);

let temp = $("#btn1").clone();
$("#btn1").click(function(){
    $("#btn1").after(temp);
});

$(document).ready(function(){

var table = $(".tablasAdministracionSujetosObligadosGeneral").DataTable({
   
    "ajax":"ajax/datable-adjuntosAdministracionSOGeneral.ajax.php?perfilOcultoUsuario="+perfilOcultoUsuario+"perfiCodigo"+perfiCodigo,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "scrollY": 450,
    "scrollX": true,
    "orderCellsTop": true,
    "fixedHeader": true ,

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

   //Creamos una fila en el head de la tabla y lo clonamos para cada columna
   $('.tablasAdministracionSujetosObligadosGeneral thead tr').clone(true).appendTo( '.tablasAdministracionSujetosObligadosGeneral thead' );

   $('.tablasAdministracionSujetosObligadosGeneral thead tr:eq(1) th').each( function (i) {
       var title = $(this).text(); //es el nombre de la columna
       $(this).html( '<input style="width:120px" type="text" placeholder="'+title+'" />' );

       $( 'input', this ).on( 'keyup change', function () {
           if ( table.column(i).search() !== this.value ) {
               table
                   .column(i)
                   .search( this.value )
                   .draw();
           }
       } );
   } );   

});
  


  $(".tablaAdministrativa3xSO").on("click", ".btnActivar", function() {

    var valueSI = $(this).attr("idUsuario");
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

        $("#EditaridSI").val(respuesta["idSI"]);
        $("#EditarSORSI").html(respuesta["SI_Recepcion"]);
        $("#EditarSORSI").val(respuesta["SI_Recepcion"]);
        $("#EditarSONSI").val(respuesta["SI_Nombre_Sujeto_Obligado"]);
        $("#EditarSOSI").val(respuesta["SI_Informe_Presentado"]);
        $("#EditarSOANIOSI").val(respuesta["SI_Anios"]);
        $("#EditarSOFSI").val(respuesta["SI_Fecha"]);
        $("#EditarSOTSI").val(respuesta["SI_TOTAL_SOLICITUDES"]);
        $("#EditarSOOSI").val(respuesta["SI_Observaciones"]);
        $("#EditarSOOPSI").val(respuesta["SI_Observaciones_Publica"]);

        $("#archivoActualRequerimientoSI").val(respuesta["SI_Requerimiento_Amonestacion_Privada"]);
        $("#archivoActualRequerimientoPublicaSI").val(respuesta["SI_Requerimiento_Amonestacion_Publica"]);


        $("#EditarNombreSujetoObligadoRSI").val(respuesta["SI_Nombre_Sujeto_Obligado"]);
        $("#EditarCodigoSujetoObligadoRSI").val(respuesta["Si_Codigo_SO"]);
       
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

        $("#EditaridSA").val(respuesta["idSAR"]);
        $("#EditarSORSA").html(respuesta["SA_Recepcion"]);
        $("#EditarSORSA").val(respuesta["SA_Recepcion"]);
        $("#EditarSOTSA").val(respuesta["SA_TOTAL_SOLICITUDES"]);
        $("#EditarSOSA").val(respuesta["SA_Informe_Presentado"]);
        $("#EditarSOANIOSA").val(respuesta["SA_Anios"]);
        $("#EditarSOFSA").val(respuesta["SA_Fecha"]);
        $("#EditarSOTSA").val(respuesta["SA_TOTAL_SOLICITUDES"]);
        $("#EditarSOOSA").val(respuesta["SA_Observaciones"]);
        $("#EditarSOOPSA").val(respuesta["SA_Observaciones_Publica"]);



        $("#archivoActualRequerimientoSA").val(respuesta["SA_Requerimiento_Amonestacion_Privada"]);
        $("#archivoActualRequerimientoPublicaSA").val(respuesta["SA_Requerimiento_Amonestacion_Publica"]);
       

        $("#EditarNombreSujetoObligadoRSA").val(respuesta["SA_Nombre_Sujeto_Obligado"]);
        $("#EditarCodigoSujetoObligadoRSA").val(respuesta["SA_Codigo_SO"]);

    


        
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

        $("#EditaridCA").val(respuesta["idCA"]);
        $("#EditarSORCA").html(respuesta["CA_Recepcion"]);
        $("#EditarSORCA").val(respuesta["CA_Recepcion"]);
        $("#EditarSORCA").val(respuesta["CA_Recepcion"]);
        $("#EditarSOCA").val(respuesta["CA_Informe_Presentado"]);
        $("#EditarSOANIOCA").val(respuesta["CA_Anios"]);
        $("#EditarSOFCA").val(respuesta["CA_Fecha"]);
        $("#EditarSOTCA").val(respuesta["CA_Total_Capacitacion"]);
        $("#EditarSOOCA").val(respuesta["CA_Observaciones"]);
        $("#EditarSOOPCA").val(respuesta["CA_Observaciones_Publica"]);

        $("#archivoActualRequerimientoCA").val(respuesta["CA_Requerimiento_Amonestacion_Privada"]);
        $("#archivoActualRequerimientoPublicaCA").val(respuesta["CA_Requerimiento_Amonestacion_Publica"]);
        
        $("#EditarNombreSujetoObligadoRCA").val(respuesta["CA_Nombre_Sujeto_Obligado"]);
        $("#EditarCodigoSujetoObligadoRCA").val(respuesta["CA_Codigo_SO"]);
        
      }

    })

  }) // EVENTO MOSTRAR LOS DATOS DE USUARIOS HA ACTUALIZAR 

  /* =================== VALIDAR ARCHIVO SOLICITUD DE INFORMACION ==================== */

  $(".nuevoArchivoRequerimientoSI").change(function() {

    var archivo = this.files[0];


    /* === VALIDAMOS EL FORMATO DEL ARCHIVO SEA EN PDF EN SOLICITUD DE INFORMACIÓN === */

      if (archivo["type"] != "application/pdf") {
        
        $(".nuevoArchivoRequerimientoSI").val("");

        swal({
          title: "Error al subir el archivo",
          text: "¡La archivo debe estar en formato PDF",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

      } else if(archivo["size"] > 50000000 ){
   
        swal({
          title: "Error al subir el archivo",
          text: "¡El archivo no debe pesar más de 20MB!",
           type: "error",
           confirmButtonText: "¡Cerrar!"
      });

    }
      
  })

    /* =================== VALIDAR ARCHIVO SOLICITUD ARCO ==================== */

    $(".nuevoArchivoRequerimientoSA").change(function() {

      var archivo = this.files[0];
  
      /* === VALIDAMOS EL FORMATO DEL ARCHIVO SEA EN PDF EN SOLICITUD DE INFORMACIÓN === */
  
        if (archivo["type"] != "application/pdf") {
          
          $(".nuevoArchivoRequerimientoSA").val("");
  
          swal({
            title: "Error al subir el archivo",
            text: "¡La archivo debe estar en formato PDF",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
        } else if(archivo["size"] > 50000000 ){
     
          swal({
            title: "Error al subir el archivo",
            text: "¡El archivo no debe pesar más de 20MB!",
             type: "error",
             confirmButtonText: "¡Cerrar!"
        });
  
      }
        
    })

    /* =================== VALIDAR ARCHIVO CAPACITACIONES ==================== */

    $(".nuevoArchivoRequerimientoCA").change(function() {

      var archivo = this.files[0];
  
      /* === VALIDAMOS EL FORMATO DEL ARCHIVO SEA EN PDF EN SOLICITUD DE INFORMACIÓN === */
  
        if (archivo["type"] != "application/pdf") {
          
          $(".nuevoArchivoRequerimientoCA").val("");
  
          swal({
            title: "Error al subir el archivo",
            text: "¡La archivo debe estar en formato PDF",
            type: "error",
            confirmButtonText: "¡Cerrar!"
          });
  
        } else if(archivo["size"] > 50000000 ){
     
          swal({
            title: "Error al subir el archivo",
            text: "¡El archivo no debe pesar más de 20MB!",
             type: "error",
             confirmButtonText: "¡Cerrar!"
        });
  
      }
        
    })
  





  

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