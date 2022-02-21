<?php


    class ControladorSolicitudesInformes{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablaSI($itemCodigo, $valor){

          /* Tabla Solicitudes */
          $tabla = "solicitudes_informacion";
          /* Campos Solicitudes de Información */
          //$so = "SI_Nombre_Sujeto_Obligado";
          //$ip = "SI_Informe_Presentado";
          //$ipa = "SI_Anios";
          //$tsi = "SI_TOTAL_SOLICITUDES";
          //$fe = "SI_Fecha";

          $respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSI($itemCodigo, $valor, $tabla);

          return $respuesta;

        }

    /* =========== MOSTRAR DATOS TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablaAdministracionSO($valor, $valor2, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA, $ObtenerEstatusSI, $ObtenerEstatusSA, $ObtenerEstatusCA){

          $tablaSI = "solicitudes_informacion";

          $tablaSA = "solicitudes_arco";

          $TablaCA = "Capacitaciones";

          $respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $valor, $valor2, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA, $ObtenerEstatusSI, $ObtenerEstatusSA, $ObtenerEstatusCA);

          return $respuesta;

        }

        static public function ctrMostrarTablaSINOUSABLE($item,$valor){

          /* Tabla Solicitudes de Informacion */
            $tabla = "solicitudes_informacion";
          /* Campos Solicitudes de Informacion */
            $so = "SI_Nombre_Sujeto_Obligado";
            $ip = "SI_Informe_Presentado";
            $ipa = "SI_Anios";
            $tsi = "SI_TOTAL_SOLICITUDES";
            $fe = "SI_Fecha";
          /* Tabla detalle usuario */
            $tablaDSI = "detalle_usuario_si";
          /* Tabla Usuario */
            $tablaU = "usuarios";
          /* codigo */
        
            //$respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSINOUSABLE($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU);
    
            //return $respuesta;

            //var_dump($respuesta);

         } // Mostrar Tablas SI
       

     /* =========== AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */     

          static public function ctrAgregarSolicitudInformacion(){

            if (isset($_POST["nuevoAnioSI"])) {

              // MEDIOS DE PRESENTACIÓN
              
              if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_MP_Suma_Total"]){

                // TIPO DE SOLICITANTE
                
                if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_TS_Suma_Total"]){

                  // GENERO DEL SOLICITANTE
                
                  if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_Genero_Suma_Total"]){

                    // INFORMACIÓN SOLICITADA
                
                    if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_IS_Suma_Total"]){

                      // TRAMITES
                
                      if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_T_Suma_Total"]){

                        // MODALIDAD DE RESPUESTA
                
                        if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_MR_Suma_Total"]){

                          // OBLIGACIONES SOLICITADAS
                
                          if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_OS_Suma_Total"]){

                            // SENTIDO EN QUE SE EMITE LA RESPUESTA
                
                            if($_POST["nuevoSI_Total"] == $_POST["nuevoSI_SR_Suma_Total"]){
                
                                /* ================= VALIDAR ARCHIVO PDF =================*/

                                $rutaSI = "";

                                $espacio = " ";

                                $Codigo2 = $_SESSION["codigo"];

                                $SObligado2 = $_SESSION["nombre_Informe"];

                                $Anios = $_POST["nuevoAnioSI"];

                                $CodigoIPA2 = $_POST["nuevoTipoInformeSI"].$espacio.$_POST["nuevoAnioSI"];

                                $CarpetaSI = "SolicitudesInformacion";
                                
                                if (isset($_FILES["nuevoArchivoSI"]["tmp_name"])) {

                                  /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF SI ==========================*/
                                
                            
                                  $directorioArchivo = "vistas/pdfs/informes/".$Codigo2;

                                  mkdir($directorioArchivo, 0755);

                                  $directorioArchivo2 = "vistas/pdfs/informes/".$Codigo2."/".$Anios;

                                  mkdir($directorioArchivo2, 0755);

                                  $directorioArchivo3 = "vistas/pdfs/informes/".$Codigo2."/".$Anios."/".$CarpetaSI;

                                  mkdir($directorioArchivo3, 0755);

                                  /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                                  $aletorio = mt_rand(100,999);

                                  if ($_FILES["nuevoArchivoSI"]["type"] == "application/pdf") {
                                        
                                    $rutaSI = "vistas/pdfs/informes/".$Codigo2."/".$Anios."/".$CarpetaSI."/".$CodigoIPA2.$espacio.$SObligado2.".pdf";

                                    move_uploaded_file ($_FILES["nuevoArchivoSI"]["tmp_name"], $rutaSI);

                                    }
                                    

                                  if ($_FILES["nuevoArchivoSI"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                                        
                                    $rutaSI = "vistas/pdfs/informes/".$Codigo2."/".$Anios."/".$CarpetaSI."/".$CodigoIPA2.$espacio.$SObligado2.".xlsx";

                                    move_uploaded_file ($_FILES["nuevoArchivoSI"]["tmp_name"], $rutaSI);

                                  }

                                  
                                  if ($_FILES["nuevoArchivoSI"]["type"] == "application/vnd.ms-excel") {
                                        
                                    $rutaSI = "vistas/pdfs/informes/".$Codigo2."/".$Anios."/".$CarpetaSI."/".$CodigoIPA2.$espacio.$SObligado2.".xls";

                                    move_uploaded_file ($_FILES["nuevoArchivoSI"]["tmp_name"], $rutaSI);

                                  }

                                }

                                // Agregado el SO a la Tabla, mediante su Sesión.
                                //$SObligado = "H. Ayuntamiento de Acaponeta";
                                $SObligado = $_SESSION["nombre_Informe"];

                                // Agregamos Tabla
                                $tablaSI = "solicitudes_informacion";
                                
                                // Cocatenacion Codigo "InformePresentado + Año"
                                $espacio = " ";

                                $CodigoIPA = $_POST["nuevoTipoInformeSI"].$espacio.$_POST["nuevoAnioSI"];

                                // Ingresamos el Codigo Unico del Sujeto Obligado
                                
                                //$Codigo = "A.1";

                                $Codigo = $_SESSION["codigo"];

                                // Se inserta EJEMPLO A.1 1er Informe Bimestral 2022

                                $CodigoTipoInformeAniosSI = $Codigo.$espacio.$CodigoIPA;

                                // Carpeta Solicitudes de Informacion

                                $CarpetaAdcionalSI = "Solicitudes Informacion";

                                // Se insert EJEMPLO A.1 Informe Bimestral SolicitudesInformacion 2022

                                $CodigoUnicoInformeAnioSI = $Codigo.$espacio.$_POST["nuevoTipoInformeSI"].$espacio.$CarpetaAdcionalSI.$espacio.$_POST["nuevoAnioSI"];

                                /* Datos - Array */
                                $datos = array( 
                                                "SI_Estatus" => 0,
                                                "Si_Codigo_SO" => $Codigo,
                                                "SI_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioSI,
                                                "SI_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAniosSI,
                                                "Si_Codigo_Informe_Anios" => $CodigoIPA,
                                                "SI_Nombre_Sujeto_Obligado" => $SObligado,
                                                "SI_Informe_Presentado" => $_POST["nuevoTipoInformeSI"],
                                                "SI_Anios" => $_POST["nuevoAnioSI"], 
                                                "SI_TOTAL_SOLICITUDES" => $_POST["nuevoSI_Total"],
                                                //"** Medio de Presentación **",
                                                "SI_Medio_Presentacion_Personal_Escrito" => $_POST["nuevoSI_MP_Personal_Escrito"],
                                                "SI_Medio_Presentacion_Correo_Electronico" => $_POST["nuevoSI_MP_Correo_Electronico"],
                                                "SI_Medio_Presentacion_Sistema_Infomex" => $_POST["nuevoSI_MP_Sistema_Informex"],
                                                "SI_Medio_Presentacion_PNT" => $_POST["nuevoSI_MP_PNT"],
                                                "SI_Medio_Presentacion_No_disponible" => $_POST["nuevoSI_MP_No_Disponible"],
                                                "SI_Medio_Presentacion_Suma_Total" => $_POST["nuevoSI_MP_Suma_Total"],
                                                //"** Tipo_Solicitud **",
                                                "SI_Tipo_Solicitud_Persona_Fisica" => $_POST["nuevoSI_TS_Persona_Fisica"],
                                                "SI_Tipo_Solicitud_Persona_Moral" => $_POST["nuevoSI_TS_Personal_Moral"],
                                                "SI_Tipo_Solicitud_No_Disponible" => $_POST["nuevoSI_TS_No_Disponible"],
                                                "SI_Tipo_Solicitud_Suma_Total" => $_POST["nuevoSI_TS_Suma_Total"],
                                                //"** Genero_Solicitante **",
                                                "SI_Genero_Solicitante_Femenino" => $_POST["nuevoSI_Genero_Femenino"],
                                                "SI_Genero_Solicitante_Masculino" => $_POST["nuevoSI_Genero_Masculino"],
                                                "SI_Genero_Solicitante_Anonimo" => $_POST["nuevoSI_Genero_Anonimo"],
                                                "SI_Genero_Solicitante_No_Disponible" => $_POST["nuevoSI_Genero_No_Disponible"],
                                                "SI_Genero_Solicitante_Suma_Total" => $_POST["nuevoSI_Genero_Suma_Total"],
                                                //"** Informacion_Solicitada **",
                                                "SI_Informacion_Solicitada_Obligacion_Transparencia" => $_POST["nuevoSI_IS_Obligaciones_Transparencia"],
                                                "SI_Informacion_Solicitada_Reservada" => $_POST["nuevoSI_IS_Reservada"],
                                                "SI_Informacion_Solicitada_Confidencial" => $_POST["nuevoSI_IS_Confidencial"],
                                                "SI_Informacion_Solicitada_Otro" => $_POST["nuevoSI_IS_Otro"],
                                                "SI_Informacion_Solicitada_No_Disponible" => $_POST["nuevoSI_IS_No_Disponible"],
                                                "SI_Informacion_Solicitada_Suma_Total" => $_POST["nuevoSI_IS_Suma_Total"],
                                                //"** Tramites **",
                                                "SI_Tramites_Concluidas" => $_POST["nuevoSI_T_Solicitudes_Concluidas"],
                                                "SI_Tramites_Pendientes" => $_POST["nuevoSI_T_Solicitudes_Pendientes"],
                                                "SI_Tramites_No_Disponible" => $_POST["nuevoSI_T_No_Disponible"],
                                                "SI_Tramites_Suma_Total" => $_POST["nuevoSI_T_Suma_Total"],
                                                //"** Modalidad_Respuesta **",
                                                "SI_Modalidad_Respuesta_Medios_Electronicos" => $_POST["nuevoSI_MR_Medios_electronicos"],
                                                "SI_Modalidad_Respuesta_Copia_Simple" => $_POST["nuevoSI_MR_Copia_Simple"],
                                                "SI_Modalidad_Respuesta_Consulta_Directa" => $_POST["nuevoSI_MR_Consulta_Directa"],
                                                "SI_Modalidad_Respuesta_Copia_Certificada" => $_POST["nuevoSI_MR_Copia_Certificada"],
                                                "SI_Modalidad_Respuesta_Otro" => $_POST["nuevoSI_MR_Otro"],
                                                "SI_Modalidad_Respuesta_No_Disponible" => $_POST["nuevoSI_MR_No_Disponible"],
                                                "SI_Modalidad_Respuesta_Suma_Total" => $_POST["nuevoSI_MR_Suma_Total"],
                                                //"** Obligaciones_Solicitadas **",
                                                "SI_Obligaciones_Solicitadas_Marco_Normativo" => $_POST["nuevoSI_OS_Marco_Normativo"],
                                                "SI_Obligaciones_Solicitadas_Estructura_Organica" => $_POST["nuevoSI_OS_Estructura_Organica"],
                                                "SI_Obligaciones_Solicitadas_Funciones_Area" => $_POST["nuevoSI_OS_Funciones_Cada_Area"],
                                                "SI_Obligaciones_Solicitadas_Metas_Objetivos" => $_POST["nuevoSI_OS_Metas_Objetivos"],
                                                "SI_Obligaciones_Solicitadas_Indicadores_Relacionados" => $_POST["nuevoSI_OS_Indicadores_Relacionados"],
                                                "SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas" => $_POST["nuevoSI_OS_Indicadores_Rendir_Cuentas"],
                                                "SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico" => $_POST["nuevoSI_OS_Servidores_Publicos"],
                                                "SI_Obligaciones_Solicitadas_Remuneraciones_Personal" => $_POST["nuevoSI_OS_Remuneraciones_Personal"],
                                                "SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos" => $_POST["nuevoSI_OS_Gastos_Representacion_Viaticos"],
                                                "SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes" => $_POST["nuevoSI_OS_Plazas_Vacantes"],
                                                "SI_Obligaciones_Solicitadas_Contratacion_Servicios" => $_POST["nuevoSI_OS_Contratacion_Servicios"],
                                                "SI_Obligaciones_Solicitadas_Versiones_Publicas" => $_POST["nuevoSI_OS_Versiones_Públicas"],
                                                "SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT" => $_POST["nuevoSI_OS_Domicilio_Dirección"],
                                                "SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo" => $_POST["nuevoSI_OS_Convocatoria_Concursos"],
                                                "SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios" => $_POST["nuevoSI_OS_Informacion_Programas"],
                                                "SI_Obligaciones_Solicitadas_Condiciones_Trabajos" => $_POST["nuevoSI_OS_Condiciones_Generales_Trabajo"],
                                                "SI_Obligaciones_Solicitadas_Recursos_Publicos" => $_POST["nuevoSI_OS_Recursos_Publicos_Economicos"],
                                                "SI_Obligaciones_Solicitadas_Informacion_Curricular" => $_POST["nuevoSI_OS_Información_Curricular"],
                                                "SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados" => $_POST["nuevoSI_OS_Servidores_Publicos_Sancionados"],
                                                "SI_Obligaciones_Solicitadas_Servicios_Ofrecen" => $_POST["nuevoSI_OS_Servicios_Ofrecen"],
                                                "SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos" => $_POST["nuevoSI_OS_Tramites_Requisitos_Formatos"],
                                                "SI_Obligaciones_Solicitadas_Presupuesto_Asignado" => $_POST["nuevoSI_OS_Presupuesto_Asignado"],
                                                "SI_Obligaciones_Solicitadas_Informacion_Relativa" => $_POST["nuevoSI_OS_Informacion_Relativa"],
                                                "SI_Obligaciones_Solicitadas_Montos_Designados" => $_POST["nuevoSI_OS_Montos_Designados"],
                                                "SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias" => $_POST["nuevoSI_OS_Informes_Resultados_Auditorias"],
                                                "SI_Obligaciones_Solicitadas_Resultados_Dictaminacion" => $_POST["nuevoSI_OS_Resultados_Dictaminación"],
                                                "SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias" => $_POST["nuevoSI_OS_Montos_Criterios_Convocatorias"],
                                                "SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios" => $_POST["nuevoSI_OS_Concesiones_Contratos_Convenios"],
                                                "SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones" => $_POST["nuevoSI_OS_Resultados_Procesos"],
                                                "SI_Obligaciones_Solicitadas_Infomes_Generen_SO" => $_POST["nuevoSI_OS_Informes_Resultados"],
                                                "SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento" => $_POST["nuevoSI_OS_Estadisticas_Generen_Cumplimiento"],
                                                "SI_Obligaciones_Solicitadas_Avances_Programaticos" => $_POST["nuevoSI_OS_Avances_Programaticos"],
                                                "SI_Obligaciones_Solicitadas_Padron_Proveedores" => $_POST["nuevoSI_OS_Padrón_Proveedores"],
                                                "SI_Obligaciones_Solicitadas_Convenios_Coordinacion" => $_POST["nuevoSI_OS_Convenios_Coordinación"], 
                                                "SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles" => $_POST["nuevoSI_OS_Inventario_Bienes"],
                                                "SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas" => $_POST["nuevoSI_OS_Recomendaciones_Emitidas"],
                                                "SI_Obligaciones_Solicitadas_Resoluciones_Laudos" => $_POST["nuevoSI_OS_Resoluciones_Laudos"],
                                                "SI_Obligaciones_Solicitadas_Mecanismo_Participacion" => $_POST["nuevoSI_OS_Mecanismos_Participación"],
                                                "SI_Obligaciones_Solicitadas_Programas_Ofrecidos" => $_POST["nuevoSI_OS_Programas_Ofrecidoss"],
                                                "SI_Obligaciones_Solicitadas_Actas_Resoluciones" => $_POST["nuevoSI_OS_Actas_Resoluciones"],
                                                "SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas" => $_POST["nuevoSI_OS_Evaluaciones_Encuentas"],
                                                "SI_Obligaciones_Solicitadas_Estudios_Financiados" => $_POST["nuevoSI_OS_Estudios_Financiados"],
                                                "SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados" => $_POST["nuevoSI_OS_Listado_Jubilados"],
                                                "SI_Obligaciones_Solicitadas_Ingreso_Recibido" => $_POST["nuevoSI_OS_Gastos_Ingresos_Recibidos"],
                                                "SI_Obligaciones_Solicitadas_Donaciones_Hechas" => $_POST["nuevoSI_OS_Donaciones_Hechas"],
                                                "SI_Obligaciones_Solicitadas_Catalogos_Disposicion" => $_POST["nuevoSI_OS_Catalogos_Disposicion"],
                                                "SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias" => $_POST["nuevoSI_OS_Actas_Sesiones"], //--
                                                "SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores" => $_POST["nuevoSI_OS_Listado_Solicitudes"],
                                                "SI_Obligaciones_Solicitadas_Gacetas_Municipales" => $_POST["nuevoSI_OS_Gacetas_Municipales"],
                                                "SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal" => $_POST["nuevoSI_OS_Plan_Desarrollo"],
                                                "SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo" => $_POST["nuevoSI_OS_Condiciones_Generales_Trabajo_Relaciones"], //--
                                                "SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos" => $_POST["nuevoSI_OS_Recursos_Publicos_Economicos_Especies"], //--
                                                "SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano" => $_POST["nuevoSI_OS_Plan_Desarrollo_Urbano"], 
                                                "SI_Obligaciones_Solicitadas_Programa_Ordenamiento" => $_POST["nuevoSI_OS_Programa_Ordenamiento"],
                                                "SI_Obligaciones_Solicitadas_Programa_Uso_Suelo" => $_POST["nuevoSI_OS_Programa_Suelo"],
                                                "SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo" => $_POST["nuevoSI_OS_Tipos_Suelo"],
                                                "SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo" => $_POST["nuevoSI_OS_Licencia_Suelo"],
                                                "SI_Obligaciones_Solicitadas_Licencias_Construccion" => $_POST["nuevoSI_OS_Licencias_Construcción"],
                                                "SI_Obligaciones_Solicitadas_Monto_Designados" => $_POST["nuevoSI_OS_Montos_Designados_Social"], //--  
                                                "SI_Obligaciones_Solicitadas_Actas_Cabildo" => $_POST["nuevoSI_OS_Actas_Cabildos"],
                                                "SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible" => $_POST["nuevoSI_OS_Presupuesto_Sostenible"],
                                                "SI_Obligaciones_Solicitadas_Evaluaciones_LDF" => $_POST["nuevoSI_OS_Evaluaciones_LDF"],
                                                "SI_Obligaciones_Solicitadas_Subsidios" => $_POST["nuevoSI_OS_Subsidios"],
                                                "SI_Obligaciones_Solicitadas_Otros" => $_POST["nuevoSI_OS_Otro"],
                                                "SI_Obligaciones_Solicitadas_No_Disponibles" => $_POST["nuevoSI_OS_No_Disponible"],
                                                "SI_Obligaciones_Solicitadas_Suma_Total" => $_POST["nuevoSI_OS_Suma_Total"],
                                                //"** Sentido_Respuesta **",
                                                "SI_Sentido_Respuesta_Informacion" => $_POST["nuevoSI_SR_Informacion_Total"],
                                                "SI_Sentido_Respuesta_Informacion_Parcial" => $_POST["nuevoSI_SR_Informacion_Parcial"],
                                                "SI_Sentido_Respuesta_Negada_Clasificacion" => $_POST["nuevoSI_SR_Negada_Clasificación"],
                                                "SI_Sentido_Respuesta_Inexistencia_Informacion" => $_POST["nuevoSI_SR_Inexistencia_Informacion"],
                                                "SI_Sentido_Respuesta_Mixta" => $_POST["nuevoSI_SR_Mixta"],
                                                "SI_Sentido_Respuesta_No_Aclarada" => $_POST["nuevoSI_SR_No_Aclarada"],
                                                "SI_Sentido_Respuesta_Orientada" => $_POST["nuevoSI_SR_Orientada"],
                                                "SI_Sentido_Respuesta_En_Tramite" => $_POST["nuevoSI_SR_En_Tramite"],
                                                "SI_Sentido_Respuesta_Improcedente" => $_POST["nuevoSI_SR_Improcedente"],
                                                "SI_Sentido_Respuesta_Otro" => $_POST["nuevoSI_SR_Otros"],
                                                "SI_Sentido_Respuesta_No_Disponible" => $_POST["nuevoSI_SR_No_Disponible"],
                                                "SI_Sentido_Respuesta_Suma_Total" => $_POST["nuevoSI_SR_Suma_Total"],
                                                "SI_Archivo" => $rutaSI 

                                            );
                                                
                                $respuesta = ModeloSolicitudesInformacion::MdlAgregarSI($tablaSI, $datos);

                                var_dump($respuesta);

                                if($respuesta == "ok"){

                                        echo '<script>

                                        swal({

                                            type: "success",
                                            title: "¡La Solicitud de Informes Bimestrales, ha sido guardado correctamente!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"

                                        }).then(function(result){

                                            if(result.value){
                                            
                                                window.location = "solicitudes-informacion";

                                            }

                                        });
                                    

                                        </script>';

                                } // if

                            }else{

                                echo '<script>
           
                                 swal({
           
                                   title: "Error en Sentido en que se Emite la respuesta",
                                   text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                                   type: "error",
                                   confirmButtonText: "¡Cerrar!"
           
                                 }).then(function(result){
           
                                   if(result.value){
                                     
                                       window.location = "solicitudes-informacion";
           
                                   }
           
                                 });
                       
                                 </script>';
           
                            }     

                          }else{

                             echo '<script>
        
                              swal({
        
                                title: "Error en Obligaciones Solicitadas",
                                text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                                type: "error",
                                confirmButtonText: "¡Cerrar!"
        
                              }).then(function(result){
        
                                if(result.value){
                                  
                                    window.location = "solicitudes-informacion";
        
                                }
        
                              });
                    
                              </script>';
        
                          }                 

                        }else{

                          echo '<script>
        
                            swal({
        
                              title: "Error en Modalidad de Respuesta",
                              text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                              type: "error",
                              confirmButtonText: "¡Cerrar!"
        
                            }).then(function(result){
        
                                if(result.value){
                                  
                                    window.location = "solicitudes-informacion";
        
                                }
        
                            });
                    
                              </script>';
        
                        }           

                      }else{

                          echo '<script>
        
                            swal({
        
                              title: "Error en Tramites",
                              text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                              type: "error",
                              confirmButtonText: "¡Cerrar!"
        
                            }).then(function(result){
        
                                if(result.value){
                                  
                                    window.location = "solicitudes-informacion";
        
                                }
        
                            });
                    
                              </script>';
        
                      }              
                        
                    }else{

                        echo '<script>

                        swal({

                          title: "Error en Información Solicitada",
                          text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                          type: "error",
                          confirmButtonText: "¡Cerrar!"

                        }).then(function(result){

                          if(result.value){
                          
                              window.location = "solicitudes-informacion";

                          }

                        });
            
                      </script>';

                    }    
                  
                  }else{
                      
                      echo '<script>

                        swal({

                          title: "Error en Genero del Solicitante",
                          text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                          type: "error",
                          confirmButtonText: "¡Cerrar!"

                        }).then(function(result){

                          if(result.value){
                          
                              window.location = "solicitudes-informacion";

                          }

                        });
            
                      </script>';

                  }

                }else{

                   echo '<script>

                      swal({

                        title: "Error en Tipo de Solicitante",
                        text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"

                      }).then(function(result){

                        if(result.value){
                        
                            window.location = "solicitudes-informacion";

                        }

                      });
            
                  </script>';

                }

              } else{

                  echo '<script>

                      swal({

                        title: "Error en Medios de Presentación",
                        text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"

                      }).then(function(result){

                        if(result.value){
                        
                            window.location = "solicitudes-informacion";

                        }

                      });
                
                      </script>';

                } // END ELSE MEDIOS DE PRESENTACIÓN
               
            }// if   

          } // Funcion Agregar Soliciud Informacion

    /* ================  EDITAR - MOSTRAR LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   ================= */ 
    
    static public function ctrMostrarSolicitudInformaticaEditar($item, $valor){

      $tabla = "solicitudes_informacion";
  
      $respuesta = ModeloSolicitudesInformacion::mdlMostrarRegistroEditarSI($tabla, $item, $valor);
  
      return $respuesta;
  
    }


  /* ================  EDITAR - LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   ================= */ 

   static public function ctrActualizarSolicitudInformacion(){

            if (isset($_POST["EditarSI_MP_Suma_Total"])) {

              // MEDIOS DE PRESENTACIÓN
              
              if($_POST["EditarSI_Total"] == $_POST["EditarSI_MP_Suma_Total"]){

                // TIPO DE SOLICITANTE
                
                if($_POST["EditarSI_Total"] == $_POST["EditarSI_TS_Suma_Total"]){

                  // GENERO DEL SOLICITANTE
                
                  if($_POST["EditarSI_Total"] == $_POST["EditarSI_Genero_Suma_Total"]){

                    // INFORMACIÓN SOLICITADA
                
                    if($_POST["EditarSI_Total"] == $_POST["EditarSI_IS_Suma_Total"]){

                      // TRAMITES
                
                      if($_POST["EditarSI_Total"] == $_POST["EditarSI_T_Suma_Total"]){

                        // MODALIDAD DE RESPUESTA
                
                        if($_POST["EditarSI_Total"] == $_POST["EditarSI_MR_Suma_Total"]){

                          // OBLIGACIONES SOLICITADAS
                
                          if($_POST["EditarSI_Total"] == $_POST["EditarSI_OS_Suma_Total"]){

                            // SENTIDO EN QUE SE EMITE LA RESPUESTA
                
                            if($_POST["EditarSI_Total"] == $_POST["EditarSI_SR_Suma_Total"]){

                                $tabla = "solicitudes_informacion";

                                $SObligadoA = $_SESSION["nombre_Informe"];

                                $CodigoA = $_SESSION["codigo"];

                                $AniosA = $_POST["EditarAnioSI"];

                                $espacio = " ";

                                $CarpetaSA = "SolicitudesInformacion";

                                $CodigoIPAA = $_POST["EditarTipoInformeSI"].$espacio.$_POST["EditarAnioSI"];

                                    if ($_FILES["editarArchivoSI"] != "") {

                                      /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

                                      $rutaArchivoA = $_POST["archivoActualSI"];

                                      if (isset($_FILES["editarArchivoSI"]["tmp_name"]) && !empty($_FILES["editarArchivoSI"]["tmp_name"])){

                                          /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                                          
                                          
                                          $directorioArchivo = "vistas/pdfs/informes/".$CodigoA."/".$AniosA."/".$CarpetaSA;

                                          /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                                          if(!empty($_POST["archivoActualSI"])){
                                              
                                              unlink($_POST["archivoActualSI"]);

                                          } else {
                                              
                                              mkdir($directorioArchivo, 0775);

                                          }

                                          /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                                          $aletorio = mt_rand(100,999);

                                          if ($_FILES["editarArchivoSI"]["type"] == "application/pdf") {
                                              
                                              $rutaArchivoA = "vistas/pdfs/informes/".$CodigoA."/".$AniosA."/".$CarpetaSA."/".$CodigoIPAA.$espacio.$SObligadoA.".pdf";

                                              move_uploaded_file ($_FILES["editarArchivoSI"]["tmp_name"], $rutaArchivoA);

                                          }

                                          if ($_FILES["editarArchivoSI"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                                              
                                              $rutaArchivoA = "vistas/pdfs/informes/".$CodigoA."/".$AniosA."/".$CarpetaSA."/".$CodigoIPAA.$espacio.$SObligadoA.".xlsx";

                                              move_uploaded_file ($_FILES["editarArchivoSI"]["tmp_name"], $rutaArchivoA);

                                          }

                                          if ($_FILES["editarArchivoSI"]["type"] == "application/vnd.ms-excel") {
                                              
                                              $rutaArchivoA = "vistas/pdfs/informes/".$CodigoA."/".$AniosA."/".$CarpetaSA."/".$CodigoIPAA.$espacio.$SObligadoA.".xls";

                                              move_uploaded_file ($_FILES["editarArchivoSI"]["tmp_name"], $rutaArchivoA);

                                          }

                                      }     

                                    } else{

                                      $rutaArchivoA = $_POST["archivoActualSI"];

                                    }  

                                $datos = array(
                                              "SI_Informe_Presentado"=> $_POST["EditarTipoInformeSI"],
                                              "SI_Anios"=> $_POST["EditarAnioSI"],
                                              "SI_TOTAL_SOLICITUDES"=> $_POST["EditarSI_Total"],
                                              "SI_Medio_Presentacion_Personal_Escrito"=> $_POST["EditarSI_MP_Personal_Escrito"],
                                              "SI_Medio_Presentacion_Correo_Electronico"=> $_POST["EditarSI_MP_Correo_Electronico"],
                                              "SI_Medio_Presentacion_Sistema_Infomex"=> $_POST["EditarSI_MP_Sistema_Informex"],
                                              "SI_Medio_Presentacion_PNT"=> $_POST["EditarSI_MP_PNT"],
                                              "SI_Medio_Presentacion_No_disponible"=> $_POST["EditarSI_MP_No_Disponible"],
                                              "SI_Medio_Presentacion_Suma_Total"=> $_POST["EditarSI_MP_Suma_Total"],
                                              "SI_Tipo_Solicitud_Persona_Fisica"=> $_POST["EditarSI_TS_Persona_Fisica"],
                                              "SI_Tipo_Solicitud_Persona_Moral"=> $_POST["EditarSI_TS_Personal_Moral"],
                                              "SI_Tipo_Solicitud_No_Disponible"=> $_POST["EditarSI_TS_No_Disponible"],
                                              "SI_Tipo_Solicitud_Suma_Total"=> $_POST["EditarSI_TS_Suma_Total"],
                                              "SI_Genero_Solicitante_Femenino"=> $_POST["EditarSI_Genero_Femenino"],
                                              "SI_Genero_Solicitante_Masculino"=> $_POST["EditarSI_Genero_Masculino"],
                                              "SI_Genero_Solicitante_Anonimo"=> $_POST["EditarSI_Genero_Anonimo"],
                                              "SI_Genero_Solicitante_No_Disponible"=> $_POST["EditarSI_Genero_No_Disponible"],
                                              "SI_Genero_Solicitante_Suma_Total"=> $_POST["EditarSI_Genero_Suma_Total"],
                                              "SI_Informacion_Solicitada_Obligacion_Transparencia"=> $_POST["EditarSI_IS_Obligaciones_Transparencia"],
                                              "SI_Informacion_Solicitada_Reservada"=> $_POST["EditarSI_IS_Reservada"],
                                              "SI_Informacion_Solicitada_Confidencial"=> $_POST["EditarSI_IS_Confidencial"],
                                              "SI_Informacion_Solicitada_Otro"=> $_POST["EditarSI_IS_Otro"],
                                              "SI_Informacion_Solicitada_No_Disponible"=> $_POST["EditarSI_IS_No_Disponible"],
                                              "SI_Informacion_Solicitada_Suma_Total"=> $_POST["EditarSI_IS_Suma_Total"],
                                              "SI_Tramites_Concluidas"=> $_POST["EditarSI_T_Solicitudes_Concluidas"],
                                              "SI_Tramites_Pendientes"=> $_POST["EditarSI_T_Solicitudes_Pendientes"],
                                              "SI_Tramites_No_Disponible"=> $_POST["EditarSI_T_No_Disponible"],
                                              "SI_Tramites_Suma_Total"=> $_POST["EditarSI_T_Suma_Total"],
                                              "SI_Modalidad_Respuesta_Medios_Electronicos"=> $_POST["EditarSI_MR_Medios_electronicos"],
                                              "SI_Modalidad_Respuesta_Copia_Simple"=> $_POST["EditarSI_MR_Copia_Simple"],
                                              "SI_Modalidad_Respuesta_Consulta_Directa"=> $_POST["EditarSI_MR_Consulta_Directa"],
                                              "SI_Modalidad_Respuesta_Copia_Certificada"=> $_POST["EditarSI_MR_Copia_Certificada"],
                                              "SI_Modalidad_Respuesta_Otro"=> $_POST["EditarSI_MR_Otro"],
                                              "SI_Modalidad_Respuesta_No_Disponible"=> $_POST["EditarSI_MR_No_Disponible"],
                                              "SI_Modalidad_Respuesta_Suma_Total"=> $_POST["EditarSI_MR_Suma_Total"],
                                              "SI_Obligaciones_Solicitadas_Marco_Normativo"=> $_POST["EditarSI_OS_Marco_Normativo"],
                                              "SI_Obligaciones_Solicitadas_Estructura_Organica"=> $_POST["EditarSI_OS_Estructura_Organica"],
                                              "SI_Obligaciones_Solicitadas_Funciones_Area"=> $_POST["EditarSI_OS_Funciones_Cada_Area"],
                                              "SI_Obligaciones_Solicitadas_Metas_Objetivos"=> $_POST["EditarSI_OS_Metas_Objetivos"],
                                              "SI_Obligaciones_Solicitadas_Indicadores_Relacionados"=> $_POST["EditarSI_OS_Indicadores_Relacionados"],
                                              "SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas"=> $_POST["EditarSI_OS_Indicadores_Rendir_Cuentas"],
                                              "SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico"=> $_POST["EditarSI_OS_Servidores_Publicos"],
                                              "SI_Obligaciones_Solicitadas_Remuneraciones_Personal"=> $_POST["EditarSI_OS_Remuneraciones_Personal"],
                                              "SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos"=> $_POST["EditarSI_OS_Gastos_Representacion_Viaticos"],
                                              "SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes"=> $_POST["EditarSI_OS_Plazas_Vacantes"],
                                              "SI_Obligaciones_Solicitadas_Contratacion_Servicios"=> $_POST["EditarSI_OS_Contratacion_Servicios"],
                                              "SI_Obligaciones_Solicitadas_Versiones_Publicas"=> $_POST["EditarSI_OS_Versiones_Públicas"],
                                              "SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT"=> $_POST["EditarSI_OS_Domicilio_Dirección"],
                                              "SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo"=> $_POST["EditarSI_OS_Convocatoria_Concursos"],
                                              "SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios"=> $_POST["EditarSI_OS_Informacion_Programas"],
                                              "SI_Obligaciones_Solicitadas_Condiciones_Trabajos"=> $_POST["EditarSI_OS_Condiciones_Generales_Trabajo"],
                                              "SI_Obligaciones_Solicitadas_Recursos_Publicos"=> $_POST["EditarSI_OS_Recursos_Publicos_Economicos"],
                                              "SI_Obligaciones_Solicitadas_Informacion_Curricular"=> $_POST["EditarSI_OS_Información_Curricular"],
                                              "SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados"=> $_POST["EditarSI_OS_Servidores_Publicos_Sancionados"],
                                              "SI_Obligaciones_Solicitadas_Servicios_Ofrecen"=> $_POST["EditarSI_OS_Servicios_Ofrecen"],
                                              "SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos"=> $_POST["EditarSI_OS_Tramites_Requisitos_Formatos"],
                                              "SI_Obligaciones_Solicitadas_Presupuesto_Asignado"=> $_POST["EditarSI_OS_Presupuesto_Asignado"],
                                              "SI_Obligaciones_Solicitadas_Informacion_Relativa"=> $_POST["EditarSI_OS_Informacion_Relativa"],
                                              "SI_Obligaciones_Solicitadas_Montos_Designados"=> $_POST["EditarSI_OS_Montos_Designados"],
                                              "SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias"=> $_POST["EditarSI_OS_Informes_Resultados_Auditorias"],
                                              "SI_Obligaciones_Solicitadas_Resultados_Dictaminacion"=> $_POST["EditarSI_OS_Resultados_Dictaminación"],
                                              "SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias"=> $_POST["EditarSI_OS_Montos_Criterios_Convocatorias"],
                                              "SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios"=> $_POST["EditarSI_OS_Concesiones_Contratos_Convenios"],
                                              "SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones"=> $_POST["EditarSI_OS_Resultados_Procesos"],
                                              "SI_Obligaciones_Solicitadas_Infomes_Generen_SO"=> $_POST["EditarSI_OS_Informes_Resultados"],
                                              "SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento"=> $_POST["EditarSI_OS_Estadisticas_Generen_Cumplimiento"],
                                              "SI_Obligaciones_Solicitadas_Avances_Programaticos"=> $_POST["EditarSI_OS_Avances_Programaticos"],
                                              "SI_Obligaciones_Solicitadas_Padron_Proveedores"=> $_POST["EditarSI_OS_Padrón_Proveedores"],
                                              "SI_Obligaciones_Solicitadas_Convenios_Coordinacion"=> $_POST["EditarSI_OS_Convenios_Coordinación"],
                                              "SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles"=> $_POST["EditarSI_OS_Inventario_Bienes"],
                                              "SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas"=> $_POST["EditarSI_OS_Recomendaciones_Emitidas"],
                                              "SI_Obligaciones_Solicitadas_Resoluciones_Laudos"=> $_POST["EditarSI_OS_Resoluciones_Laudos"],
                                              "SI_Obligaciones_Solicitadas_Programas_Ofrecidos"=> $_POST["EditarSI_OS_Mecanismos_Participación"],
                                              "SI_Obligaciones_Solicitadas_Mecanismo_Participacion"=> $_POST["EditarSI_OS_Programas_Ofrecidoss"],
                                              "SI_Obligaciones_Solicitadas_Actas_Resoluciones"=> $_POST["EditarSI_OS_Actas_Resoluciones"],
                                              "SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas"=> $_POST["EditarSI_OS_Evaluaciones_Encuentas"],
                                              "SI_Obligaciones_Solicitadas_Estudios_Financiados"=> $_POST["EditarSI_OS_Estudios_Financiados"],
                                              "SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados"=> $_POST["EditarSI_OS_Listado_Jubilados"],
                                              "SI_Obligaciones_Solicitadas_Ingreso_Recibido"=> $_POST["EditarSI_OS_Gastos_Ingresos_Recibidos"],
                                              "SI_Obligaciones_Solicitadas_Donaciones_Hechas"=> $_POST["EditarSI_OS_Donaciones_Hechas"],
                                              "SI_Obligaciones_Solicitadas_Catalogos_Disposicion"=> $_POST["EditarSI_OS_Catalogos_Disposicion"],
                                              "SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias"=> $_POST["EditarSI_OS_Actas_Sesiones"],
                                              "SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores"=> $_POST["EditarSI_OS_Listado_Solicitudes"],
                                              "SI_Obligaciones_Solicitadas_Gacetas_Municipales"=> $_POST["EditarSI_OS_Gacetas_Municipales"],
                                              "SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal"=> $_POST["EditarSI_OS_Plan_Desarrollo"],
                                              "SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo"=> $_POST["EditarSI_OS_Condiciones_Generales_Trabajo_Relaciones"],
                                              "SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos"=> $_POST["EditarSI_OS_Recursos_Publicos_Economicos_Especies"],
                                              "SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano"=> $_POST["EditarSI_OS_Plan_Desarrollo_Urbano"],
                                              "SI_Obligaciones_Solicitadas_Programa_Ordenamiento"=> $_POST["EditarSI_OS_Programa_Ordenamiento"],
                                              "SI_Obligaciones_Solicitadas_Programa_Uso_Suelo"=> $_POST["EditarSI_OS_Programa_Suelo"],
                                              "SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo"=> $_POST["EditarSI_OS_Tipos_Suelo"],
                                              "SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo"=> $_POST["EditarSI_OS_Licencia_Suelo"],
                                              "SI_Obligaciones_Solicitadas_Licencias_Construccion"=> $_POST["EditarSI_OS_Licencias_Construcción"],
                                              "SI_Obligaciones_Solicitadas_Monto_Designados"=> $_POST["EditarSI_OS_Montos_Designados_Social"],
                                              "SI_Obligaciones_Solicitadas_Actas_Cabildo"=> $_POST["EditarSI_OS_Actas_Cabildos"],
                                              "SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible"=> $_POST["EditarSI_OS_Presupuesto_Sostenible"],
                                              "SI_Obligaciones_Solicitadas_Evaluaciones_LDF"=> $_POST["EditarSI_OS_Evaluaciones_LDF"],
                                              "SI_Obligaciones_Solicitadas_Subsidios"=> $_POST["EditarSI_OS_Subsidios"],
                                              "SI_Obligaciones_Solicitadas_Otros"=> $_POST["EditarSI_OS_Otro"],
                                              "SI_Obligaciones_Solicitadas_No_Disponibles"=> $_POST["EditarSI_OS_No_Disponible"],
                                              "SI_Obligaciones_Solicitadas_Suma_Total"=> $_POST["EditarSI_OS_Suma_Total"],
                                              "SI_Sentido_Respuesta_Informacion"=> $_POST["EditarSI_SR_Informacion_Total"],
                                              "SI_Sentido_Respuesta_Informacion_Parcial"=> $_POST["EditarSI_SR_Informacion_Parcial"],
                                              "SI_Sentido_Respuesta_Negada_Clasificacion"=> $_POST["EditarSI_SR_Negada_Clasificación"],
                                              "SI_Sentido_Respuesta_Inexistencia_Informacion"=> $_POST["EditarSI_SR_Inexistencia_Informacion"],
                                              "SI_Sentido_Respuesta_Mixta"=> $_POST["EditarSI_SR_Mixta"],
                                              "SI_Sentido_Respuesta_No_Aclarada"=> $_POST["EditarSI_SR_No_Aclarada"],
                                              "SI_Sentido_Respuesta_Orientada"=> $_POST["EditarSI_SR_Orientada"],
                                              "SI_Sentido_Respuesta_En_Tramite"=> $_POST["EditarSI_SR_En_Tramite"],
                                              "SI_Sentido_Respuesta_Improcedente"=> $_POST["EditarSI_SR_Improcedente"],
                                              "SI_Sentido_Respuesta_Otro"=> $_POST["EditarSI_SR_Otros"],
                                              "SI_Sentido_Respuesta_No_Disponible"=> $_POST["EditarSI_SR_No_Disponible"],
                                              "SI_Sentido_Respuesta_Suma_Total"=> $_POST["EditarSI_SR_Suma_Total"],
                                              "SI_Archivo" => $rutaArchivoA );

                                              $respuesta = ModeloSolicitudesInformacion::mdlEditarSolicitudInformacion($tabla, $datos);

                                              if($respuesta == "ok"){
                                    
                                                    echo'<script>
                                    
                                                    swal({
                                                      type: "success",
                                                      title: "El Informe ha sido cambiado correctamente",
                                                      showConfirmButton: true,
                                                      confirmButtonText: "Cerrar"
                                                      }).then(function(result){

                                                        if (result.value) {
                                    
                                                          window.location = "solicitudes-informacion";
                                    
                                                      }

                                                    })
                                    
                                              </script>';
                                    
                                            }
                            }else{

                                echo '<script>
           
                                 swal({
           
                                   title: "Error en Sentido en que se Emite la respuesta",
                                   text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                                   type: "error",
                                   confirmButtonText: "¡Cerrar!"
           
                                 }).then(function(result){
           
                                   if(result.value){
                                     
                                       window.location = "solicitudes-informacion";
           
                                   }
           
                                 });
                       
                                 </script>';
           
                            }     

                          }else{

                             echo '<script>
        
                              swal({
        
                                title: "Error en Obligaciones Solicitadas",
                                text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                                type: "error",
                                confirmButtonText: "¡Cerrar!"
        
                              }).then(function(result){
        
                                if(result.value){
                                  
                                    window.location = "solicitudes-informacion";
        
                                }
        
                              });
                    
                              </script>';
        
                          }                 

                        }else{

                          echo '<script>
        
                            swal({
        
                              title: "Error en Modalidad de Respuesta",
                              text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                              type: "error",
                              confirmButtonText: "¡Cerrar!"
        
                            }).then(function(result){
        
                                if(result.value){
                                  
                                    window.location = "solicitudes-informacion";
        
                                }
        
                            });
                    
                              </script>';
        
                        }           

                      }else{

                          echo '<script>
        
                            swal({
        
                              title: "Error en Tramites",
                              text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                              type: "error",
                              confirmButtonText: "¡Cerrar!"
        
                            }).then(function(result){
        
                                if(result.value){
                                  
                                    window.location = "solicitudes-informacion";
        
                                }
        
                            });
                    
                              </script>';
        
                      }              
                        
                    }else{

                        echo '<script>

                        swal({

                          title: "Error en Información Solicitada",
                          text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                          type: "error",
                          confirmButtonText: "¡Cerrar!"

                        }).then(function(result){

                          if(result.value){
                          
                              window.location = "solicitudes-informacion";

                          }

                        });
            
                      </script>';

                    }    
                  
                  }else{
                      
                      echo '<script>

                        swal({

                          title: "Error en Genero del Solicitante",
                          text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                          type: "error",
                          confirmButtonText: "¡Cerrar!"

                        }).then(function(result){

                          if(result.value){
                          
                              window.location = "solicitudes-informacion";

                          }

                        });
            
                      </script>';

                  }

                }else{

                   echo '<script>

                      swal({

                        title: "Error en Tipo de Solicitante",
                        text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"

                      }).then(function(result){

                        if(result.value){
                        
                            window.location = "solicitudes-informacion";

                        }

                      });
            
                  </script>';

                }

              } else{

                  echo '<script>

                      swal({

                        title: "Error en Medios de Presentación",
                        text: "¡Verifique sus Valores con el Total de Solicitudes Reportadas!",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"

                      }).then(function(result){

                        if(result.value){
                        
                            window.location = "solicitudes-informacion";

                        }

                      });
                
                      </script>';

                } // END ELSE MEDIOS DE PRESENTACIÓN                                  


            }

   }


    /* =========== ELIMINAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */  

     static public function ctrBorrarRegistroSolicitudInformacion(){

      if(isset($_GET["idSI"])){

        $tabla ="solicitudes_informacion";

        $CarpetaSI = "SolicitudesInformacion";

        $espacio = " ";

        $datos = $_GET["idSI"];

        if($_GET["archivoSI"] != ""){

          unlink($_GET["archivoSI"]);

          rmdir('vistas/pdfs/informes/'.$_GET["codigo"]."/".$_GET["anios"]."/".$CarpetaSI);

          rmdir('vistas/pdfs/informes/'.$_GET["codigo"]."/".$_GET["anios"]);
  
        }
  
        $respuesta = ModeloSolicitudesInformacion::mdlBorrarRegistroInformacion($tabla, $datos);
  
        if($respuesta == "ok"){
  
          echo'<script>
  
            swal({
                type: "success",
                title: "El Registro, ha sido borrada correctamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                    if (result.value) {
  
                    window.location = "solicitudes-informacion";
  
                    }
                  })
  
            </script>';

        } // if 

      } // if 
      
    }// function

        /* ============ AQUI VALIDAMOS TODA LA INFORMACION QUE PUDIERA ESTA EXISTENTE  ================= */
       // 1.- VALIDAR CODIGO 
       
       static public function ctrValidarSolicitudInformacionExitente($item1, $valor1){

        $tabla = "solicitudes_informacion";
    
        $respuesta = ModeloSolicitudesInformacion::mdlValidarSolicitudesInformacionExitente($tabla, $item1, $valor1);
    
        return $respuesta;
      }

    /* =================== METODO PDF - MOSTRAR DATOS INDIVUDALES REGISTRADOS POR USUARIO =============== */

    static public function ctrMostrarPDFSolicitudInformacion($item, $valor){

      $tabla = "solicitudes_informacion";

      $respuesta = ModeloSolicitudesInformacion::mdlMostrarPDFSolicitudInformacion($tabla,$item,$valor);

      return $respuesta;

    }

    } //ControladorSolicitudesInformes



?>