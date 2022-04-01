<?php

session_start();

/*=========== CONTROLADOR SOLICITUDES ARCO ================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../controladores/solicitudes-arco.controlador.php";

/*============== MODELO SOLICITUDES ARCO ==================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../modelos/solicitudes-arco.modelo.php";

    class TablasAdjuntosSolicitudesArco{

        static public function MostrarTablaSolicitudesArco(){
        
        $itemCodigo = "SA_Codigo_SO";
        $valor = $_SESSION["codigo"];

        $adjunto = ControladorSolicitudesArco::ctrMostrarTablaAR($itemCodigo, $valor);

        if (count($adjunto) == 0) {
            
            echo '{"data": []}';

            return;

        } // if contador

        $datosJson = '{ 
                        "data":[';

        for ($i=0; $i < count($adjunto); $i++){

            if($adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" ){  

                if ($adjunto[$i]["SA_Estatus"] != 0) {

                    $botones = "<button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a>";

                } else {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesArco' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalActualizareSolicitudesArco'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-danger btnEliminarSolicitudArco' idSAR='".$adjunto[$i]["idSAR"]."' archivoSA='".$adjunto[$i]["SA_Archivo"]."' codigo = '".$adjunto[$i]["SA_Codigo_SO"]."' anios ='".$adjunto[$i]["SA_Anios"]."' InformeAnios = '".$adjunto[$i]["SA_Codigo_Informe_Anios"]."' sujetoObligado = '".$adjunto[$i]["SA_Nombre_Sujeto_Obligado"]."' ><i class='fa fa-times'></i></button> <button class='btn btn-success btnActivarSolicitudesArco' idSAR='".$adjunto[$i]["idSAR"]."' estadoSolicitudesArco='1'  RecepcionSolicitudesArco='' title='ENVIAR REPORTE'><i class='fa fa-check'></i></button> ";
                }

            } else if($adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" ){

                if ($adjunto[$i]["SA_Estatus"] == 1) {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesArco' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalActualizareSolicitudesArco'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button style='background-color:#FF8723;' class='btn btn-warning btnInformativoSA' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalInformativoO' title='AMONESTACIÓN PRIVADA'><i class='fa fa-bell'></i></button> <button class='btn btn-success btnActivarSolicitudesArco' idSAR='".$adjunto[$i]["idSAR"]."' estadoSolicitudesArco='1'  RecepcionSolicitudesArco='EN REVISIÓN' title='ENVIAR REPORTE'><i class='fa fa-check'></i></button>";


                }

            } else if($adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" ){

                if ($adjunto[$i]["SA_Estatus"] == 1) {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesArco' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalActualizareSolicitudesArco'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-warning btnInformativoSA' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalInformativo' title='AMONESTACIÓN PRIVADA'><i class='fa fa-bell'></i></button> <button class='btn btn-success btnActivarSolicitudesArco' idSAR='".$adjunto[$i]["idSAR"]."' estadoSolicitudesArco='1'  RecepcionSolicitudesArco='EN REVISIÓN' title='ENVIAR REPORTE'><i class='fa fa-check'></i></button>";


                }

            } else if($adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" ){

                if ($adjunto[$i]["SA_Estatus"] == 1) {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesArco' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalActualizareSolicitudesArco'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-warning btnInformativoSA' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalInformativoAP' title='AMONESTACIÓN PÚBLICA'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i></button> <button class='btn btn-success btnActivarSolicitudesArco' idSAR='".$adjunto[$i]["idSAR"]."' estadoSolicitudesArco='1'  RecepcionSolicitudesArco='EN REVISIÓN' title='ENVIAR REPORTE'><i class='fa fa-check'></i></button>";

                }

            } else if($adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" ){

                if ($adjunto[$i]["SA_Estatus"] == 1) {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesArco' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalActualizareSolicitudesArco'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-danger btnInformativoSA' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalInformativoPS' title='PROCESO DE SANCION'><i class='fa fa-user-circle-o' aria-hidden='true'></i></button> <button class='btn btn-success btnActivarSolicitudesArco' idSAR='".$adjunto[$i]["idSAR"]."' estadoSolicitudesArco='1'  RecepcionSolicitudesArco='EN REVISIÓN' title='ENVIAR REPORTE'><i class='fa fa-check'></i></button>";


                }

            } else if($adjunto[$i]["SA_Recepcion"] == "FINALIZADO") {

                if ($adjunto[$i]["SA_Estatus"] == 1) {
                    
                    $botones = "<button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a>";

                }

            } else if($adjunto[$i]["SA_Recepcion"] == "NO ENVIADO") {

                $botones = "<button class='btn btn-warning btnEditarSolicitudesArco' data-toggle='modal' idSolicitudesArco='".$adjunto[$i]["idSAR"]."' data-target='#modalActualizareSolicitudesArco'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexSolicitudesArco' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-danger btnEliminarSolicitudArco' idSAR='".$adjunto[$i]["idSAR"]."' archivoSA='".$adjunto[$i]["SA_Archivo"]."' codigo = '".$adjunto[$i]["SA_Codigo_SO"]."' anios ='".$adjunto[$i]["SA_Anios"]."' InformeAnios = '".$adjunto[$i]["SA_Codigo_Informe_Anios"]."' sujetoObligado = '".$adjunto[$i]["SA_Nombre_Sujeto_Obligado"]."' ><i class='fa fa-times'></i></button> <button class='btn btn-success btnActivarSolicitudesArco' idSAR='".$adjunto[$i]["idSAR"]."' estadoSolicitudesArco='1' RecepcionSolicitudesArco='EN REVISIÓN' title='ENVIAR REPORTE'><i class='fa fa-check'></i></button> ";


            }



            $datosJson .= '[

                "'.($i+1).'",
                "'.$adjunto[$i]["SA_Nombre_Sujeto_Obligado"].'",
                "'.$adjunto[$i]["SA_Codigo_Informe_Anios"].'",
                "'.$adjunto[$i]["SA_TOTAL_SOLICITUDES"].'",
                "'.$adjunto[$i]["SA_Recepcion"].'",
                "'.$adjunto[$i]["SA_Fecha"].'",
                "'.$botones.'"
                
            ],';

        } // for   

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
                }';
        
        echo $datosJson;

        } // Mostrar Solicitudes Arco

    } // Class Tabla Solicitudes Informacion

    $activar = new TablasAdjuntosSolicitudesArco();
    $activar -> MostrarTablaSolicitudesArco();


