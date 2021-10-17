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

      static public function MdlMostrarTablaSI($itemCodigo, $valor, $tabla, $so, $ip, $ipa, $tsi, $fe ){


           $stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
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


      static public function MdlAgregarSI($tablaSI, $datos){
            
          $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tablaSI
            (Si_Codigo_SO, 
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
             SI_Modalidad_Respuesta_Suma_Total


          
  
             ) 
             
            VALUES(
             :Si_Codigo_SO,
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
             :SI_Modalidad_Respuesta_Suma_Total



            

             )");
          
          $stmt -> bindParam(":Si_Codigo_SO", $datos["Si_Codigo_SO"], PDO::PARAM_STR);
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
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Consulta-Directa", $datos["SI_Modalidad_Respuesta_Consulta_Directa"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Copia_Certificada", $datos["SI_Modalidad_Respuesta_Copia_Certificada"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Otro", $datos["SI_Modalidad_Respuesta_Otro"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_No_Disponible", $datos["SI_Modalidad_Respuesta_No_Disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Modalidad_Respuesta_Suma_Total", $datos["SI_Modalidad_Respuesta_Suma_Total"], PDO::PARAM_STR);
          // Obligaciones_Solicitadas
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Marco-Normativo", $datos["SI_Obligaciones_Solicitadas_Marco-Normativo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estructura-Organica", $datos["SI_Obligaciones_Solicitadas_Funciones-Area"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Funciones-Area", $datos["SI_Modalidad_Respuesta_Consulta-Directa"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Metas-Objetivos", $datos["SI_Obligaciones_Solicitadas_Metas-Objetivos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Indicadores-Relacionados", $datos["SI_Obligaciones_Solicitadas_Indicadores-Relacionados"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Indicadores-Rendir-Cuentas", $datos["SI_Obligaciones_Solicitadas_Indicadores-Rendir-Cuentas"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Directorio-Servidor-Publico", $datos["SI_Obligaciones_Solicitadas_Directorio-Servidor-Publico"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Remuneraciones-Personal", $datos["SI_Obligaciones_Solicitadas_Remuneraciones-Personal"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Gasto-Representacion-Viaticos", $datos["SI_Obligaciones_Solicitadas_Gasto-Representacion-Viaticos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Plazas-Bases-Confianza-Vacantes", $datos["SI_Obligaciones_Solicitadas-Plazas-Bases-Confianza-Vacantes"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Contratacion_Servicios", $datos["SI_Obligaciones_Solicitadas-Contratacion_Servicios"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Versiones-Publicas", $datos["SI_Obligaciones_Solicitadas-Versiones-Publicas"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Domicilio-Direccion-UT", $datos["SI_Obligaciones_Solicitadas-Domicilio-Direccion-UT"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Convocatoria-Concurso-Cargo", $datos["SI_Obligaciones_Solicitadas-Convocatoria-Concurso-Cargo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Informacion-Programas-Subsidios", $datos["SI_Obligaciones_Solicitadas-Informacion-Programas-Subsidios"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Condiciones-Trabajos", $datos["SI_Obligaciones_Solicitadas-Condiciones-Trabajos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Recursos-Publicos", $datos["SI_Obligaciones_Solicitadas-Recursos-Publicos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Informacion-Curricular", $datos["SI_Obligaciones_Solicitadas-Informacion-Curricular"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Servidores-Publicos-Sancionados", $datos["SI_Obligaciones_Solicitadas_Servidores-Publicos-Sancionados"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Servicios-Ofrecen", $datos["SI_Obligaciones_Solicitadas_Servicios-Ofrecen"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Tramites-Requisitos-Formatos", $datos["SI_Obligaciones_Solicitadas_Tramites-Requisitos-Formatos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Presupuesto-Asignado", $datos["SI_Obligaciones_Solicitadas_Presupuesto-Asignado"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informacion-Relativa", $datos["SI_Obligaciones_Solicitadas_Informacion-Relativa"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Montos-Designados", $datos["SI_Obligaciones_Solicitadas_Montos-Designados"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Informes-Resultados-Auditorias", $datos["SI_Obligaciones_Solicitadas_Informes-Resultados-Auditorias"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resultados-Dictaminacion", $datos["SI_Obligaciones_Solicitadas_Resultados-Dictaminacion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Montos-Criterios-Convocatorias", $datos["SI_Obligaciones_Solicitadas_Montos-Criterios-Convocatorias"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Concesiones-Contratos-Convenios", $datos["SI_Obligaciones_Solicitadas_Concesiones-Contratos-Convenios"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resultados-Procesos-Adjudicaciones", $datos["SI_Obligaciones_Solicitadas_Resultados-Procesos-Adjudicaciones"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Infomes-Generen-SO", $datos["SI_Obligaciones_Solicitadas_Infomes-Generen-SO"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estadisticas-Generan-Cumplimiento", $datos["SI_Obligaciones_Solicitadas_Estadisticas-Generan-Cumplimiento"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Avances-Programaticos", $datos["SI_Obligaciones_Solicitadas_Avances-Programaticos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Padron-Proveedores", $datos["SI_Obligaciones_Solicitadas_Padron-Proveedores"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Convenios-Coordinacion", $datos["SI_Obligaciones_Solicitadas_Convenios-Coordinacion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Inventario-Muebles-Inmuebles", $datos["SI_Obligaciones_Solicitadas_Inventario-Muebles-Inmuebles"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas", $datos["SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Resoluciones-Laudos", $datos["SI_Obligaciones_Solicitadas_Resoluciones-Laudos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Mecanismo_Participacion", $datos["SI_Obligaciones_Solicitadas_Mecanismo_Participacion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programas-Ofrecidos", $datos["SI_Obligaciones_Solicitadas_Programas-Ofrecidos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Actas-Resoluciones", $datos["SI_Obligaciones_Solicitadas-Actas-Resoluciones"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Evaluaciones-Encuestas", $datos["SI_Obligaciones_Solicitadas_Evaluaciones-Encuestas"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Estudios-Financiados", $datos["SI_Obligaciones_Solicitadas_Estudios-Financiados"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Listado-Jubilados-Pensionados", $datos["SI_Obligaciones_Solicitadas_Listado-Jubilados-Pensionados"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Ingreso_Recibido", $datos["SI_Obligaciones_Solicitadas_Ingreso_Recibido"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Donaciones-Hechas", $datos["SI_Obligaciones_Solicitadas_Donaciones-Hechas"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Catalogos-Disposicion", $datos["SI_Obligaciones_Solicitadas_Catalogos-Disposicion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas-Sesiones-Ordinaria", $datos["SI_Obligaciones_Solicitadas_Actas-Sesiones-Ordinaria"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Listados-Solicitudes-Proveedores", $datos["SI_Obligaciones_Solicitadas_Listados-Solicitudes-Proveedores"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Gacetas-Municipales", $datos["SI_Obligaciones_Solicitadas_Gacetas-Municipales"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Plan-Desarrollo-Municipal", $datos["SI_Obligaciones_Solicitadas_Plan-Desarrollo-Municipal"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Condiciones-Generales-Trabajo", $datos["SI_Obligaciones_Solicitadas-Condiciones-Generales-Trabajo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Recursos-Públicos-Económicos", $datos["SI_Obligaciones_Solicitadas-Recursos-Públicos-Económicos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Plan-Desarrollo-Urbano", $datos["SI_Obligaciones_Solicitadas-Plan-Desarrollo-Urbano"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas-Programa-Ordenamiento", $datos["SI_Obligaciones_Solicitadas-Programa-Ordenamiento"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Programa-Uso-Suelo", $datos["SI_Obligaciones_Solicitadas_Programa-Uso-Suelo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Tipos_Uso-Suelo", $datos["SI_Obligaciones_Solicitadas_Tipos_Uso-Suelo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Licencia_Uso-Suelo", $datos["SI_Obligaciones_Solicitadas_Licencia_Uso-Suelo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Licencias-Construccion", $datos["SI_Obligaciones_Solicitadas_Licencias-Construccion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Monto-Designados", $datos["SI_Obligaciones_Solicitadas_Monto-Designados"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Actas-Cabildo", $datos["SI_Obligaciones_Solicitadas_Actas-Cabildo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Prosupuesto-Sostenible", $datos["SI_Obligaciones_Solicitadas_Prosupuesto-Sostenible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Evaluaciones-LDF", $datos["SI_Obligaciones_Solicitadas_Evaluaciones-LDF"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Subsidios", $datos["SI_Obligaciones_Solicitadas_Subsidios"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Otros", $datos["SI_Obligaciones_Solicitadas_Otros"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_No-Disponibles", $datos["SI_Obligaciones_Solicitadas_No-Disponibles"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Obligaciones_Solicitadas_Suma-Total", $datos["SI_Obligaciones_Solicitadas_Suma-Total"], PDO::PARAM_INT);
          // Sentido_Respuesta}
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Informacion", $datos["SI_Sentido_Respuesta_Informacion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Informacion-Parcial", $datos["SI_Sentido_Respuesta_Informacion-Parcial"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Negada-Clasificacion", $datos["SI_Sentido_Respuesta_Negada-Clasificacion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Inexistencia-Informacion", $datos["SI_Sentido_Respuesta_Inexistencia-Informacion"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Mixta", $datos["SI_Sentido_Respuesta_Mixta"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_No-Aclarada", $datos["SI_Sentido_Respuesta_No-Aclarada"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Orientada", $datos["SI_Sentido_Respuesta_Orientada"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_En-Tramite", $datos["SI_Sentido_Respuesta_En-Tramite"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Improcedente", $datos["SI_Sentido_Respuesta_Improcedente"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Otro", $datos["SI_Sentido_Respuesta_Otro"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_No-Disponible", $datos["SI_Sentido_Respuesta_No-Disponible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Sentido_Respuesta_Suma-Total", $datos["SI_Sentido_Respuesta_Suma-Total"], PDO::PARAM_INT);

          if ($stmt -> execute()) {
	 
            return "ok";
    
          }else {
    
            return "error";

          } // else

        } // End Funcion MdlAgregarSI

     } // End class ModeloSolicitudesInformacion