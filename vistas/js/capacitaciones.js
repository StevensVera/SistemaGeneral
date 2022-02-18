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

    var archivoCA = $(this).attr("archivoCA");

    var codigo = $(this).attr("codigo");

    var anios = $(this).attr("anios");
  
    //var InformeAnios = $(this).attr("InformeAnios");
  
    //var sujetoObligado = $(this).attr("sujetoObligado");

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
  
            window.location = "index.php?ruta=capacitaciones&idCA="+idCA+"&codigo="+codigo+"&anios="+anios+"&archivoCA="+archivoCA;
  
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
        $("#EditarCapacitaciones_Suma_Total").val(respuesta["CA_Suma_Total"]);
        $("#EditarCapacitaciones_Suma_Total").val(respuesta["CA_Suma_Total"]);
        $("#archivoActualCA").val(respuesta["CA_Archivo"]);


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

  /* =================== SUBIR ARCHIVO USUARIO ==================== */

  $(".nuevoArchivoCA").change(function() {

    var archivo = this.files[0];


    /* === VALIDAMOS EL FORMATO DEL ARCHIVO SEA EN PDF EN SOLICITUD DE INFORMACIÓN === */

      if (archivo["type"] != "application/pdf" && archivo["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && archivo["type"] != "application/vnd.ms-excel") {
        
        $(".nuevoArchivoCA").val("");

        swal({
          title: "Error al subir el archivo",
          text: "¡La archivo debe estar en formato .PDF, .XLSX, .XLS!",
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

/*======================= APLICAR LA SUMA, PARA VALIDAD LOS INPUTS - AGREGAR LA SOLICITUD - ===============================*/

 // Funcion para estableces la suma Capacitaciones Agregar

 function sumarCA()
 {
   const $total = document.getElementById('nuevoCapacitaciones_Suma_Total');
   let subtotal = 0;
   [ ...document.getElementsByClassName( "montoCA" ) ].forEach( function ( element ) {
     if(element.value !== '') {
       subtotal += parseFloat(element.value);
     }
   });
   $total.value = subtotal;
 }

  // Funcion para estableces la suma Capacitaciones Actualizar

  function sumarCAA()
  {
    const $total = document.getElementById('EditarCapacitaciones_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoCAA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }
 
    /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

  $(document).ready(function (){
    
    var perfiCodigo = $("#perfiCodigo").val();

    var InformeA
    
    var anios




  });
  