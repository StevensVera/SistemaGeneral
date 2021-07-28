<?php

require_once "../controladores/usuarios.controlador.php";

require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{


    /* ==================== ACTIVAR USUARIO ========================= */

    public $activarUsuario;
    public $activarId;

    public function AjaxActivarUsuario(){

        $tabla = "usuarios";

        $item1 = "estado_Informe";
        $valor1 = $this->activarUsuario;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloUsuariosInforme::mdlActualizarEstadoUsuario($tabla, $item1, $valor1, $item2, $valor2);


    } // End function AjaxActivarUsuario

    /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

    public $validarCodigo;

    public function ajaxValidarCodigo(){

        $item = "codigo";
        $valor = $this -> validarCodigo;

        $respuesta = ControladorUsuariosInformes::ctrValidarInformacionExitente($item, $valor);

        echo json_encode($respuesta);

    }



} // End class AjaxUsuario

/* ==================== ACTIVAR USUARIO ========================= */

if (isset($_POST["activarUsuario"])) {
    
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> AjaxActivarUsuario();
}

/* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

if(isset( $_POST["validarCodigo"])){

	$validaCodigo = new AjaxUsuarios();
	$validaCodigo -> validarCodigo = $_POST["validarCodigo"];
	$validaCodigo -> ajaxValidarCodigo();

}