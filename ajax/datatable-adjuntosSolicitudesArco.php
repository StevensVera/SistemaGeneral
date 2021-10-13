<?php

session_start();

/*=========== CONTROLADOR SOLICITUDES ARCO ================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../controladores/solicitudes-arco.controlador.php";

/*============== MODELO SOLICITUDES ARCO ==================*/
/* --- SOLICITUDES DE INFORMACION -- */
require_once "../modelos/solicitudes-arco.modelo.php";

    class TablasAdjuntosSolicitudesArco{

        static public function MostrarTablaSolicitudesArco(){
        
        $itemCodigo = "SA_Codigo_SO";
        $valor = $_SESSION["codigo"];

        $adjunto = ControladorSolicitudesArco::ctrMostrarTablaAR($itemCodigo, $valor);

        if (count($adjunto) == 0) {
            
            echo '{"data": []}';

            return;

        } // if contador

        $datosJson = '{ 
                        "data":[';

        for ($i=0; $i < count($adjunto); $i++){

            $botones = "<button class='btn btn-warning btnEditarAdjuntosUsuarios'    data-toggle='modal' data-target='#modalActualizarUsuario'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexUsuario'  title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <button class='btn btn-danger btnEliminarUsuario'  ><i class='fa fa-times'></i></button>";
        
            
            $datosJson .= '[

                "'.($i+1).'",
                "'.$adjunto[$i]["SA_Nombre_Sujeto_Obligado"].'",
                "'.$adjunto[$i]["SA_Informe_Presentado"].'",
                "'.$adjunto[$i]["SA_Anios"].'",
                "'.$adjunto[$i]["SA_TOTAL_SOLICITUDES"].'",
                "'.$adjunto[$i]["SA_Fecha"].'",
                "'.$botones.'"
                
            ],';

        } // for   

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
                }';
        
        echo $datosJson;

        } // Mostrar Solicitudes Arco

    } // Class Tabla Solicitudes Informacion

    $activar = new TablasAdjuntosSolicitudesArco();
    $activar -> MostrarTablaSolicitudesArco();


