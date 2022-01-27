<?php

    require_once "../controladores/capacitaciones.controlador.php";

    require_once "../modelos/capacitaciones.modelo.php";

    class AjaxCapacitaciones{

        
        /* ===================== ACTIVAR SOLICITUD DE INFORMACION  ========================= */

        public $activarCapacitaciones;
        public $activarId;

        public function AjaxActivarSolicitudesInformacion(){

            $tabla = "capacitaciones";

            $item1 = "CA_Estatus";
            $valor1 = $this->activarCapacitaciones;

            $item2 = "idCA";
            $valor2 = $this->activarId;

            $respuesta = ModeloCapacitacion::mdlActualizarEstadoCapacitaciones($tabla, $item1, $valor1, $item2, $valor2);

        }

    } // Ajax Capacitaciones

/* ============================ ACTIVAR SOLICITUD DE INFORMACION ============================ */

if (isset($_POST["activarCapacitaciones"])) {
    
    $activarCapacitaciones = new AjaxCapacitaciones();
    $activarCapacitaciones -> activarCapacitaciones = $_POST["activarCapacitaciones"];
    $activarCapacitaciones -> activarId = $_POST["activarId"];
    $activarCapacitaciones -> AjaxActivarSolicitudesInformacion();
}    