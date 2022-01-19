<?php

    require_once "../controladores/solicitudes-arco.controlador.php";

    require_once "../modelos/solicitudes-arco.modelo.php";


    class AjaxSolcitudesArco{

    /* ===================== ACTIVAR SOLICITUD DE INFORMACION  ========================= */

        public $activarSolicitudesArco;
        public $activarId;

        public function AjaxActivarSolicitudesArco(){

            $tabla = "solicitudes_arco";

            $item1 = "SA_Estatus";
            $valor1 = $this->activarSolicitudesArco;

            $item2 = "idSAR";
            $valor2 = $this->activarId;

            $respuesta = ModeloSolicitudesArco::mdlActualizarEstadoSolicitudesArco($tabla, $item1, $valor1, $item2, $valor2);

        }

    } 

    /* ============================ ACTIVAR SOLICITUD DE INFORMACION ============================ */

    if (isset($_POST["activarSolicitudesArco"])) {
    
        $activarSolicitudesArco = new AjaxSolcitudesArco();
        $activarSolicitudesArco -> activarSolicitudesArco = $_POST["activarSolicitudesArco"];
        $activarSolicitudesArco -> activarId = $_POST["activarId"];
        $activarSolicitudesArco -> AjaxActivarSolicitudesArco();
    }