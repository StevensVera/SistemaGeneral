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
            // SOLICITUDES DE INFORMACIÓN
            $Obtener_SI_Codigo_Tipo_Informe_Anios = "SI_Codigo_Tipo_Informe_Anios";
            $Obtener_SI_Estatus = "SI_Estatus";
            $Obtener_SI_Codigo_UnicoInforme_Anios = "SI_Codigo_UnicoInforme_Anios";
            $Obtener_Si_Codigo_SO = "Si_Codigo_SO";
            // SOLICITUDES DE ARCO
            $Obtener_SA_Codigo_Tipo_Informe_Anios = "SA_Codigo_Tipo_Informe_Anios";
            $Obtener_SA_Estatus = "SA_Estatus";
            // SOLICITUDES DE CAPACITACIONES
            $Obtener_CA_Codigo_Tipo_Informe_Anios = "CA_Codigo_Tipo_Informe_Anios";
            $Obtener_CA_Estatus = "CA_Estatus";

            // Dato para Establecer el tipo de datos. 



            $adjunto = ControladorAdministracionGeneralSO::ctrMostrarTablaAdministracionGeneralSO($Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);

            if (count($adjunto) == 0) {
                
                echo '{"data": []}';

                return;
  
            } // if contador

            $datosJson = '{
                            "data":[';


            for ($i=0; $i < count($adjunto) ; $i++) { 

                $TipoEstado = "";

              //================================================================ EN REVISIÓN ===============================================================================

              if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                $TipoEstado = "EN REVISIÓN";
                
              } 

              // - REVISION - NO ENVIADO
                
              else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }

                // - REVISION - OBSERVACIÓNES
                
              else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "EN REVISIÓN";
                  
              }

                //  REVISION - AMONESTACION PRIVADA
              
              else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "EN REVISIÓN";

              }

                // - REVISION - AMONESTACIÓN PÚBLICA 

              else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "EN REVISIÓN";

              }  

                // - REVISION - PROCESO DE SANCIÓN 

              else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }                   
              
                // - REVISION - FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "EN REVISIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "EN REVISIÓN";

              } 
         
              //================================================================ AMONESTACIÓN PRIVADA ===============================================================================

              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }

              // AMONESTACION PRIVADA - NO ENVIADO
      
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              } 

                // AMONESTACION PRIVADA - OBSERVACIÓNES
      
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              } 

              // - AMONESTACION PRIVADA - FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACION PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACION PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACION PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACION PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACION PRIVADA"){

              $TipoEstado = "AMONESTACION PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACION PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACION PRIVADA"){

              $TipoEstado = "AMONESTACION PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACION PRIVADA"){

              $TipoEstado = "AMONESTACION PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACION PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACION PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACION PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACION PRIVADA";

              } 

              //================================================================ AMONESTACIÓN PÚBLICA ===============================================================================

              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

              $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }              
              
              // AMONESTACIÓN PÚBLICA - NO ENVIADO
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }               
              
              // AMONESTACIÓN PÚBLICA - OBSERVACIÓNES
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

               // AMONESTACIÓN PÚBLICA - AMONESTACION PRIVADA
              
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              } 


                // AMONESTACIÓN PÚBLICA - FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "AMONESTACIÓN PÚBLICA";

              } 

              //================================================================ PROCESO DE SANCIÓN ===============================================================================
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                $TipoEstado = "PROCESO DE SANCIÓN";
  
              } 

              // PROCESO MULTA - NO ENVIADO
                
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }

                // PROCESO MULTA - OBSERVACIÓNES
                
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }

                //  PROCESO DE SANCIÓN - AMONESTACION PRIVADA
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

                // PROCESO DE SANCIÓN - AMONESTACIÓN PÚBLICA 

              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }                
              
                // PROCESO DE SANCIÓN - FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

               //================================================================ PROCESO DE SANCIÓN + COMPLEMENTOS ===============================================================================

                // PROCESO DE SANCIÓN - NO ENVIADO - OBSERVACIÓNES
                
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }

               // PROCESO DE SANCIÓN - NO ENVIADO - AMONESTACION PRIVADA
                
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }

              // PROCESO DE SANCIÓN - NO ENVIADO - AMONESTACIÓN PÚBLICA

              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }

              // PROCESO DE SANCIÓN - NO ENVIADO - FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){
                  
                $TipoEstado = "PROCESO DE SANCIÓN";
                  
              }
              

              //  PROCESO DE SANCIÓN - AMONESTACIÓN PRIVADA -  AMONESTACIÓN PÚBLICA
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

                //  PROCESO DE SANCIÓN - AMONESTACIÓN PRIVADA -  OBSERVACIÓNES
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

                //  PROCESO DE SANCIÓN - OBSERVACIÓNES -  AMONESTACIÓN PÚBLICA
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

                //  PROCESO DE SANCIÓN - OBSERVACIÓNES -  FINALIZADO
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

              //  PROCESO DE SANCIÓN - AMONESTACIÓN PRIVADA -  FINALIZADO
              
              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }

                // PROCESO DE SANCIÓN - AMONESTACIÓN PÚBLICA - FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "PROCESO DE SANCIÓN" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "PROCESO DE SANCIÓN"){

                  $TipoEstado = "PROCESO DE SANCIÓN";

              } 

              //================================================================ AMONESTACIÓN PÚBLICA + COMPLEMENTO ===============================================================================
              
                // AMONESTACIÓN PÚBLICA - NO ENVIADO - OBSERVACIÓNES
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

               // AMONESTACIÓN PÚBLICA - NO ENVIADO - AMONESTACIÓN PRIVADA
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

                // AMONESTACIÓN PÚBLICA - NO ENVIADO - FINALIZADO
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

                // AMONESTACIÓN PÚBLICA - OBSERVACIÓNES - AMONESTACIÓN PRIVADA
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

                // AMONESTACIÓN PÚBLICA - OBSERVACIÓNES - FINALIZADO
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

                // AMONESTACIÓN PÚBLICA - AMONESTACIÓN PRIVADA - FINALIZADO
                
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PÚBLICA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PÚBLICA"){
                  
                $TipoEstado = "AMONESTACIÓN PÚBLICA";
                  
              }

              //================================================================ AMONESTACIÓN PRIVADA + COMPLEMENTO ===============================================================================

                // AMONESTACION PRIVADA - NO ENVIADO -  OBSERVACIÓNES
      
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }   
              
                // AMONESTACION PRIVADA - NO ENVIADO -  FINALIZADO
      
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              } 

                // AMONESTACION PRIVADA - OBSERVACIÓNES -  FINALIZADO
      
              else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "AMONESTACIÓN PRIVADA" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "AMONESTACIÓN PRIVADA"){

              $TipoEstado = "AMONESTACIÓN PRIVADA";

              } 

              //================================================================ NO ENVIADO ===============================================================================

              else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                $TipoEstado = "NO ENVIADO";
  
              } 

                // NO ENVIADO -  FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }

                // NO ENVIADO -  OBSERVACIÓNES

              else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }

                // NO ENVIADO - OBSERVACIÓNES

              else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }

              //================================================================ NO ENVIADO + COMPLEMENTO ===============================================================================

                // NO ENVIADO -  FINALIZADO - OBSERVACIÓNES

              else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){
                  
                $TipoEstado = "NO ENVIADO";
                  
              }

              //================================================================ FINALIZADO ===============================================================================

              else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                $TipoEstado = "FINALIZADO";
  
              } 
              
              //================================================================ OBSERVACIÓNES ===============================================================================

              else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){

                $TipoEstado = "OBSERVACIÓNES";
  
              }                 
              
              // OBSERVACIÓNES -  FINALIZADO

              else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){

                $TipoEstado = "OBSERVACIÓNES";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "OBSERVACIÓNES";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "OBSERVACIÓNES";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "OBSERVACIÓNES"){
                  
                $TipoEstado = "OBSERVACIÓNES";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "FINALIZADO" && $adjunto[$i]["SA_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "OBSERVACIÓNES";
                  
              }else if ($adjunto[$i]["SI_Recepcion"] == "OBSERVACIÓNES" && $adjunto[$i]["SA_Recepcion"] == "FINALIZADO" && $adjunto[$i]["CA_Recepcion"] == "FINALIZADO"){
                  
                $TipoEstado = "OBSERVACIÓNES";
                  
              }

              else {

                $TipoEstado = "EN REVISIÓN";


              }

                $botones = "<button class='btn btn-primary btnEditarAdministracionSO ' idSolicitudesInformacion='".$adjunto[$i]["idSI"]."' idSolicitudesArco='".$adjunto[$i]["idSAR"]."'  idCapacitaciones='".$adjunto[$i]["idCA"]."' data-toggle='modal' data-target='#modalActualizarAdministracionSOGeneral' title='CALIFICAR INFORMES' ><i class='fa fa-flag' aria-hidden='true'></i></button> <a href='".$adjunto[$i]["SI_Archivo"]."' target='_blank'><button class='btn btn-danger ' title='GENERAR ARCHIVO SOLICITUD DE INFORMACIÓN'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <a href='".$adjunto[$i]["SA_Archivo"]."' target='_blank'><button class='btn btn-danger ' title='GENERAR ARCHIVO SOLICITUD DE ARCO'><i class='fa fa-file-text' aria-hidden='true'></i></button></a> <a href='".$adjunto[$i]["CA_Archivo"]."' target='_blank'><button class='btn btn-danger ' title='GENERAR ARCHIVO DE CAPACITACIONES'><i class='fa fa-file-text' aria-hidden='true'></i></button></a>";

                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["SI_Informe_Presentado"].'",
                    "'.$adjunto[$i]["SI_Anios"].'",
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