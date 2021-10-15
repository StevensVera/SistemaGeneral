<?php


    class ControladorSolicitudesInformes{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablaSI($itemCodigo, $valor){

          /* Tabla Solicitudes */
          $tabla = "solicitudes_informacion";
          /* Campos Solicitudes de Información */
          $so = "SI_Nombre_Sujeto_Obligado";
          $ip = "SI_Informe_Presentado";
          $ipa = "SI_Anios";
          $tsi = "SI_TOTAL_SOLICITUDES";
          $fe = "SI_Fecha";

          $respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSI($itemCodigo, $valor, $tabla, $so, $ip, $ipa, $tsi, $fe );

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

                /* Datos - Array */
                $datos = array( "Si_Codigo_SO" => $Codigo, 
                                "Si_Codigo_Informe_Anios" => $CodigoIPA,
                                "SI_Nombre_Sujeto_Obligado" => $SObligado,
                                "SI_Informe_Presentado" => $_POST["nuevoTipoInformeSI"],
                                "SI_Anios" => $_POST["nuevoAnioSI"], 
                                "SI_TOTAL_SOLICITUDES" => $_POST["nuevoSI_Total"],
                                //"** Medio de Presentación **",
                                "SI_Medio_Presentacion_Personal_Escrito" => $_POST["nuevoSI_MP_Personal_Escrito"]
                                //"SI_Medio_Presentacion_Correo-Electronico" => $_POST["nuevoSI_MP_Correo_Electronico"],
                                //"SI_Medio_Presentacion_Sistema-Infomex" => $_POST["nuevoSI_MP_Sistema_Informex"],
                                //"SI_Medio_Presentacion_PNT" => $_POST["nuevoSI_MP_PNT"],
                                //"SI_Medio_Presentacion_No-disponible" => $_POST["nuevoSI_MP_No_Disponible"],
                                //"SI_Medio_Presentacion_Suma-Total" => $_POST["nuevoSI_MP_Suma_Total"]
                                //"** Tipo_Solicitud **",
                                //"SI_Tipo_Solicitud_Persona-Fisica" => $_POST["nuevoSI_TS_Persona_Fisica"],
                                //"SI_Tipo_Solicitud_Persona-Moral" => $_POST["nuevoSI_TS_Personal_Moral"],
                                //"SI_Tipo_Solicitud_No-Disponible" => $_POST["nuevoSI_TS_No_Disponible"],
                                //"SI_Tipo_Solicitud_Suma-Total" => $_POST["nuevoSI_TS_Suma_Total"],
                                //"** Genero_Solicitante **",
                                //"SI_Genero_Solicitante_Femenino" => $_POST["nuevoSI_TS_Persona_Fisica"],
                                //"SI_Genero_Solicitante_Anonimo" => $_POST["nuevoSI_TS_Personal_Moral"],
                                //"SI_Genero_Solicitante_No-Disponible" => $_POST["nuevoSI_TS_No_Disponible"],
                                //"SI_Genero_Solicitante_Suma-Total" => $_POST["nuevoSI_TS_Suma_Total"],
                                //"** Informacion_Solicitada **",
                                //"SI_Informacion_Solicitada_Obligacion-Transparencia" => $_POST["nuevoSI_IS_Obligaciones_Transparencia"],
                                //"SI_Informacion_Solicitada_Reservada" => $_POST["nuevoSI_IS_Reservada"],
                                //"SI_Informacion_Solicitada_Confidencial" => $_POST["nuevoSI_IS_Confidencial"],
                                //"SI_Informacion_Solicitada_Otro" => $_POST["nuevoSI_IS_Otro"],
                                //"SI_Informacion_Solicitada_No-Disponible" => $_POST["nuevoSI_IS_No_Disponible"],
                                //"SI_Informacion_Solicitada_Suma-Total" => $_POST["nuevoSI_IS_Suma_Total"],
                                //"** Tramites **",
                                //"SI_Tramites_Concluidas" => $_POST["nuevoSI_T_Solicitudes_Concluidas"],
                                //"SI_Tramites_Pendientes" => $_POST["nuevoSI_T_Solicitudes_Pendientes"],
                                //"SI_Tramites_No-Disponible" => $_POST["nuevoSI_T_No_Disponible"],
                                //"SI_Tramites_Suma-Total" => $_POST["nuevoSI_T_Suma_Total"]
                                //"** Modalidad_Respuesta **",
                                //"SI_Modalidad_Respuesta_Medios-Electronicos" => $_POST["nuevoSI_MR_Medios_electronicos"],
                                //"SI_Modalidad_Respuesta_Copia-Simple" => $_POST["nuevoSI_MR_Copia_Simple"],
                                //"SI_Modalidad_Respuesta_Consulta-Directa" => $_POST["nuevoSI_MR_Consulta_Directa"],
                                //"SI_Modalidad_Respuesta_Copia-Certificada" => $_POST["nuevoSI_MR_Copia_Certificada"],
                                //"SI_Modalidad_Respuesta_Otro" => $_POST["nuevoSI_MR_Otro"],
                                //"SI_Modalidad_Respuesta_No-Disponible" => $_POST["nuevoSI_MR_No_Disponible"],
                                //"SI_Modalidad_Respuesta_Suma-Total" => $_POST["nuevoSI_MR_Suma_Total"],
                                //"** Obligaciones_Solicitadas **",
                                //"SI_Obligaciones_Solicitadas_Marco-Normativo" => $_POST["nuevoSI_OS_Marco_Normativo"],
                                //"SI_Obligaciones_Solicitadas_Estructura-Organica" => $_POST["nuevoSI_OS_Estructura_Orgánica"],
                                //"SI_Obligaciones_Solicitadas_Funciones-Area" => $_POST["nuevoSI_OS_Funciones_Cada_Area"],
                                //"SI_Obligaciones_Solicitadas_Metas-Objetivos" => $_POST["nuevoSI_OS_Metas_Objetivos"],
                                //"SI_Obligaciones_Solicitadas_Indicadores-Relacionados" => $_POST["nuevoSI_OS_Indicadores_Relacionados"],
                                //"SI_Obligaciones_Solicitadas_Indicadores-Rendir-Cuentas" => $_POST["nuevoSI_OS_Indicadores_Rendir_Cuentas"],
                                //"SI_Obligaciones_Solicitadas_Directorio-Servidor-Publico" => $_POST["nuevoSI_OS_Servidores_Publicos"],
                                //"SI_Obligaciones_Solicitadas_Remuneraciones-Personal" => $_POST["nuevoSI_OS_Remuneraciones_Personal"],
                                //"SI_Obligaciones_Solicitadas_Gasto-Representacion-Viaticos" => $_POST["nuevoSI_OS_Gastos_Representación_Víaticos"],
                                //"SI_Obligaciones_Solicitadas-Plazas-Bases-Confianza-Vacantes" => $_POST["nuevoSI_OS_Plazas_Vacantes"],
                                //"SI_Obligaciones_Solicitadas-Contratacion_Servicios" => $_POST["nuevoSI_OS_Contratacion_Servicios"],
                                //"SI_Obligaciones_Solicitadas-Versiones-Publicas" => $_POST["nuevoSI_OS_Versiones_Públicas"],
                                //"SI_Obligaciones_Solicitadas-Domicilio-Direccion-UT" => $_POST["nuevoSI_OS_Domicilio_Dirección"],
                                //"SI_Obligaciones_Solicitadas-Convocatoria-Concurso-Cargo" => $_POST["nuevoSI_OS_Convocatoria_Concursos"],
                                //"SI_Obligaciones_Solicitadas-Informacion-Programas-Subsidios" => $_POST["nuevoSI_OS_Informacion_Programas"],
                                //"SI_Obligaciones_Solicitadas-Condiciones-Trabajos" => $_POST["nuevoSI_OS_Condiciones_Generales_Trabajo"],
                                //"SI_Obligaciones_Solicitadas-Recursos-Publicos" => $_POST["nuevoSI_OS_Recursos_Publicos_Economicos"],
                                //"SI_Obligaciones_Solicitadas-Informacion-Curricular" => $_POST["nuevoSI_OS_Información_Curricular"],
                                //"SI_Obligaciones_Solicitadas_Servidores-Publicos-Sancionados" => $_POST["nuevoSI_OS_Servidores_Publicos_Sancionados"],
                                //"SI_Obligaciones_Solicitadas_Servicios-Ofrecen" => $_POST["nuevoSI_OS_Servicios_Ofrecen"],
                                //"SI_Obligaciones_Solicitadas_Tramites-Requisitos-Formatos" => $_POST["nuevoSI_OS_Tramites_Requisitos_Formatos"],
                                //"SI_Obligaciones_Solicitadas_Presupuesto-Asignado" => $_POST["nuevoSI_OS_Presupuesto_Asignado"],
                                //"SI_Obligaciones_Solicitadas_Informacion-Relativa" => $_POST["nuevoSI_OS_Informacion_Relativa"],
                                //"SI_Obligaciones_Solicitadas_Montos-Designados" => $_POST["nuevoSI_OS_Montos_Designados"],
                                //"SI_Obligaciones_Solicitadas_Informes-Resultados-Auditorias" => $_POST["nuevoSI_OS_Informes_Resultados_Auditorias"],
                                //"SI_Obligaciones_Solicitadas_Resultados-Dictaminacion" => $_POST["nuevoSI_OS_Resultados_Dictaminación"],
                                //"SI_Obligaciones_Solicitadas_Montos-Criterios-Convocatorias" => $_POST["nuevoSI_OS_Montos_Criterios_Convocatorias"],
                                //"SI_Obligaciones_Solicitadas_Concesiones-Contratos-Convenios" => $_POST["nuevoSI_OS_Concesiones_Contratos_Convenios"],
                                //"SI_Obligaciones_Solicitadas_Resultados-Procesos-Adjudicaciones" => $_POST["nuevoSI_OS_Resultados_Procesos"],
                                //"SI_Obligaciones_Solicitadas_Infomes-Generen-SO" => $_POST["nuevoSI_OS_Informes_Resultados"],
                                //"SI_Obligaciones_Solicitadas_Estadisticas-Generan-Cumplimiento" => $_POST["nuevoSI_OS_Estadisticas_Generen_Cumplimiento"],
                                //"SI_Obligaciones_Solicitadas_Avances-Programaticos" => $_POST["nuevoSI_OS_Avances_Programaticos"],
                                //"SI_Obligaciones_Solicitadas_Padron-Proveedores" => $_POST["nuevoSI_OS_Padrón_Proveedores"],
                                //"SI_Obligaciones_Solicitadas_Convenios-Coordinacion" => $_POST["nuevoSI_OS_Convenios_Coordinación"], 
                                //"SI_Obligaciones_Solicitadas_Inventario-Muebles-Inmuebles" => $_POST["nuevoSI_OS_Inventario_Bienes"],
                                //"SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas" => $_POST["nuevoSI_OS_Recomendaciones_Emitidas"],
                                //"SI_Obligaciones_Solicitadas_Resoluciones-Laudos" => $_POST["nuevoSI_OS_Resoluciones_Laudos"],
                                //"SI_Obligaciones_Solicitadas_Mecanismo_Participacion" => $_POST["nuevoSI_OS_Mecanismos_Participación"],
                                //"SI_Obligaciones_Solicitadas_Programas-Ofrecidos" => $_POST["nuevoSI_OS_Programas_Ofrecidoss"],
                                //"SI_Obligaciones_Solicitadas-Actas-Resoluciones" => $_POST["nuevoSI_OS_Actas_Resoluciones"],
                                //"SI_Obligaciones_Solicitadas_Evaluaciones-Encuestas" => $_POST["nuevoSI_OS_Evaluaciones_Encuentas"],
                                //"SI_Obligaciones_Solicitadas_Estudios-Financiados" => $_POST["nuevoSI_OS_Estudios_Financiados"],
                                //"SI_Obligaciones_Solicitadas_Listado-Jubilados-Pensionados" => $_POST["nuevoSI_OS_Listado_Jubilados"],
                                //"SI_Obligaciones_Solicitadas_Ingreso_Recibido" => $_POST["nuevoSI_OS_Gastos_Ingresos_Recibidos"],
                                //"SI_Obligaciones_Solicitadas_Donaciones-Hechas" => $_POST["nuevoSI_OS_Donaciones_Hechas"],
                                //"SI_Obligaciones_Solicitadas_Catalogos-Disposicion" => $_POST["nuevoSI_OS_Catalogos_Disposicion"],
                                //"SI_Obligaciones_Solicitadas_Actas-Sesiones-Ordinarias" => $_POST["nuevoSI_OS_Actas_Sesiones"],
                                //"SI_Obligaciones_Solicitadas_Listados-Solicitudes-Proveedores" => $_POST["nuevoSI_OS_Listado_Solicitudes"],
                                //"SI_Obligaciones_Solicitadas_Gacetas-Municipales" => $_POST["nuevoSI_OS_Gacetas_Municipales"],
                                //"SI_Obligaciones_Solicitadas_Plan-Desarrollo-Municipal" => $_POST["nuevoSI_OS_Plan_Desarrollo"],
                                //"SI_Obligaciones_Solicitadas-Condiciones-Generales-Trabajo" => $_POST["nuevoSI_OS_Condiciones_Generales_Trabajo"], //--
                                //"SI_Obligaciones_Solicitadas-Recursos-Públicos-Económicos" => $_POST["nuevoSI_OS_Recursos_Publicos_Economicos"], //--
                                //"SI_Obligaciones_Solicitadas-Plan-Desarrollo-Urbano" => $_POST["nuevoSI_OS_Plan_Desarrollo_Urbano"], 
                                //"SI_Obligaciones_Solicitadas-Programa-Ordenamiento" => $_POST["nuevoSI_OS_Programa_Ordenamiento"],
                                //"SI_Obligaciones_Solicitadas_Programa-Uso-Suelo" => $_POST["nuevoSI_OS_Programa_Suelo"],
                                //"SI_Obligaciones_Solicitadas_Tipos_Uso-Suelo" => $_POST["nuevoSI_OS_Tipos_Suelo"],
                                //"SI_Obligaciones_Solicitadas_Licencia_Uso-Suelo" => $_POST["nuevoSI_OS_Licencia_Suelo"],
                                //"SI_Obligaciones_Solicitadas_Licencias-Construccion" => $_POST["nuevoSI_OS_Licencias_Construcción"],
                                //"SI_Obligaciones_Solicitadas_Monto-Designados" => $_POST["nuevoSI_OS_Montos_Designados"], //--  
                                //"SI_Obligaciones_Solicitadas_Actas-Cabildo" => $_POST["nuevoSI_OS_Actas_Cabildos"],
                                //"SI_Obligaciones_Solicitadas_Prosupuesto-Sostenible" => $_POST["nuevoSI_OS_Presupuesto_Sostenible"],
                                //"SI_Obligaciones_Solicitadas_Evaluaciones-LDF" => $_POST["nuevoSI_OS_Evaluaciones_LDF"],
                                //"SI_Obligaciones_Solicitadas_Subsidios" => $_POST["nuevoSI_OS_Subsidios"],
                                //"SI_Obligaciones_Solicitadas_Otros" => $_POST["nuevoSI_OS_Otro"],
                                //"SI_Obligaciones_Solicitadas_No-Disponibles" => $_POST["nuevoSI_OS_No_Disponible"],
                                //"SI_Obligaciones_Solicitadas_Suma-Total" => $_POST["nuevoSI_OS_Suma_Total"],
                                //"** Sentido_Respuesta **",
                                //"SI_Sentido_Respuesta_Informacion" => $_POST["nuevoSI_SR_Informacion_Total"],
                                //"SI_Sentido_Respuesta_Informacion-Parcial" => $_POST["nuevoSI_SR_Informacion_Parcial"],
                                //"SI_Sentido_Respuesta_Negada-Clasificacion" => $_POST["nuevoSI_SR_Negada_Clasificación"],
                                //"SI_Sentido_Respuesta_Inexistencia-Informacion" => $_POST["nuevoSI_SR_Inexistencia_Informacion"],
                                //"SI_Sentido_Respuesta_Mixta" => $_POST["nuevoSI_SR_Mixta"],
                                //"SI_Sentido_Respuesta_No-Aclarada" => $_POST["nuevoSI_SR_No_Aclarada"],
                                //"SI_Sentido_Respuesta_Orientada" => $_POST["nuevoSI_SR_Orientada"],
                                //"SI_Sentido_Respuesta_En-Tramite" => $_POST["nuevoSI_SR_En_Tramite"],
                                //"SI_Sentido_Respuesta_Improcedente" => $_POST["nuevoSI_SR_Improcedente"],
                                //"SI_Sentido_Respuesta_Otro" => $_POST["nuevoSI_SR_Otros"],
                                //"SI_Sentido_Respuesta_No-Disponible" => $_POST["nuevoSI_SR_No_Disponible"],
                                //"SI_Sentido_Respuesta_Suma-Total" => $_POST["nuevoSI_SR_Suma_Total"] 
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

              

            }// if   

          } // Funcion Agregar Soliciud Informacion

    } //ControladorSolicitudesInformes

?>