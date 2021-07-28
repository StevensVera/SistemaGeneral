<?php
/* ==================== CONTROLADORES ========================= */

// CONTROLADOR - USUARIOS
require_once "../controladores/usuarios.controlador.php";

// MODELO - USUARIOS
require_once "../modelos/usuarios.modelo.php";

class AjaxAdjuntosUsuarios{

    /* FUNCION PARA MOSTRAR DATOS EDITAR*/

    public $idAdjuntosUsuarios;

    public function ajaxMostrarEditarAdjuntosUsuarios(){

        $item = "id";

        $valor = $this->idAdjuntosUsuarios;

        $respuesta = ControladorUsuariosInformes::ctrMostrarAdjuntosEditarUsuarios($item, $valor);

        echo json_encode($respuesta);
        
    }

}

if (isset($_POST["idAdjuntosUsuarios"])) {

    $adjuntosUsuarios = new AjaxAdjuntosUsuarios();
    $adjuntosUsuarios -> idAdjuntosUsuarios = $_POST["idAdjuntosUsuarios"];
    $adjuntosUsuarios -> ajaxMostrarEditarAdjuntosUsuarios();

    
}