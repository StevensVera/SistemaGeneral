<?php

    class ControladorSolicitudesArco{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

        static public function ctrMostrarTablaAR($item, $valor){

            /* Tabla Solicitudes de Arco */
                $tabla = "solicitudes_arco";
            /* Campos Solicitudes de Arco */
                $so = "SA_Nombre_Sujeto_Obligado";
                $ip = "SA_Informe_Presentado";
                $ipa = "SA_Anios";
                $tsi = "SA_TOTAL_SOLICITUDES";
                $fe = "SA_Fecha";
            /* Tabla detalle usuario */
                $tablaDSI = "detalle_usuario_sa";
            /* Tabla Usuario */
                $tablaU = "usuarios";
            /* codigo */
            
                $respuesta = ModeloSolicitudesArco::ctrMostrarTablaAR($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU);
        
                return $respuesta;

                //var_dump($respuesta);

            
        } // Mostrar Tablas ARCO


    }




?>