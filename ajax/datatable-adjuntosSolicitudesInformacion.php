<?php

session_start();

/*=========== CONTROLADOR SOLICITUDES DE INFORMACION ================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../controladores/solicitudes-informacion.controlador.php";

/*============== MODELO SOLICITUDES DE INFORMACION ==================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../modelos/solicitudes-informacion.modelo.php";

    class TablaAjuntosInformacionSolicitudes{

        static  public function MostrarTablaSolicitudesInformacion(){

            $item = "codigo"; 
            //$valor = "A.1";
            $valor =  $_SESSION["codigo"];

            $adjunto = ControladorSolicitudesInformes::ctrMostrarTablaSI($item,$valor);

            if(count($adjunto) == 0 ){

                echo '{"data": [] }';

                return;

            } // if contador

            $datosJson = '{
                           "data":[';

            for ($i=0; $i < count($adjunto); $i++) {

                /*                    

                if ($adjunto[$i]["estado_Informe"] != 0) {

                    $estados = "<button class='btn btn-success btn-xs btnActivar' idUsuario='".$adjunto[$i]["id"]."' estadoUsuario='0'>Activado</button>";

                } else {

                    $estados = "<button class='btn btn-danger btn-xs btnActivar' idUsuario='".$adjunto[$i]["id"]."' estadoUsuario='1'>Desactivado</button>";
                }
                */
            
            /*    
            if(isset($_GET["perfilOcultoUsuario"]) && $_GET["perfilOcultoUsuario"] == "Administrador" ){

                $botones = "<button class='btn btn-warning btnEditarAdjuntosUsuarios' idAdjuntosUsuarios='".$adjunto[$i]["id"]."' data-toggle='modal' data-target='#modalActualizarUsuario'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexUsuario' idAdjuntosUsuarios='".$adjunto[$i]["id"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <button class='btn btn-danger btnEliminarUsuario' idUsuario='".$adjunto[$i]["id"]."' codigo= '".$adjunto[$i]["codigo"]."' usuario='".$adjunto[$i]["nombre_Informe"]."' fotoUsuario='".$adjunto[$i]["foto_Informe"]."' ><i class='fa fa-times'></i></button>";

            } else {

                $botones = "<button class='btn btn-primary btnImprimerReportexUsuario' idAdjuntosUsuarios='".$adjunto[$i]["id"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> ";

            }

            */

            $botones = "<button class='btn btn-warning btnEditarAdjuntosUsuarios'    data-toggle='modal' data-target='#modalActualizarUsuario'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexUsuario'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <button class='btn btn-danger btnEliminarUsuario'  ><i class='fa fa-times'></i></button>";


                
                $datosJson .= '[

                    "'.($i+1).'",
                    "'.$adjunto[$i]["SI_Nombre_Sujeto_Obligado"].'",
                    "'.$adjunto[$i]["SI_Informe_Presentado"].'",
                    "'.$adjunto[$i]["SI_Anios"].'",
                    "'.$adjunto[$i]["SI_TOTAL_SOLICITUDES"].'",
                    "'.$adjunto[$i]["SI_Fecha"].'",
                    "'.$botones.'"
                
                ],';
                
            }// for

            $datosJson = substr($datosJson, 0, -1);
            
            $datosJson .= ']
                }';

            echo $datosJson;
                

        } // Funcion Mostrar Usuarios

    } // Class Tabla Solicitudes Informacion

    $activar = new TablaAjuntosInformacionSolicitudes();
    $activar -> MostrarTablaSolicitudesInformacion();