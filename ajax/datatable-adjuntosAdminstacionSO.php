<?php

session_start();

/*======================= CONTROLADOR DE SOLICITUDES DE INFORMACION - ADMINISTRACION DE SUJETOS OBLIGADOS ============================*/
// NOTA: Se usara el mismo controlador para realizar 2 funciones al mismo tiempo
require_once "../controladores/solicitudes-informacion.controlador.php";

/*======================= MODELO DE SOLICITUDES DE INFORMACION - ADMINISTRACION DE SUJETOS OBLIGADOS =============================*/
// NOTA: Se usara el mismo modelo para realizar 2 funciones al mismo tiempo
require_once "../modelos/solicitudes-informacion.modelo.php";

    class TablaAjuntosAdministracionSO{

        static public function MostrarTablaAdmnistracionSO(){

            $itemCodigoSI = "Si_Codigo_SO";
            $itemCodigoSA = "SA_Codigo_SO";
            
            $valor = $_SESSION["codigo"];

           //$InformeSO_SI = $_GET["Si_Codigo_Informe_Anios"];

           //$InformeSO_SA = $_GET["SA_Codigo_Informe_Anios"];

            

            $adjunto = ControladorSolicitudesInformes::ctrMostrarTablaAdministracionSO($itemCodigoSI, $itemCodigoSA, $valor);

            if (count($adjunto) == 0) {
                

                echo '{"data": []}';

                return;
  
            } // if contador

            $datosJson = '{
                            "data":[';


            for ($i=0; $i < count($adjunto) ; $i++) { 

                $botones = "<button class='btn btn-primary btnImprimerReportexSolicitudesInformacion' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button>";

                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["Si_Codigo_Informe_Anios"].'",
                    "'.$adjunto[$i]["SI_Fecha"].'",
                    "'.$adjunto[$i]["SI_TOTAL_SOLICITUDES"].'",
                    "'.$botones.'"
                
                ],';

            }                            

            $datosJson = substr($datosJson,0, -1);

            $datosJson .= ']
                }';

            echo $datosJson;                

        } // Funcion Mostrar la Administracion de los Sujetos Obligados

    }// End class

    $activar = new TablaAjuntosAdministracionSO();
    $activar -> MostrarTablaAdmnistracionSO();