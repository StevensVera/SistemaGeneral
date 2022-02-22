<?php

    require_once "conexion.php";

     class ModeloSolicitudesInformacion{ 

        static public function mdlSolicitudesInformacion($item, $valor,$tablaSI){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaSI WHERE $item = :$item ORDER BY idSI DESC");

		      	$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		      	$stmt -> execute();

		      	return $stmt -> fetch();

            $stmt -> close();

            $stmt = null;

        } // End Funcion mdlSolicitudesInformacion

      static public function MdlMostrarTablaSI($itemCodigo, $valor, $tabla ){


           $stmt = Conexion::conectar()->prepare("SELECT *
                                                   FROM $tabla 
                                                   WHERE $tabla.$itemCodigo = :$itemCodigo" );

			      $stmt -> bindParam(":".$itemCodigo, $valor, PDO::PARAM_STR);

		      	$stmt -> execute();

		      	return $stmt -> fetchAll();

					/*
		    	$stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                   FROM $tabla 
                                                   INNER JOIN $tablaDSI ON $tablaDSI.idSI = $tabla.idSI 
                                                   INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                   WHERE $tablaU.$item = :$item" );

			      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		      	$stmt -> execute();

		      	return $stmt -> fetchAll();

          */

      } // End Funcion MdlMostrarTablaSI

      /* =========== MOSTRAR DATOS TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

      static public function MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA,$valor, $valor2, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA, $ObtenerEstatusSI, $ObtenerEstatusSA, $ObtenerEstatusCA){

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT *
                                                FROM $tablaSI SI
                                                INNER JOIN $tablaSA SA
                                                ON SI.$ObtenerCodigoInformeSI = SA.$ObtenerCodigoInformeSA
                                                INNER JOIN $TablaCA CA
                                                ON SI.$ObtenerCodigoInformeSI = CA.$ObtenerCodigoInformeCA
                                                WHERE SI.$ObtenerCodigoSI = :$ObtenerCodigoSI AND SI.$ObtenerEstatusSI = :$ObtenerEstatusSI AND SA.$ObtenerCodigoSA = :$ObtenerCodigoSA AND SA.$ObtenerEstatusSA = :$ObtenerEstatusSA AND CA.$ObtenerCodigoCA = :$ObtenerCodigoCA AND CA.$ObtenerEstatusCA = :$ObtenerEstatusCA" );

         $stmt -> bindParam(":".$ObtenerCodigoSI, $valor, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerCodigoSA, $valor, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerCodigoCA, $valor, PDO::PARAM_STR);

         $stmt -> bindParam(":".$ObtenerEstatusSI, $valor2, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerEstatusSA, $valor2, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerEstatusCA, $valor2, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetchAll();

       /*
       $stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                FROM $tabla 
                                                INNER JOIN $tablaDSI ON $tablaDSI.idSI = $tabla.idSI 
                                                INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                WHERE $tablaU.$item = :$item" );

         $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetchAll();

       */

   } // End Funcion MdlMostrarTablaSI

   /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA - TABLA PRINCIPAL ================ */ 

      static public function MdlAgregarSI($tablaSI, $datos){
            
          $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tablaSI
            (
             SI_Estatus,
             Si_Codigo_SO,
             SI_Codigo_UnicoInforme_Anios,
             SI_Codigo_Tipo_Informe_Anios,
             Si_Codigo_Informe_Anios, 
             SI_Nombre_Sujeto_Obligado,
             SI_Informe_Presentado,
             SI_Anios,
             SI_TOTAL_SOLICITUDES,
             SI_Medio_Presentacion_Personal_Escrito,
             SI_Medio_Presentacion_Correo_Electronico,
             SI_Medio_Presentacion_Sistema_Infomex,
             SI_Medio_Presentacion_PNT,
             SI_Medio_Presentacion_No_disponible,
             SI_Medio_Presentacion_Suma_Total,
             SI_Tipo_Solicitud_Persona_Fisica,
             SI_Tipo_Solicitud_Persona_Moral,
             SI_Tipo_Solicitud_No_Disponible,
             SI_Tipo_Solicitud_Suma_Total,
             SI_Genero_Solicitante_Femenino,
             SI_Genero_Solicitante_Masculino,
             SI_Genero_Solicitante_Anonimo,
             SI_Genero_Solicitante_No_Disponible,
             SI_Genero_Solicitante_Suma_Total,
             SI_Informacion_Solicitada_Obligacion_Transparencia,
             SI_Informacion_Solicitada_Reservada,
             SI_Informacion_Solicitada_Confidencial,
             SI_Informacion_Solicitada_Otro,
             SI_Informacion_Solicitada_No_Disponible,
             SI_Informacion_Solicitada_Suma_Total,
             SI_Tramites_Concluidas,
             SI_Tramites_Pendientes,
             SI_Tramites_No_Disponible,
             SI_Tramites_Suma_Total,
             SI_Modalidad_Respuesta_Medios_Electronicos,
             SI_Modalidad_Respuesta_Copia_Simple,
             SI_Modalidad_Respuesta_Consulta_Directa,
             SI_Modalidad_Respuesta_Copia_Certificada,
             SI_Modalidad_Respuesta_Otro,
             SI_Modalidad_Respuesta_No_Disponible,
             SI_Modalidad_Respuesta_Suma_Total,
             SI_Obligaciones_Solicitadas_Marco_Normativo,
             SI_Obligaciones_Solicitadas_Estructura_Organica,
             SI_Obligaciones_Solicitadas_Funciones_Area,
             SI_Obligaciones_Solicitadas_Metas_Objetivos,
             SI_Obligaciones_Solicitadas_Indicadores_Relacionados,
             SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas,
             SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico,
             SI_Obligaciones_Solicitadas_Remuneraciones_Personal,
             SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos,
             SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes,
             SI_Obligaciones_Solicitadas_Contratacion_Servicios,
             SI_Obligaciones_Solicitadas_Versiones_Publicas,
             SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT,
             SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo,
             SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios,
             SI_Obligaciones_Solicitadas_Condiciones_Trabajos,
             SI_Obligaciones_Solicitadas_Recursos_Publicos,
             SI_Obligaciones_Solicitadas_Informacion_Curricular,
             SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados,
             SI_Obligaciones_Solicitadas_Servicios_Ofrecen,
             SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos,
             SI_Obligaciones_Solicitadas_Presupuesto_Asignado,
             SI_Obligaciones_Solicitadas_Informacion_Relativa,
             SI_Obligaciones_Solicitadas_Montos_Designados,
             SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias,
             SI_Obligaciones_Solicitadas_Resultados_Dictaminacion,
             SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias,
             SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios,
             SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones,
             SI_Obligaciones_Solicitadas_Infomes_Generen_SO,
             SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento,
             SI_Obligaciones_Solicitadas_Avances_Programaticos,
             SI_Obligaciones_Solicitadas_Padron_Proveedores,
             SI_Obligaciones_Solicitadas_Convenios_Coordinacion, 
             SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles,
             SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas,
             SI_Obligaciones_Solicitadas_Resoluciones_Laudos,
             SI_Obligaciones_Solicitadas_Programas_Ofrecidos,
             SI_Obligaciones_Solicitadas_Mecanismo_Participacion,
             SI_Obligaciones_Solicitadas_Actas_Resoluciones,
             SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas,
             SI_Obligaciones_Solicitadas_Estudios_Financiados,
             SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados,
             SI_Obligaciones_Solicitadas_Ingreso_Recibido,
             SI_Obligaciones_Solicitadas_Donaciones_Hechas,
             SI_Obligaciones_Solicitadas_Catalogos_Disposicion,
             SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias,
             SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores,
             SI_Obligaciones_Solicitadas_Gacetas_Municipales,
             SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal,
             SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo,
             SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos,
             SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano, 
             SI_Obligaciones_Solicitadas_Programa_Ordenamiento,
             SI_Obligaciones_Solicitadas_Programa_Uso_Suelo,
             SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo,
             SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo,
             SI_Obligaciones_Solicitadas_Licencias_Construccion,
             SI_Obligaciones_Solicitadas_Monto_Designados,  
             SI_Obligaciones_Solicitadas_Actas_Cabildo,
             SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible,
             SI_Obligaciones_Solicitadas_Evaluaciones_LDF,
             SI_Obligaciones_Solicitadas_Subsidios,
             SI_Obligaciones_Solicitadas_Otros,
             SI_Obligaciones_Solicitadas_No_Disponibles,
             SI_Obligaciones_Solicitadas_Suma_Total,
             SI_Sentido_Respuesta_Informacion,
             SI_Sentido_Respuesta_Informacion_Parcial,
             SI_Sentido_Respuesta_Negada_Clasificacion,
             SI_Sentido_Respuesta_Inexistencia_Informacion,
             SI_Sentido_Respuesta_Mixta,
             SI_Sentido_Respuesta_No_Aclarada,
             SI_Sentido_Respuesta_Orientada,
             SI_Sentido_Respuesta_En_Tramite,
             SI_Sentido_Respuesta_Improcedente,
             SI_Sentido_Respuesta_Otro,
             SI_Sentido_Respuesta_No_Disponible,
             SI_Sentido_Respuesta_Suma_Total,
             SI_Archivo

             ) 
             
            VALUES(
             :SI_Estatus, 
             :Si_Codigo_SO,
             :SI_Codigo_UnicoInforme_Anios,
             :SI_Codigo_Tipo_Informe_Anios,
             :Si_Codigo_Informe_Anios, 
             :SI_Nombre_Sujeto_Obligado,
             :SI_Informe_Presentado,
             :SI_Anios,
             :SI_TOTAL_SOLICITUDES,
             :SI_Medio_Presentacion_Personal_Escrito,
             :SI_Medio_Presentacion_Correo_Electronico,
             :SI_Medio_Presentacion_Sistema_Infomex,
             :SI_Medio_Presentacion_PNT,
             :SI_Medio_Presentacion_No_disponible,
             :SI_Medio_Presentacion_Suma_Total,
             :SI_Tipo_Solicitud_Persona_Fisica,
             :SI_Tipo_Solicitud_Persona_Moral,
             :SI_Tipo_Solicitud_No_Disponible,
             :SI_Tipo_Solicitud_Suma_Total,
             :SI_Genero_Solicitante_Femenino,
             :SI_Genero_Solicitante_Masculino,
             :SI_Genero_Solicitante_Anonimo,
             :SI_Genero_Solicitante_No_Disponible,
             :SI_Genero_Solicitante_Suma_Total,
             :SI_Informacion_Solicitada_Obligacion_Transparencia,
             :SI_Informacion_Solicitada_Reservada,
             :SI_Informacion_Solicitada_Confidencial,
             :SI_Informacion_Solicitada_Otro,
             :SI_Informacion_Solicitada_No_Disponible,
             :SI_Informacion_Solicitada_Suma_Total,
             :SI_Tramites_Concluidas,
             :SI_Tramites_Pendientes,
             :SI_Tramites_No_Disponible,
             :SI_Tramites_Suma_Total,
             :SI_Modalidad_Respuesta_Medios_Electronicos,
             :SI_Modalidad_Respuesta_Copia_Simple,
             :SI_Modalidad_Respuesta_Consulta_Directa,
             :SI_Modalidad_Respuesta_Copia_Certificada,
             :SI_Modalidad_Respuesta_Otro,
             :SI_Modalidad_Respuesta_No_Disponible,
             :SI_Modalidad_Respuesta_Suma_Total,
             :SI_Obligaciones_Solicitadas_Marco_Normativo,
             :SI_Obligaciones_Solicitadas_Estructura_Organica,
             :SI_Obligaciones_Solicitadas_Funciones_Area,
             :SI_Obligaciones_Solicitadas_Metas_Objetivos,
             :SI_Obligaciones_Solicitadas_Indicadores_Relacionados,
             :SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas,
             :SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico,
             :SI_Obligaciones_Solicitadas_Remuneraciones_Personal,
             :SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos,
             :SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes,
             :SI_Obligaciones_Solicitadas_Contratacion_Servicios,
             :SI_Obligaciones_Solicitadas_Versiones_Publicas,
             :SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT,
             :SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo,
             :SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios,
             :SI_Obligaciones_Solicitadas_Condiciones_Trabajos,
             :SI_Obligaciones_Solicitadas_Recursos_Publicos,
             :SI_Obligaciones_Solicitadas_Informacion_Curricular,
             :SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados,
             :SI_Obligaciones_Solicitadas_Servicios_Ofrecen,
             :SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos,
             :SI_Obligaciones_Solicitadas_Presupuesto_Asignado,
             :SI_Obligaciones_Solicitadas_Informacion_Relativa,
             :SI_Obligaciones_Solicitadas_Montos_Designados,
             :SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias,
             :SI_Obligaciones_Solicitadas_Resultados_Dictaminacion,
             :SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias,
             :SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios,
             :SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones,
             :SI_Obligaciones_Solicitadas_Infomes_Generen_SO,
             :SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento,
             :SI_Obligaciones_Solicitadas_Avances_Programaticos,
             :SI_Obligaciones_Solicitadas_Padron_Proveedores,
             :SI_Obligaciones_Solicitadas_Convenios_Coordinacion, 
             :SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles,
             :SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas,
             :SI_Obligaciones_Solicitadas_Resoluciones_Laudos,
             :SI_Obligaciones_Solicitadas_Programas_Ofrecidos,
             :SI_Obligaciones_Solicitadas_Mecanismo_Participacion,
             :SI_Obligaciones_Solicitadas_Actas_Resoluciones,
             :SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas,
             :SI_Obligaciones_Solicitadas_Estudios_Financiados,
             :SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados,
             :SI_Obligaciones_Solicitadas_Ingreso_Recibido,
             :SI_Obligaciones_Solicitadas_Donaciones_Hechas,
             :SI_Obligaciones_Solicitadas_Catalogos_Disposicion,
             :SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias,
             :SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores,
             :SI_Obligaciones_Solicitadas_Gacetas_Municipales,
             :SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal,
             :SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo,
             :SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos,
             :SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano, 
             :SI_Obligaciones_Solicitadas_Programa_Ordenamiento,
             :SI_Obligaciones_Solicitadas_Programa_Uso_Suelo,
             :SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo,
             :SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo,
             :SI_Obligaciones_Solicitadas_Licencias_Construccion,
             :SI_Obligaciones_Solicitadas_Monto_Designados,  
             :SI_Obligaciones_Solicitadas_Actas_Cabildo,
             :SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible,
             :SI_Obligaciones_Solicitadas_Evaluaciones_LDF,
             :SI_Obligaciones_Solicitadas_Subsidios,
             :SI_Obligaciones_Solicitadas_Otros,
             :SI_Obligaciones_Solicitadas_No_Disponibles,
             :SI_Obligaciones_Solicitadas_Suma_Total,
             :SI_Sentido_Respuesta_Informacion,
             :SI_Sentido_Respuesta_Informacion_Parcial,
             :SI_Sentido_Respuesta_Negada_Clasificacion,
             :SI_Sentido_Respuesta_Inexistencia_Informacion,
             :SI_Sentido_Respuesta_Mixta,
             :SI_Sentido_Respuesta_No_Aclarada,
             :SI_Sentido_Respuesta_Orientada,
             :SI_Sentido_Respuesta_En_Tramite,
             :SI_Sentido_Respuesta_Improcedente,
             :SI_Sentido_Respuesta_Otro,
             :SI_Sentido_Respuesta_No_Disponible,
             :SI_Sentido_Respuesta_Suma_Total,
             :SI_Archivo
            

             )");
          $stmt -> bindParam(":SI_Estatus", $datos["SI_Estatus"], PDO::PARAM_STR);
          $stmt -> bindParam(":Si_Codigo_SO", $datos["Si_Codigo_SO"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Codigo_UnicoInforme_Anios", $datos["SI_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Codigo_Tipo_Informe_Anios", $datos["SI_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":Si_Codigo_Informe_Anios", $datos["Si_Codigo_Informe_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Nombre_Sujeto_Obligado", $datos["SI_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informe_Presentado", $datos["SI_Informe_Presentado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Anios", $datos["SI_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_TOTAL_SOLICITUDES", $datos["SI_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
          // Medio de Presentación --
          $stmt -> bindParam(":SI_Medio_Presentacion_Personal_Escrito", $datos["SI_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_Correo_Electronico", $datos["SI_Medio_Presentacion_Correo_Electronico"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_Sistema_Infomex", $datos["SI_Medio_Presentacion_Sistema_Infomex"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_PNT", $datos["SI_Medio_Presentacion_PNT"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_No_disponible", $datos["SI_Medio_Presentacion_No_disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_Suma_Total", $datos["SI_Medio_Presentacion_Suma_Total"], PDO::PARAM_STR);
          // Tipo_Solicitud --
          $stmt -> bindParam(":SI_Tipo_Solicitud_Persona_Fisica", $datos["SI_Tipo_Solicitud_Persona_Fisica"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tipo_Solicitud_Persona_Moral", $datos["SI_Tipo_Solicitud_Persona_Moral"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tipo_Solicitud_No_Disponible", $datos["SI_Tipo_Solicitud_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tipo_Solicitud_Suma_Total", $datos["SI_Tipo_Solicitud_Suma_Total"], PDO::PARAM_STR);
          // Genero_Solicitante
          $stmt -> bindParam(":SI_Genero_Solicitante_Femenino", $datos["SI_Genero_Solicitante_Femenino"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_Masculino", $datos["SI_Genero_Solicitante_Masculino"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_Anonimo", $datos["SI_Genero_Solicitante_Anonimo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_No_Disponible", $datos["SI_Genero_Solicitante_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_Suma_Total", $datos["SI_Genero_Solicitante_Suma_Total"], PDO::PARAM_STR);
          // Informacion_Solicitada
          $stmt -> bindParam(":SI_Informacion_Solicitada_Obligacion_Transparencia", $datos["SI_Informacion_Solicitada_Obligacion_Transparencia"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Reservada", $datos["SI_Informacion_Solicitada_Reservada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Confidencial", $datos["SI_Informacion_Solicitada_Confidencial"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Otro", $datos["SI_Informacion_Solicitada_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_No_Disponible", $datos["SI_Informacion_Solicitada_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Suma_Total", $datos["SI_Informacion_Solicitada_Suma_Total"], PDO::PARAM_STR);
          // Tramites
          $stmt -> bindParam(":SI_Tramites_Concluidas", $datos["SI_Tramites_Concluidas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tramites_Pendientes", $datos["SI_Tramites_Pendientes"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tramites_No_Disponible", $datos["SI_Tramites_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tramites_Suma_Total", $datos["SI_Tramites_Suma_Total"], PDO::PARAM_STR);
          // Modalidad_Respuesta
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Medios_Electronicos", $datos["SI_Modalidad_Respuesta_Medios_Electronicos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Copia_Simple", $datos["SI_Modalidad_Respuesta_Copia_Simple"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Consulta_Directa", $datos["SI_Modalidad_Respuesta_Consulta_Directa"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Copia_Certificada", $datos["SI_Modalidad_Respuesta_Copia_Certificada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Otro", $datos["SI_Modalidad_Respuesta_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_No_Disponible", $datos["SI_Modalidad_Respuesta_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Suma_Total", $datos["SI_Modalidad_Respuesta_Suma_Total"], PDO::PARAM_STR);
          // Obligaciones_Solicitadas
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Marco_Normativo", $datos["SI_Obligaciones_Solicitadas_Marco_Normativo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estructura_Organica", $datos["SI_Obligaciones_Solicitadas_Estructura_Organica"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Funciones_Area", $datos["SI_Obligaciones_Solicitadas_Funciones_Area"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Metas_Objetivos", $datos["SI_Obligaciones_Solicitadas_Metas_Objetivos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Indicadores_Relacionados", $datos["SI_Obligaciones_Solicitadas_Indicadores_Relacionados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas", $datos["SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico", $datos["SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Remuneraciones_Personal", $datos["SI_Obligaciones_Solicitadas_Remuneraciones_Personal"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos", $datos["SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes", $datos["SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Contratacion_Servicios", $datos["SI_Obligaciones_Solicitadas_Contratacion_Servicios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Versiones_Publicas", $datos["SI_Obligaciones_Solicitadas_Versiones_Publicas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT", $datos["SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo", $datos["SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios", $datos["SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Condiciones_Trabajos", $datos["SI_Obligaciones_Solicitadas_Condiciones_Trabajos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recursos_Publicos", $datos["SI_Obligaciones_Solicitadas_Recursos_Publicos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion_Curricular", $datos["SI_Obligaciones_Solicitadas_Informacion_Curricular"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados", $datos["SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Servicios_Ofrecen", $datos["SI_Obligaciones_Solicitadas_Servicios_Ofrecen"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos", $datos["SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Presupuesto_Asignado", $datos["SI_Obligaciones_Solicitadas_Presupuesto_Asignado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion_Relativa", $datos["SI_Obligaciones_Solicitadas_Informacion_Relativa"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Montos_Designados", $datos["SI_Obligaciones_Solicitadas_Montos_Designados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias", $datos["SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resultados_Dictaminacion", $datos["SI_Obligaciones_Solicitadas_Resultados_Dictaminacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias", $datos["SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios", $datos["SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones", $datos["SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Infomes_Generen_SO", $datos["SI_Obligaciones_Solicitadas_Infomes_Generen_SO"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento", $datos["SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Avances_Programaticos", $datos["SI_Obligaciones_Solicitadas_Avances_Programaticos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Padron_Proveedores", $datos["SI_Obligaciones_Solicitadas_Padron_Proveedores"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Convenios_Coordinacion", $datos["SI_Obligaciones_Solicitadas_Convenios_Coordinacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles", $datos["SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas", $datos["SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resoluciones_Laudos", $datos["SI_Obligaciones_Solicitadas_Resoluciones_Laudos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programas_Ofrecidos", $datos["SI_Obligaciones_Solicitadas_Programas_Ofrecidos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Mecanismo_Participacion", $datos["SI_Obligaciones_Solicitadas_Mecanismo_Participacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas_Resoluciones", $datos["SI_Obligaciones_Solicitadas_Actas_Resoluciones"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas", $datos["SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estudios_Financiados", $datos["SI_Obligaciones_Solicitadas_Estudios_Financiados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados", $datos["SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Ingreso_Recibido", $datos["SI_Obligaciones_Solicitadas_Ingreso_Recibido"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Donaciones_Hechas", $datos["SI_Obligaciones_Solicitadas_Donaciones_Hechas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Catalogos_Disposicion", $datos["SI_Obligaciones_Solicitadas_Catalogos_Disposicion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias", $datos["SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores", $datos["SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Gacetas_Municipales", $datos["SI_Obligaciones_Solicitadas_Gacetas_Municipales"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal", $datos["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo", $datos["SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos", $datos["SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano", $datos["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programa_Ordenamiento", $datos["SI_Obligaciones_Solicitadas_Programa_Ordenamiento"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programa_Uso_Suelo", $datos["SI_Obligaciones_Solicitadas_Programa_Uso_Suelo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo", $datos["SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo", $datos["SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Licencias_Construccion", $datos["SI_Obligaciones_Solicitadas_Licencias_Construccion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Monto_Designados", $datos["SI_Obligaciones_Solicitadas_Monto_Designados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas_Cabildo", $datos["SI_Obligaciones_Solicitadas_Actas_Cabildo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible", $datos["SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Evaluaciones_LDF", $datos["SI_Obligaciones_Solicitadas_Evaluaciones_LDF"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Subsidios", $datos["SI_Obligaciones_Solicitadas_Subsidios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Otros", $datos["SI_Obligaciones_Solicitadas_Otros"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_No_Disponibles", $datos["SI_Obligaciones_Solicitadas_No_Disponibles"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Suma_Total", $datos["SI_Obligaciones_Solicitadas_Suma_Total"], PDO::PARAM_STR);
          // Sentido_Respuesta
          $stmt -> bindParam(":SI_Sentido_Respuesta_Informacion", $datos["SI_Sentido_Respuesta_Informacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Informacion_Parcial", $datos["SI_Sentido_Respuesta_Informacion_Parcial"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Negada_Clasificacion", $datos["SI_Sentido_Respuesta_Negada_Clasificacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Inexistencia_Informacion", $datos["SI_Sentido_Respuesta_Inexistencia_Informacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Mixta", $datos["SI_Sentido_Respuesta_Mixta"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_No_Aclarada", $datos["SI_Sentido_Respuesta_No_Aclarada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Orientada", $datos["SI_Sentido_Respuesta_Orientada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_En_Tramite", $datos["SI_Sentido_Respuesta_En_Tramite"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Improcedente", $datos["SI_Sentido_Respuesta_Improcedente"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Otro", $datos["SI_Sentido_Respuesta_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_No_Disponible", $datos["SI_Sentido_Respuesta_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Suma_Total", $datos["SI_Sentido_Respuesta_Suma_Total"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Archivo", $datos["SI_Archivo"], PDO::PARAM_STR);

          if ($stmt -> execute()) {
	 
            return "ok";
    
          }else {
    
            return "error";

          } // else

          $stmt->close();
          $stmt = null;

        } // End Funcion MdlAgregarSI


      /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA - TABLA SECUNDARIA R ================ */ 

      static public function MdlAgregarSI_r($tablaSI_r, $datos){
            
        try{  

          $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tablaSI_r
                (
                SI_Estatus,
                Si_Codigo_SO,
                SI_Codigo_UnicoInforme_Anios,
                SI_Codigo_Tipo_Informe_Anios,
                Si_Codigo_Informe_Anios, 
                SI_Nombre_Sujeto_Obligado,
                SI_Informe_Presentado,
                SI_Anios,
                SI_TOTAL_SOLICITUDES

                ) 
                
                VALUES(
                :SI_Estatus, 
                :Si_Codigo_SO,
                :SI_Codigo_UnicoInforme_Anios,
                :SI_Codigo_Tipo_Informe_Anios,
                :Si_Codigo_Informe_Anios, 
                :SI_Nombre_Sujeto_Obligado,
                :SI_Informe_Presentado,
                :SI_Anios,
                :SI_TOTAL_SOLICITUDES
                

                )");
              $stmt -> bindParam(":SI_Estatus", $datos["SI_Estatus"], PDO::PARAM_STR);
              $stmt -> bindParam(":Si_Codigo_SO", $datos["Si_Codigo_SO"], PDO::PARAM_STR);
              $stmt -> bindParam(":SI_Codigo_UnicoInforme_Anios", $datos["SI_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
              $stmt -> bindParam(":SI_Codigo_Tipo_Informe_Anios", $datos["SI_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
              $stmt -> bindParam(":Si_Codigo_Informe_Anios", $datos["Si_Codigo_Informe_Anios"], PDO::PARAM_STR);
              $stmt -> bindParam(":SI_Nombre_Sujeto_Obligado", $datos["SI_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
              $stmt -> bindParam(":SI_Informe_Presentado", $datos["SI_Informe_Presentado"], PDO::PARAM_STR);
              $stmt -> bindParam(":SI_Anios", $datos["SI_Anios"], PDO::PARAM_STR);
              $stmt -> bindParam(":SI_TOTAL_SOLICITUDES", $datos["SI_TOTAL_SOLICITUDES"], PDO::PARAM_STR);

              if ($stmt -> execute()) {
      
                return "ok";
        
              }else {
        
                return "error";

              } // else

              $stmt->close();
              $stmt = null;

        } catch(PDOException $e) {
                    
            echo '<script>

                swal({
                  title: "ERROR, AL INSERTAR.",
                  text: "¡LA SOLICITUD DE INFORMACIÓN QUE DESEA INSERTAR, YA EXISTE EN EL SISTEMA. VERIFIQUÉ SUS DATOS NUEVAMENTE!",
                  type: "error",
                  confirmButtonText: "¡Cerrar!"
                }).then(function(result){

                   if(result.value){
                      
                      window.location = "solicitudes-informacion";

                    }

                });

                </script>';
          
        }           

      } // End Funcion MdlAgregarSI


    /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - MOSTRAR DATOS - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */   //
    
    static public function mdlMostrarRegistroEditarSI($tabla,$item,$valor){
	
      if($item != null){
    
          $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
          $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
          $stmt -> execute();
    
          return $stmt -> fetch();
    
        }else{
    
          $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    
          $stmt -> execute();
    
          return $stmt -> fetchAll();
    
        }
    
        $stmt -> close();
    
        $stmt = null;
    
    } // Funcion para mostrar los datos a editar.


    /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */   //

    static public function mdlEditarSolicitudInformacion($tabla,$datos){

      $stmt = Conexion::conectar()->prepare(
        "UPDATE $tabla SET 
         SI_Informe_Presentado = :SI_Informe_Presentado, 
         SI_Anios = :SI_Anios,
         SI_TOTAL_SOLICITUDES = :SI_TOTAL_SOLICITUDES,

         SI_Medio_Presentacion_Personal_Escrito = :SI_Medio_Presentacion_Personal_Escrito,
         SI_Medio_Presentacion_Correo_Electronico = :SI_Medio_Presentacion_Correo_Electronico,
         SI_Medio_Presentacion_Sistema_Infomex = :SI_Medio_Presentacion_Sistema_Infomex,
         SI_Medio_Presentacion_PNT = :SI_Medio_Presentacion_PNT,
         SI_Medio_Presentacion_No_disponible = :SI_Medio_Presentacion_No_disponible,
         SI_Medio_Presentacion_Suma_Total = :SI_Medio_Presentacion_Suma_Total,

         SI_Tipo_Solicitud_Persona_Fisica = :SI_Tipo_Solicitud_Persona_Fisica,
         SI_Tipo_Solicitud_Persona_Moral = :SI_Tipo_Solicitud_Persona_Moral,
         SI_Tipo_Solicitud_No_Disponible = :SI_Tipo_Solicitud_No_Disponible,
         SI_Tipo_Solicitud_Suma_Total = :SI_Tipo_Solicitud_Suma_Total,

         SI_Genero_Solicitante_Femenino = :SI_Genero_Solicitante_Femenino,
         SI_Genero_Solicitante_Masculino = :SI_Genero_Solicitante_Masculino,
         SI_Genero_Solicitante_Anonimo = :SI_Genero_Solicitante_Anonimo,
         SI_Genero_Solicitante_No_Disponible = :SI_Genero_Solicitante_No_Disponible,
         SI_Genero_Solicitante_Suma_Total = :SI_Genero_Solicitante_Suma_Total,

         SI_Informacion_Solicitada_Obligacion_Transparencia = :SI_Informacion_Solicitada_Obligacion_Transparencia,
         SI_Informacion_Solicitada_Reservada = :SI_Informacion_Solicitada_Reservada,
         SI_Informacion_Solicitada_Confidencial = :SI_Informacion_Solicitada_Confidencial,
         SI_Informacion_Solicitada_Otro = :SI_Informacion_Solicitada_Otro,
         SI_Informacion_Solicitada_No_Disponible = :SI_Informacion_Solicitada_No_Disponible,
         SI_Informacion_Solicitada_Suma_Total = :SI_Informacion_Solicitada_Suma_Total,

         SI_Tramites_Concluidas = :SI_Tramites_Concluidas,
         SI_Tramites_Pendientes = :SI_Tramites_Pendientes,
         SI_Tramites_No_Disponible = :SI_Tramites_No_Disponible,
         SI_Tramites_Suma_Total = :SI_Tramites_Suma_Total,

         SI_Modalidad_Respuesta_Medios_Electronicos = :SI_Modalidad_Respuesta_Medios_Electronicos,
         SI_Modalidad_Respuesta_Copia_Simple = :SI_Modalidad_Respuesta_Copia_Simple,
         SI_Modalidad_Respuesta_Consulta_Directa = :SI_Modalidad_Respuesta_Consulta_Directa,
         SI_Modalidad_Respuesta_Copia_Certificada = :SI_Modalidad_Respuesta_Copia_Certificada,
         SI_Modalidad_Respuesta_Otro = :SI_Modalidad_Respuesta_Otro,
         SI_Modalidad_Respuesta_No_Disponible = :SI_Modalidad_Respuesta_No_Disponible,
         SI_Modalidad_Respuesta_Suma_Total = :SI_Modalidad_Respuesta_Suma_Total,

         SI_Obligaciones_Solicitadas_Marco_Normativo = :SI_Obligaciones_Solicitadas_Marco_Normativo,
         SI_Obligaciones_Solicitadas_Estructura_Organica = :SI_Obligaciones_Solicitadas_Estructura_Organica,
         SI_Obligaciones_Solicitadas_Funciones_Area = :SI_Obligaciones_Solicitadas_Funciones_Area,
         SI_Obligaciones_Solicitadas_Metas_Objetivos = :SI_Obligaciones_Solicitadas_Metas_Objetivos,
         SI_Obligaciones_Solicitadas_Indicadores_Relacionados = :SI_Obligaciones_Solicitadas_Indicadores_Relacionados,
         SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas = :SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas,
         SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico = :SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico,
         SI_Obligaciones_Solicitadas_Remuneraciones_Personal = :SI_Obligaciones_Solicitadas_Remuneraciones_Personal,
         SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos = :SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos,
         SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes = :SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes,
         SI_Obligaciones_Solicitadas_Contratacion_Servicios = :SI_Obligaciones_Solicitadas_Contratacion_Servicios,
         SI_Obligaciones_Solicitadas_Versiones_Publicas = :SI_Obligaciones_Solicitadas_Versiones_Publicas,
         SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT = :SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT,
         SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo = :SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo,
         SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios = :SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios,
         SI_Obligaciones_Solicitadas_Condiciones_Trabajos = :SI_Obligaciones_Solicitadas_Condiciones_Trabajos,
         SI_Obligaciones_Solicitadas_Recursos_Publicos = :SI_Obligaciones_Solicitadas_Recursos_Publicos,
         SI_Obligaciones_Solicitadas_Informacion_Curricular = :SI_Obligaciones_Solicitadas_Informacion_Curricular,
         SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados = :SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados,
         SI_Obligaciones_Solicitadas_Servicios_Ofrecen = :SI_Obligaciones_Solicitadas_Servicios_Ofrecen,
         SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos = :SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos,
         SI_Obligaciones_Solicitadas_Presupuesto_Asignado = :SI_Obligaciones_Solicitadas_Presupuesto_Asignado,
         SI_Obligaciones_Solicitadas_Informacion_Relativa = :SI_Obligaciones_Solicitadas_Informacion_Relativa,
         SI_Obligaciones_Solicitadas_Montos_Designados = :SI_Obligaciones_Solicitadas_Montos_Designados,
         SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias = :SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias,
         SI_Obligaciones_Solicitadas_Resultados_Dictaminacion = :SI_Obligaciones_Solicitadas_Resultados_Dictaminacion,
         SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias = :SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias,
         SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios = :SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios,
         SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones = :SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones,
         SI_Obligaciones_Solicitadas_Infomes_Generen_SO = :SI_Obligaciones_Solicitadas_Infomes_Generen_SO,
         SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento = :SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento,
         SI_Obligaciones_Solicitadas_Avances_Programaticos = :SI_Obligaciones_Solicitadas_Avances_Programaticos,
         SI_Obligaciones_Solicitadas_Padron_Proveedores = :SI_Obligaciones_Solicitadas_Padron_Proveedores,
         SI_Obligaciones_Solicitadas_Convenios_Coordinacion = :SI_Obligaciones_Solicitadas_Convenios_Coordinacion,
         SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles = :SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles,
         SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas = :SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas,
         SI_Obligaciones_Solicitadas_Resoluciones_Laudos = :SI_Obligaciones_Solicitadas_Resoluciones_Laudos,
         SI_Obligaciones_Solicitadas_Programas_Ofrecidos = :SI_Obligaciones_Solicitadas_Programas_Ofrecidos,
         SI_Obligaciones_Solicitadas_Mecanismo_Participacion = :SI_Obligaciones_Solicitadas_Mecanismo_Participacion,
         SI_Obligaciones_Solicitadas_Actas_Resoluciones = :SI_Obligaciones_Solicitadas_Actas_Resoluciones,
         SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas = :SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas,
         SI_Obligaciones_Solicitadas_Estudios_Financiados = :SI_Obligaciones_Solicitadas_Estudios_Financiados,
         SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados = :SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados,
         SI_Obligaciones_Solicitadas_Ingreso_Recibido = :SI_Obligaciones_Solicitadas_Ingreso_Recibido,
         SI_Obligaciones_Solicitadas_Donaciones_Hechas = :SI_Obligaciones_Solicitadas_Donaciones_Hechas,
         SI_Obligaciones_Solicitadas_Catalogos_Disposicion = :SI_Obligaciones_Solicitadas_Catalogos_Disposicion,
         SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias = :SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias,
         SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores = :SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores,
         SI_Obligaciones_Solicitadas_Gacetas_Municipales = :SI_Obligaciones_Solicitadas_Gacetas_Municipales,
         SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal = :SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal,
         SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo = :SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo,
         SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos = :SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos,
         SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano = :SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano,
         SI_Obligaciones_Solicitadas_Programa_Ordenamiento = :SI_Obligaciones_Solicitadas_Programa_Ordenamiento,
         SI_Obligaciones_Solicitadas_Programa_Uso_Suelo = :SI_Obligaciones_Solicitadas_Programa_Uso_Suelo,
         SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo = :SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo,
         SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo = :SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo,
         SI_Obligaciones_Solicitadas_Licencias_Construccion = :SI_Obligaciones_Solicitadas_Licencias_Construccion,
         SI_Obligaciones_Solicitadas_Monto_Designados = :SI_Obligaciones_Solicitadas_Monto_Designados,
         SI_Obligaciones_Solicitadas_Actas_Cabildo = :SI_Obligaciones_Solicitadas_Actas_Cabildo,
         SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible = :SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible,
         SI_Obligaciones_Solicitadas_Evaluaciones_LDF = :SI_Obligaciones_Solicitadas_Evaluaciones_LDF,
         SI_Obligaciones_Solicitadas_Subsidios = :SI_Obligaciones_Solicitadas_Subsidios,
         SI_Obligaciones_Solicitadas_Otros = :SI_Obligaciones_Solicitadas_Otros,
         SI_Obligaciones_Solicitadas_No_Disponibles = :SI_Obligaciones_Solicitadas_No_Disponibles,
         SI_Obligaciones_Solicitadas_Suma_Total = :SI_Obligaciones_Solicitadas_Suma_Total,

         SI_Sentido_Respuesta_Informacion = :SI_Sentido_Respuesta_Informacion,
         SI_Sentido_Respuesta_Informacion_Parcial = :SI_Sentido_Respuesta_Informacion_Parcial,
         SI_Sentido_Respuesta_Negada_Clasificacion = :SI_Sentido_Respuesta_Negada_Clasificacion,
         SI_Sentido_Respuesta_Inexistencia_Informacion = :SI_Sentido_Respuesta_Inexistencia_Informacion,
         SI_Sentido_Respuesta_Mixta = :SI_Sentido_Respuesta_Mixta,
         SI_Sentido_Respuesta_No_Aclarada = :SI_Sentido_Respuesta_No_Aclarada,
         SI_Sentido_Respuesta_Orientada = :SI_Sentido_Respuesta_Orientada,
         SI_Sentido_Respuesta_En_Tramite = :SI_Sentido_Respuesta_En_Tramite,
         SI_Sentido_Respuesta_Improcedente = :SI_Sentido_Respuesta_Improcedente,
         SI_Sentido_Respuesta_Otro = :SI_Sentido_Respuesta_Otro,
         SI_Sentido_Respuesta_No_Disponible = :SI_Sentido_Respuesta_No_Disponible,
         SI_Sentido_Respuesta_Suma_Total = :SI_Sentido_Respuesta_Suma_Total,
         SI_Archivo = :SI_Archivo
         WHERE SI_Informe_Presentado = :SI_Informe_Presentado");


          $stmt -> bindParam(":SI_Informe_Presentado", $datos["SI_Informe_Presentado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Anios", $datos["SI_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_TOTAL_SOLICITUDES", $datos["SI_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
          // Medio de Presentación --
          $stmt -> bindParam(":SI_Medio_Presentacion_Personal_Escrito", $datos["SI_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_Correo_Electronico", $datos["SI_Medio_Presentacion_Correo_Electronico"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_Sistema_Infomex", $datos["SI_Medio_Presentacion_Sistema_Infomex"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_PNT", $datos["SI_Medio_Presentacion_PNT"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_No_disponible", $datos["SI_Medio_Presentacion_No_disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Medio_Presentacion_Suma_Total", $datos["SI_Medio_Presentacion_Suma_Total"], PDO::PARAM_STR);
          // Tipo_Solicitud --
          $stmt -> bindParam(":SI_Tipo_Solicitud_Persona_Fisica", $datos["SI_Tipo_Solicitud_Persona_Fisica"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tipo_Solicitud_Persona_Moral", $datos["SI_Tipo_Solicitud_Persona_Moral"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tipo_Solicitud_No_Disponible", $datos["SI_Tipo_Solicitud_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tipo_Solicitud_Suma_Total", $datos["SI_Tipo_Solicitud_Suma_Total"], PDO::PARAM_STR);
          // Genero_Solicitante
          $stmt -> bindParam(":SI_Genero_Solicitante_Femenino", $datos["SI_Genero_Solicitante_Femenino"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_Masculino", $datos["SI_Genero_Solicitante_Masculino"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_Anonimo", $datos["SI_Genero_Solicitante_Anonimo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_No_Disponible", $datos["SI_Genero_Solicitante_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Genero_Solicitante_Suma_Total", $datos["SI_Genero_Solicitante_Suma_Total"], PDO::PARAM_STR);
          // Informacion_Solicitada
          $stmt -> bindParam(":SI_Informacion_Solicitada_Obligacion_Transparencia", $datos["SI_Informacion_Solicitada_Obligacion_Transparencia"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Reservada", $datos["SI_Informacion_Solicitada_Reservada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Confidencial", $datos["SI_Informacion_Solicitada_Confidencial"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Otro", $datos["SI_Informacion_Solicitada_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_No_Disponible", $datos["SI_Informacion_Solicitada_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informacion_Solicitada_Suma_Total", $datos["SI_Informacion_Solicitada_Suma_Total"], PDO::PARAM_STR);
          // Tramites
          $stmt -> bindParam(":SI_Tramites_Concluidas", $datos["SI_Tramites_Concluidas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tramites_Pendientes", $datos["SI_Tramites_Pendientes"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tramites_No_Disponible", $datos["SI_Tramites_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Tramites_Suma_Total", $datos["SI_Tramites_Suma_Total"], PDO::PARAM_STR);
          // Modalidad_Respuesta
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Medios_Electronicos", $datos["SI_Modalidad_Respuesta_Medios_Electronicos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Copia_Simple", $datos["SI_Modalidad_Respuesta_Copia_Simple"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Consulta_Directa", $datos["SI_Modalidad_Respuesta_Consulta_Directa"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Copia_Certificada", $datos["SI_Modalidad_Respuesta_Copia_Certificada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Otro", $datos["SI_Modalidad_Respuesta_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_No_Disponible", $datos["SI_Modalidad_Respuesta_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Suma_Total", $datos["SI_Modalidad_Respuesta_Suma_Total"], PDO::PARAM_STR);
          // Obligaciones_Solicitadas
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Marco_Normativo", $datos["SI_Obligaciones_Solicitadas_Marco_Normativo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estructura_Organica", $datos["SI_Obligaciones_Solicitadas_Estructura_Organica"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Funciones_Area", $datos["SI_Obligaciones_Solicitadas_Funciones_Area"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Metas_Objetivos", $datos["SI_Obligaciones_Solicitadas_Metas_Objetivos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Indicadores_Relacionados", $datos["SI_Obligaciones_Solicitadas_Indicadores_Relacionados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas", $datos["SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico", $datos["SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Remuneraciones_Personal", $datos["SI_Obligaciones_Solicitadas_Remuneraciones_Personal"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos", $datos["SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes", $datos["SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Contratacion_Servicios", $datos["SI_Obligaciones_Solicitadas_Contratacion_Servicios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Versiones_Publicas", $datos["SI_Obligaciones_Solicitadas_Versiones_Publicas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT", $datos["SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo", $datos["SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios", $datos["SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Condiciones_Trabajos", $datos["SI_Obligaciones_Solicitadas_Condiciones_Trabajos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recursos_Publicos", $datos["SI_Obligaciones_Solicitadas_Recursos_Publicos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion_Curricular", $datos["SI_Obligaciones_Solicitadas_Informacion_Curricular"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados", $datos["SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Servicios_Ofrecen", $datos["SI_Obligaciones_Solicitadas_Servicios_Ofrecen"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos", $datos["SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Presupuesto_Asignado", $datos["SI_Obligaciones_Solicitadas_Presupuesto_Asignado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion_Relativa", $datos["SI_Obligaciones_Solicitadas_Informacion_Relativa"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Montos_Designados", $datos["SI_Obligaciones_Solicitadas_Montos_Designados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias", $datos["SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resultados_Dictaminacion", $datos["SI_Obligaciones_Solicitadas_Resultados_Dictaminacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias", $datos["SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios", $datos["SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones", $datos["SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Infomes_Generen_SO", $datos["SI_Obligaciones_Solicitadas_Infomes_Generen_SO"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento", $datos["SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Avances_Programaticos", $datos["SI_Obligaciones_Solicitadas_Avances_Programaticos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Padron_Proveedores", $datos["SI_Obligaciones_Solicitadas_Padron_Proveedores"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Convenios_Coordinacion", $datos["SI_Obligaciones_Solicitadas_Convenios_Coordinacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles", $datos["SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas", $datos["SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resoluciones_Laudos", $datos["SI_Obligaciones_Solicitadas_Resoluciones_Laudos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programas_Ofrecidos", $datos["SI_Obligaciones_Solicitadas_Programas_Ofrecidos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Mecanismo_Participacion", $datos["SI_Obligaciones_Solicitadas_Mecanismo_Participacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas_Resoluciones", $datos["SI_Obligaciones_Solicitadas_Actas_Resoluciones"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas", $datos["SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estudios_Financiados", $datos["SI_Obligaciones_Solicitadas_Estudios_Financiados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados", $datos["SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Ingreso_Recibido", $datos["SI_Obligaciones_Solicitadas_Ingreso_Recibido"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Donaciones_Hechas", $datos["SI_Obligaciones_Solicitadas_Donaciones_Hechas"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Catalogos_Disposicion", $datos["SI_Obligaciones_Solicitadas_Catalogos_Disposicion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias", $datos["SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores", $datos["SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Gacetas_Municipales", $datos["SI_Obligaciones_Solicitadas_Gacetas_Municipales"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal", $datos["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo", $datos["SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos", $datos["SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano", $datos["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programa_Ordenamiento", $datos["SI_Obligaciones_Solicitadas_Programa_Ordenamiento"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programa_Uso_Suelo", $datos["SI_Obligaciones_Solicitadas_Programa_Uso_Suelo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo", $datos["SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo", $datos["SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Licencias_Construccion", $datos["SI_Obligaciones_Solicitadas_Licencias_Construccion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Monto_Designados", $datos["SI_Obligaciones_Solicitadas_Monto_Designados"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas_Cabildo", $datos["SI_Obligaciones_Solicitadas_Actas_Cabildo"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible", $datos["SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Evaluaciones_LDF", $datos["SI_Obligaciones_Solicitadas_Evaluaciones_LDF"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Subsidios", $datos["SI_Obligaciones_Solicitadas_Subsidios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Otros", $datos["SI_Obligaciones_Solicitadas_Otros"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_No_Disponibles", $datos["SI_Obligaciones_Solicitadas_No_Disponibles"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Obligaciones_Solicitadas_Suma_Total", $datos["SI_Obligaciones_Solicitadas_Suma_Total"], PDO::PARAM_STR);
          // Sentido_Respuesta
          $stmt -> bindParam(":SI_Sentido_Respuesta_Informacion", $datos["SI_Sentido_Respuesta_Informacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Informacion_Parcial", $datos["SI_Sentido_Respuesta_Informacion_Parcial"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Negada_Clasificacion", $datos["SI_Sentido_Respuesta_Negada_Clasificacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Inexistencia_Informacion", $datos["SI_Sentido_Respuesta_Inexistencia_Informacion"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Mixta", $datos["SI_Sentido_Respuesta_Mixta"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_No_Aclarada", $datos["SI_Sentido_Respuesta_No_Aclarada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Orientada", $datos["SI_Sentido_Respuesta_Orientada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_En_Tramite", $datos["SI_Sentido_Respuesta_En_Tramite"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Improcedente", $datos["SI_Sentido_Respuesta_Improcedente"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Otro", $datos["SI_Sentido_Respuesta_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_No_Disponible", $datos["SI_Sentido_Respuesta_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Sentido_Respuesta_Suma_Total", $datos["SI_Sentido_Respuesta_Suma_Total"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Archivo", $datos["SI_Archivo"], PDO::PARAM_STR);
  
      if($stmt->execute()){
  
        return "ok";
  
      }else{
   
        return "error";
      
      }
  
      $stmt->close();
      $stmt = null;
    }

  
    

    /* =========== ELIMINAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 

    static public function mdlBorrarRegistroInformacion($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSI = :idSI");
  
      $stmt -> bindParam(":idSI", $datos, PDO::PARAM_INT);
  
      if($stmt -> execute()){
  
        return "ok";
      
       }else{
  
        return "error";	
  
       }
  
      $stmt -> close();
  
      $stmt = null;
  
    }

     /*=========== METODO PDF - MOSTRAR DATOS SOLICITUD DE INFORMACION =========*/

     static public function mdlMostrarPDFSolicitudInformacion($tabla, $item, $valor){

      if ($item != null) {
  
          $statement = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      
          $statement -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      
          $statement -> execute();
      
          return $statement -> fetch();
                  
      }else {
      
          $statement = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      
          $statement -> execute();
      
          return $statement -> fetchAll();
      
           }
      
          $statement -> close();
      
          $statement = null;
  
  
      }

             /* ============ AQUI VALIDAMOS TODA LA INFORMACION QUE PUDIERA ESTA EXISTENTE  ================= */
       // 1.- VALIDAR CODIGO 

       static public function mdlValidarSolicitudesInformacionExitente($tabla, $item1, $valor1){

          $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1");

          $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

          $stmt -> execute();

          return $stmt -> fetch();

          $stmt -> close();

          $stmt = null;

    }

      /* ===========================  ACTIVAR EL ESTADO DEL USUARIO  ================================== */

      static public function mdlActualizarEstadoSolicitudesInformacion($tabla,$item1,$valor1,$item2,$valor2){
            
        $statement = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2" );

        $statement -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

        $statement ->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

        if ($statement ->execute()) {
            
            return "ok";

        }else {

            return "error";

        }

        $statement -> close();
        
        $statement = null;


    } // End function mdlActualizarEstadoUsuario



  } // End class ModeloSolicitudesInformacion