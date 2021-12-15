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
                      
                if ($adjunto[$i]["SI_Estatus"] != 0) {

                    $botones = "<button class='btn btn-primary btnImprimerReportexUsuario'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button>";

                } else {

                    $botones = "<button class='btn btn-warning btnEditarSolicitudesInformacion' data-toggle='modal' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' data-target='#modalActualizareSolicitudesInformacion'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexUsuario'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <button class='btn btn-danger btnEliminarSolicitudInformacion'  idSI='".$adjunto[$i]["idSI"]."' ><i class='fa fa-times'></i></button> <button class='btn btn-success btnImprimerReportexUsuario'  title='ENVIAR REPORTE'><i class='fa fa-check'></i></button> ";
                }
           
       
                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["SI_Informe_Presentado"].'",
                    "'.$adjunto[$i]["SI_Anios"].'",
                    "'.$adjunto[$i]["SI_TOTAL_SOLICITUDES"].'",
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