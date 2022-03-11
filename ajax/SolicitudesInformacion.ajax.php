<?php

    require_once "../controladores/solicitudes-informacion.controlador.php";

    require_once "../modelos/solicitudes-informacion.modelo.php";

    class AjaxSolicitudesInformacion{

        /* ===================== ACTIVAR SOLICITUD DE INFORMACION  ========================= */

        public $activaroSolicitudesInformacion;
        public $activaroRecepcionSolicitudesInformacion;
        public $activarId;

        public function AjaxActivarSolicitudesInformacion(){

            $tabla = "solicitudes_informacion";

            $item1 = "SI_Estatus";
            $valor1 = $this->activaroSolicitudesInformacion;

            $item2 = "idSI";
            $valor2 = $this->activarId;

            $item3 = "SI_Recepcion";
            $valor3 = $this->activaroRecepcionSolicitudesInformacion;

            $respuesta = ModeloSolicitudesInformacion::mdlActualizarEstadoSolicitudesInformacion($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3 );

        }
         /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

        public $validarCodigoInformeSIAniosios;

        public function ajaxValidarIP(){

        $item1 = "SI_Codigo_UnicoInforme_Anios";

        $valor1 = $this -> validarCodigoInformeSIAniosios;

        $respuesta = ControladorSolicitudesInformes::ctrValidarSolicitudInformacionExitente($item1, $valor1);

        echo json_encode($respuesta);

        }
    

    }


    /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

    if(isset( $_POST["validarCodigoInformeSIAniosios"])){

	    $valida = new AjaxSolicitudesInformacion();
	    $valida -> validarCodigoInformeSIAniosios = $_POST["validarCodigoInformeSIAniosios"];
	    $valida -> ajaxValidarIP();

    }


    /* ============================ ACTIVAR SOLICITUD DE INFORMACION ============================ */

    if (isset($_POST["activarId"])) {
    
        $activaroSolicitudes = new AjaxSolicitudesInformacion();
        $activaroSolicitudes -> activaroSolicitudesInformacion = $_POST["activaroSolicitudesInformacion"];
        $activaroSolicitudes -> activaroRecepcionSolicitudesInformacion = $_POST["activaroRecepcionSolicitudesInformacion"];
        $activaroSolicitudes -> activarId = $_POST["activarId"];
        $activaroSolicitudes -> AjaxActivarSolicitudesInformacion();
    }    


