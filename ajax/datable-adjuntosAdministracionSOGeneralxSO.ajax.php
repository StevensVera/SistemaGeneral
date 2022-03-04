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
            $Obtener_SI_Nombre_Sujeto_Obligado = "SI_Nombre_Sujeto_Obligado";
            $Obtener_SI_Codigo_UnicoInforme_Anios = "SI_Codigo_UnicoInforme_Anios";
            $Obtener_SI_TOTAL_SOLICITUDES = "SI_TOTAL_SOLICITUDES";
            $Obtener_SI_Fecha = "SI_Fecha";

            // TABLA DE SOLICITUDES ARCO
            $Obtener_SA_Nombre_Sujeto_Obligado = "SA_Nombre_Sujeto_Obligado";
            $Obtener_SA_Codigo_UnicoInforme_Anios = "SA_Codigo_UnicoInforme_Anios";
            $Obtener_SA_TOTAL_SOLICITUDES = "SA_TOTAL_SOLICITUDES";
            $Obtener_SA_Fecha = "SA_Fecha";

            // TABLA DE CAPACITACIONES
            $Obtener_CA_Nombre_Sujeto_Obligado = "CA_Nombre_Sujeto_Obligado";
            $Obtener_CA_Codigo_UnicoInforme_Anios = "CA_Codigo_UnicoInforme_Anios";
            $Obtener_CA_Total_Capacitacion = "CA_Total_Capacitacion";
            $Obtener_CA_Fecha = "CA_Fecha";

    
            // Obtenemos el valor el ID DE SOLICITUDES DE INFORMACION

            $IdSI = "idSI";
            $valorSI = $_GET["idSI"];

            // Obtenemos el valor el ID DE SOLICITUDES DE ARCO

            $IdSA = "idSAR";
            $valorSA = $_GET["idSAR"];

            // Obtenemos el valor el ID DE SOLICITUDES DE ARCO

            $IdCA = "idCA";
            $valorCA = $_GET["idCA"];

            // Dato para Establecer el tipo de datos.

            $TipoEstado = "EN REVISIÓN";

            $adjunto = ControladorAdministracionGeneralSO::ctrMostrarTablaAdministracionGeneralxSO( 
                $Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_CA_Nombre_Sujeto_Obligado, $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha, 
                $IdSI, $valorSI, $IdSA, $valorSA, $IdCA, $valorCA );

            if (count($adjunto) == 0) {
                
                echo '{"data": []}';

                return;
  
            } // if contador

            $datosJson = '{
                            "data":[';


            for ($i=0; $i < count($adjunto) ; $i++) { 

                $botones = "<button type='button' class='btn btn-danger btn-xs btnActivar' estadoUsuario='1'>Desactivado</button>";

                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["SI_Codigo_UnicoInforme_Anios"].'",
                    "'.$adjunto[$i]["SI_TOTAL_SOLICITUDES"].'",
                    "'.$adjunto[$i]["SI_Fecha"].'",
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