<?php

    class ControladorSolicitudesInformes{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablaSI($item,$valor){

          /* Tabla Solicitudes de Informacion */
            $tabla = "solicitudes_informacion";
          /* Campos Solicitudes de Informacion */
            $so = "SI_Nombre_Sujeto_Obligado";
            $ip = "SI_Informe_Presentado";
            $ipa = "SI_Anios";
            $tsi = "SI_TOTAL_SOLICITUDES";
            $fe = "SI_Fecha";
          /* Tabla detalle usuario */
            $tablaDSI = "detalle_usuario_si";
          /* Tabla Usuario */
            $tablaU = "usuarios";
          /* codigo */
        
            $respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSI($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU);
    
            return $respuesta;

            //var_dump($respuesta);

          } // Mostrar Tablas SI

    } //ControladorSolicitudesInformes

?>