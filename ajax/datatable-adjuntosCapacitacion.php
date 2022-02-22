<?php

    session_start();

    /*========== CONTROLADOR CAPACITACIONES ==============*/
    /* ---- CAPACITACION */
    require_once "../controladores/capacitaciones.controlador.php";

    /*========== MODELO CAPACITACION ===========*/
    require_once "../modelos/capacitaciones.modelo.php";


    class TablaAjuntosCapacitaciones{

        static public function MostrarTablaCapacitacion(){

            $itemCodigo = "CA_Codigo_SO";

            $valor = $_SESSION["codigo"];

            $adjunto = ControladorCapacitaciones::ctrMostrarTablasCA($itemCodigo, $valor);

            if (count($adjunto) == 0 ){

                echo '{"data": [] }';
                
                return;

            } // End if

            $datosJson = '{
                          "data":[';

            for ($i=0; $i < count($adjunto) ; $i++) {
                
                if ($adjunto[$i]["CA_Estatus"] != 0) {

                    $botones = "<button class='btn btn-primary btnImprimirReportexCapacitaciones' idCapacitaciones='".$adjunto[$i]["idCA"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["CA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a>";

                } else {

                    $botones = "<button class='btn btn-warning btnEditarCapacitaciones' data-toggle='modal' idCapacitaciones='".$adjunto[$i]["idCA"]."' data-target='#modalAgregarCapacitacionesEditar'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimirReportexCapacitaciones' idCapacitaciones='".$adjunto[$i]["idCA"]."'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <a href='".$adjunto[$i]["CA_Archivo"]."' target='_blank'><button class='btn btn-primary ' title='GENERAR ARCHIVO ADJUNTO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <button class='btn btn-danger btnEliminarCapacitacion'  idCA='".$adjunto[$i]["idCA"]."' archivoCA='".$adjunto[$i]["CA_Archivo"]."' codigo = '".$adjunto[$i]["CA_Codigo_SO"]."' anios ='".$adjunto[$i]["CA_Anios"]."' InformeAnios = '".$adjunto[$i]["CA_Informe_Presentado"]."' sujetoObligado = '".$adjunto[$i]["CA_Nombre_Sujeto_Obligado"]."' ><i class='fa fa-times'></i></button> <button class='btn btn-success btnActivarCapacitaciones'  idCA='".$adjunto[$i]["idCA"]."' estadoCapacitaciones='1'><i class='fa fa-check'></i></button>";

                } 
           
                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["CA_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["CA_Informe_Presentado"].'",
                    "'.$adjunto[$i]["CA_Anios"].'",
                    "'.$adjunto[$i]["CA_Total_Capacitacion"].'",
                    "'.$adjunto[$i]["CA_Fecha"].'",
                    "'.$botones.'"
                
                ],';

            } // End for

            $datosJson = substr($datosJson, 0, -1);
            
            $datosJson .= ']
                }';

            echo $datosJson;


        }// End Fuction


    }//End TablaAjuntosCapacitaciones

    $activar = new TablaAjuntosCapacitaciones();
    $activar -> MostrarTablaCapacitacion();