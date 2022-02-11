<?php

    class ControladorAdministracionSO{

            /* =========== METODO PDF - MOSTRAR TODOS LOS INFORMES PRESENTADOS ================ */
        
            static public function ctrMostrarPDFSolicitudInformacion($valor, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA){

                $tablaSI = "solicitudes_informacion";
      
                $tablaSA = "solicitudes_arco";
      
                $TablaCA = "Capacitaciones";
      
                $respuesta = ModeloAdministracionSO::MdlMostrarTablaAdministracionSO2($tablaSI, $tablaSA, $TablaCA, $valor, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA);
      
                return $respuesta;
      
              }

    }


?>