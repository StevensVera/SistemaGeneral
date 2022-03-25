/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

//console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

//console.log("perfiCodigo", perfiCodigo);

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

 /* ======================== MOSTRAR ARCHIVO PDF ============================== */ 

 $(".tablasSolicitudesInformacion tbody").on('click', '.btnImprimerReportexSolicitudesInformacion', function() {

  var idSolicitudesInformacion = $(this).attr("idSolicitudesInformacion");

  window.open("extensiones/tcpdf/pdf/reporteSolicitudInformacion.php?idSI="+idSolicitudesInformacion,"_blank");
  
});

 /* ============== ELIMINAR REGISTRO - SOLICTUD DE INFORMACIÓN ================ */

 $(".tablasSolicitudesInformacion").on("click", ".btnEliminarSolicitudInformacion", function(){

  var idSI = $(this).attr("idSI");

  var archivoSI = $(this).attr("archivoSI");

  var codigo = $(this).attr("codigo");

  var anios = $(this).attr("anios");

  var InformeAnios = $(this).attr("InformeAnios");

  var sujetoObligado = $(this).attr("sujetoObligado");

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

          window.location = "index.php?ruta=solicitudes-informacion&idSI="+idSI+"&codigo="+codigo+"&anios="+anios+"&InformeAnios="+InformeAnios+"&sujetoObligado="+sujetoObligado+"&archivoSI="+archivoSI;

        } // if 

    }) // then

 }) // Evento

/*==============================================================================================
                         = MOSTRAR - EDITAR SOLICITUDES INFORMACION =
================================================================================================ */ 

$(".tablasSolicitudesInformacion").on("click", ".btnEditarSolicitudesInformacion", function(){

  var idSolicitudesInformacion = $(this).attr("idSolicitudesInformacion");

  var datos = new FormData();
  datos.append("idSolicitudesInformacion", idSolicitudesInformacion);
  console.log("idSolicitudesInformacion",idSolicitudesInformacion);
  $.ajax({
    url: "ajax/adjuntosSolicitudesInformacion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json", 
     success: function(respuesta){
        console.log("respuesta",respuesta);
     
        $("#EditarTipoInformeSI").html(respuesta["SI_Informe_Presentado"]);
        $("#EditarTipoInformeSI").val(respuesta["SI_Informe_Presentado"]);
        $("#EditarAnioSI").val(respuesta["SI_Anios"]);
        $("#EditarSI_Total").val(respuesta["SI_TOTAL_SOLICITUDES"]);
        // Medio de Presentación
        $("#EditarSI_MP_Personal_Escrito").val(respuesta["SI_Medio_Presentacion_Personal_Escrito"]);
        $("#EditarSI_MP_Correo_Electronico").val(respuesta["SI_Medio_Presentacion_Correo_Electronico"]);
        $("#EditarSI_MP_Sistema_Informex").val(respuesta["SI_Medio_Presentacion_Sistema_Infomex"]);
        $("#EditarSI_MP_PNT").val(respuesta["SI_Medio_Presentacion_PNT"]);
        $("#EditarSI_MP_No_Disponible").val(respuesta["SI_Medio_Presentacion_No_disponible"]);
        $("#EditarSI_MP_Suma_Total").val(respuesta["SI_Medio_Presentacion_Suma_Total"]);
        // Tipo de Solicitante
        $("#EditarSI_TS_Persona_Fisica").val(respuesta["SI_Tipo_Solicitud_Persona_Fisica"]);
        $("#EditarSI_TS_Personal_Moral").val(respuesta["SI_Tipo_Solicitud_Persona_Moral"]);
        $("#EditarSI_TS_No_Disponible").val(respuesta["SI_Tipo_Solicitud_No_Disponible"]);
        $("#EditarSI_TS_Suma_Total").val(respuesta["SI_Tipo_Solicitud_Suma_Total"]);
        // Genero del Solicitante
        $("#EditarSI_Genero_Masculino").val(respuesta["SI_Genero_Solicitante_Masculino"]);
        $("#EditarSI_Genero_Femenino").val(respuesta["SI_Genero_Solicitante_Femenino"]); 
        $("#EditarSI_Genero_Anonimo").val(respuesta["SI_Genero_Solicitante_Anonimo"]);
        $("#EditarSI_Genero_No_Disponible").val(respuesta["SI_Genero_Solicitante_No_Disponible"]);
        $("#EditarSI_Genero_Suma_Total").val(respuesta["SI_Genero_Solicitante_Suma_Total"]);
        // Informacion Solicitada
        $("#EditarSI_IS_Obligaciones_Transparencia").val(respuesta["SI_Informacion_Solicitada_Obligacion_Transparencia"]);
        $("#EditarSI_IS_Reservada").val(respuesta["SI_Informacion_Solicitada_Reservada"]);
        $("#EditarSI_IS_Confidencial").val(respuesta["SI_Informacion_Solicitada_Confidencial"]);
        $("#EditarSI_IS_Otro").val(respuesta["SI_Informacion_Solicitada_Otro"]);
        $("#EditarSI_IS_No_Disponible").val(respuesta["SI_Informacion_Solicitada_No_Disponible"]);
        $("#EditarSI_IS_Suma_Total").val(respuesta["SI_Informacion_Solicitada_Suma_Total"]);
        //Tramites
        $("#EditarSI_T_Solicitudes_Concluidas").val(respuesta["SI_Tramites_Concluidas"]);
        $("#EditarSI_T_Solicitudes_Pendientes").val(respuesta["SI_Tramites_Pendientes"]);
        $("#EditarSI_T_No_Disponible").val(respuesta["SI_Tramites_No_Disponible"]);
        $("#EditarSI_T_Suma_Total").val(respuesta["SI_Tramites_Suma_Total"]);
        //Modalidad Respuesta
        $("#EditarSI_MR_Medios_electronicos").val(respuesta["SI_Modalidad_Respuesta_Medios_Electronicos"]);
        $("#EditarSI_MR_Copia_Simple").val(respuesta["SI_Modalidad_Respuesta_Copia_Simple"]);
        $("#EditarSI_MR_Consulta_Directa").val(respuesta["SI_Modalidad_Respuesta_Consulta_Directa"]);
        $("#EditarSI_MR_Copia_Certificada").val(respuesta["SI_Modalidad_Respuesta_Copia_Certificada"]);
        $("#EditarSI_MR_Otro").val(respuesta["SI_Modalidad_Respuesta_Otro"]);  
        $("#EditarSI_MR_No_Disponible").val(respuesta["SI_Modalidad_Respuesta_No_Disponible"]);
        $("#EditarSI_MR_Suma_Total").val(respuesta["SI_Modalidad_Respuesta_Suma_Total"]);
        //Obligaciones Solicitadas
        $("#EditarSI_OS_Marco_Normativo").val(respuesta["SI_Obligaciones_Solicitadas_Marco_Normativo"]);
        $("#EditarSI_OS_Estructura_Organica").val(respuesta["SI_Obligaciones_Solicitadas_Estructura_Organica"]);
        $("#EditarSI_OS_Funciones_Cada_Area").val(respuesta["SI_Obligaciones_Solicitadas_Funciones_Area"]);
        $("#EditarSI_OS_Metas_Objetivos").val(respuesta["SI_Obligaciones_Solicitadas_Metas_Objetivos"]);
        $("#EditarSI_OS_Indicadores_Relacionados").val(respuesta["SI_Obligaciones_Solicitadas_Indicadores_Relacionados"]);
        $("#EditarSI_OS_Indicadores_Rendir_Cuentas").val(respuesta["SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas"]);
        $("#EditarSI_OS_Servidores_Publicos").val(respuesta["SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico"]);
        $("#EditarSI_OS_Remuneraciones_Personal").val(respuesta["SI_Obligaciones_Solicitadas_Remuneraciones_Personal"]);
        $("#EditarSI_OS_Gastos_Representacion_Viaticos").val(respuesta["SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos"]);
        $("#EditarSI_OS_Plazas_Vacantes").val(respuesta["SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes"]);
        $("#EditarSI_OS_Contratacion_Servicios").val(respuesta["SI_Obligaciones_Solicitadas_Contratacion_Servicios"]);
        $("#EditarSI_OS_Versiones_Públicas").val(respuesta["SI_Obligaciones_Solicitadas_Versiones_Publicas"]);
        $("#EditarSI_OS_Domicilio_Dirección").val(respuesta["SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT"]);
        $("#EditarSI_OS_Convocatoria_Concursos").val(respuesta["SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo"]);
        $("#EditarSI_OS_Informacion_Programas").val(respuesta["SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios"]);
        $("#EditarSI_OS_Condiciones_Generales_Trabajo").val(respuesta["SI_Obligaciones_Solicitadas_Condiciones_Trabajos"]);
        $("#EditarSI_OS_Recursos_Publicos_Economicos").val(respuesta["SI_Obligaciones_Solicitadas_Recursos_Publicos"]);
        $("#EditarSI_OS_Información_Curricular").val(respuesta["SI_Obligaciones_Solicitadas_Informacion_Curricular"]);
        $("#EditarSI_OS_Servidores_Publicos_Sancionados").val(respuesta["SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados"]);
        $("#EditarSI_OS_Servicios_Ofrecen").val(respuesta["SI_Obligaciones_Solicitadas_Servicios_Ofrecen"]);
        $("#EditarSI_OS_Tramites_Requisitos_Formatos").val(respuesta["SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos"]);
        $("#EditarSI_OS_Presupuesto_Asignado").val(respuesta["SI_Obligaciones_Solicitadas_Presupuesto_Asignado"]);
        $("#EditarSI_OS_Informacion_Relativa").val(respuesta["SI_Obligaciones_Solicitadas_Informacion_Relativa"]);
        $("#EditarSI_OS_Montos_Designados").val(respuesta["SI_Obligaciones_Solicitadas_Montos_Designados"]);
        $("#EditarSI_OS_Informes_Resultados_Auditorias").val(respuesta["SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias"]);
        $("#EditarSI_OS_Resultados_Dictaminación").val(respuesta["SI_Obligaciones_Solicitadas_Resultados_Dictaminacion"]);
        $("#EditarSI_OS_Montos_Criterios_Convocatorias").val(respuesta["SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias"]);
        $("#EditarSI_OS_Concesiones_Contratos_Convenios").val(respuesta["SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios"]);
        $("#EditarSI_OS_Resultados_Procesos").val(respuesta["SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones"]);
        $("#EditarSI_OS_Informes_Resultados").val(respuesta["SI_Obligaciones_Solicitadas_Infomes_Generen_SO"]);
        $("#EditarSI_OS_Estadisticas_Generen_Cumplimiento").val(respuesta["SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento"]);
        $("#EditarSI_OS_Avances_Programaticos").val(respuesta["SI_Obligaciones_Solicitadas_Avances_Programaticos"]);
        $("#EditarSI_OS_Padrón_Proveedores").val(respuesta["SI_Obligaciones_Solicitadas_Padron_Proveedores"]);
        $("#EditarSI_OS_Convenios_Coordinación").val(respuesta["SI_Obligaciones_Solicitadas_Convenios_Coordinacion"]);
        $("#EditarSI_OS_Inventario_Bienes").val(respuesta["SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles"]);
        $("#EditarSI_OS_Recomendaciones_Emitidas").val(respuesta["SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas"]);
        $("#EditarSI_OS_Resoluciones_Laudos").val(respuesta["SI_Obligaciones_Solicitadas_Resoluciones_Laudos"]);
        $("#EditarSI_OS_Mecanismos_Participación").val(respuesta["SI_Obligaciones_Solicitadas_Programas_Ofrecidos"]);
        $("#EditarSI_OS_Programas_Ofrecidoss").val(respuesta["SI_Obligaciones_Solicitadas_Mecanismo_Participacion"]);
        $("#EditarSI_OS_Actas_Resoluciones").val(respuesta["SI_Obligaciones_Solicitadas_Actas_Resoluciones"]);
        $("#EditarSI_OS_Evaluaciones_Encuentas").val(respuesta["SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas"]);
        $("#EditarSI_OS_Estudios_Financiados").val(respuesta["SI_Obligaciones_Solicitadas_Estudios_Financiados"]);
        $("#EditarSI_OS_Listado_Jubilados").val(respuesta["SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados"]);
        $("#EditarSI_OS_Gastos_Ingresos_Recibidos").val(respuesta["SI_Obligaciones_Solicitadas_Ingreso_Recibido"]);
        $("#EditarSI_OS_Donaciones_Hechas").val(respuesta["SI_Obligaciones_Solicitadas_Donaciones_Hechas"]);
        $("#EditarSI_OS_Catalogos_Disposicion").val(respuesta["SI_Obligaciones_Solicitadas_Catalogos_Disposicion"]);
        $("#EditarSI_OS_Actas_Sesiones").val(respuesta["SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias"]);
        $("#EditarSI_OS_Listado_Solicitudes").val(respuesta["SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores"]);
        $("#EditarSI_OS_Gacetas_Municipales").val(respuesta["SI_Obligaciones_Solicitadas_Gacetas_Municipales"]);
        $("#EditarSI_OS_Plan_Desarrollo").val(respuesta["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal"]);
        $("#EditarSI_OS_Condiciones_Generales_Trabajo_Relaciones").val(respuesta["SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo"]);
        $("#EditarSI_OS_Recursos_Publicos_Economicos_Especies").val(respuesta["SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos"]);
        $("#EditarSI_OS_Plan_Desarrollo_Urbano").val(respuesta["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano"]);
        $("#EditarSI_OS_Programa_Ordenamiento").val(respuesta["SI_Obligaciones_Solicitadas_Programa_Ordenamiento"]);
        $("#EditarSI_OS_Programa_Suelo").val(respuesta["SI_Obligaciones_Solicitadas_Programa_Uso_Suelo"]);
        $("#EditarSI_OS_Tipos_Suelo").val(respuesta["SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo"]);
        $("#EditarSI_OS_Licencia_Suelo").val(respuesta["SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo"]);
        $("#EditarSI_OS_Licencias_Construcción").val(respuesta["SI_Obligaciones_Solicitadas_Licencias_Construccion"]);
        $("#EditarSI_OS_Montos_Designados_Social").val(respuesta["SI_Obligaciones_Solicitadas_Monto_Designados"]);
        $("#EditarSI_OS_Actas_Cabildos").val(respuesta["SI_Obligaciones_Solicitadas_Actas_Cabildo"]);
        $("#EditarSI_OS_Presupuesto_Sostenible").val(respuesta["SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible"]);
        $("#EditarSI_OS_Evaluaciones_LDF").val(respuesta["SI_Obligaciones_Solicitadas_Evaluaciones_LDF"]);
        $("#EditarSI_OS_Subsidios").val(respuesta["SI_Obligaciones_Solicitadas_Subsidios"]);
        $("#EditarSI_OS_Otro").val(respuesta["SI_Obligaciones_Solicitadas_Otros"]);
        $("#EditarSI_OS_No_Disponible").val(respuesta["SI_Obligaciones_Solicitadas_No_Disponibles"]);
        $("#EditarSI_OS_Suma_Total").val(respuesta["SI_Obligaciones_Solicitadas_Suma_Total"]);
        // Sentido Respuesta
        $("#EditarSI_SR_Informacion_Total").val(respuesta["SI_Sentido_Respuesta_Informacion"]);
        $("#EditarSI_SR_Informacion_Parcial").val(respuesta["SI_Sentido_Respuesta_Informacion_Parcial"]);
        $("#EditarSI_SR_Negada_Clasificación").val(respuesta["SI_Sentido_Respuesta_Negada_Clasificacion"]);
        $("#EditarSI_SR_Inexistencia_Informacion").val(respuesta["SI_Sentido_Respuesta_Inexistencia_Informacion"]);
        $("#EditarSI_SR_Mixta").val(respuesta["SI_Sentido_Respuesta_Mixta"]);
        $("#EditarSI_SR_No_Aclarada").val(respuesta["SI_Sentido_Respuesta_No_Aclarada"]);
        $("#EditarSI_SR_Orientada").val(respuesta["SI_Sentido_Respuesta_Orientada"]);
        $("#EditarSI_SR_En_Tramite").val(respuesta["SI_Sentido_Respuesta_En_Tramite"]);
        $("#EditarSI_SR_Improcedente").val(respuesta["SI_Sentido_Respuesta_Improcedente"]);
        $("#EditarSI_SR_Otros").val(respuesta["SI_Sentido_Respuesta_Otro"]);
        $("#EditarSI_SR_No_Disponible").val(respuesta["SI_Sentido_Respuesta_No_Disponible"]);
        $("#EditarSI_SR_Suma_Total").val(respuesta["SI_Sentido_Respuesta_Suma_Total"]);
        //$("#archivoActualSI").attr("src", respuesta["SI_Archivo"]);
        $("#archivoActualSI").val(respuesta["SI_Archivo"]);

        /*
        if (respuesta["SI_Archivo"] != "") {
          
          $(".previsualizarEditar").attr("src", respuesta["SI_Archivo"]);

        }

        */
        
      } // if

  }) //then

}) // Evento

/*==============================================================================================
                         = MOSTRAR - EDITAR SOLICITUDES INFORMACION =
================================================================================================ */ 

$(".tablasSolicitudesInformacion").on("click", ".btnInformativoSI", function(){

  var idSolicitudesInformacion = $(this).attr("idSolicitudesInformacion");

  var datos = new FormData();
  datos.append("idSolicitudesInformacion", idSolicitudesInformacion);
  console.log("idSolicitudesInformacion",idSolicitudesInformacion);
  $.ajax({
    url: "ajax/adjuntosSolicitudesInformacion.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json", 
     success: function(respuesta){
        console.log("respuesta",respuesta);
      
        $("#MostrarNombreSOSI").val(respuesta["SI_Nombre_Sujeto_Obligado"]);
        $("#MostrarBimestreSOSI").val(respuesta["SI_Informe_Presentado"]);

        $("#MostrarANIOSOSI").val(respuesta["SI_Anios"]);
        $("#MostrarFechaSOSI").val(respuesta["SI_Fecha"]);
        $("#MostrarTotalSOSI").val(respuesta["SI_TOTAL_SOLICITUDES"]);

        $("#MostrarObservacionesSOSI").val(respuesta["SI_Observaciones"]);
        $("#MostrarArchivoSOSI").attr("src", respuesta["SI_Requerimiento_Amonestacion_Privada"]);
        //$("#MostrarArchivoSOSI").val(respuesta["SI_Archivo"]);

        /*
        if (respuesta["SI_Archivo"] != "") {
          
          $(".previsualizarEditar").attr("src", respuesta["SI_Archivo"]);

        }

        */
        
      } // if

  }) //then

}) // Evento

  /* =========================== ACTIVAR ESTADO DEL SOLICITUD DE INFORMACION ==================== */

  $(".tablasSolicitudesInformacion").on("click", ".btnActivarSolicitudInformacion", function() {

    var idSI = $(this).attr("idSI");
    
    var estadoSolicitudesInformacion = $(this).attr("estadoSolicitudesInformacion");

    var RecepcionSolicitudesInformacion = $(this).attr("RecepcionSolicitudesInformacion");

    var datos = new FormData();

    datos.append("activarId", idSI);
    datos.append("activaroSolicitudesInformacion", estadoSolicitudesInformacion);
    datos.append("activaroRecepcionSolicitudesInformacion", RecepcionSolicitudesInformacion);

    //console.log("activarId",idSI);
  	//console.log("activarolicitudesInformacion",RecepcionSolicitudesInformacion);
    //console.log("activaroRecepcionSolicitudesInformacion",activaroRecepcionSolicitudesInformacion);

    $.ajax({

      url:"ajax/SolicitudesInformacion.ajax.php",
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
      
                 window.location = "solicitudes-informacion";
      
               }
         });
         
       } // End Success
       
    }) // End Ajax

  }) // End Function

  /* =================== SUBIR ARCHIVO USUARIO ==================== */

  $(".nuevoArchivoSI").change(function() {

    var archivo = this.files[0];


    /* === VALIDAMOS EL FORMATO DEL ARCHIVO SEA EN PDF EN SOLICITUD DE INFORMACIÓN === */

      if (archivo["type"] != "application/pdf" && archivo["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && archivo["type"] != "application/vnd.ms-excel" ) {
        
        $(".nuevoArchivoSI").val("");

        swal({
          title: "Error al subir el archivo",
          text: "¡La archivo debe estar en formato PDF, .XLSX, .XLS!",
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

 // Funcion para estableces la suma Solicitudes de Informacion - Medios de Presentacion

  function sumarSIMP()
  {
    const $total = document.getElementById('nuevoSI_MP_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIMP" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Tipo de Solicitante

  function sumarSITS()
  {
    const $total = document.getElementById('nuevoSI_TS_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSITS" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Genero del Solicitante

  function sumarSIGS()
  {
    const $total = document.getElementById('nuevoSI_Genero_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIGS" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Información Solicitada

  function sumarSIIS()
  {
    const $total = document.getElementById('nuevoSI_IS_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIIS" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }


  // Funcion para estableces la suma Solicitudes de Informacion - Tramites

  function sumarSIT()
  {
    const $total = document.getElementById('nuevoSI_T_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIT" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Modalidad de Respuesta

  function sumarSIMR()
  {
    const $total = document.getElementById('nuevoSI_MR_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIMR" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Obligaciones Solicitadas

  function sumarSIOS()
  {
    const $total = document.getElementById('nuevoSI_OS_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIOS" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Sentido que emite la Respuesta

  function sumarSISR()
  {
    const $total = document.getElementById('nuevoSI_SR_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSISR" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  /*======================= APLICAR LA SUMA, PARA VALIDAD LOS INPUTS - ACTUALIZAR LA SOLICITUD - ===============================*/

  function sumarSIMPA()
  {
    const $total = document.getElementById('EditarSI_MP_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIMPA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Tipo de Solicitante

  function sumarSITSA()
  {
    const $total = document.getElementById('EditarSI_TS_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSITSA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Genero del Solicitante

  function sumarSIGSA()
  {
    const $total = document.getElementById('EditarSI_Genero_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIGSA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Información Solicitada

  function sumarSIISA()
  {
    const $total = document.getElementById('EditarSI_IS_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIISA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }


  // Funcion para estableces la suma Solicitudes de Informacion - Tramites

  function sumarSITA()
  {
    const $total = document.getElementById('EditarSI_T_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSITA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Modalidad de Respuesta

  function sumarSIMRA()
  {
    const $total = document.getElementById('EditarSI_MR_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIMRA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Obligaciones Solicitadas

  function sumarSIOSA()
  {
    const $total = document.getElementById('EditarSI_OS_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSIOSA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  // Funcion para estableces la suma Solicitudes de Informacion - Sentido que emite la Respuesta

  function sumarSISRA()
  {
    const $total = document.getElementById('EditarSI_SR_Suma_Total');
    let subtotal = 0;
    [ ...document.getElementsByClassName( "montoSISRA" ) ].forEach( function ( element ) {
      if(element.value !== '') {
        subtotal += parseFloat(element.value);
      }
    });
    $total.value = subtotal;
  }

  /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

  $("#nuevoCodeInformeSIAnios").change(function() {

      $(".alert").remove();

      var CodigoInformeSIAnios = $(this).val();

      var datos = new FormData();

      datos.append("validarCodigoInformeSIAniosios", CodigoInformeSIAnios)
      console.log("validarCodigoInformeSIAniosios", CodigoInformeSIAnios)
        $.ajax({
          url:"ajax/SolicitudesInformacion.ajax.php",
          method:"POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success:function(respuesta){
            
            if(respuesta){

              $("#nuevoCodeInformeSIAnios").parent().after('<div class="alert alert-warning">Codigo ya Existente</div>');

              $("#nuevoCodeInformeSIAnios").val("");

            }

          }

      })
  
})

  /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

  $(document).ready(function (){

    var perfiCodigo = $("#perfiCodigo").val();

    var Capacitaciones ="";

    var DatosSI = "Solicitudes Informacion";
    
    var anios = "";

        $('#nuevoTipoInformeSI').change(function (){
          Capacitaciones = $('#nuevoTipoInformeSI').val();
          //function concatenar(nombre,apellido);
          //$('#nombreUsuario').val(nombreUsuario); //FUNCIONA
        $('#nuevoCodeInformeSIAnios').val(perfiCodigo+' '+Capacitaciones+' '+DatosSI+' '+anios);

      });

      $('#nuevoAnioSI').keyup(function (){
        anios = $('#nuevoAnioSI').val();

          //function concatenar2(nombre,apellido);
          $('#nuevoCodeInformeSIAnios').val(perfiCodigo+' '+Capacitaciones+' '+DatosSI+' '+anios);

      });

  });


