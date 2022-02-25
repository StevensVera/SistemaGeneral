<?php

    class ControladorAdministracionGeneralSO{

          static public function ctrMostrarTablaAdministracionGeneralSO($Obtener_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_Informe_Presentado, $Obtener_SI_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SI_Estatus, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_Informe_Presentado, $Obtener_SA_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_SA_Estatus, $Obtener_CA_Nombre_Sujeto_Obligado, $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Informe_Presentado, $Obtener_CA_Anios, $Obtener_CA_Total_Capacitacion ,$Obtener_CA_Fecha, $Obtener_CA_Estatus, $ValorSI_Informe_Presentado1, $ValorSI_Informe_Presentado6){

            $tablaSI = "solicitudes_informacion";
  
            $tablaSA = "solicitudes_arco";
  
            $TablaCA = "Capacitaciones";
  
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_Informe_Presentado, $Obtener_SI_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SI_Estatus, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_Informe_Presentado, $Obtener_SA_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_SA_Estatus, $Obtener_CA_Nombre_Sujeto_Obligado, $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Informe_Presentado, $Obtener_CA_Anios, $Obtener_CA_Total_Capacitacion ,$Obtener_CA_Fecha, $Obtener_CA_Estatus, $ValorSI_Informe_Presentado1, $ValorSI_Informe_Presentado6);
  
            return $respuesta;
  
          }


     }

?>