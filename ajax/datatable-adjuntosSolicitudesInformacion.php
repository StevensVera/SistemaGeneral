<?php

session_start();

/*=========== CONTROLADOR SOLICITUDES DE INFORMACION ================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../controladores/solicitudes-informacion.controlador.php";

/*============== MODELO SOLICITUDES DE INFORMACION ==================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../modelos/solicitudes-informacion.modelo.php";

    class TablaAjuntosInformacionSolicitudes{

        static  public function MostrarTablaSolicitudesInformacion(){

            $itemCodigo = "Si_Codigo_SO"; 
            //$valor = "A.1";
            $valor =  $_SESSION["codigo"];

            $adjunto = ControladorSolicitudesInformes::ctrMostrarTablaSI($itemCodigo,$valor);

            if(count($adjunto) == 0 ){

                echo '{"data": [] }';

                return;

            } // if contador

            $datosJson = '{
                           "data":[';

            for ($i=0; $i < count($adjunto); $i++) {

                if($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" ){  
                      
                    if ($adjunto[$i]["SI_Estatus"] != 0) {

                        $botones = "<button class='btn btn-primary btnImprimerReportexSolicitudesInformacion' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' title='GENERAR REPORTE DE SOLICITUD DE INFORMACIÓN'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SI_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a>";

                    } else {
                        
                        $botones = "<button class='btn btn-warning btnEditarSolicitudesInformacion' data-toggle='modal' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' data-target='#modalActualizareSolicitudesInformacion'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesInformacion' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SI_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-danger btnEliminarSolicitudInformacion'  idSI='".$adjunto[$i]["idSI"]."' archivoSI='".$adjunto[$i]["SI_Archivo"]."' codigo = '".$adjunto[$i]["Si_Codigo_SO"]."' anios ='".$adjunto[$i]["SI_Anios"]."' InformeAnios = '".$adjunto[$i]["Si_Codigo_Informe_Anios"]."' sujetoObligado = '".$adjunto[$i]["SI_Nombre_Sujeto_Obligado"]."'  ><i class='fa fa-times'></i></button> <button class='btn btn-success btnActivarSolicitudInformacion'  idSI='".$adjunto[$i]["idSI"]."' estadoSolicitudesInformacion='1' RecepcionSolicitudesInformacion='EN REVISIÓN'><i class='fa fa-check'></i></button>";
                    }

                } else if($adjunto[$i]["SI_Recepcion"] == "NO COMPLETADO" ){

                    if ($adjunto[$i]["SI_Estatus"] == 1) {

                        $botones = "<button class='btn btn-warning btnEditarSolicitudesInformacion' data-toggle='modal' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' data-target='#modalActualizareSolicitudesInformacion'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesInformacion' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SI_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-warning btnInformativo' data-toggle='modal' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' data-target='#modalInformativo'><i class='fa fa-bell'></i></button> <button class='btn btn-success btnActivarSolicitudInformacion'  idSI='".$adjunto[$i]["idSI"]."' estadoSolicitudesInformacion='1' RecepcionSolicitudesInformacion='EN REVISIÓN'><i class='fa fa-check'></i></button>";

                    }

                } else if($adjunto[$i]["SI_Recepcion"] == "COMPLETADO") {

                    if ($adjunto[$i]["SI_Estatus"] == 1) {

                        $botones = "<button class='btn btn-primary btnImprimerReportexSolicitudesInformacion' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' title='GENERAR REPORTE DE SOLICITUD DE INFORMACIÓN'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SI_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a>";

                    }

                } else if($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO") {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesInformacion' data-toggle='modal' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' data-target='#modalActualizareSolicitudesInformacion'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesInformacion' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SI_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-danger btnEliminarSolicitudInformacion'  idSI='".$adjunto[$i]["idSI"]."' archivoSI='".$adjunto[$i]["SI_Archivo"]."' codigo = '".$adjunto[$i]["Si_Codigo_SO"]."' anios ='".$adjunto[$i]["SI_Anios"]."' InformeAnios = '".$adjunto[$i]["Si_Codigo_Informe_Anios"]."' sujetoObligado = '".$adjunto[$i]["SI_Nombre_Sujeto_Obligado"]."'  ><i class='fa fa-times'></i></button> <button class='btn btn-success btnActivarSolicitudInformacion'  idSI='".$adjunto[$i]["idSI"]."' estadoSolicitudesInformacion='1' RecepcionSolicitudesInformacion='EN REVISIÓN'><i class='fa fa-check'></i></button>";


                }
            
                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["Si_Codigo_Informe_Anios"].'",
                    "'.$adjunto[$i]["SI_TOTAL_SOLICITUDES"].'",
                    "'.$adjunto[$i]["SI_Recepcion"].'",
                    "'.$adjunto[$i]["SI_Fecha"].'",
                    "'.$botones.'"
                
                ],';
                
            }// for

            $datosJson = substr($datosJson, 0, -1);
            
            $datosJson .= ']
                }';

            echo $datosJson;
                

        } // Funcion Mostrar Usuarios

    } // Class Tabla Solicitudes Informacion

    $activar = new TablaAjuntosInformacionSolicitudes();
    $activar -> MostrarTablaSolicitudesInformacion();