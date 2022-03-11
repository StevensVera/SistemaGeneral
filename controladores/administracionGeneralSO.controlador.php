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

       // FUNCION PARA ACTUALIZAR TABLA MODAL 

          static public function ctrAdministracionGeneralSOModal(){
            
            if(isset($_POST["EditarSORSI"]) && isset($_POST["EditarSORSA"]) && isset($_POST["EditarSORSA"]) ){

              $TablaSI = "solicitudes_informacion";

              $TablaSA = "solicitudes_arco";

              $TablaCA = "capacitaciones";

              $Obtener_SI_Codigo_Tipo_Informe_Anios = "SI_Codigo_Tipo_Informe_Anios";

              $Obtener_SA_Codigo_Tipo_Informe_Anios = "SA_Codigo_Tipo_Informe_Anios";

              $Obtener_CA_Codigo_Tipo_Informe_Anios = "CA_Codigo_Tipo_Informe_Anios";

              $datos = array("idSI"=>$_POST["EditaridSI"],
                            "SI_Recepcion"=>$_POST["EditarSORSI"],
                            "SI_Observaciones"=>$_POST["EditarSOOSI"],
                            "idSAR"=>$_POST["EditaridSA"],
                            "SA_Recepcion"=>$_POST["EditarSORSA"],
                            "SA_Observaciones"=>$_POST["EditarSOOSA"],
                            "idCA"=>$_POST["EditaridCA"],
                            "CA_Recepcion"=>$_POST["EditarSORCA"],
                            "CA_Observaciones"=>$_POST["EditarSOOCA"],
                            );

              $respuesta = ModeloAdministracionGeneralSO::mdlAdministracionGeneralSOModal($TablaSI, $TablaSA, $TablaCA , $datos, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SA_Codigo_Tipo_Informe_Anios, $Obtener_CA_Codigo_Tipo_Informe_Anios );                               

                   if ($respuesta == "ok") {
                       
                       echo'<script>

                       swal({
                           type: "success",
                           title: "El estatus ha sido cambiado correctamente",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar"
                           }).then(function(result){
                                       if (result.value) {

                                       window.location = "dashboard";

                                       }
                                   })

                       </script>';

                   }
    
          
            }

    
          }       


       // FUNCION PARA MOSTRAR SOLAMENTE 3 SUJETOS OBLIGADOS QUE ENVARIOS SU REPORTE Y SE MUESTRAN EN EL ADMINISTRADOR ________ VERSION 1 _____________

          static public function ctrMostrarAdministracionGeneralSO($itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

            $tablaSI = "solicitudes_informacion";
    
            $tablaSA = "solicitudes_arco";
    
            $TablaCA = "Capacitaciones";
    
            $respuesta = ModeloAdministracionGeneralSO::MdlMostrarAdministracionGeneralSO($tablaSI, $tablaSA, $TablaCA, $itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);
    
            return $respuesta;
    
          }    

          /*=============================================
	        FUNCION PARA EL CAMBIO DE LOS BOTONES
	        =============================================*/

	        static public function ctrMostrarBotonesAdministracionSOSI($item, $valor){

		        $tabla = "solicitudes_informacion";

		        $respuesta = ModeloAdministracionGeneralSO::mdlMostrarAdministracionBSOSI($tabla, $item, $valor);

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