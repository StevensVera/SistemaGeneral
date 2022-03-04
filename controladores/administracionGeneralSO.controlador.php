<?php

    class ControladorAdministracionGeneralSO{

      // FUNCION PARA MOSTRAR TODOS LOS SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR

          static public function ctrMostrarTablaAdministracionGeneralSO($Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

            $tablaSI = "solicitudes_informacion";
  
            $tablaSA = "solicitudes_arco";
  
            $TablaCA = "Capacitaciones";
  
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);
  
            return $respuesta;
  
          }

       // FUNCION PARA MOSTRAR SOLAMENTE 3 SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR ________ VERSION 1 _____________

          static public function ctrMostrarAdministracionGeneralSO($itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

            $tablaSI = "solicitudes_informacion";
    
            $tablaSA = "solicitudes_arco";
    
            $TablaCA = "Capacitaciones";
    
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarAdministracionGeneralSO($tablaSI, $tablaSA, $TablaCA, $itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);
    
            return $respuesta;
    
          }    

          // FUNCION PARA MOSTRAR SOLAMENTE 3 SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR ________ VERSION 2 _____________

          static public function ctrMostrarTablaAdministracionGeneralxSO($Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_CA_Nombre_Sujeto_Obligado,
          $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha, $IdSI, $valorSI, $IdSA, $valorSA, $IdCA, $valorCA ){

            $tablaSI = "solicitudes_informacion";
  
            $tablaSA = "solicitudes_arco";
  
            $TablaCA = "Capacitaciones";
  
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarTablaAdministracionxSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_CA_Nombre_Sujeto_Obligado,
            $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha, $IdSI, $valorSI, $IdSA, $valorSA, $IdCA, $valorCA );
  
            return $respuesta;
  
          }


     }

?>