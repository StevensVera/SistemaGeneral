<?php

    require_once "../controladores/solicitudes-arco.controlador.php";

    require_once "../modelos/solicitudes-arco.modelo.php";


    class AjaxSolcitudesArco{

    /* ===================== ACTIVAR SOLICITUD DE INFORMACION  ========================= */

        public $activarSolicitudesArco;
        public $activaroRecepcionSolicitudesArco;
        public $activarId;

        public function AjaxActivarSolicitudesArco(){

            $tabla = "solicitudes_arco";

            $item1 = "SA_Estatus";
            $valor1 = $this->activarSolicitudesArco;

            $item2 = "idSAR";
            $valor2 = $this->activarId;

            $item3 = "SA_Recepcion";
            $valor3 = $this->activaroRecepcionSolicitudesArco;

            $respuesta = ModeloSolicitudesArco::mdlActualizarEstadoSolicitudesArco($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);

        }

    } 

    /* ============================ ACTIVAR SOLICITUD DE INFORMACION ============================ */

    if (isset($_POST["activarId"])) {
    
        $activarSolicitudesArco = new AjaxSolcitudesArco();
        $activarSolicitudesArco -> activarSolicitudesArco = $_POST["activarSolicitudesArco"];
        $activarSolicitudesArco -> activaroRecepcionSolicitudesArco = $_POST["activaroRecepcionSolicitudesArco"];
        $activarSolicitudesArco -> activarId = $_POST["activarId"];
        $activarSolicitudesArco -> AjaxActivarSolicitudesArco();
    }