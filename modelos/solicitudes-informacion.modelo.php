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
             -- Medio de Presentación --
             SI_Medio_Presentacion_Personal_Escrito
             --SI_Medio_Presentacion_Correo-Electronico,
             --SI_Medio_Presentacion_Sistema-Infomex,
             --SI_Medio_Presentacion_PNT,
             --SI_Medio_Presentacion_No-disponible,
             --SI_Medio_Presentacion_Suma-Total,
             -- Tipo_Solicitud --
             --SI_Tipo_Solicitud_Persona-Fisica,
             --SI_Tipo_Solicitud_Persona-Moral,
             --SI_Tipo_Solicitud_No-Disponible,
             --SI_Tipo_Solicitud_Suma-Total,
             -- Genero_Solicitante --
             --SI_Genero_Solicitante_Femenino,
             --SI_Genero_Solicitante_Anonimo,
             --SI_Genero_Solicitante_No-Disponible,
             --SI_Genero_Solicitante_Suma-Total,
             -- Informacion_Solicitada --
             --SI_Informacion_Solicitada_Obligacion-Transparencia,
             --SI_Informacion_Solicitada_Reservada,
             --SI_Informacion_Solicitada_Confidencial,
             --SI_Informacion_Solicitada_Otro,
             --SI_Informacion_Solicitada_No-Disponible,
             --SI_Informacion_Solicitada_Suma-Total,
             -- Tramites --
             --SI_Tramites_Concluidas,
             --SI_Tramites_Pendientes,
             --SI_Tramites_No-Disponible,
             --SI_Tramites_Suma-Total
             -- Modalidad_Respuesta --
             --SI_Modalidad_Respuesta_Medios-Electronicos,
             --SI_Modalidad_Respuesta_Copia-Simple,
             --SI_Modalidad_Respuesta_Consulta-Directa,
             --SI_Modalidad_Respuesta_Copia-Certificada,
             --SI_Modalidad_Respuesta_Otro,
             --SI_Modalidad_Respuesta_No-Disponible,
             --SI_Modalidad_Respuesta_Suma-Total
             -- Obligaciones_Solicitadas --
             --SI_Obligaciones_Solicitadas_Marco-Normativo,
             --SI_Obligaciones_Solicitadas_Estructura-Organica,
             --SI_Obligaciones_Solicitadas_Funciones-Area,
             --SI_Obligaciones_Solicitadas_Metas-Objetivos,
             --SI_Obligaciones_Solicitadas_Indicadores-Relacionados,
             --SI_Obligaciones_Solicitadas_Indicadores-Rendir-Cuentas,
             --SI_Obligaciones_Solicitadas_Directorio-Servidor-Publico,
             --SI_Obligaciones_Solicitadas_Remuneraciones-Personal,
             --SI_Obligaciones_Solicitadas_Gasto-Representacion-Viaticos,
             --SI_Obligaciones_Solicitadas-Plazas-Bases-Confianza-Vacantes,
             --SI_Obligaciones_Solicitadas-Contratacion_Servicios,
             --SI_Obligaciones_Solicitadas-Versiones-Publicas,
             --SI_Obligaciones_Solicitadas-Domicilio-Direccion-UT,
             --SI_Obligaciones_Solicitadas-Convocatoria-Concurso-Cargo,
             --SI_Obligaciones_Solicitadas-Informacion-Programas-Subsidios,
             --SI_Obligaciones_Solicitadas-Condiciones-Trabajos,
             --SI_Obligaciones_Solicitadas-Recursos-Publicos,
             --SI_Obligaciones_Solicitadas-Informacion-Curricular,
             --SI_Obligaciones_Solicitadas_Servidores-Publicos-Sancionados,
             --SI_Obligaciones_Solicitadas_Servicios-Ofrecen,
             --SI_Obligaciones_Solicitadas_Tramites-Requisitos-Formatos,
             --SI_Obligaciones_Solicitadas_Presupuesto-Asignado,
             --SI_Obligaciones_Solicitadas_Informacion-Relativa,
             --SI_Obligaciones_Solicitadas_Montos-Designados,
             --SI_Obligaciones_Solicitadas_Informes-Resultados-Auditorias,
             --SI_Obligaciones_Solicitadas_Resultados-Dictaminacion,
             --SI_Obligaciones_Solicitadas_Montos-Criterios-Convocatorias,
             --SI_Obligaciones_Solicitadas_Concesiones-Contratos-Convenios,
             --SI_Obligaciones_Solicitadas_Resultados-Procesos-Adjudicaciones,
             --SI_Obligaciones_Solicitadas_Infomes-Generen-SO,
             --SI_Obligaciones_Solicitadas_Estadisticas-Generan-Cumplimiento,
             --SI_Obligaciones_Solicitadas_Avances-Programaticos,
             --SI_Obligaciones_Solicitadas_Padron-Proveedores,
             --SI_Obligaciones_Solicitadas_Convenios-Coordinacion, 
             --SI_Obligaciones_Solicitadas_Inventario-Muebles-Inmuebles,
             --SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas,
             --SI_Obligaciones_Solicitadas_Resoluciones-Laudos,
             --SI_Obligaciones_Solicitadas_Mecanismo_Participacion,
             --SI_Obligaciones_Solicitadas_Programas-Ofrecidos,
             --SI_Obligaciones_Solicitadas-Actas-Resoluciones,
             --SI_Obligaciones_Solicitadas_Evaluaciones-Encuestas,
             --SI_Obligaciones_Solicitadas_Estudios-Financiados,
             --SI_Obligaciones_Solicitadas_Listado-Jubilados-Pensionados,
             --SI_Obligaciones_Solicitadas_Ingreso_Recibido,
             --SI_Obligaciones_Solicitadas_Donaciones-Hechas,
             --SI_Obligaciones_Solicitadas_Catalogos-Disposicion,
             --SI_Obligaciones_Solicitadas_Actas-Sesiones-Ordinaria,
             --SI_Obligaciones_Solicitadas_Listados-Solicitudes-Proveedores,
             --SI_Obligaciones_Solicitadas_Gacetas-Municipales,
             --SI_Obligaciones_Solicitadas_Plan-Desarrollo-Municipal,
             --SI_Obligaciones_Solicitadas-Condiciones-Generales-Trabajo, //--
             --SI_Obligaciones_Solicitadas-Recursos-Públicos-Económicos, //--
             --SI_Obligaciones_Solicitadas-Plan-Desarrollo-Urbano, 
             --SI_Obligaciones_Solicitadas-Programa-Ordenamiento,
             --SI_Obligaciones_Solicitadas_Programa-Uso-Suelo,
             --SI_Obligaciones_Solicitadas_Tipos_Uso-Suelo,
             --SI_Obligaciones_Solicitadas_Licencia_Uso-Suelo,
             --SI_Obligaciones_Solicitadas_Licencias-Construccion,
             --SI_Obligaciones_Solicitadas_Monto-Designados, //--  
             --SI_Obligaciones_Solicitadas_Actas-Cabildo,
             --SI_Obligaciones_Solicitadas_Prosupuesto-Sostenible,
             --SI_Obligaciones_Solicitadas_Evaluaciones-LDF,
             --SI_Obligaciones_Solicitadas_Subsidios,
             --SI_Obligaciones_Solicitadas_Otros,
             --SI_Obligaciones_Solicitadas_No-Disponibles,
             --SI_Obligaciones_Solicitadas_Suma-Total,
             -- Sentido_Respuesta --
             --SI_Sentido_Respuesta_Informacion,
             --SI_Sentido_Respuesta_Informacion-Parcial,
             --SI_Sentido_Respuesta_Negada-Clasificacion,
             --SI_Sentido_Respuesta_Inexistencia-Informacion,
             --SI_Sentido_Respuesta_Mixta,
             --SI_Sentido_Respuesta_No-Aclarada,
             --SI_Sentido_Respuesta_Orientada,
             --SI_Sentido_Respuesta_En-Tramite,
             --SI_Sentido_Respuesta_Improcedente,
             --SI_Sentido_Respuesta_Otro,
             --SI_Sentido_Respuesta_No-Disponible,
             --SI_Sentido_Respuesta_Suma-Total
             ) 
             
            VALUES(
             :Si_Codigo_SO,
             :Si_Codigo_Informe_Anios, 
             :SI_Nombre_Sujeto_Obligado,
             :SI_Informe_Presentado,
             :SI_Anios,
             :SI_TOTAL_SOLICITUDES,
             -- Medio de Presentación --
             :SI_Medio_Presentacion_Personal_Escrito
             --:SI_Medio_Presentacion_Correo-Electronico,
             --:SI_Medio_Presentacion_Sistema-Infomex,
             --:SI_Medio_Presentacion_PNT,
             --:SI_Medio_Presentacion_No-disponible,
             --:SI_Medio_Presentacion_Suma-Total,
             -- Tipo_Solicitud --
             --:SI_Tipo_Solicitud_Persona-Fisica,
             --:SI_Tipo_Solicitud_Persona-Moral,
             --:SI_Tipo_Solicitud_No-Disponible,
             --:SI_Tipo_Solicitud_Suma-Total,
             -- Genero_Solicitante --
             --:SI_Genero_Solicitante_Femenino,
             --:SI_Genero_Solicitante_Anonimo,
             --:SI_Genero_Solicitante_No-Disponible,
             --:SI_Genero_Solicitante_Suma-Total,
             -- Informacion_Solicitada --
             --:SI_Informacion_Solicitada_Obligacion-Transparencia,
             --:SI_Informacion_Solicitada_Reservada,
             --:SI_Informacion_Solicitada_Confidencial,
             --:SI_Informacion_Solicitada_Otro
             --:SI_Informacion_Solicitada_No-Disponible,
             --:SI_Informacion_Solicitada_Suma-Total,
             -- Tramites --:
             --:SI_Tramites_Concluidas,
             --:SI_Tramites_Pendientes,
             --:SI_Tramites_No-Disponible,
             --:SI_Tramites_Suma-Total
             -- Modalidad_Respuesta --
             --:SI_Modalidad_Respuesta_Medios-Electronicos,
             --:SI_Modalidad_Respuesta_Copia-Simple,
             --:SI_Modalidad_Respuesta_Consulta-Directa,
             --:SI_Modalidad_Respuesta_Copia-Certificada,
             --:SI_Modalidad_Respuesta_Otro,
             --:SI_Modalidad_Respuesta_No-Disponible,
             --:SI_Modalidad_Respuesta_Suma-Total
             -- Obligaciones_Solicitadas --
             --:SI_Obligaciones_Solicitadas_Marco-Normativo,
             --:SI_Obligaciones_Solicitadas_Estructura-Organica,
             --:SI_Obligaciones_Solicitadas_Funciones-Area,
             --:SI_Obligaciones_Solicitadas_Metas-Objetivos,
             --:SI_Obligaciones_Solicitadas_Indicadores-Relacionados,
             --:SI_Obligaciones_Solicitadas_Indicadores-Rendir-Cuentas,
             --:SI_Obligaciones_Solicitadas_Directorio-Servidor-Publico,
             --:SI_Obligaciones_Solicitadas_Remuneraciones-Personal,
             --:SI_Obligaciones_Solicitadas_Gasto-Representacion-Viaticos,
             --:SI_Obligaciones_Solicitadas-Plazas-Bases-Confianza-Vacantes,
             --:SI_Obligaciones_Solicitadas-Contratacion_Servicios,
             --:SI_Obligaciones_Solicitadas-Versiones-Publicas,
             --:SI_Obligaciones_Solicitadas-Domicilio-Direccion-UT,
             --:SI_Obligaciones_Solicitadas-Convocatoria-Concurso-Cargo,
             --:SI_Obligaciones_Solicitadas-Informacion-Programas-Subsidios,
             --:SI_Obligaciones_Solicitadas-Condiciones-Trabajos,
             --:SI_Obligaciones_Solicitadas-Recursos-Publicos,
             --:SI_Obligaciones_Solicitadas-Informacion-Curricular,
             --:SI_Obligaciones_Solicitadas_Servidores-Publicos-Sancionados,
             --:SI_Obligaciones_Solicitadas_Servicios-Ofrecen,
             --:SI_Obligaciones_Solicitadas_Tramites-Requisitos-Formatos,
             --:SI_Obligaciones_Solicitadas_Presupuesto-Asignado,
             --:SI_Obligaciones_Solicitadas_Informacion-Relativa,
             --:SI_Obligaciones_Solicitadas_Montos-Designados,
             --:SI_Obligaciones_Solicitadas_Informes-Resultados-Auditorias,
             --:SI_Obligaciones_Solicitadas_Resultados-Dictaminacion,
             --:SI_Obligaciones_Solicitadas_Montos-Criterios-Convocatorias,
             --:SI_Obligaciones_Solicitadas_Concesiones-Contratos-Convenios,
             --:SI_Obligaciones_Solicitadas_Resultados-Procesos-Adjudicaciones,
             --:SI_Obligaciones_Solicitadas_Infomes-Generen-SO,
             --:SI_Obligaciones_Solicitadas_Estadisticas-Generan-Cumplimiento,
             --:SI_Obligaciones_Solicitadas_Avances-Programaticos,
             --:SI_Obligaciones_Solicitadas_Padron-Proveedores,
             --:SI_Obligaciones_Solicitadas_Convenios-Coordinacion, 
             --:SI_Obligaciones_Solicitadas_Inventario-Muebles-Inmuebles,
             --:SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas,
             --:SI_Obligaciones_Solicitadas_Resoluciones-Laudos,
             --:SI_Obligaciones_Solicitadas_Mecanismo_Participacion,
             --:SI_Obligaciones_Solicitadas_Programas-Ofrecidos,
             --:SI_Obligaciones_Solicitadas-Actas-Resoluciones,
             --:SI_Obligaciones_Solicitadas_Evaluaciones-Encuestas,
             --:SI_Obligaciones_Solicitadas_Estudios-Financiados,
             --:SI_Obligaciones_Solicitadas_Listado-Jubilados-Pensionados,
             --:SI_Obligaciones_Solicitadas_Ingreso_Recibido,
             --:SI_Obligaciones_Solicitadas_Donaciones-Hechas,
             --:SI_Obligaciones_Solicitadas_Catalogos-Disposicion,
             --:SI_Obligaciones_Solicitadas_Actas-Sesiones-Ordinaria,
             --:SI_Obligaciones_Solicitadas_Listados-Solicitudes-Proveedores,
             --:SI_Obligaciones_Solicitadas_Gacetas-Municipales,
             --:SI_Obligaciones_Solicitadas_Plan-Desarrollo-Municipal,
             --:SI_Obligaciones_Solicitadas-Condiciones-Generales-Trabajo, //--
             --:SI_Obligaciones_Solicitadas-Recursos-Públicos-Económicos, //--
             --:SI_Obligaciones_Solicitadas-Plan-Desarrollo-Urbano, 
             --:SI_Obligaciones_Solicitadas-Programa-Ordenamiento,
             --:SI_Obligaciones_Solicitadas_Programa-Uso-Suelo,
             --:SI_Obligaciones_Solicitadas_Tipos_Uso-Suelo,
             --:SI_Obligaciones_Solicitadas_Licencia_Uso-Suelo,
             --:SI_Obligaciones_Solicitadas_Licencias-Construccion,
             --:SI_Obligaciones_Solicitadas_Monto-Designados, //--  
             --:SI_Obligaciones_Solicitadas_Actas-Cabildo,
             --:SI_Obligaciones_Solicitadas_Prosupuesto-Sostenible,
             --:SI_Obligaciones_Solicitadas_Evaluaciones-LDF,
             --:SI_Obligaciones_Solicitadas_Subsidios,
             --:SI_Obligaciones_Solicitadas_Otros,
             --:SI_Obligaciones_Solicitadas_No-Disponibles,
             --:SI_Obligaciones_Solicitadas_Suma-Total,
             -- Sentido_Respuesta --
             --:SI_Sentido_Respuesta_Informacion,
             --:SI_Sentido_Respuesta_Informacion-Parcial,
             --:SI_Sentido_Respuesta_Negada-Clasificacion,
             --:SI_Sentido_Respuesta_Inexistencia-Informacion,
             --:SI_Sentido_Respuesta_Mixta,
             --:SI_Sentido_Respuesta_No-Aclarada,
             --:SI_Sentido_Respuesta_Orientada,
             --:SI_Sentido_Respuesta_En-Tramite,
             --:SI_Sentido_Respuesta_Improcedente,
             --:SI_Sentido_Respuesta_Otro,
             --:SI_Sentido_Respuesta_No-Disponible,
             --:SI_Sentido_Respuesta_Suma-Total
 

             )");
          
          $stmt -> bindParam(":Si_Codigo_SO", $datos["Si_Codigo_SO"], PDO::PARAM_STR);
          $stmt -> bindParam(":Si_Codigo_Informe_Anios", $datos["Si_Codigo_Informe_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Nombre_Sujeto_Obligado", $datos["SI_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informe_Presentado", $datos["SI_Informe_Presentado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Anios", $datos["SI_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_TOTAL_SOLICITUDES", $datos["SI_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
          // Medio de Presentación --
          $stmt -> bindParam(":SI_Medio_Presentacion_Personal_Escrito", $datos["SI_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
          //$stmt -> bindParam(":SI_Medio_Presentacion_Correo-Electronico", $datos["SI_Medio_Presentacion_Correo-Electronico"], PDO::PARAM_STR);
          //$stmt -> bindParam(":SI_Medio_Presentacion_Sistema-Infomex", $datos["SI_Medio_Presentacion_Sistema-Infomex"], PDO::PARAM_STR);
          //$stmt -> bindParam(":SI_Medio_Presentacion_PNT", $datos["SI_Medio_Presentacion_PNT"], PDO::PARAM_STR);
          //$stmt -> bindParam(":SI_Medio_Presentacion_No-disponible", $datos["SI_Medio_Presentacion_No-disponible"], PDO::PARAM_STR);
          //$stmt -> bindParam(":SI_Medio_Presentacion_Suma-Total", $datos["SI_Medio_Presentacion_Suma-Total"], PDO::PARAM_STR);
          // Tipo_Solicitud
          //$stmt -> bindParam(":SI_Tipo_Solicitud_Persona-Fisica", $datos["SI_Tipo_Solicitud_Persona-Fisica"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tipo_Solicitud_Persona-Moral", $datos["SI_Tipo_Solicitud_Persona-Moral"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tipo_Solicitud_No-Disponible", $datos["SI_Tipo_Solicitud_No-Disponible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tipo_Solicitud_Suma-Total", $datos["SI_Tipo_Solicitud_Suma-Total"], PDO::PARAM_INT);
          // Genero_Solicitante
          //$stmt -> bindParam(":SI_Genero_Solicitante_Femenino", $datos["SI_Genero_Solicitante_Femenino"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Genero_Solicitante_Anonimo", $datos["SI_Genero_Solicitante_Anonimo"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Genero_Solicitante_No-Disponible", $datos["SI_Genero_Solicitante_No-Disponible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Genero_Solicitante_Suma-Total", $datos["SI_Genero_Solicitante_Suma-Total"], PDO::PARAM_INT);
          // Informacion_Solicitada
          //$stmt -> bindParam(":SI_Informacion_Solicitada_Obligacion-Transparencia", $datos["SI_Informacion_Solicitada_Obligacion-Transparencia"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Informacion_Solicitada_Reservada", $datos["SI_Informacion_Solicitada_Reservada"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Informacion_Solicitada_Confidencial", $datos["SI_Informacion_Solicitada_Confidencial"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Informacion_Solicitada_Otro", $datos["SI_Informacion_Solicitada_Otro"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Informacion_Solicitada_No-Disponible", $datos["SI_Informacion_Solicitada_No-Disponible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Informacion_Solicitada_Suma-Total", $datos["SI_Informacion_Solicitada_Suma-Total"], PDO::PARAM_INT);
          // Tramites
          //$stmt -> bindParam(":SI_Tramites_Concluidas", $datos["SI_Tramites_Concluidas"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tramites_Pendientes", $datos["SI_Tramites_Pendientes"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tramites_No-Disponible", $datos["SI_Tramites_No-Disponible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tramites_Suma-Total", $datos["SI_Tramites_Suma-Total"], PDO::PARAM_INT);--
          // Modalidad_Respuesta
          //$stmt -> bindParam(":SI_Modalidad_Respuesta_Medios-Electronicos", $datos["SI_Modalidad_Respuesta_Medios-Electronicos"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Modalidad_Respuesta_Copia-Simple", $datos["SI_Modalidad_Respuesta_Copia-Simple"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Modalidad_Respuesta_Consulta-Directa", $datos["SI_Modalidad_Respuesta_Consulta-Directa"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Modalidad_Respuesta_Copia-Certificada", $datos["SI_Modalidad_Respuesta_Copia-Certificada"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Modalidad_Respuesta_Otro", $datos["SI_Modalidad_Respuesta_Otro"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tramites_No-Disponible", $datos["SI_Tramites_No-Disponible"], PDO::PARAM_INT);
          //$stmt -> bindParam(":SI_Tramites_Suma-Total", $datos["SI_Tramites_Suma-Total"], PDO::PARAM_INT);
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