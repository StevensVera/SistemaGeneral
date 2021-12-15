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

/*==============================================================================================
                         = MOSTRAR - EDITAR SOLICITUDES INFORMACION =
================================================================================================ */ 

$(".tablasSolicitudesArco").on("click", ".btnEditarAdjuntosArchivosGestion", function(){

  var idSolicitudesArco = $(this).attr("idSolicitudesArco");

  var datos = new FormData();
  datos.append("idSolicitudesArco", idSolicitudesArco);
  console.log("idSolicitudesArco",idSolicitudesArco);
  $.ajax({
    url: "ajax/adjuntosSolicitudesArco.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json", 
      success: function(respuesta){
        console.log("respuesta",respuesta);

        $("#EditarTipoInformeSA").html(respuesta["SA_Informe_Presentado"]);
        $("#EditarTipoInformeSA").val(respuesta["SA_Informe_Presentado"]);
        $("#EditarAnioSA").val(respuesta["SA_Anios"]);
        $("#EditarSA_Total").val(respuesta["SA_TOTAL_SOLICITUDES"]);
        // Medio de Presentación
        $("#EditarSA_MP_Personal_Escrito").val(respuesta["SA_Medio_Presentacion_Personal_Escrito"]);
        $("#EditarSA_MP_Correo_Electronico").val(respuesta["SA_Medio_Presentacion_Correo_Electronico"]);
        $("#EditarSA_MP_Sistema_Informex").val(respuesta["SA_Medio_Presentacion_Sistema_Infomex"]);
        $("#EditarSA_MP_PNT").val(respuesta["SA_Medio_Presentacion_PNT"]);
        $("#EditarSA_MP_No_Disponible").val(respuesta["SA_Medio_Presentacion_No_disponible"]);
        $("#EditarSA_MP_Suma_Total").val(respuesta["SA_Medio_Presentacion_Suma_Total"]);
        // Tipo de Solicitante
        $("#EditarSA_TS_Persona_Fisica").val(respuesta["SA_Tipo_Solicitante_Persona_Fisica"]);
        $("#EditarSA_TS_Personal_Moral").val(respuesta["SA_Tipo_Solicitante_Persona_Moral"]);
        $("#EditarSA_TS_No_Disponible").val(respuesta["SA_Tipo_Solicitante_No_Disponible"]);
        $("#EditarSA_TS_Suma_Total").val(respuesta["SA_Tipo_Solicitante_Suma_Total"]);
        // Genero del Solicitante
        $("#EditarSA_GS_Masculino").val(respuesta["SA_Genero_Solicitante_Masculino"]);
        $("#EditarSA_GS_Femenino").val(respuesta["SA_Genero_Solicitante_Femenino"]); 
        $("#EditarSA_GS_Anonimo").val(respuesta["SA_Genero_Solicitante_Anonimo"]);
        $("#EditarSA_GS_No_Disponible").val(respuesta["SA_Genero_Solicitante_No_Disponible"]);
        $("#EditarSA_GS_Suma_Total").val(respuesta["SA_Genero_Solicitante_Suma_Total"]);
        // Informacion Solicitada
        $("#EditarSA_IS_Acceso").val(respuesta["SA_Informacion_Solicitada_Acceso"]);
        $("#EditarSA_IS_Rectificación").val(respuesta["SA_Informacion_Solicitada_Rectificacion"]);
        $("#EditarSA_IS_Oposición").val(respuesta["SA_Informacion_Solicitada_Oposicion"]);
        $("#EditarSA_IS_Cancelacion").val(respuesta["SA_Informacion_Solicitada_Cancelacion"]);
        $("#EditarSA_IS_Otro").val(respuesta["SA_Informacion_Solicitada_Otro"]);
        $("#EditarSA_IS_No_Disponible").val(respuesta["SA_Informacion_Solicitada_No_Disponible"]);
        $("#EditarSA_IS_Suma_Total").val(respuesta["SA_Informacion_Solicitada_Suma_Total"]);
        //Tramites
        $("#EditarSA_T_Solicitudes_Concluidas").val(respuesta["SA_Tramites_Concluidas"]);
        $("#EditarSA_T_Solicitudes_Pendientes").val(respuesta["SA_Tramites_Pendientes"]);
        $("#EditarSA_T_No_Disponible").val(respuesta["SA_Tramites_No_Disponible"]);
        $("#EditarSA_T_Suma_Total").val(respuesta["SA_Tramites_Suma_Total"]);
        //Modalidad Respuesta
        $("#EditarSA_MR_Medios_electronicos").val(respuesta["SA_Modalidad_Respuesta_Medios_Electronicos"]);
        $("#EditarSA_MR_Copia_Simple").val(respuesta["SA_Modalidad_Respuesta_Copia_Simple"]);
        $("#SA_MR_Consulta_Directa").val(respuesta["SA_Modalidad_Respuesta_Consulta_Directa"]);
        $("#SA_MR_Copia_Certificada").val(respuesta["SA_Modalidad_Respuesta_Copia_Certificada"]);
        $("#EditarSA_MR_Otro").val(respuesta["SA_Modalidad_Respuesta_Otro"]);  
        $("#EditarSA_MR_No_Disponible").val(respuesta["SA_Modalidad_Respuesta_No_Disponible"]);
        $("#EditarSA_MR_Suma_Total").val(respuesta["SA_Modalidad_Respuesta_Suma_Total"]);
        // Sentido Respuesta
        $("#EditarSA_SR_Informacion_Total").val(respuesta["SA_Sentido_Respuesta_Informacion"]);
        $("#EditarSA_SR_Informacion_Parcial").val(respuesta["SA_Sentido_Respuesta_Informacion_Parcial"]);
        $("#EditarSA_SR_Negada_Clasificación").val(respuesta["SA_Sentido_Respuesta_Negada_Clasificacion"]);
        $("#EditarSA_SR_Inexistencia_Informacion").val(respuesta["SA_Sentido_Respuesta_Inexistencia_Informacion"]);
        $("#EditarSA_SR_Mixta").val(respuesta["SA_Sentido_Respuesta_Mixta"]);
        $("#EditarSA_SR_No_Aclarada").val(respuesta["SA_Sentido_Respuesta_No_Aclarada"]);
        $("#EditarSA_SR_Orientada").val(respuesta["SA_Sentido_Respuesta_Orientada"]);
        $("#EditarSA_SR_En_Tramite").val(respuesta["SA_Sentido_Respuesta_En_Tramite"]);
        $("#EditarSA_SR_Improcedente").val(respuesta["SA_Sentido_Respuesta_Improcedente"]);
        $("#EditarSA_SR_Otros").val(respuesta["SA_Sentido_Respuesta_Otros"]);
        $("#EditarSA_SR_No_Disponible").val(respuesta["SA_Sentido_Respuesta_No_Disponible"]);
        $("#EditarSA_SR_Suma_Total").val(respuesta["SA_Sentido_Respuesta_Suma_Total"]);


      } // if

  }) //then

}) // Evento