<?php

    class ControladorSolicitudesArco{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

    static public function ctrMostrarTablaAR($itemCodigo, $valor){

        /* Tabla Solicitudes de Arco */
             $tabla = "solicitudes_arco";
        /* Campos Solicitudes de Arco */
            //$so = "SA_Nombre_Sujeto_Obligado";
            //$ip = "SA_Informe_Presentado";
            //$ipa = "SA_Anios";
            //$tsi = "SA_TOTAL_SOLICITUDES";
            //$fe = "SA_Fecha";
            
            $respuesta = ModeloSolicitudesArco::ctrMostrarTablaAR($itemCodigo,$valor,$tabla);
        
            return $respuesta;

            //var_dump($respuesta);

            
    } // Mostrar Tablas ARCO


    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
    
        static public function ctrAgregarSolicitudesArco(){
            
            if (isset($_POST["nuevoAnioSA"])) {
                
                // Agregado el SO a la Tabla, mediante su Sesión.
                $SObligado = $_SESSION["nombre_Informe"];

                // Agregamos Tabla
                $tablaSA = "solicitudes_arco";

                // Concatenacion Codigo "InformePresentado + Año" 
                $espacio = " ";

                $CodigoIPA = $_POST["nuevoTipoInformeSA"].$espacio.$_POST["nuevoAnioSA"];

                // Ingresamos el Codigo Unico del Sujeto Obligado

                $Codigo = $_SESSION["codigo"];

                // Ingresamos carpeta de Solicitudes Arco

                $CarpataSA = "SolicitudesArco";

                // Ingresamos carpeta de Solicitudes Arco

                $CarpataAdicionalSA = "Solicitudes Arco";

                 // Se inserta EJEMPLO A.1 1er Informe Bimestral 2022

                $CodigoTipoInformeAniosSA = $Codigo.$espacio.$CodigoIPA;

                // Se inserta EJEMPLO A.1 1er Informe Bimestral Solicitudes ARco 2022

                $CodigoUnicoInformeAnioSI = $Codigo.$espacio.$_POST["nuevoTipoInformeSA"].$espacio.$CarpataAdicionalSA.$espacio.$_POST["nuevoAnioSA"];

              /* ================= VALIDAR ARCHIVO PDF =================*/

                 $rutaSA = "";

                 $espacio = " ";

                 $Anios = $_POST["nuevoAnioSA"];

                 if (isset($_FILES["nuevoArchivoSA"]["tmp_name"])) {

                  /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF SI ==========================*/
                
            
                  $directorioArchivo = "vistas/pdfs/informes/".$Codigo;

                  mkdir($directorioArchivo, 0755);

                  $directorioArchivo2 = "vistas/pdfs/informes/".$Codigo."/".$Anios;

                  mkdir($directorioArchivo2, 0755);  

                  $directorioArchivo3 = "vistas/pdfs/informes/".$Codigo."/".$Anios."/".$CarpataSA;

                  mkdir($directorioArchivo3, 0755);


                  /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                  $aletorio = mt_rand(100,999);

                  if ($_FILES["nuevoArchivoSA"]["type"] == "application/pdf") {
                        
                    $rutaSA = "vistas/pdfs/informes/".$Codigo."/".$Anios."/".$CarpataSA."/".$CodigoIPA.$espacio.$SObligado.".pdf";

                    move_uploaded_file ($_FILES["nuevoArchivoSA"]["tmp_name"], $rutaSA);

                    }

                }

                /* datos - Array */

               $datos = array ("SA_Codigo_SO" => $Codigo,
                               "SA_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioSI,
                               "SA_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAniosSA,
                               "SA_Codigo_Informe_Anios" => $CodigoIPA,
                               "SA_Nombre_Sujeto_Obligado" => $SObligado,
                               "SA_Informe_Presentado" => $_POST["nuevoTipoInformeSA"],
                               "SA_Anios" => $_POST["nuevoAnioSA"], 
                               "SA_TOTAL_SOLICITUDES" => $_POST["nuevoSA_Total"],
                                //"** Medio de Presentación **",
                               "SA_Medio_Presentacion_Personal_Escrito" => $_POST["nuevoSA_MP_Personal_Escrito"],
                               "SA_Medio_Presentacion_Correo_Electronico" => $_POST["nuevoSA_MP_Correo_Electronico"],
                               "SA_Medio_Presentacion_Sistema_Infomex" => $_POST["nuevoSA_MP_Sistema_Informex"],
                               "SA_Medio_Presentacion_PNT" => $_POST["nuevoSA_MP_PNT"],
                               "SA_Medio_Presentacion_No_disponible" => $_POST["nuevoSA_MP_No_Disponible"],
                               "SA_Medio_Presentacion_Suma_Total" => $_POST["nuevoSA_MP_Suma_Total"],
                               //"** Tipo_Solicitud **",
                               "SA_Tipo_Solicitante_Persona_Fisica" => $_POST["nuevoSA_TS_Persona_Fisica"],
                               "SA_Tipo_Solicitante_Persona_Moral" => $_POST["nuevoSA_TS_Personal_Moral"],
                               "SA_Tipo_Solicitante_No_Disponible" => $_POST["nuevoSA_TS_No_Disponible"],
                               "SA_Tipo_Solicitante_Suma_Total" => $_POST["nuevoSA_TS_Suma_Total"],
                               //"** Genero_Solicitante **",
                               "SA_Genero_Solicitante_Femenino" => $_POST["nuevoSA_GS_Femenino"],
                               "SA_Genero_Solicitante_Masculino" => $_POST["nuevoSA_GS_Masculino"],
                               "SA_Genero_Solicitante_Anonimo" => $_POST["nuevoSA_GS_Anonimo"],
                               "SA_Genero_Solicitante_No_Disponible" => $_POST["nuevoSA_GS_No_Disponible"],
                               "SA_Genero_Solicitante_Suma_Total" => $_POST["nuevoSA_GS_Suma_Total"],
                               //"** Informacion_Solicitada **",
                               "SA_Informacion_Solicitada_Acceso" => $_POST["nuevoSA_IS_Acceso"],
                               "SA_Informacion_Solicitada_Rectificacion" => $_POST["nuevoSA_IS_Rectificación"],
                               "SA_Informacion_Solicitada_Oposicion" => $_POST["nuevoSA_IS_Oposición"],
                               "SA_Informacion_Solicitada_Cancelacion" => $_POST["nuevoSA_IS_Cancelacion"],
                               "SA_Informacion_Solicitada_Otro" => $_POST["nuevoSA_IS_Otro"],
                               "SA_Informacion_Solicitada_No_Disponible" => $_POST["nuevoSA_IS_No_Disponible"],
                               "SA_Informacion_Solicitada_Suma_Total" => $_POST["nuevoSA_IS_Suma_Total"],
                               //"** Tramites **",
                               "SA_Tramites_Concluidas" => $_POST["nuevoSA_T_Solicitudes_Concluidas"],
                               "SA_Tramites_Pendientes" => $_POST["nuevoSA_T_Solicitudes_Pendientes"],
                               "SA_Tramites_No_Disponible" => $_POST["nuevoSA_T_No_Disponible"],
                               "SA_Tramites_Suma_Total" => $_POST["nuevoSA_T_Suma_Total"],
                               //"** Modalidad_Respuesta **",
                               "SA_Modalidad_Respuesta_Medios_Electronicos" => $_POST["nuevoSA_MR_Medios_electronicos"],
                               "SA_Modalidad_Respuesta_Copia_Simple" => $_POST["nuevoSA_MR_Copia_Simple"],
                               "SA_Modalidad_Respuesta_Consulta_Directa" => $_POST["nuevoSA_MR_Consulta_Directa"],
                               "SA_Modalidad_Respuesta_Copia_Certificada" => $_POST["nuevoSA_MR_Copia_Certificada"],
                               "SA_Modalidad_Respuesta_Otro" => $_POST["nuevoSA_MR_Otro"],
                               "SA_Modalidad_Respuesta_No_Disponible" => $_POST["nuevoSA_MR_No_Disponible"],
                               "SA_Modalidad_Respuesta_Suma_Total" => $_POST["nuevoSA_MR_Suma_Total"],
                               //"** Sentido_Respuesta **",
                               "SA_Sentido_Respuesta_Informacion" => $_POST["nuevoSA_SR_Informacion_Total"],
                               "SA_Sentido_Respuesta_Informacion_Parcial" => $_POST["nuevoSA_SR_Informacion_Parcial"],
                               "SA_Sentido_Respuesta_Negada_Clasificacion" => $_POST["nuevoSA_SR_Negada_Clasificación"],
                               "SA_Sentido_Respuesta_Inexistencia_Informacion" => $_POST["nuevoSA_SR_Inexistencia_Informacion"],
                               "SA_Sentido_Respuesta_Mixta" => $_POST["nuevoSA_SR_Mixta"],
                               "SA_Sentido_Respuesta_No_Aclarada" => $_POST["nuevoSA_SR_No_Aclarada"],
                               "SA_Sentido_Respuesta_Orientada" => $_POST["nuevoSA_SR_Orientada"],
                               "SA_Sentido_Respuesta_En_Tramite" => $_POST["nuevoSA_SR_En_Tramite"],
                               "SA_Sentido_Respuesta_Improcedente" => $_POST["nuevoSA_SR_Improcedente"],
                               "SA_Sentido_Respuesta_Otros" => $_POST["nuevoSA_SR_Otros"],
                               "SA_Sentido_Respuesta_No_Disponible" => $_POST["nuevoSA_SR_No_Disponible"],
                               "SA_Sentido_Respuesta_Suma_Total" => $_POST["nuevoSA_SR_Suma_Total"],
                               "SA_Archivo" => $rutaSA
                            
                            );

               $respuesta = ModeloSolicitudesArco::MdlAgregarSA($tablaSA, $datos);

               if($respuesta == "ok"){

                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡La Solicitud de Informes ARCO, ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "solicitudes-arco";

                            }

                        });
                    

                        </script>';

                } // if

            } // if 

        } // Funcion para agregar Solitud Arco

        /* ================  EDITAR - MOSTRAR LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   ================= */ 

        static public function ctrMostrarSolicitudArcoEditar($item, $valor){

            $tabla = "solicitudes_arco";
        
            $respuesta = ModeloSolicitudesArco::mdlMostrarRegistroArcoEditarSI($tabla, $item, $valor);
        
            return $respuesta;
        
        }

        /* ================  EDITAR - LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   ================= */ 

        static public function ctrActualizarSolicitudArco(){

          if(isset($_POST["EditarSA_MP_Personal_Escrito"])) {

            $tabla = "solicitudes_arco";

            $datos = array( 
                            "SA_Informe_Presentado"=> $_POST["EditarTipoInformeSA"],
                            "SA_Anios"=> $_POST["EditarAnioSA"],
                            "SA_TOTAL_SOLICITUDES"=> $_POST["EditarSA_Total"],
                            "SA_Medio_Presentacion_Personal_Escrito"=> $_POST["EditarSA_MP_Personal_Escrito"],
                            "SA_Medio_Presentacion_Correo_Electronico"=> $_POST["EditarSA_MP_Correo_Electronico"],
                            "SA_Medio_Presentacion_Sistema_Infomex"=> $_POST["EditarSA_MP_Sistema_Informex"],
                            "SA_Medio_Presentacion_PNT"=> $_POST["EditarSA_MP_PNT"],
                            "SA_Medio_Presentacion_No_disponible" => $_POST["EditarSA_MP_No_Disponible"],
                            "SA_Medio_Presentacion_Suma_Total"=> $_POST["EditarSA_MP_Suma_Total"]);

                            $respuesta = ModeloSolicitudesArco::mdlEditarSolicitudArco($tabla, $datos);

                            if($respuesta == "ok"){
            
                                    echo'<script>
                    
                                    swal({
                                      type: "success",
                                      title: "El Informe ARCO, ha sido cambiado correctamente",
                                      showConfirmButton: true,
                                      confirmButtonText: "Cerrar"
                                      }).then(function(result){
        
                                        if (result.value) {
                    
                                          window.location = "solicitudes-arco";
                    
                                      }
        
                                    })
                    
                              </script>';
              
                            }


          }

          
        }
          
      /* ================  EDITAR - LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   ================= */ 

        static public function ctrActualizarSolicitudArco2(){
 
         if (isset($_POST["EditarAnioSolicitudesArco"])) {

          $tabla = "solicitudes_arco";
          
          /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

          $SObligadoA = $_SESSION["nombre_Informe"];

          $CodigoA = $_SESSION["codigo"];
  
          $AniosA = $_POST["EditarAnioSolicitudesArco"];
  
          $espacio = " ";
  
          $CodigoIPAA = $_POST["EditarTipoInformeSolicitudesArco"].$espacio.$_POST["EditarAnioSolicitudesArco"];

          $CarpataSAA = "SolicitudesArco";

          /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

          $rutaArchivoSAA = $_POST["archivoActualSA"];

          if (isset($_FILES["editarArchivoSA"]["tmp_name"]) && !empty($_FILES["editarArchivoSA"]["tmp_name"])){

            /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
            
            $directorioArchivoSA = "vistas/pdfs/informes/".$CodigoA."/".$AniosA."/".$CarpataSAA;

            /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

            if(!empty($_POST["archivoActualSA"])){
                
                unlink($_POST["archivoActualSA"]);

            } else {
                
                mkdir($directorioArchivoSA, 0775);

            }

            /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

            $aletorio = mt_rand(100,999);

            if ($_FILES["editarArchivoSA"]["type"] == "application/pdf") {
                
                $rutaArchivoSAA = "vistas/pdfs/informes/".$CodigoA."/".$AniosA."/".$CarpataSAA."/".$CodigoIPAA.$espacio.$SObligadoA.".pdf";

                move_uploaded_file ($_FILES["editarArchivoSA"]["tmp_name"], $rutaArchivoSAA);

            }

        }

            $datos = array("SA_Informe_Presentado" => $_POST["EditarTipoInformeSolicitudesArco"],
                            "SA_Anios" => $_POST["EditarAnioSolicitudesArco"],
                            "SA_TOTAL_SOLICITUDES" => $_POST["EditarSolicitudesArco_Total"],

                            "SA_Medio_Presentacion_Personal_Escrito" => $_POST["EditarSolicitudesArco_MP_Personal_Escrito"],
                            "SA_Medio_Presentacion_Correo_Electronico" => $_POST["EditarSolicitudesArco_MP_Correo_Electronico"],
                            "SA_Medio_Presentacion_Sistema_Infomex" => $_POST["EditarSolicitudesArco_MP_Sistema_Informex"],
                            "SA_Medio_Presentacion_PNT" => $_POST["EditarSolicitudesArco_MP_PNT"],
                            "SA_Medio_Presentacion_No_disponible" => $_POST["EditarSolicitudesArco_MP_No_Disponible"],
                            "SA_Medio_Presentacion_Suma_Total" => $_POST["EditarSolicitudesArco_MP_Suma_Total"],

                            "SA_Tipo_Solicitante_Persona_Fisica" => $_POST["EditarSolicitudesArco_TS_Persona_Fisica"],
                            "SA_Tipo_Solicitante_Persona_Moral" => $_POST["EditarSolicitudesArco_TS_Personal_Moral"],
                            "SA_Tipo_Solicitante_No_Disponible" => $_POST["EditarSolicitudesArco_TS_No_Disponible"],
                            "SA_Tipo_Solicitante_Suma_Total" => $_POST["EditarSolicitudesArco_TS_Suma_Total"],

                            "SA_Genero_Solicitante_Femenino" => $_POST["EditarSolicitudesArco_GS_Femenino"],
                            "SA_Genero_Solicitante_Masculino" => $_POST["EditarSolicitudesArco_GS_Masculino"],
                            "SA_Genero_Solicitante_Anonimo" => $_POST["EditarSolicitudesArco_GS_Anonimo"],
                            "SA_Genero_Solicitante_No_Disponible" => $_POST["EditarSolicitudesArco_GS_No_Disponible"],
                            "SA_Genero_Solicitante_Suma_Total" => $_POST["EditarSolicitudesArco_GS_Suma_Total"],

                            "SA_Informacion_Solicitada_Acceso" => $_POST["EditarSolicitudesArco_IS_Acceso"],
                            "SA_Informacion_Solicitada_Rectificacion" => $_POST["EditarSolicitudesArco_IS_Rectificación"],
                            "SA_Informacion_Solicitada_Oposicion" => $_POST["EditarSolicitudesArco_IS_Oposición"],
                            "SA_Informacion_Solicitada_Cancelacion" => $_POST["EditarSolicitudesArco_IS_Cancelacion"],
                            "SA_Informacion_Solicitada_Otro" => $_POST["EditarSolicitudesArco_IS_Otro"],
                            "SA_Informacion_Solicitada_No_Disponible" => $_POST["EditarSolicitudesArco_IS_No_Disponible"],
                            "SA_Informacion_Solicitada_Suma_Total" => $_POST["EditarSolicitudesArco_IS_Suma_Total"],

                            "SA_Tramites_Concluidas" => $_POST["EditarSolicitudesArco_T_Solicitudes_Concluidas"],
                            "SA_Tramites_Pendientes" => $_POST["EditarSolicitudesArco_T_Solicitudes_Pendientes"],
                            "SA_Tramites_No_Disponible" => $_POST["EditarSolicitudesArco_T_No_Disponible"],
                            "SA_Tramites_Suma_Total" => $_POST["EditarSolicitudesArco_T_Suma_Total"],

                            "SA_Modalidad_Respuesta_Medios_Electronicos" => $_POST["EditarSolicitudesArco_MR_Medios_electronicos"],
                            "SA_Modalidad_Respuesta_Copia_Simple" => $_POST["EditarSolicitudesArco_MR_Copia_Simple"],
                            "SA_Modalidad_Respuesta_Consulta_Directa" => $_POST["EditarSolicitudesArco_MR_Consulta_Directa"],
                            "SA_Modalidad_Respuesta_Copia_Certificada" => $_POST["EditarSolicitudesArco_MR_Copia_Certificada"],
                            "SA_Modalidad_Respuesta_Otro" => $_POST["EditarSolicitudesArco_MR_Otro"],
                            "SA_Modalidad_Respuesta_No_Disponible" => $_POST["EditarSolicitudesArco_MR_No_Disponible"],
                            "SA_Modalidad_Respuesta_Suma_Total" => $_POST["EditarSolicitudesArco_MR_Suma_Total"],

                            "SA_Sentido_Respuesta_Informacion" => $_POST["EditarSolicitudesArco_SR_Informacion_Total"],
                            "SA_Sentido_Respuesta_Informacion_Parcial" => $_POST["EditarSolicitudesArco_SR_Informacion_Parcial"],
                            "SA_Sentido_Respuesta_Negada_Clasificacion" => $_POST["EditarSolicitudesArco_SR_Negada_Clasificación"],
                            "SA_Sentido_Respuesta_Inexistencia_Informacion" => $_POST["EditarSolicitudesArco_SR_Inexistencia_Informacion"],
                            "SA_Sentido_Respuesta_Mixta" => $_POST["EditarSolicitudesArco_SR_Mixta"],
                            "SA_Sentido_Respuesta_No_Aclarada" => $_POST["EditarSolicitudesArco_SR_No_Aclarada"],
                            "SA_Sentido_Respuesta_Orientada" => $_POST["EditarSolicitudesArco_SR_Orientada"],
                            "SA_Sentido_Respuesta_En_Tramite" => $_POST["EditarSolicitudesArco_SR_En_Tramite"],
                            "SA_Sentido_Respuesta_Improcedente" => $_POST["EditarSolicitudesArco_SR_Improcedente"],
                            "SA_Sentido_Respuesta_Otros" => $_POST["EditarSolicitudesArco_SR_Otros"],
                            "SA_Sentido_Respuesta_No_Disponible" => $_POST["EditarSolicitudesArco_SR_No_Disponible"],
                            "SA_Sentido_Respuesta_Suma_Total" => $_POST["EditarSolicitudesArco_SR_Suma_Total"],
                            "SA_Archivo" => $rutaArchivoSAA

                          );

                            $respuesta = ModeloSolicitudesArco::mdlEditarSolicitudArco2($tabla, $datos);

                            if($respuesta == "ok"){
                    
                              echo'<script>
              
                              swal({
                                type: "success",
                                title: "El Informe ARCO, ha sido cambiado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){

                                  if (result.value) {
              
                                    window.location = "solicitudes-arco";
              
                                }

                              })
              
                        </script>';
              
                      }
            
            }



          }

        /* =========== MOSTRAR DATOS TABLA - SOLICITUDES ARCO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

        static public function ctrBorrarRegistroSolicitudArco(){

            if(isset($_GET["idSAR"])){
      
              $tabla ="solicitudes_arco";

              $espacio = " ";

              $CarpataSAB = "SolicitudesArco";

              $datos = $_GET["idSAR"];

              if($_GET["archivoSA"] != ""){

                unlink($_GET["archivoSA"]);
      
                rmdir('vistas/pdfs/informes/'.$_GET["codigo"]."/".$_GET["anios"]."/".$CarpataSAB);

                rmdir('vistas/pdfs/informes/'.$_GET["codigo"]."/".$_GET["anios"]);
        
              }

              $respuesta = ModeloSolicitudesArco::mdlBorrarRegistroArco($tabla, $datos);
        
              if($respuesta == "ok"){
        
                echo'<script>
        
                  swal({
                      type: "success",
                      title: "El Registro, ha sido borrada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                          if (result.value) {
        
                          window.location = "solicitudes-arco";
        
                          }
                        })
        
                  </script>';
      
              } // if 
      
            } // if 
            
          }// function

    /* =================== METODO PDF - MOSTRAR DATOS INDIVUDALES REGISTRADOS POR USUARIO =============== */

    static public function ctrMostrarPDFSolicitudesArco($item, $valor){

      $tabla = "solicitudes_arco";

      $respuesta = ModeloSolicitudesArco::mdlMostrarPDFSolicitudArco($tabla,$item,$valor);

      return $respuesta;

    }


} // ControladorSolicitudesArco

?>