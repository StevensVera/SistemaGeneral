<?php

    require_once "../controladores/capacitaciones.controlador.php";

    require_once "../modelos/capacitaciones.modelo.php";

    class AjaxCapacitaciones{

        
        /* ===================== ACTIVAR SOLICITUD DE INFORMACION  ========================= */

        public $activaroRecepcionCapacitaciones;
        public $activarCapacitaciones;
        public $activarId;

        public function AjaxActivarSolicitudesInformacion(){

            $tabla = "capacitaciones";

            $item1 = "CA_Estatus";
            $valor1 = $this->activarCapacitaciones;

            $item2 = "idCA";
            $valor2 = $this->activarId;

            $item3 = "CA_Recepcion";
            $valor3 = $this->activaroRecepcionCapacitaciones;

            $respuesta = ModeloCapacitacion::mdlActualizarEstadoCapacitaciones($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);

        }

    } // Ajax Capacitaciones

/* ============================ ACTIVAR SOLICITUD DE INFORMACION ============================ */

if (isset($_POST["activarId"])) {
    
    $activarCapacitaciones = new AjaxCapacitaciones();
    $activarCapacitaciones -> activarCapacitaciones = $_POST["activarCapacitaciones"];
    $activarCapacitaciones -> activaroRecepcionCapacitaciones = $_POST["activaroRecepcionCapacitaciones"];
    $activarCapacitaciones -> activarId = $_POST["activarId"];
    $activarCapacitaciones -> AjaxActivarSolicitudesInformacion();
}    