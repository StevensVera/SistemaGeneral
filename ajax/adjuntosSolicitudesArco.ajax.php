<?php 
//================== CONTROLADORES =============================

// CONTROLADOR - INFORMACION DE SOLICITUDES
require_once "../controladores/solicitudes-arco.controlador.php";

// MODELO - INFORMACION DE SOLICITUDES
require_once "../modelos/solicitudes-arco.modelo.php";

class AjaxSolicitudesArco{

   /*=========  EDITAR ADJUNTOS - MOSTRAR - ==========*/ 

   public $idSolicitudesArco;

   public function AjaxSolicitudesArcoMostrar(){

    $item = "idSAR";
      
    $valor = $this->idSolicitudesArco;

    $respuesta = ControladorSolicitudesArco::ctrMostrarSolicitudArcoEditar($item, $valor);
  
    echo json_encode($respuesta);

   }

}

/*=============================================
EDITAR ADJUNTOS
=============================================*/ 
if(isset($_POST["idSolicitudesArco"])){

   $adjuntos = new AjaxSolicitudesArco();
   $adjuntos -> idSolicitudesArco = $_POST["idSolicitudesArco"];
   $adjuntos -> AjaxSolicitudesArcoMostrar();
 }
 