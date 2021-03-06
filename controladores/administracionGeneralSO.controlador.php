<?php

    class ControladorAdministracionGeneralSO{

      // FUNCION PARA MOSTRAR TODOS LOS SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR

          static public function ctrMostrarTablaAdministracionGeneralSO($Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

            $tablaSI = "solicitudes_informacion";
  
            $tablaSA = "solicitudes_arco";
  
            $TablaCA = "Capacitaciones";
  
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);
  
            return $respuesta;
  
          }

       // FUNCION PARA ACTUALIZAR TABLA MODAL 

          static public function  ctrAdministracionGeneralSOModal(){
            
            if(isset($_POST["EditarSORSI"]) && isset($_POST["EditarSORSA"]) && isset($_POST["EditarSORSA"]) ){

              $TablaSI = "solicitudes_informacion";

              $TablaSA = "solicitudes_arco";

              $TablaCA = "capacitaciones";

              $Obtener_SI_Codigo_Tipo_Informe_Anios = "SI_Codigo_Tipo_Informe_Anios";

              $Obtener_SA_Codigo_Tipo_Informe_Anios = "SA_Codigo_Tipo_Informe_Anios";

              $Obtener_CA_Codigo_Tipo_Informe_Anios = "CA_Codigo_Tipo_Informe_Anios";

              /*================= AGREGAR PFD DE REQUERIMIENTO =========================*/

              $rutaSIRequerimiento = "";

              $espacio = " ";

              //$codigoRequerimientoSO = $_SESSION["codigo"];

              //$SObligado = $_SESSION["nombre_Informe"];

              $anios = $_POST["EditarSOANIOSI"];

              $CarpetaSI = "SolicitudesInformacion";

              $CarpetaPrivadaSI = "Privada";

              $RequerimientoSI = "Requerimiento - Amonestaci??n Privada";

              $SujetoObligadoSI = $_POST["EditarNombreSujetoObligadoRSI"];

              $codigoRequerimientoSO = $_POST["EditarCodigoSujetoObligadoRSI"];

              $InformeRequerimientoSI = $_POST["EditarSOSI"];

              /* ==================================================================================================================
                 ==================================================================================================================
                 ================== REQUERIMIENTO PARA AMONESTACIONES PRIVADAS - SOLICITUDES DE INFORMACI??N =======================
                 ==================================================================================================================
                 ================================================================================================================== */

              if ($_FILES["editarArchivoRequerimientoSI"] != "") {

                /*================ VALIDAR REQUERIMIENTO SOLICITUD DE INFORMACION - ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaSIRequerimiento = $_POST["archivoActualRequerimientoSI"];

                if (isset($_FILES["editarArchivoRequerimientoSI"]["tmp_name"]) && !empty($_FILES["editarArchivoRequerimientoSI"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                    
                    $directorioArchivo = "vistas/pdfs/requerimientos/".$anios;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$anios."/".$CarpetaPrivadaSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$codigoRequerimientoSO;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$codigoRequerimientoSO."/".$CarpetaSI;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualRequerimientoSI"])){
                        
                        unlink($_POST["archivoActualRequerimientoSI"]);

                    } else {
                        
                        mkdir($directorioArchivo, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoRequerimientoSI"]["type"] == "application/pdf") {
                        
                      $rutaSIRequerimiento = "vistas/pdfs/requerimientos/".$anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$codigoRequerimientoSO."/".$CarpetaSI."/".$RequerimientoSI.$espacio.$InformeRequerimientoSI.$espacio.$SujetoObligadoSI.$espacio.$anios.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoRequerimientoSI"]["tmp_name"], $rutaSIRequerimiento);

                    }

                }     

              } else{

                $rutaSIRequerimiento = $_POST["archivoActualRequerimientoSI"];

              } 

           /* ==================================================================================================================
              ==================================================================================================================
              ================== REQUERIMIENTO PARA AMONESTACIONES PUBLICA - SOLICITUDES DE INFORMACI??N =======================
              ==================================================================================================================
              ================================================================================================================== */

              $CarpetapublicaSI = "Publica";

              $RequerimientoPublicaSI = "Requerimiento - Amonestaci??n P??blica";

              $rutaSIRequerimientoPublico = "";

              $aniosPublicoSI = $_POST["EditarSOANIOSI"];

              $SujetoObligadoPublicoSI = $_POST["EditarNombreSujetoObligadoRSI"];

              $codigoRequerimientoPublicoSISO = $_POST["EditarCodigoSujetoObligadoRSI"];

              $InformeRequerimientoPublicoSI = $_POST["EditarSOSI"];



              if ($_FILES["editarArchivoRequerimientoPublicaSI"] != "") {

                /*================ VALIDAR REQUERIMIENTO SOLICITUD DE INFORMACION - ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaSIRequerimientoPublico = $_POST["archivoActualRequerimientoPublicaSI"];

                if (isset($_FILES["editarArchivoRequerimientoPublicaSI"]["tmp_name"]) && !empty($_FILES["editarArchivoRequerimientoPublicaSI"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                    
                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosPublicoSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosPublicoSI."/".$CarpetapublicaSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosPublicoSI."/".$CarpetapublicaSI."/".$InformeRequerimientoPublicoSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosPublicoSI."/".$CarpetapublicaSI."/".$InformeRequerimientoPublicoSI."/".$codigoRequerimientoPublicoSISO;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosPublicoSI."/".$CarpetapublicaSI."/".$InformeRequerimientoPublicoSI."/".$codigoRequerimientoPublicoSISO."/".$CarpetaSI;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualRequerimientoPublicaSI"])){
                        
                        unlink($_POST["archivoActualRequerimientoPublicaSI"]);

                    } else {
                        
                        mkdir($rutaSIRequerimientoPublico, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoRequerimientoPublicaSI"]["type"] == "application/pdf") {
                        
                      $rutaSIRequerimientoPublico = "vistas/pdfs/requerimientos/".$aniosPublicoSI."/".$CarpetapublicaSI."/".$InformeRequerimientoPublicoSI."/".$codigoRequerimientoPublicoSISO."/".$CarpetaSI."/".$RequerimientoPublicaSI.$espacio.$InformeRequerimientoPublicoSI.$espacio.$SujetoObligadoPublicoSI.$espacio.$aniosPublicoSI.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoRequerimientoPublicaSI"]["tmp_name"], $rutaSIRequerimientoPublico);

                    }

                }     

              } else{

                $rutaSIRequerimientoPublico = $_POST["archivoActualRequerimientoPublicaSI"];

              } 

           /* ==================================================================================================================
              ==================================================================================================================
              ================================= OBSERVACIONES - SOLICITUDES DE INFORMACI??N ====================================
              ==================================================================================================================
              ================================================================================================================== */
              
              $CarpetaObservacionesSI = "Observaciones";

              $ObservacionesSI = "Observaciones";

              $rutaSIObservaciones = "";

              $aniosObservacionesSI = $_POST["EditarSOANIOSI"];

              $SujetoObligadoObservacionesSI = $_POST["EditarNombreSujetoObligadoRSI"];

              $codigoObservacionesSISO = $_POST["EditarCodigoSujetoObligadoRSI"];

              $InformeObservacionesSI = $_POST["EditarSOSI"];



              if ($_FILES["editarArchivoObservacionesSI"] != "") {

                /*================ VALIDAR REQUERIMIENTO SOLICITUD DE INFORMACION - ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaSIObservaciones = $_POST["archivoActualObservacionesSI"];

                if (isset($_FILES["editarArchivoObservacionesSI"]["tmp_name"]) && !empty($_FILES["editarArchivoObservacionesSI"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                    
                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSI."/".$CarpetaObservacionesSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSI."/".$CarpetaObservacionesSI."/".$InformeObservacionesSI;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSI."/".$CarpetaObservacionesSI."/".$InformeObservacionesSI."/".$codigoObservacionesSISO;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSI."/".$CarpetaObservacionesSI."/".$InformeObservacionesSI."/".$codigoObservacionesSISO."/".$CarpetaSI;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualObservacionesSI"])){
                        
                        unlink($_POST["archivoActualObservacionesSI"]);

                    } else {
                        
                        mkdir($rutaSIObservaciones, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoObservacionesSI"]["type"] == "application/pdf") {
                        
                      $rutaSIObservaciones = "vistas/pdfs/observaciones/".$aniosObservacionesSI."/".$CarpetaObservacionesSI."/".$InformeObservacionesSI."/".$codigoObservacionesSISO."/".$CarpetaSI."/".$ObservacionesSI.$espacio.$InformeObservacionesSI.$espacio.$SujetoObligadoObservacionesSI.$espacio.$aniosObservacionesSI.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoObservacionesSI"]["tmp_name"], $rutaSIObservaciones);

                    }

                }     

              } else{

                $rutaSIObservaciones = $_POST["archivoActualObservacionesSI"];

              } 



           /* ==================================================================================================================
              ==================================================================================================================
              ================== REQUERIMIENTO PARA AMONESTACIONES PRIVADA - SOLICITUD ARCO ====================================
              ==================================================================================================================
              ================================================================================================================== */

              $aniosSA = $_POST["EditarSOANIOSA"];

              $CarpetaSA = "SolicitudesArco";

              //$CarpetaRequerimientoSA = "Requerimiento";

              $CarpetaprivadaSA = "Privada";

              $RequerimientoSA = "Requerimiento - Amonestaci??n Privada";

              $SujetoObligadoSA = $_POST["EditarNombreSujetoObligadoRSA"];

              $codigoRequerimientoSOSA = $_POST["EditarCodigoSujetoObligadoRSA"];

              $InformeRequerimientoSA = $_POST["EditarSOSA"];

              /*================ VALIDAR REQUERIMIENTO SOLICITUD ARCO - ARCHIVO PDF PARA ACTUALIZAR ===================== */
              
              if ($_FILES["editarArchivoRequerimientoSA"] != "") {

                /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaSARequerimiento = $_POST["archivoActualRequerimientoSA"];

                if (isset($_FILES["editarArchivoRequerimientoSA"]["tmp_name"]) && !empty($_FILES["editarArchivoRequerimientoSA"]["tmp_name"])){

                  /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaprivadaSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaprivadaSA."/".$InformeRequerimientoSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaprivadaSA."/".$InformeRequerimientoSA."/".$codigoRequerimientoSOSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaprivadaSA."/".$InformeRequerimientoSA."/".$codigoRequerimientoSOSA."/".$CarpetaSA;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualRequerimientoSA"])){
                        
                        unlink($_POST["archivoActualRequerimientoSA"]);

                    } else {
                        
                        mkdir($directorioArchivo, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoRequerimientoSA"]["type"] == "application/pdf") {
                        
                      $rutaSARequerimiento = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaprivadaSA."/".$InformeRequerimientoSA."/".$codigoRequerimientoSOSA."/".$CarpetaSA."/".$RequerimientoSA.$espacio.$InformeRequerimientoSA.$espacio.$SujetoObligadoSA.$espacio.$aniosSA.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoRequerimientoSA"]["tmp_name"], $rutaSARequerimiento);

                    }

                }     

              } else{

                $rutaSARequerimiento = $_POST["archivoActualRequerimientoSA"];

              }
              
         /* ==================================================================================================================
            ==================================================================================================================
            ================== REQUERIMIENTO PARA AMONESTACIONES PUBLICA - SOLICITUD ARCO ====================================
            ==================================================================================================================
            ================================================================================================================== */

            $rutaSARequerimientoPublicaSA = "";

            $aniosSA = $_POST["EditarSOANIOSA"];

            $CarpetaSA = "SolicitudesArco";

            //$CarpetaRequerimientoSA = "Requerimiento";

            $CarpetaPublicaSA = "Publica";

            /*================ VALIDAR REQUERIMIENTO SOLICITUD ARCO - ARCHIVO PDF PARA ACTUALIZAR ===================== */
            
            if ($_FILES["editarArchivoRequerimientoPublicaSA"] != "") {

              /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

              $rutaSARequerimientoPublicaSA = $_POST["archivoActualRequerimientoPublicaSA"];

              if (isset($_FILES["editarArchivoRequerimientoPublicaSA"]["tmp_name"]) && !empty($_FILES["editarArchivoRequerimientoPublicaSA"]["tmp_name"])){

                /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/

                  $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA;

                  mkdir($directorioArchivo, 0775);

                  $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaPublicaSA;

                  mkdir($directorioArchivo, 0775);

                  $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaPublicaSA."/".$InformeRequerimientoSA;

                  mkdir($directorioArchivo, 0775);

                  $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaPublicaSA."/".$InformeRequerimientoSA."/".$codigoRequerimientoSOSA;

                  mkdir($directorioArchivo, 0775);

                  $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaPublicaSA."/".$InformeRequerimientoSA."/".$codigoRequerimientoSOSA."/".$CarpetaSA;

                  mkdir($directorioArchivo, 0775);

                  /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                  if(!empty($_POST["archivoActualRequerimientoPublicaSA"])){
                      
                      unlink($_POST["archivoActualRequerimientoPublicaSA"]);

                  } else {
                      
                      mkdir($directorioArchivo, 0775);

                  }

                  /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                  $aletorio = mt_rand(100,999);

                  if ($_FILES["editarArchivoRequerimientoPublicaSA"]["type"] == "application/pdf") {
                      
                    $rutaSARequerimientoPublicaSA = "vistas/pdfs/requerimientos/".$aniosSA."/".$CarpetaPublicaSA."/".$InformeRequerimientoSA."/".$codigoRequerimientoSOSA."/".$CarpetaSA."/".$RequerimientoSA.$espacio.$InformeRequerimientoSA.$espacio.$SujetoObligadoSA.$espacio.$aniosSA.".pdf";

                      move_uploaded_file ($_FILES["editarArchivoRequerimientoPublicaSA"]["tmp_name"], $rutaSARequerimientoPublicaSA);

                  }

              }     

            } else{

              $rutaSARequerimientoPublicaSA = $_POST["archivoActualRequerimientoPublicaSA"];

            }


            /* ==================================================================================================================
              ==================================================================================================================
              ================================= OBSERVACIONES - SOLICITUDES ARCO ====================================
              ==================================================================================================================
              ================================================================================================================== */
              
              $CarpetaObservacionesSA = "Observaciones";

              $ObservacionesSA = "Observaciones";

              $rutaSAObservaciones = "";

              $aniosObservacionesSA = $_POST["EditarSOANIOSA"];

              $SujetoObligadoObservacionesSA = $_POST["EditarNombreSujetoObligadoRSA"];

              $codigoObservacionesSASO = $_POST["EditarCodigoSujetoObligadoRSA"];

              $InformeObservacionesSA = $_POST["EditarSOSA"];


              if ($_FILES["editarArchivoObservacionesSA"] != "") {

                /*================ VALIDAR REQUERIMIENTO SOLICITUD DE INFORMACION - ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaSAObservaciones = $_POST["archivoActualObservacionesSA"];

                if (isset($_FILES["editarArchivoObservacionesSA"]["tmp_name"]) && !empty($_FILES["editarArchivoObservacionesSA"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                    
                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSA."/".$CarpetaObservacionesSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSA."/".$CarpetaObservacionesSA."/".$InformeObservacionesSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSA."/".$CarpetaObservacionesSA."/".$InformeObservacionesSA."/".$codigoObservacionesSASO;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesSA."/".$CarpetaObservacionesSA."/".$InformeObservacionesSA."/".$codigoObservacionesSASO."/".$CarpetaSA;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualObservacionesSA"])){
                        
                        unlink($_POST["archivoActualObservacionesSA"]);

                    } else {
                        
                        mkdir($rutaSAObservaciones, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoObservacionesSA"]["type"] == "application/pdf") {
                        
                      $rutaSAObservaciones = "vistas/pdfs/observaciones/".$aniosObservacionesSA."/".$CarpetaObservacionesSA."/".$InformeObservacionesSA."/".$codigoObservacionesSASO."/".$CarpetaSA."/".$ObservacionesSA.$espacio.$InformeObservacionesSA.$espacio.$SujetoObligadoObservacionesSA.$espacio.$aniosObservacionesSA.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoObservacionesSA"]["tmp_name"], $rutaSAObservaciones);

                    }

                }     

              } else{

                $rutaSAObservaciones = $_POST["archivoActualObservacionesSA"];

              }   


         /* ==================================================================================================================
            ==================================================================================================================
            ================== REQUERIMIENTO PARA REQUERIMIENTO CAPACITACIONES PRIVADA - CAPACITACIONES ======================
            ==================================================================================================================
            ================================================================================================================== */

              $aniosCA = $_POST["EditarSOANIOCA"];

              $CarpetaCA = "Capacitaciones";

              $CarpetaprivadaCA = "Privada";

              $CarpetaRequerimientoCA = "Requerimiento";

              $RequerimientoCA = "Requerimiento - Amonestaci??n Privada";

              $SujetoObligadoCA = $_POST["EditarNombreSujetoObligadoRCA"];

              $codigoRequerimientoSOSA = $_POST["EditarCodigoSujetoObligadoRCA"];

              $InformeRequerimientoCA = $_POST["EditarSOCA"];

              /*================ VALIDAR REQUERIMIENTO CAPACITACIONES - ARCHIVO PDF PARA ACTUALIZAR ===================== */
              
              if ($_FILES["editarArchivoRequerimientoCA"] != "") {

                /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaCARequerimiento = $_POST["archivoActualRequerimientoCA"];

                if (isset($_FILES["editarArchivoRequerimientoCA"]["tmp_name"]) && !empty($_FILES["editarArchivoRequerimientoCA"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA;

                    mkdir($directorioArchivo, 0775);
      
                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetaprivadaCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetaprivadaCA."/".$InformeRequerimientoCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetaprivadaCA."/".$InformeRequerimientoCA."/".$codigoRequerimientoSOSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetaprivadaCA."/".$InformeRequerimientoCA."/".$codigoRequerimientoSOSA."/".$CarpetaCA;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualRequerimientoCA"])){
                        
                        unlink($_POST["archivoActualRequerimientoCA"]);

                    } else {
                        
                        mkdir($directorioArchivo, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoRequerimientoCA"]["type"] == "application/pdf") {
                        
                      $rutaCARequerimiento = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetaprivadaCA."/".$InformeRequerimientoCA."/".$codigoRequerimientoSOSA."/".$CarpetaCA."/".$RequerimientoCA.$espacio.$InformeRequerimientoCA.$espacio.$SujetoObligadoCA.$espacio.$aniosCA.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoRequerimientoCA"]["tmp_name"], $rutaCARequerimiento);

                    }

                }     

              } else{

                $rutaCARequerimiento = $_POST["archivoActualRequerimientoCA"];

              }
              
            /* ==================================================================================================================
            ==================================================================================================================
            ================== REQUERIMIENTO PARA REQUERIMIENTO CAPACITACIONES PRIVADA - CAPACITACIONES ======================
            ==================================================================================================================
            ================================================================================================================== */

              /*================ VALIDAR REQUERIMIENTO CAPACITACIONES - ARCHIVO PDF PARA ACTUALIZAR ===================== */
              
              $CarpetapublicaCA = "Publica";

              $RequerimientopublicaCA = "Requerimiento - Amonestaci??n Publica";
              
              if ($_FILES["editarArchivoRequerimientoPublicaCA"] != "") {

                /*================ VALIDAR ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaCARequerimientoPublicaCA = $_POST["archivoActualRequerimientoPublicaCA"];

                if (isset($_FILES["editarArchivoRequerimientoPublicaCA"]["tmp_name"]) && !empty($_FILES["editarArchivoRequerimientoPublicaCA"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA;

                    mkdir($directorioArchivo, 0775);
      
                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetapublicaCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetapublicaCA."/".$InformeRequerimientoCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetapublicaCA."/".$InformeRequerimientoCA."/".$codigoRequerimientoSOSA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetapublicaCA."/".$InformeRequerimientoCA."/".$codigoRequerimientoSOSA."/".$CarpetaCA;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualRequerimientoPublicaCA"])){
                        
                        unlink($_POST["archivoActualRequerimientoPublicaCA"]);

                    } else {
                        
                        mkdir($directorioArchivo, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoRequerimientoPublicaCA"]["type"] == "application/pdf") {
                        
                      $rutaCARequerimientoPublicaCA = "vistas/pdfs/requerimientos/".$aniosCA."/".$CarpetapublicaCA."/".$InformeRequerimientoCA."/".$codigoRequerimientoSOSA."/".$CarpetaCA."/".$RequerimientopublicaCA.$espacio.$InformeRequerimientoCA.$espacio.$SujetoObligadoCA.$espacio.$aniosCA.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoRequerimientoPublicaCA"]["tmp_name"], $rutaCARequerimientoPublicaCA);

                    }

                }     

              } else{

                $rutaCARequerimientoPublicaCA = $_POST["archivoActualRequerimientoPublicaCA"];

              }


           /* ==================================================================================================================
              ==================================================================================================================
              ================================= OBSERVACIONES - CAPACITACIONES ====================================
              ==================================================================================================================
              ================================================================================================================== */
              
              $CarpetaObservacionesCA = "Observaciones";

              $ObservacionesCA = "Observaciones";

              $rutaCAObservaciones = "";

              $aniosObservacionesCA = $_POST["EditarSOANIOCA"];

              $SujetoObligadoObservacionesCA = $_POST["EditarNombreSujetoObligadoRCA"];

              $codigoObservacionesCASO = $_POST["EditarCodigoSujetoObligadoRCA"];

              $InformeObservacionesCA = $_POST["EditarSOCA"];


              if ($_FILES["editarArchivoObservacionesCA"] != "") {

                /*================ VALIDAR REQUERIMIENTO SOLICITUD DE INFORMACION - ARCHIVO PDF PARA ACTUALIZAR ===================== */

                $rutaCAObservaciones = $_POST["archivoActualObservacionesCA"];

                if (isset($_FILES["editarArchivoObservacionesCA"]["tmp_name"]) && !empty($_FILES["editarArchivoObservacionesCA"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                    
                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesCA."/".$CarpetaObservacionesCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesCA."/".$CarpetaObservacionesCA."/".$InformeObservacionesCA;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesCA."/".$CarpetaObservacionesCA."/".$InformeObservacionesCA."/".$codigoObservacionesCASO;

                    mkdir($directorioArchivo, 0775);

                    $directorioArchivo = "vistas/pdfs/observaciones/".$aniosObservacionesCA."/".$CarpetaObservacionesCA."/".$InformeObservacionesCA."/".$codigoObservacionesCASO."/".$CarpetaCA;

                    mkdir($directorioArchivo, 0775);

                    /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                    if(!empty($_POST["archivoActualObservacionesCA"])){
                        
                        unlink($_POST["archivoActualObservacionesCA"]);

                    } else {
                        
                        mkdir($rutaCAObservaciones, 0775);

                    }

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["editarArchivoObservacionesCA"]["type"] == "application/pdf") {
                        
                      $rutaCAObservaciones = "vistas/pdfs/observaciones/".$aniosObservacionesCA."/".$CarpetaObservacionesCA."/".$InformeObservacionesCA."/".$codigoObservacionesCASO."/".$CarpetaCA."/".$ObservacionesCA.$espacio.$InformeObservacionesCA.$espacio.$SujetoObligadoObservacionesCA.$espacio.$aniosObservacionesCA.".pdf";

                        move_uploaded_file ($_FILES["editarArchivoObservacionesCA"]["tmp_name"], $rutaCAObservaciones);

                    }

                }     

              } else{

                $rutaCAObservaciones = $_POST["archivoActualObservacionesCA"];

              }   

              $datos = array("idSI"=>$_POST["EditaridSI"],
                             "SI_Recepcion"=>$_POST["EditarSORSI"],
                             "SI_Observaciones_General"=>$_POST["EditarSOOGSI"],
                             "SI_Observaciones"=>$_POST["EditarSOOSI"],
                             "SI_Observaciones_Publica"=>$_POST["EditarSOOPSI"],
                             "SI_Observaciones_Generales" => $rutaSIObservaciones,
                             "SI_Requerimiento_Amonestacion_Privada" => $rutaSIRequerimiento,
                             "SI_Requerimiento_Amonestacion_Publica" => $rutaSIRequerimientoPublico,
                             "idSAR"=>$_POST["EditaridSA"],
                             "SA_Recepcion"=>$_POST["EditarSORSA"],
                             "SA_Observaciones_General"=>$_POST["EditarSOOGSA"],
                             "SA_Observaciones"=>$_POST["EditarSOOSA"],
                             "SA_Observaciones_Publica"=>$_POST["EditarSOOPSA"],
                             "SA_Observaciones_Generales" => $rutaSAObservaciones,
                             "SA_Requerimiento_Amonestacion_Privada" => $rutaSARequerimiento,
                             "SA_Requerimiento_Amonestacion_Publica" => $rutaSARequerimientoPublicaSA,
                             "idCA"=>$_POST["EditaridCA"],
                             "CA_Recepcion"=>$_POST["EditarSORCA"],
                             "CA_Observaciones_General"=>$_POST["EditarSOOGCA"],
                             "CA_Observaciones"=>$_POST["EditarSOOCA"],
                             "CA_Observaciones_Publica"=>$_POST["EditarSOOPCA"],
                             "CA_Observaciones_Generales" => $rutaCAObservaciones,
                             "CA_Requerimiento_Amonestacion_Privada" => $rutaCARequerimiento,
                             "CA_Requerimiento_Amonestacion_Publica" => $rutaCARequerimientoPublicaCA
                           
                            );

              $respuesta = ModeloAdministracionGeneralSO::mdlAdministracionGeneralSOModal($TablaSI, $TablaSA, $TablaCA , $datos, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SA_Codigo_Tipo_Informe_Anios, $Obtener_CA_Codigo_Tipo_Informe_Anios );                               

              $tablaRequerimiemto = "requerimientos";   

              $datos2 = array(
                             "SI_Recepcion"=>$_POST["EditarSORSI"],
                             "SI_Codigo_SO"=>$_POST["EditarCodigoSujetoObligadoRSI"],
                             "SI_Nombre_Sujeto_Obligado"=>$_POST["EditarNombreSujetoObligadoRSI"],
                             "SI_Informe_Presentado"=>$_POST["EditarSOSI"],
                             "SI_Anios"=>$_POST["EditarSOANIOSI"],
                             "SI_Observaciones_General"=>$_POST["EditarSOOGSI"],
                             "SI_Observaciones"=>$_POST["EditarSOOSI"],
                             "SI_Observaciones_Publica"=>$_POST["EditarSOOPSI"],
                             "SI_Observaciones_Generales" => $rutaSIObservaciones,
                             "SI_Requerimiento_Amonestacion_Privada" => $rutaSIRequerimiento,
                             "SI_Requerimiento_Amonestacion_Publica" => $rutaSIRequerimientoPublico,

                             "SA_Recepcion"=>$_POST["EditarSORSA"],
                             "SA_Codigo_SO"=>$_POST["EditarNombreSujetoObligadoRSA"],
                             "SA_Nombre_Sujeto_Obligado"=>$_POST["EditarNombreSujetoObligadoRSA"],
                             "SA_Informe_Presentado"=>$_POST["EditarSOSA"],
                             "SA_Anios"=>$_POST["EditarSOANIOSA"],
                             "SA_Observaciones_General"=>$_POST["EditarSOOGSA"],
                             "SA_Observaciones"=>$_POST["EditarSOOSA"],
                             "SA_Observaciones_Publica"=>$_POST["EditarSOOPSA"],
                             "SA_Observaciones_Generales" => $rutaSAObservaciones,
                             "SA_Requerimiento_Amonestacion_Privada" => $rutaSARequerimiento,
                             "SA_Requerimiento_Amonestacion_Publica" => $rutaSARequerimientoPublicaSA,

                             "CA_Recepcion"=>$_POST["EditarSORCA"],
                             "CA_Codigo_SO"=>$_POST["EditarCodigoSujetoObligadoRCA"],
                             "CA_Nombre_Sujeto_Obligado"=>$_POST["EditarNombreSujetoObligadoRCA"],
                             "CA_Informe_Presentado"=>$_POST["EditarSOCA"],
                             "CA_Anios"=>$_POST["EditarSOANIOCA"],
                             "CA_Observaciones_General"=>$_POST["EditarSOOGCA"],
                             "CA_Observaciones"=>$_POST["EditarSOOCA"],
                             "CA_Observaciones_Publica"=>$_POST["EditarSOOPCA"],
                             "CA_Observaciones_Generales" => $rutaCAObservaciones,
                             "CA_Requerimiento_Amonestacion_Privada" => $rutaCARequerimiento,
                             "CA_Requerimiento_Amonestacion_Publica" => $rutaCARequerimientoPublicaCA
                           
                            );

              $respuesta = ModeloAdministracionGeneralSO::mdlAdministracionGeneralRequerimientoSO($tablaRequerimiemto, $datos2);              

                   if ($respuesta == "ok") {
                       
                       echo'<script>

                       swal({
                           type: "success",
                           title: "El estatus ha sido cambiado correctamente",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar"
                           }).then(function(result){
                                       if (result.value) {

                                       window.location = "dashboard";

                                       }
                                   })

                       </script>';

                   }

            }

    
          }       


       // FUNCION PARA MOSTRAR SOLAMENTE 3 SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR ________ VERSION 1 _____________

          static public function ctrMostrarAdministracionGeneralSO($itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

            $tablaSI = "solicitudes_informacion";
    
            $tablaSA = "solicitudes_arco";
    
            $TablaCA = "Capacitaciones";
    
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarAdministracionGeneralSO($tablaSI, $tablaSA, $TablaCA, $itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);
    
            return $respuesta;
    
          }    

          /*=============================================
	        FUNCION PARA EL CAMBIO DE LOS BOTONES
	        =============================================*/

	        static public function ctrMostrarBotonesAdministracionSOSI($item, $valor){

		        $tabla = "solicitudes_informacion";

		        $respuesta = ModeloAdministracionGeneralSO::mdlMostrarAdministracionBSOSI($tabla, $item, $valor);

		        return $respuesta;
	        }

          // FUNCION PARA MOSTRAR SOLAMENTE 3 SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR ________ VERSION 2 _____________

          static public function ctrMostrarTablaAdministracionGeneralxSO($Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_CA_Nombre_Sujeto_Obligado,
          $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha, $IdSI, $valorSI, $IdSA, $valorSA, $IdCA, $valorCA ){

            $tablaSI = "solicitudes_informacion";
  
            $tablaSA = "solicitudes_arco";
  
            $TablaCA = "Capacitaciones";
  
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarTablaAdministracionxSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_CA_Nombre_Sujeto_Obligado,
            $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha, $IdSI, $valorSI, $IdSA, $valorSA, $IdCA, $valorCA );
  
            return $respuesta;
  
          }

               /* =========== AGREGAR - REQUERIMIENTO - DESDE EL ADMINISTRADOR GENERAL ================ */     

          static public function ctrAgregarAGSolicitudInformacion(){

            if (isset($_POST["agregarRequerimientoAGAnio"])) {
                                
              //Agregado el SO a la Tabla, mediante su Sesi??n.
              //$SObligado = "H. Ayuntamiento de Acaponeta";
              $SObligado = $_POST["agregarRequerimientoAGSujetoObligadoSolo"];

              // Agregamos Tabla
              $tablaSI = "solicitudes_informacion";
                                
              // Cocatenacion Codigo "InformePresentado + A??o"
              $espacio = " ";

              $CodigoIPA = $_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$_POST["agregarRequerimientoAGAnio"];

              // Ingresamos el Codigo Unico del Sujeto Obligado

              $Codigo = $_POST["agregarRequerimientoAGCodigoSO"];

              //$Codigo = "A.1";

              // Se inserta EJEMPLO A.1 1er Informe Bimestral 2022

              $CodigoTipoInformeAnios = $Codigo.$espacio.$CodigoIPA;

              // Carpeta Solicitudes de Informacion

              $CarpetaAdicionalSI = "SolicitudesInformacion";

              // Carpeta Solicitudes de Informacion

              $CarpetaAdicionalSA = "SolicitudesArco";

              // Carpeta Solicitudes de Informacion

              $CarpetaAdicionalCA = "Capacitaciones";

              
              // Ejemplo de 1er Informe Bimestral

              $InformeRequerimientoSI = $_POST["agregarRequerimientoAGInformeBimestral"];

              // Se insert EJEMPLO A.1 Informe Bimestral SolicitudesInformacion 2022

              $CodigoUnicoInformeAnioSI = $Codigo.$espacio.$_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$CarpetaAdicionalSI.$espacio.$_POST["agregarRequerimientoAGAnio"];

              // Se insert EJEMPLO A.1 Informe Bimestral Solicitudes Arco 2022

              $CodigoUnicoInformeAnioSA = $Codigo.$espacio.$_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$CarpetaAdicionalSA.$espacio.$_POST["agregarRequerimientoAGAnio"];

              // Se insert EJEMPLO A.1 Informe Bimestral Solicitudes Arco 2022

              $CodigoUnicoInformeAnioCA = $Codigo.$espacio.$_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$CarpetaAdicionalCA.$espacio.$_POST["agregarRequerimientoAGAnio"];

              $espacio = " ";

              /* ======================== Agregamos Tabla -   ========================================= */

              $tablaSI_r = "solicitudes_informacion_r";

              $datos = array( 
                              "SI_Estatus" => 0,
                              "Si_Codigo_SO" => $Codigo,
                              "SI_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioSI,
                              "SI_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAnios,
                              "Si_Codigo_Informe_Anios" => $CodigoIPA,
                              "SI_Nombre_Sujeto_Obligado" => $SObligado,
                              "SI_Informe_Presentado" => $_POST["agregarRequerimientoAGInformeBimestral"],
                              "SI_Anios" => $_POST["agregarRequerimientoAGAnio"]
                            );
                                                
              $respuesta = ModeloSolicitudesInformacion::MdlAgregarSI_r_Administrador($tablaSI_r, $datos);

               if($respuesta == "ok"){

                /* ================= VALIDAR ARCHIVO PDF =================*/

                $rutaSI = "";

                $Codigo2 = $_POST["agregarRequerimientoAGCodigoSO"];
 
                $SObligado2 = $_POST["agregarRequerimientoAGSujetoObligadoSolo"];

                $Anios = $_POST["agregarRequerimientoAGAnio"];

                $CodigoIPA2 = $_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$_POST["agregarRequerimientoAGAnio"];

                $CarpetaSI = "SolicitudesInformacion";

                $CarpetaPrivadaSI = "Privada";
                                      
                  if (isset($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"])) {

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF SOLICITUD DE INFORMACI??N ==========================*/
                                      
                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSI;

                    mkdir($directorioArchivoSI, 0755);

                      /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                      if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/pdf") {
                                              
                        $rutaSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSI."/".$CodigoIPA2.$espacio.$SObligado2.".pdf";

                        move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaSI);

                      }

                      if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                                              
                        $rutaSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSI."/".$CodigoIPA2.$espacio.$SObligado2.".xlsx";

                        move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaSI);

                      }

                      if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/vnd.ms-excel") {
                                              
                        $rutaSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSI."/".$CodigoIPA2.$espacio.$SObligado2.".xls";

                        move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaSI);

                      }

                  }
                      /* Datos - Array */
                      $datos = array( 
                                     "SI_Estatus" => 0,
                                     "SI_Recepcion" => "AMONESTACI??N PRIVADA",
                                     "SI_Observaciones" => $_POST["agregarRequerimientoAGObservacionesPrivada"],
                                     "Si_Codigo_SO" => $Codigo,
                                     "SI_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioSI,
                                     "SI_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAnios,
                                     "Si_Codigo_Informe_Anios" => $CodigoIPA,
                                     "SI_Nombre_Sujeto_Obligado" => $SObligado,
                                     "SI_Informe_Presentado" => $_POST["agregarRequerimientoAGInformeBimestral"],
                                     "SI_Anios" => $_POST["agregarRequerimientoAGAnio"],
                                     "SI_Requerimiento_Amonestacion_Privada" => $rutaSI 
                                    );
                                                      
                                        $respuesta = ModeloSolicitudesInformacion::MdlAgregarSISoloRequerimientoPrivada($tablaSI, $datos);

                                          if($respuesta == "ok"){

                                                  echo '<script>

                                                  swal({

                                                      type: "success",
                                                      title: "??La Solicitud de Informes Bimestrales, ha sido guardado correctamente!",
                                                      showConfirmButton: true,
                                                      confirmButtonText: "Cerrar"

                                                  }).then(function(result){

                                                      if(result.value){
                                                      
                                                          window.location = "dashboard";

                                                      }

                                                  });
                                              
                                                  </script>';

                                          } // if respuesta
                             
              } // if

              /* =========== VARIABLES CAMBIANTES ============================== */

              // Agregamos Tabla

              $tablaSA_r = "solicitudes_arco_r";

              $datos = array( 
                              "SA_Estatus" => 0,
                              "SA_Codigo_SO" => $Codigo,
                              "SA_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioSA,
                              "SA_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAnios,
                              "SA_Codigo_Informe_Anios" => $CodigoIPA,
                              "SA_Nombre_Sujeto_Obligado" => $SObligado,
                              "SA_Informe_Presentado" => $_POST["agregarRequerimientoAGInformeBimestral"],
                              "SA_Anios" => $_POST["agregarRequerimientoAGAnio"]
                            );
                                                
              $respuesta = ModeloSolicitudesArco::MdlAgregarSA_r_Administrador($tablaSA_r, $datos);

              if($respuesta == "ok"){

                /* ================= VALIDAR ARCHIVO PDF =================*/

                $rutaSA = "";

                $Codigo2 = $_POST["agregarRequerimientoAGCodigoSO"];
 
                $SObligado2 = $_POST["agregarRequerimientoAGSujetoObligadoSolo"];

                $Anios = $_POST["agregarRequerimientoAGAnio"];

                $CodigoIPA2 = $_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$_POST["agregarRequerimientoAGAnio"];

                $CarpetaSA = "SolicitudesArco";

                $CarpetaCA = "Capacitaciones";

                $CarpetaPrivadaSI = "Privada";
                                      
                  if (isset($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"])) {

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF SOLICITUD DE INFORMACI??N ==========================*/
                                      
                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2;

                    mkdir($directorioArchivoSI, 0755);

                    $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSA;

                    mkdir($directorioArchivoSI, 0755);

                      /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                      if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/pdf") {
                                              
                        $rutaSA = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSA."/".$CodigoIPA2.$espacio.$SObligado2.".pdf";

                        move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaSA);

                      }

                      if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                                              
                        $rutaSA = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSA."/".$CodigoIPA2.$espacio.$SObligado2.".xlsx";

                        move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaSA);

                      }

                      if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/vnd.ms-excel") {
                                              
                        $rutaSA = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaSA."/".$CodigoIPA2.$espacio.$SObligado2.".xls";

                        move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaSA);

                      }

                  }
                      /* Datos - Array */

                      $tablaSA = "solicitudes_arco";                    

                      $datos = array( 
                                      "SA_Estatus" => 0,
                                      "SA_Recepcion" => "AMONESTACI??N PRIVADA",
                                      "SA_Observaciones" => $_POST["agregarRequerimientoAGObservacionesPrivada"],
                                      "SA_Codigo_SO" => $Codigo,
                                      "SA_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioSA,
                                      "SA_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAnios,
                                      "SA_Codigo_Informe_Anios" => $CodigoIPA,
                                      "SA_Nombre_Sujeto_Obligado" => $SObligado,
                                      "SA_Informe_Presentado" => $_POST["agregarRequerimientoAGInformeBimestral"],
                                      "SA_Anios" => $_POST["agregarRequerimientoAGAnio"],
                                      "SA_Requerimiento_Amonestacion_Privada" => $rutaSA
                                    );
                                         
                                    $respuesta = ModeloSolicitudesArco::MdlAgregarSASoloRequerimientoPrivada($tablaSA, $datos);

                                      if($respuesta == "ok"){

                                              echo '<script>

                                              swal({

                                                  type: "success",
                                                  title: "??La Solicitud de Informes Bimestrales, ha sido guardado correctamente!",
                                                  showConfirmButton: true,
                                                  confirmButtonText: "Cerrar"

                                              }).then(function(result){

                                                  if(result.value){
                                                  
                                                      window.location = "dashboard";

                                                  }

                                              });
                                          
                                              </script>';

                                      } // if respuesta       
                             
              } // if

              /* =========== VARIABLES CAMBIANTES ============================== */

              // Agregamos Tabla

              $tablaCA_r = "capacitaciones_r";

              $datos = array( 
                              "CA_Estatus" => 0,
                              "CA_Codigo_SO" => $Codigo,
                              "CA_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioCA,
                              "CA_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAnios,
                              "CA_Codigo_Informe_Anios" => $CodigoIPA,
                              "CA_Nombre_Sujeto_Obligado" => $SObligado,
                              "CA_Informe_Presentado" => $_POST["agregarRequerimientoAGInformeBimestral"],
                              "CA_Anios" => $_POST["agregarRequerimientoAGAnio"]
                            );
                                                
              $respuesta = ModeloCapacitacion::mdlagregarCA_r_Administrador($tablaCA_r, $datos);

                if($respuesta == "ok"){

                  /* ================= VALIDAR ARCHIVO PDF =================*/

                  $rutaCA = "";

                  $Codigo2 = $_POST["agregarRequerimientoAGCodigoSO"];
  
                  $SObligado2 = $_POST["agregarRequerimientoAGSujetoObligadoSolo"];

                  $Anios = $_POST["agregarRequerimientoAGAnio"];

                  $CodigoIPA2 = $_POST["agregarRequerimientoAGInformeBimestral"].$espacio.$_POST["agregarRequerimientoAGAnio"];

                  $CarpetaCA = "Capacitaciones";

                  $CarpetaPrivadaSI = "Privada";
                                        
                    if (isset($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"])) {

                      /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF SOLICITUD DE INFORMACI??N ==========================*/
                                        
                      $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios;

                      mkdir($directorioArchivoSI, 0755);

                      $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI;

                      mkdir($directorioArchivoSI, 0755);

                      $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI;

                      mkdir($directorioArchivoSI, 0755);

                      $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2;

                      mkdir($directorioArchivoSI, 0755);

                      $directorioArchivoSI = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaCA;

                      mkdir($directorioArchivoSI, 0755);

                        /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                        if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/pdf") {
                                              
                          $rutaCA = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaCA."/".$CodigoIPA2.$espacio.$SObligado2.".pdf";
  
                          move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaCA);
  
                        }

                        if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                                                
                          $rutaCA = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaCA."/".$CodigoIPA2.$espacio.$SObligado2.".xlsx";

                          move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaCA);

                        }

                        if ($_FILES["nuevoArchivoRequerimientoPrivado"]["type"] == "application/vnd.ms-excel") {
                                                
                          $rutaCA = "vistas/pdfs/requerimientos/".$Anios."/".$CarpetaPrivadaSI."/".$InformeRequerimientoSI."/".$Codigo2."/".$CarpetaCA."/".$CodigoIPA2.$espacio.$SObligado2.".xls";

                          move_uploaded_file ($_FILES["nuevoArchivoRequerimientoPrivado"]["tmp_name"], $rutaCA);

                        }

                    }
                        /* Datos - Array */
                        
                        $tablaCA = "capacitaciones";
                                        
                        $datos = array( 
                                        "CA_Estatus" => 0,
                                        "CA_Recepcion" => "AMONESTACI??N PRIVADA",
                                        "CA_Observaciones" => $_POST["agregarRequerimientoAGObservacionesPrivada"],
                                        "CA_Codigo_SO" => $Codigo,
                                        "CA_Codigo_UnicoInforme_Anios" => $CodigoUnicoInformeAnioCA,
                                        "CA_Codigo_Tipo_Informe_Anios" => $CodigoTipoInformeAnios,
                                        "CA_Codigo_Informe_Anios" => $CodigoIPA,
                                        "CA_Nombre_Sujeto_Obligado" => $SObligado,
                                        "CA_Informe_Presentado" => $_POST["agregarRequerimientoAGInformeBimestral"],
                                        "CA_Anios" => $_POST["agregarRequerimientoAGAnio"],
                                        "CA_Requerimiento_Amonestacion_Privada" => $rutaCA
                                      );
                                          
                                        $respuesta = ModeloCapacitacion::MdlAgregarCASoloRequerimientoPrivada($tablaCA, $datos);

                                          if($respuesta == "ok"){

                                                  echo '<script>

                                                  swal({

                                                      type: "success",
                                                      title: "??La Solicitud de Informes Bimestrales, ha sido guardado correctamente!",
                                                      showConfirmButton: true,
                                                      confirmButtonText: "Cerrar"

                                                  }).then(function(result){

                                                      if(result.value){
                                                      
                                                          window.location = "dashboard";

                                                      }

                                                  });
                                              
                                                  </script>';

                                          } // if respuesta          
                             
              } // if
                            
            }// if isset

          } // Funcion Agregar Requerimiento Privado


     }

?>