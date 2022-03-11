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

                if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                   $TipoEstado = "COMPLETADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";
                
                //// ============================================================ REVISIÓN - NO ENVIADO ===============================================================

                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "EN REVISIÓN";
 
                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";

                }else if ($adjunto[$i]["SI_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["SA_Recepcion"] == "NO ENVIADO" && $adjunto[$i]["CA_Recepcion"] == "NO ENVIADO"){

                    $TipoEstado = "NO ENVIADO";

                //// ============================================================ REVISIÓN - COMPLETADO ===============================================================
 
                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                    $TipoEstado = "EN REVISIÓN";

                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "EN REVISIÓN";

                }else if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "EN REVISIÓN";

                }else if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "EN REVISIÓN"){

                    $TipoEstado = "EN REVISIÓN";

                }else if ($adjunto[$i]["SI_Recepcion"] == "COMPLETADO" && $adjunto[$i]["SA_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                    $TipoEstado = "EN REVISIÓN";

                }else if ($adjunto[$i]["SI_Recepcion"] == "EN REVISIÓN" && $adjunto[$i]["SA_Recepcion"] == "COMPLETADO" && $adjunto[$i]["CA_Recepcion"] == "COMPLETADO"){

                    $TipoEstado = "EN REVISIÓN";

                }else{

                    $TipoEstado = "NO COMPLETADO";
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