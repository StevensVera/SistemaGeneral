<?php

    require_once "conexion.php";

        class ModeloSolicitudesArco{

           static public function ctrMostrarTablaAR($itemCodigo,$valor,$tabla){

                $stmt = Conexion::conectar()->prepare("SELECT *
                                                    FROM $tabla 
                                                    WHERE $tabla.$itemCodigo = :$itemCodigo" );

                $stmt -> bindParam(":".$itemCodigo, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetchAll();

           }  // ctrMostraTablaAR
           
      /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA - TABLA PRINCIPAL ================ */ 

           static public function MdlAgregarSA($tablaSA, $datos){

                $stmt = Conexion::conectar()->prepare(
                   "INSERT INTO $tablaSA (
                      SA_Estatus,
                      SA_Recepcion,
                      SA_Codigo_SO, 
                      SA_Codigo_UnicoInforme_Anios,
                      SA_Codigo_Tipo_Informe_Anios,
                      SA_Codigo_Informe_Anios,
                      SA_Nombre_Sujeto_Obligado,
                      SA_Titular_Informe,
                      SA_Informe_Presentado,
                      SA_Anios,
                      SA_TOTAL_SOLICITUDES,

                      SA_Medio_Presentacion_Personal_Escrito,
                      SA_Medio_Presentacion_Correo_Electronico,
                      SA_Medio_Presentacion_Sistema_Infomex,
                      SA_Medio_Presentacion_PNT,
                      SA_Medio_Presentacion_No_disponible,
                      SA_Medio_Presentacion_Suma_Total,

                      SA_Tipo_Solicitante_Persona_Fisica,
                      SA_Tipo_Solicitante_Persona_Moral,
                      SA_Tipo_Solicitante_No_Disponible,
                      SA_Tipo_Solicitante_Suma_Total,
                      
                      SA_Genero_Solicitante_Femenino,
                      SA_Genero_Solicitante_Masculino,
                      SA_Genero_Solicitante_Anonimo,
                      SA_Genero_Solicitante_No_Disponible,
                      SA_Genero_Solicitante_Suma_Total,

                      SA_Informacion_Solicitada_Acceso,
                      SA_Informacion_Solicitada_Rectificacion,
                      SA_Informacion_Solicitada_Oposicion,
                      SA_Informacion_Solicitada_Cancelacion,
                      SA_Informacion_Solicitada_Otro,
                      SA_Informacion_Solicitada_No_Disponible,
                      SA_Informacion_Solicitada_Suma_Total,

                      SA_Tramites_Concluidas,
                      SA_Tramites_Pendientes,
                      SA_Tramites_No_Disponible,
                      SA_Tramites_Suma_Total,

                      SA_Modalidad_Respuesta_Medios_Electronicos,
                      SA_Modalidad_Respuesta_Copia_Simple,
                      SA_Modalidad_Respuesta_Consulta_Directa,
                      SA_Modalidad_Respuesta_Copia_Certificada,
                      SA_Modalidad_Respuesta_Otro,
                      SA_Modalidad_Respuesta_No_Disponible,
                      SA_Modalidad_Respuesta_Suma_Total,

                      SA_Sentido_Respuesta_Informacion,
                      SA_Sentido_Respuesta_Informacion_Parcial,
                      SA_Sentido_Respuesta_Negada_Clasificacion,
                      SA_Sentido_Respuesta_Inexistencia_Informacion,
                      SA_Sentido_Respuesta_Mixta,
                      SA_Sentido_Respuesta_No_Aclarada,
                      SA_Sentido_Respuesta_Orientada,
                      SA_Sentido_Respuesta_En_Tramite,
                      SA_Sentido_Respuesta_Improcedente,
                      SA_Sentido_Respuesta_Otros,
                      SA_Sentido_Respuesta_No_Disponible,
                      SA_Sentido_Respuesta_Suma_Total,
                      SA_Archivo
                      
                      )VALUES (
                     :SA_Estatus,
                     :SA_Recepcion,   
                     :SA_Codigo_SO,
                     :SA_Codigo_UnicoInforme_Anios,
                     :SA_Codigo_Tipo_Informe_Anios,
                     :SA_Codigo_Informe_Anios,
                     :SA_Nombre_Sujeto_Obligado,
                     :SA_Titular_Informe,
                     :SA_Informe_Presentado,
                     :SA_Anios,
                     :SA_TOTAL_SOLICITUDES,

                     :SA_Medio_Presentacion_Personal_Escrito,
                     :SA_Medio_Presentacion_Correo_Electronico,
                     :SA_Medio_Presentacion_Sistema_Infomex,
                     :SA_Medio_Presentacion_PNT,
                     :SA_Medio_Presentacion_No_disponible,
                     :SA_Medio_Presentacion_Suma_Total,

                     :SA_Tipo_Solicitante_Persona_Fisica,
                     :SA_Tipo_Solicitante_Persona_Moral,
                     :SA_Tipo_Solicitante_No_Disponible,
                     :SA_Tipo_Solicitante_Suma_Total,

                     :SA_Genero_Solicitante_Femenino,
                     :SA_Genero_Solicitante_Masculino,
                     :SA_Genero_Solicitante_Anonimo,
                     :SA_Genero_Solicitante_No_Disponible,
                     :SA_Genero_Solicitante_Suma_Total,

                     :SA_Informacion_Solicitada_Acceso,
                     :SA_Informacion_Solicitada_Rectificacion,
                     :SA_Informacion_Solicitada_Oposicion,
                     :SA_Informacion_Solicitada_Cancelacion,
                     :SA_Informacion_Solicitada_Otro,
                     :SA_Informacion_Solicitada_No_Disponible,
                     :SA_Informacion_Solicitada_Suma_Total,

                     :SA_Tramites_Concluidas,
                     :SA_Tramites_Pendientes,
                     :SA_Tramites_No_Disponible,
                     :SA_Tramites_Suma_Total,

                     :SA_Modalidad_Respuesta_Medios_Electronicos,
                     :SA_Modalidad_Respuesta_Copia_Simple,
                     :SA_Modalidad_Respuesta_Consulta_Directa,
                     :SA_Modalidad_Respuesta_Copia_Certificada,
                     :SA_Modalidad_Respuesta_Otro,
                     :SA_Modalidad_Respuesta_No_Disponible,
                     :SA_Modalidad_Respuesta_Suma_Total,

                     :SA_Sentido_Respuesta_Informacion,
                     :SA_Sentido_Respuesta_Informacion_Parcial,
                     :SA_Sentido_Respuesta_Negada_Clasificacion,
                     :SA_Sentido_Respuesta_Inexistencia_Informacion,
                     :SA_Sentido_Respuesta_Mixta,
                     :SA_Sentido_Respuesta_No_Aclarada,
                     :SA_Sentido_Respuesta_Orientada,
                     :SA_Sentido_Respuesta_En_Tramite,
                     :SA_Sentido_Respuesta_Improcedente,
                     :SA_Sentido_Respuesta_Otros,
                     :SA_Sentido_Respuesta_No_Disponible,
                     :SA_Sentido_Respuesta_Suma_Total,
                     :SA_Archivo
                     
                     )");
                
                $stmt -> bindParam(":SA_Estatus", $datos["SA_Estatus"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Recepcion", $datos["SA_Recepcion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Codigo_SO", $datos["SA_Codigo_SO"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Codigo_UnicoInforme_Anios", $datos["SA_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Codigo_Tipo_Informe_Anios", $datos["SA_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Codigo_Informe_Anios", $datos["SA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Nombre_Sujeto_Obligado", $datos["SA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Titular_Informe", $datos["SA_Titular_Informe"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
                //"** Medio de Presentación **",
                $stmt -> bindParam(":SA_Medio_Presentacion_Personal_Escrito", $datos["SA_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_Correo_Electronico", $datos["SA_Medio_Presentacion_Correo_Electronico"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_Sistema_Infomex", $datos["SA_Medio_Presentacion_Sistema_Infomex"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_PNT", $datos["SA_Medio_Presentacion_PNT"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_No_disponible", $datos["SA_Medio_Presentacion_No_disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_Suma_Total", $datos["SA_Medio_Presentacion_Suma_Total"], PDO::PARAM_STR);
                //"** Tipo_Solicitud **",
                $stmt -> bindParam(":SA_Tipo_Solicitante_Persona_Fisica", $datos["SA_Tipo_Solicitante_Persona_Fisica"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Tipo_Solicitante_Persona_Moral", $datos["SA_Tipo_Solicitante_Persona_Moral"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Tipo_Solicitante_No_Disponible", $datos["SA_Tipo_Solicitante_No_Disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Tipo_Solicitante_Suma_Total", $datos["SA_Tipo_Solicitante_Suma_Total"], PDO::PARAM_STR);
                //"** Genero_Solicitante **",
                $stmt -> bindParam(":SA_Genero_Solicitante_Femenino", $datos["SA_Genero_Solicitante_Femenino"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Genero_Solicitante_Masculino", $datos["SA_Genero_Solicitante_Masculino"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Genero_Solicitante_Anonimo", $datos["SA_Genero_Solicitante_Anonimo"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Genero_Solicitante_No_Disponible", $datos["SA_Genero_Solicitante_No_Disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Genero_Solicitante_Suma_Total", $datos["SA_Genero_Solicitante_Suma_Total"], PDO::PARAM_STR);
                //"** Informacion_Solicitada **",
                $stmt -> bindParam(":SA_Informacion_Solicitada_Acceso", $datos["SA_Informacion_Solicitada_Acceso"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informacion_Solicitada_Rectificacion", $datos["SA_Informacion_Solicitada_Rectificacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informacion_Solicitada_Oposicion", $datos["SA_Informacion_Solicitada_Oposicion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informacion_Solicitada_Cancelacion", $datos["SA_Informacion_Solicitada_Cancelacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informacion_Solicitada_Otro", $datos["SA_Informacion_Solicitada_Otro"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informacion_Solicitada_No_Disponible", $datos["SA_Informacion_Solicitada_No_Disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informacion_Solicitada_Suma_Total", $datos["SA_Informacion_Solicitada_Suma_Total"], PDO::PARAM_STR);
                //"** Tramites **",
                $stmt -> bindParam(":SA_Tramites_Concluidas", $datos["SA_Tramites_Concluidas"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Tramites_Pendientes", $datos["SA_Tramites_Pendientes"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Tramites_No_Disponible", $datos["SA_Tramites_No_Disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Tramites_Suma_Total", $datos["SA_Tramites_Suma_Total"], PDO::PARAM_STR);
                //"** Modalidad_Respuesta **",
                $stmt -> bindParam(":SA_Modalidad_Respuesta_Medios_Electronicos", $datos["SA_Modalidad_Respuesta_Medios_Electronicos"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Modalidad_Respuesta_Copia_Simple", $datos["SA_Modalidad_Respuesta_Copia_Simple"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Modalidad_Respuesta_Consulta_Directa", $datos["SA_Modalidad_Respuesta_Consulta_Directa"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Modalidad_Respuesta_Copia_Certificada", $datos["SA_Modalidad_Respuesta_Copia_Certificada"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Modalidad_Respuesta_Otro", $datos["SA_Modalidad_Respuesta_Otro"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Modalidad_Respuesta_No_Disponible", $datos["SA_Modalidad_Respuesta_No_Disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Modalidad_Respuesta_Suma_Total", $datos["SA_Modalidad_Respuesta_Suma_Total"], PDO::PARAM_STR);
                //"** Sentido_Respuesta **",
                $stmt -> bindParam(":SA_Sentido_Respuesta_Informacion", $datos["SA_Sentido_Respuesta_Informacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Informacion_Parcial", $datos["SA_Sentido_Respuesta_Informacion_Parcial"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Negada_Clasificacion", $datos["SA_Sentido_Respuesta_Negada_Clasificacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Inexistencia_Informacion", $datos["SA_Sentido_Respuesta_Inexistencia_Informacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Mixta", $datos["SA_Sentido_Respuesta_Mixta"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_No_Aclarada", $datos["SA_Sentido_Respuesta_No_Aclarada"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Orientada", $datos["SA_Sentido_Respuesta_Orientada"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_En_Tramite", $datos["SA_Sentido_Respuesta_En_Tramite"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Improcedente", $datos["SA_Sentido_Respuesta_Improcedente"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Otros", $datos["SA_Sentido_Respuesta_Otros"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_No_Disponible", $datos["SA_Sentido_Respuesta_No_Disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Sentido_Respuesta_Suma_Total", $datos["SA_Sentido_Respuesta_Suma_Total"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Archivo", $datos["SA_Archivo"], PDO::PARAM_STR);


                if ($stmt -> execute()) {
	 
                    return "ok";
            
                 }else {
            
                    return "error";
        
                 } // else


           }// End Funciom Agregar SA

                 /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE ARCO - DESDE EL ADMINISTRADOR - REQUEREMIENTO PRIVADA ================ */ 

                 static public function MdlAgregarSASoloRequerimientoPrivada($tablaSA, $datos){

                  $stmt = Conexion::conectar()->prepare(
                     "INSERT INTO $tablaSA (
                        SA_Estatus,
                        SA_Recepcion,
                        SA_Observaciones,
                        SA_Codigo_SO, 
                        SA_Codigo_UnicoInforme_Anios,
                        SA_Codigo_Tipo_Informe_Anios,
                        SA_Codigo_Informe_Anios,
                        SA_Nombre_Sujeto_Obligado,
                        SA_Informe_Presentado,
                        SA_Anios,
                        SA_Requerimiento_Amonestacion_Privada
                        
                        )VALUES (
                       :SA_Estatus,
                       :SA_Recepcion,
                       :SA_Observaciones,   
                       :SA_Codigo_SO,
                       :SA_Codigo_UnicoInforme_Anios,
                       :SA_Codigo_Tipo_Informe_Anios,
                       :SA_Codigo_Informe_Anios,
                       :SA_Nombre_Sujeto_Obligado,
                       :SA_Informe_Presentado,
                       :SA_Anios,
                       :SA_Requerimiento_Amonestacion_Privada
                       
                       )");
                  
                  $stmt -> bindParam(":SA_Estatus", $datos["SA_Estatus"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Recepcion", $datos["SA_Recepcion"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Observaciones", $datos["SA_Observaciones"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_SO", $datos["SA_Codigo_SO"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_UnicoInforme_Anios", $datos["SA_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_Tipo_Informe_Anios", $datos["SA_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_Informe_Anios", $datos["SA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Nombre_Sujeto_Obligado", $datos["SA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Requerimiento_Amonestacion_Privada", $datos["SA_Requerimiento_Amonestacion_Privada"], PDO::PARAM_STR);
  
  
                  if ($stmt -> execute()) {
      
                      return "ok";
              
                   }else {
              
                      return "error";
          
                   } // else
  
  
             }// End Funciom Agregar SA

            /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA - TABLA SECUNDARIA ================ */ 

           static public function MdlAgregarSA_r($tablaSA_r, $datos){

               try{  

                  $stmt = Conexion::conectar()->prepare(
                     "INSERT INTO $tablaSA_r (
                        SA_Estatus,
                        SA_Codigo_SO, 
                        SA_Codigo_UnicoInforme_Anios,
                        SA_Codigo_Tipo_Informe_Anios,
                        SA_Codigo_Informe_Anios,
                        SA_Nombre_Sujeto_Obligado,
                        SA_Informe_Presentado,
                        SA_Anios,
                        SA_TOTAL_SOLICITUDES
                        
                        )VALUES (
                        :SA_Estatus,   
                        :SA_Codigo_SO,
                        :SA_Codigo_UnicoInforme_Anios,
                        :SA_Codigo_Tipo_Informe_Anios,
                        :SA_Codigo_Informe_Anios,
                        :SA_Nombre_Sujeto_Obligado,
                        :SA_Informe_Presentado,
                        :SA_Anios,
                        :SA_TOTAL_SOLICITUDES
                        
                        )");
                  
                  $stmt -> bindParam(":SA_Estatus", $datos["SA_Estatus"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_SO", $datos["SA_Codigo_SO"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_UnicoInforme_Anios", $datos["SA_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_Tipo_Informe_Anios", $datos["SA_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_Informe_Anios", $datos["SA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Nombre_Sujeto_Obligado", $datos["SA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
               
                  if ($stmt -> execute()) {
      
                     return "ok";
               
                  }else {
               
                     return "error";
         
                  } // else

               } catch(PDOException $e) {
                    
                  echo '<script>
      
                      swal({
                        title: "ERROR, AL INSERTAR.",
                        text: "¡LA SOLICITUD DE ARCO QUE DESEA INSERTAR, YA EXISTE EN EL SISTEMA. VERIFIQUÉ SUS DATOS NUEVAMENTE!",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"
                      }).then(function(result){
      
                         if(result.value){
                            
                            window.location = "solicitudes-arco";
      
                          }
      
                      });
      
                      </script>';
                
              }          

           }// End Funciom Agregar SA

            /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA - TABLA SECUNDARIA ================ */ 

           static public function MdlAgregarSA_r_Administrador($tablaSA_r, $datos){

               try{  

                  $stmt = Conexion::conectar()->prepare(
                     "INSERT INTO $tablaSA_r (
                        SA_Estatus,
                        SA_Codigo_SO, 
                        SA_Codigo_UnicoInforme_Anios,
                        SA_Codigo_Tipo_Informe_Anios,
                        SA_Codigo_Informe_Anios,
                        SA_Nombre_Sujeto_Obligado,
                        SA_Informe_Presentado,
                        SA_Anios,
                        SA_TOTAL_SOLICITUDES
                        
                        )VALUES (
                        :SA_Estatus,   
                        :SA_Codigo_SO,
                        :SA_Codigo_UnicoInforme_Anios,
                        :SA_Codigo_Tipo_Informe_Anios,
                        :SA_Codigo_Informe_Anios,
                        :SA_Nombre_Sujeto_Obligado,
                        :SA_Informe_Presentado,
                        :SA_Anios,
                        :SA_TOTAL_SOLICITUDES
                        
                        )");
                  
                  $stmt -> bindParam(":SA_Estatus", $datos["SA_Estatus"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_SO", $datos["SA_Codigo_SO"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_UnicoInforme_Anios", $datos["SA_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_Tipo_Informe_Anios", $datos["SA_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Codigo_Informe_Anios", $datos["SA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Nombre_Sujeto_Obligado", $datos["SA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
                  $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
               
                  if ($stmt -> execute()) {
      
                     return "ok";
               
                  }else {
               
                     return "error";
         
                  } // else

               } catch(PDOException $e) {
                    
                  echo '<script>
      
                      swal({
                        title: "ERROR, AL INSERTAR.",
                        text: "¡LA INFORMACIÓN QUE DESEA INSERTAR, YA EXISTE EN EL SISTEMA. VERIFIQUÉ SUS DATOS NUEVAMENTE!",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"
                      }).then(function(result){
      
                         if(result.value){
                            
                            window.location = "dashboard";
      
                          }
      
                      });
      
                      </script>';
                
              }          

           }// End Funciom Agregar SA
        
      /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - MOSTRAR DATOS - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */  
    
         static public function mdlMostrarRegistroArcoEditarSI($tabla,$item,$valor){
	
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

         }

       /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - MOSTRAR DATOS - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 

       static public function mdlEditarSolicitudArco ($tabla,$datos) {

        $stmt = Conexion::conectar()->prepare(
          "UPDATE $tabla SET   
          SA_Informe_Presentado = :SA_Informe_Presentado,
          SA_Anios = :SA_Anios,
          SA_TOTAL_SOLICITUDES = :SA_TOTAL_SOLICITUDES,

          SA_Medio_Presentacion_Personal_Escrito = :SA_Medio_Presentacion_Personal_Escrito,
          SA_Medio_Presentacion_Correo_Electronico = :SA_Medio_Presentacion_Correo_Electronico,
          SA_Medio_Presentacion_Sistema_Infomex = :SA_Medio_Presentacion_Sistema_Infomex,
          SA_Medio_Presentacion_PNT = :SA_Medio_Presentacion_PNT,
          SA_Medio_Presentacion_No_disponible = :SA_Medio_Presentacion_No_disponible,
          SA_Medio_Presentacion_Suma_Total = :SA_Medio_Presentacion_Suma_Total
          WHERE SA_Informe_Presentado = :SA_Informe_Presentado");
      
      

          $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
          //"** Medio de Presentación **",
          $stmt -> bindParam(":SA_Medio_Presentacion_Personal_Escrito", $datos["SA_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_Medio_Presentacion_Correo_Electronico", $datos["SA_Medio_Presentacion_Correo_Electronico"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_Medio_Presentacion_Sistema_Infomex", $datos["SA_Medio_Presentacion_Sistema_Infomex"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_Medio_Presentacion_PNT", $datos["SA_Medio_Presentacion_PNT"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_Medio_Presentacion_No_disponible", $datos["SA_Medio_Presentacion_No_disponible"], PDO::PARAM_STR);
          $stmt -> bindParam(":SA_Medio_Presentacion_Suma_Total", $datos["SA_Medio_Presentacion_Suma_Total"], PDO::PARAM_STR);

       }


        /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - MOSTRAR DATOS - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 

        static public function mdlEditarSolicitudArco2 ($tabla,$datos) {

         $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET 
             SA_Informe_Presentado = :SA_Informe_Presentado, 
             SA_Anios = :SA_Anios,
             SA_TOTAL_SOLICITUDES = :SA_TOTAL_SOLICITUDES,

             SA_Medio_Presentacion_Personal_Escrito = :SA_Medio_Presentacion_Personal_Escrito,
             SA_Medio_Presentacion_Correo_Electronico = :SA_Medio_Presentacion_Correo_Electronico,
             SA_Medio_Presentacion_Sistema_Infomex = :SA_Medio_Presentacion_Sistema_Infomex,
             SA_Medio_Presentacion_PNT = :SA_Medio_Presentacion_PNT,
             SA_Medio_Presentacion_No_disponible = :SA_Medio_Presentacion_No_disponible,
             SA_Medio_Presentacion_Suma_Total =:SA_Medio_Presentacion_Suma_Total,

             SA_Tipo_Solicitante_Persona_Fisica = :SA_Tipo_Solicitante_Persona_Fisica,
             SA_Tipo_Solicitante_Persona_Moral = :SA_Tipo_Solicitante_Persona_Moral,
             SA_Tipo_Solicitante_No_Disponible = :SA_Tipo_Solicitante_No_Disponible,
             SA_Tipo_Solicitante_Suma_Total = :SA_Tipo_Solicitante_Suma_Total,

             SA_Genero_Solicitante_Femenino = :SA_Genero_Solicitante_Femenino,
             SA_Genero_Solicitante_Masculino = :SA_Genero_Solicitante_Masculino,
             SA_Genero_Solicitante_Anonimo = :SA_Genero_Solicitante_Anonimo,
             SA_Genero_Solicitante_No_Disponible = :SA_Genero_Solicitante_No_Disponible,
             SA_Genero_Solicitante_Suma_Total = :SA_Genero_Solicitante_Suma_Total,

             SA_Informacion_Solicitada_Acceso = :SA_Informacion_Solicitada_Acceso,
             SA_Informacion_Solicitada_Rectificacion = :SA_Informacion_Solicitada_Rectificacion,
             SA_Informacion_Solicitada_Oposicion = :SA_Informacion_Solicitada_Oposicion,
             SA_Informacion_Solicitada_Cancelacion = :SA_Informacion_Solicitada_Cancelacion,
             SA_Informacion_Solicitada_Otro = :SA_Informacion_Solicitada_Otro,
             SA_Informacion_Solicitada_No_Disponible = :SA_Informacion_Solicitada_No_Disponible,
             SA_Informacion_Solicitada_Suma_Total = :SA_Informacion_Solicitada_Suma_Total,

             SA_Tramites_Concluidas = :SA_Tramites_Concluidas,
             SA_Tramites_Pendientes = :SA_Tramites_Pendientes,
             SA_Tramites_No_Disponible = :SA_Tramites_No_Disponible,
             SA_Tramites_Suma_Total = :SA_Tramites_Suma_Total,

             SA_Modalidad_Respuesta_Medios_Electronicos = :SA_Modalidad_Respuesta_Medios_Electronicos,
             SA_Modalidad_Respuesta_Copia_Simple = :SA_Modalidad_Respuesta_Copia_Simple,
             SA_Modalidad_Respuesta_Consulta_Directa = :SA_Modalidad_Respuesta_Consulta_Directa,
             SA_Modalidad_Respuesta_Copia_Certificada = :SA_Modalidad_Respuesta_Copia_Certificada,
             SA_Modalidad_Respuesta_Otro = :SA_Modalidad_Respuesta_Otro,
             SA_Modalidad_Respuesta_No_Disponible = :SA_Modalidad_Respuesta_No_Disponible,
             SA_Modalidad_Respuesta_Suma_Total = :SA_Modalidad_Respuesta_Suma_Total,

             SA_Sentido_Respuesta_Informacion = :SA_Sentido_Respuesta_Informacion,
             SA_Sentido_Respuesta_Informacion_Parcial = :SA_Sentido_Respuesta_Informacion_Parcial,
             SA_Sentido_Respuesta_Negada_Clasificacion = :SA_Sentido_Respuesta_Negada_Clasificacion,
             SA_Sentido_Respuesta_Inexistencia_Informacion = :SA_Sentido_Respuesta_Inexistencia_Informacion,
             SA_Sentido_Respuesta_Mixta = :SA_Sentido_Respuesta_Mixta,
             SA_Sentido_Respuesta_No_Aclarada = :SA_Sentido_Respuesta_No_Aclarada,
             SA_Sentido_Respuesta_Orientada = :SA_Sentido_Respuesta_Orientada,
             SA_Sentido_Respuesta_En_Tramite = :SA_Sentido_Respuesta_En_Tramite,
             SA_Sentido_Respuesta_Improcedente = :SA_Sentido_Respuesta_Improcedente,
             SA_Sentido_Respuesta_Otros = :SA_Sentido_Respuesta_Otros,
             SA_Sentido_Respuesta_No_Disponible = :SA_Sentido_Respuesta_No_Disponible,
             SA_Sentido_Respuesta_Suma_Total = :SA_Sentido_Respuesta_Suma_Total,
             SA_Archivo = :SA_Archivo
             WHERE SA_Informe_Presentado = :SA_Informe_Presentado");

            $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Medio_Presentacion_Personal_Escrito", $datos["SA_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Medio_Presentacion_Correo_Electronico", $datos["SA_Medio_Presentacion_Correo_Electronico"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Medio_Presentacion_Sistema_Infomex", $datos["SA_Medio_Presentacion_Sistema_Infomex"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Medio_Presentacion_PNT", $datos["SA_Medio_Presentacion_PNT"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Medio_Presentacion_No_disponible", $datos["SA_Medio_Presentacion_No_disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Medio_Presentacion_Suma_Total", $datos["SA_Medio_Presentacion_Suma_Total"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Tipo_Solicitante_Persona_Fisica", $datos["SA_Tipo_Solicitante_Persona_Fisica"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Tipo_Solicitante_Persona_Moral", $datos["SA_Tipo_Solicitante_Persona_Moral"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Tipo_Solicitante_No_Disponible", $datos["SA_Tipo_Solicitante_No_Disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Tipo_Solicitante_Suma_Total", $datos["SA_Tipo_Solicitante_Suma_Total"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Genero_Solicitante_Femenino", $datos["SA_Genero_Solicitante_Femenino"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Genero_Solicitante_Masculino", $datos["SA_Genero_Solicitante_Masculino"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Genero_Solicitante_Anonimo", $datos["SA_Genero_Solicitante_Anonimo"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Genero_Solicitante_No_Disponible", $datos["SA_Genero_Solicitante_No_Disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Genero_Solicitante_Suma_Total", $datos["SA_Genero_Solicitante_Suma_Total"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Informacion_Solicitada_Acceso", $datos["SA_Informacion_Solicitada_Acceso"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Informacion_Solicitada_Rectificacion", $datos["SA_Informacion_Solicitada_Rectificacion"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Informacion_Solicitada_Oposicion", $datos["SA_Informacion_Solicitada_Oposicion"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Informacion_Solicitada_Cancelacion", $datos["SA_Informacion_Solicitada_Cancelacion"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Informacion_Solicitada_Otro", $datos["SA_Informacion_Solicitada_Otro"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Informacion_Solicitada_No_Disponible", $datos["SA_Informacion_Solicitada_No_Disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Informacion_Solicitada_Suma_Total", $datos["SA_Informacion_Solicitada_Suma_Total"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Tramites_Concluidas", $datos["SA_Tramites_Concluidas"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Tramites_Pendientes", $datos["SA_Tramites_Pendientes"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Tramites_No_Disponible", $datos["SA_Tramites_No_Disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Tramites_Suma_Total", $datos["SA_Tramites_Suma_Total"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Modalidad_Respuesta_Medios_Electronicos", $datos["SA_Modalidad_Respuesta_Medios_Electronicos"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Modalidad_Respuesta_Copia_Simple", $datos["SA_Modalidad_Respuesta_Copia_Simple"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Modalidad_Respuesta_Consulta_Directa", $datos["SA_Modalidad_Respuesta_Consulta_Directa"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Modalidad_Respuesta_Copia_Certificada", $datos["SA_Modalidad_Respuesta_Copia_Certificada"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Modalidad_Respuesta_Otro", $datos["SA_Modalidad_Respuesta_Otro"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Modalidad_Respuesta_No_Disponible", $datos["SA_Modalidad_Respuesta_No_Disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Modalidad_Respuesta_Suma_Total", $datos["SA_Modalidad_Respuesta_Suma_Total"], PDO::PARAM_STR);

            $stmt -> bindParam(":SA_Sentido_Respuesta_Informacion", $datos["SA_Sentido_Respuesta_Informacion"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Informacion_Parcial", $datos["SA_Sentido_Respuesta_Informacion_Parcial"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Negada_Clasificacion", $datos["SA_Sentido_Respuesta_Negada_Clasificacion"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Inexistencia_Informacion", $datos["SA_Sentido_Respuesta_Inexistencia_Informacion"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Mixta", $datos["SA_Sentido_Respuesta_Mixta"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_No_Aclarada", $datos["SA_Sentido_Respuesta_No_Aclarada"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Orientada", $datos["SA_Sentido_Respuesta_Orientada"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_En_Tramite", $datos["SA_Sentido_Respuesta_En_Tramite"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Improcedente", $datos["SA_Sentido_Respuesta_Improcedente"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Otros", $datos["SA_Sentido_Respuesta_Otros"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_No_Disponible", $datos["SA_Sentido_Respuesta_No_Disponible"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Sentido_Respuesta_Suma_Total", $datos["SA_Sentido_Respuesta_Suma_Total"], PDO::PARAM_STR);
            $stmt -> bindParam(":SA_Archivo", $datos["SA_Archivo"], PDO::PARAM_STR);

            if($stmt->execute()){
  
               return "ok";
         
             }else{
          
               return "error";
             
             }
         
             $stmt->close();
             $stmt = null;


       }


       /* =========== ELIMINAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 

         static public function mdlBorrarRegistroArco($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSAR = :idSAR");
      
            $stmt -> bindParam(":idSAR", $datos, PDO::PARAM_INT);
      
            if($stmt -> execute()){
      
            return "ok";
            
            }else{
      
            return "error";	
      
            }
      
            $stmt -> close();
      
            $stmt = null;
      
         }

      /*=========== METODO PDF - MOSTRAR DATOS SOLICITUD ARCO =========*/

         static public function mdlMostrarPDFSolicitudArco($tabla, $item, $valor){

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

             /* ===========================  ACTIVAR EL ESTADO DEL USUARIO  ================================== */

         static public function mdlActualizarEstadoSolicitudesArco($tabla,$item1,$valor1,$item2,$valor2, $item3, $valor3){
                  
               $statement = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item3 = :$item3 WHERE $item2 = :$item2" );
      
               $statement -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
      
               $statement ->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

               $statement ->bindParam(":".$item3, $valor3, PDO::PARAM_STR);
      
               if ($statement ->execute()) {
                  
                  return "ok";
      
               }else {
      
                  return "error";
      
               }
      
               $statement -> close();
               
               $statement = null;
      
      
         } // End function mdlActualizarEstadoUsuario



        } // Modelo Solicitudes Arco



?>