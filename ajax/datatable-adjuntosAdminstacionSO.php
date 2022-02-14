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

            // Mandamos el codigo de la Sesión Inicializada           
            $valor = $_SESSION["codigo"];  
            // Dato para tener el Siguiente dato "A.1 1er Informe Bimestral 2022" TABLA SOLICITUD DE INFORMACIÓN
            $ObtenerCodigoInformeSI = "SI_Codigo_Tipo_Informe_Anios";
            // Dato para tener el Siguiente dato "A.1 1er Informe Bimestral 2022" TABLA SOLICITUD DE ARCO
            $ObtenerCodigoInformeSA = "SA_Codigo_Tipo_Informe_Anios";
            // Dato para tener el Siguiente dato "A.1 1er Informe Bimestral 2022" TABLA CAPACITACIONES
            $ObtenerCodigoInformeCA = "CA_Codigo_Tipo_Informe_Anios";
            // Dato para tener el Siguiente dato "A.1" TABLA SOLICITUD DE INFORMACIÓN
            $ObtenerCodigoSI = "Si_Codigo_SO";
            // Dato para tener el Siguiente dato "A.1" TABLA SOLICITUD DE ARCO
            $ObtenerCodigoSA = "SA_Codigo_SO";
            // Dato para tener el Siguiente dato "A.1" TABLA SOLICITUD DE ARCO
            $ObtenerCodigoCA = "CA_Codigo_SO";

            // Dato para Establecer el tipo de datos. 

            $TipoEstado = "EN REVISIÓN";

            
            $adjunto = ControladorSolicitudesInformes::ctrMostrarTablaAdministracionSO($valor, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA);

            if (count($adjunto) == 0) {
                

                echo '{"data": []}';

                return;
  
            } // if contador

            $datosJson = '{
                            "data":[';


            for ($i=0; $i < count($adjunto) ; $i++) { 

                $botones = "<button class='btn btn-primary btnImprimerReporteAdministaciónSO' idAdminstracionSOSI='".$adjunto[$i]["idSI"]."' idAdminstracionSOSA='".$adjunto[$i]["idSAR"]."' idAdminstracionSOCA='".$adjunto[$i]["idCA"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button>";

                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["Si_Codigo_Informe_Anios"].'",
                    "'.$adjunto[$i]["SI_Fecha"].'",
                    "'.$TipoEstado.'",
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