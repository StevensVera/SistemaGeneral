<?php

    class ControladorAdministracionGeneralSO{

          static public function ctrMostrarTablaAdministracionGeneralSO($Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_Estatus, $Obtener_SA_Estatus,  $Obtener_CA_Estatus){

            $tablaSI = "solicitudes_informacion";
  
            $tablaSA = "solicitudes_arco";
  
            $TablaCA = "Capacitaciones";
  
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_Estatus, $Obtener_SA_Estatus,  $Obtener_CA_Estatus);
  
            return $respuesta;
  
          }


     }

?>