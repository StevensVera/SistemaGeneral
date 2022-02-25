<?php
session_start();

/*======================= CONTROLADOR DE SOLICITUDES DE INFORMACION - ADMINISTRACION DE SUJETOS OBLIGADOS ============================*/
// NOTA: Se usara el mismo controlador para realizar 2 funciones al mismo tiempo
require_once "../controladores/administracionGeneralSO.controlador.php";

/*======================= MODELO DE SOLICITUDES DE INFORMACION - ADMINISTRACION DE SUJETOS OBLIGADOS =============================*/
// NOTA: Se usara el mismo modelo para realizar 2 funciones al mismo tiempo
require_once "../modelos/administracionGeneralSO.modelo.php";

    class TablaAjuntosAdministracionSO{

        static public function MostrarTablaAdmnistracionSO(){
        
            // TABLA DE SOLICITUDES DE INFORMACIÓN 
            //$IDSI = "idSI";
            $Obtener_Nombre_Sujeto_Obligado = "SI_Nombre_Sujeto_Obligado";
            $Obtener_SI_Codigo_UnicoInforme_Anios = "SI_Codigo_UnicoInforme_Anios";
            $Obtener_SI_Informe_Presentado = "SI_Informe_Presentado";
            $Obtener_SI_Anios = "SI_Anios";
            $Obtener_SI_TOTAL_SOLICITUDES = "SI_TOTAL_SOLICITUDES";
            $Obtener_SI_Fecha = "SI_Fecha";
            $Obtener_SI_Estatus = "SI_Estatus";

            // TABLA DE SOLICITUDES ARCO
            //$IDSA = "idSAR";
            $Obtener_SA_Nombre_Sujeto_Obligado = "SA_Nombre_Sujeto_Obligado";
            $Obtener_SA_Codigo_UnicoInforme_Anios = "SA_Codigo_UnicoInforme_Anios";
            $Obtener_SA_Informe_Presentado = "SA_Informe_Presentado";
            $Obtener_SA_Anios = "SA_Anios";
            $Obtener_SA_TOTAL_SOLICITUDES = "SA_TOTAL_SOLICITUDES";
            $Obtener_SA_Fecha = "SA_Fecha";
            $Obtener_SA_Estatus = "SA_Estatus";

            // TABLA DE SOLICITUDES ARCO
            //$IDCA = "idCA";
            $Obtener_CA_Nombre_Sujeto_Obligado = "CA_Nombre_Sujeto_Obligado";
            $Obtener_CA_Codigo_UnicoInforme_Anios = "CA_Codigo_UnicoInforme_Anios";
            $Obtener_CA_Informe_Presentado = "CA_Informe_Presentado";
            $Obtener_CA_Anios = "CA_Anios";
            $Obtener_CA_Total_Capacitacion = "CA_Total_Capacitacion";
            $Obtener_CA_Fecha = "CA_Fecha";
            $Obtener_CA_Estatus = "CA_Estatus";

            // TABLA DE SOLICITUDES ARCO
            $ValorSI_Informe_Presentado1 = "1er Informe Bimestral";
            $ValorSI_Informe_Presentado6 = "6to Informe Bimestral";


            // Dato para Establecer el tipo de datos. 

            $TipoEstado = "EN REVISIÓN";

            
            $adjunto = ControladorAdministracionGeneralSO::ctrMostrarTablaAdministracionGeneralSO($Obtener_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_Informe_Presentado, $Obtener_SI_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SI_Estatus, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_Informe_Presentado, $Obtener_SA_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_SA_Estatus, $Obtener_CA_Nombre_Sujeto_Obligado, $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Informe_Presentado, $Obtener_CA_Anios, $Obtener_CA_Total_Capacitacion ,$Obtener_CA_Fecha, $Obtener_CA_Estatus, $ValorSI_Informe_Presentado1, $ValorSI_Informe_Presentado6 );

            if (count($adjunto) == 0) {
                

                echo '{"data": []}';

                return;
  
            } // if contador

            $datosJson = '{
                            "data":[';


            for ($i=0; $i < count($adjunto) ; $i++) { 

                $botones = "<button class='btn btn-primary btnImprimerReporteAdministaciónSO'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button>";

                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["SI_Codigo_UnicoInforme_Anios"].'",
                    "'.$adjunto[$i]["SI_Informe_Presentado"].'",
                    "'.$adjunto[$i]["SI_Anios"].'",
                    "'.$adjunto[$i]["SI_TOTAL_SOLICITUDES"].'",
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