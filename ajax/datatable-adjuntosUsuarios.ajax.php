<?php

/*======================  CONTROLADOR USUARIOS  =========================*/
/* --- USUARIOS --- */
require_once "../controladores/usuarios.controlador.php";

/*======================  MODELOS USUARIOS  =========================*/
/* --- USUARIO --- ¨*/
require_once "../modelos/usuarios.modelo.php";

    class TablaAdjuntosUsuarios{
    
          static  public function MostrarTablaUsuarios(){

                $item = null; 
                $valor = null;
                $orden = "tipo_so";

                $adjunto = ControladorUsuariosInformes::ctrMostrarTablaUsuario($item,$valor,$orden);

                if(count($adjunto) == 0 ){

                    echo '{"data": [] }';

                    return;

                } // if contador

                $datosJson = '{
                               "data":[';

                for ($i=0; $i < count($adjunto); $i++) {


                    if ($adjunto[$i]["estado_Informe"] != 0) {

                        $estados = "<button class='btn btn-success btn-xs btnActivar' idUsuario='".$adjunto[$i]["id"]."' estadoUsuario='0'>Activado</button>";

                    } else {

                        $estados = "<button class='btn btn-danger btn-xs btnActivar' idUsuario='".$adjunto[$i]["id"]."' estadoUsuario='1'>Desactivado</button>";
                    }

                if(isset($_GET["perfilOcultoUsuario"]) && $_GET["perfilOcultoUsuario"] == "Administrador" ){

                    $botones = "<button class='btn btn-warning btnEditarAdjuntosUsuarios' idAdjuntosUsuarios='".$adjunto[$i]["id"]."' data-toggle='modal' data-target='#modalActualizarUsuario'><i class='fa fa-pencil'></i></button> <button class='btn btn-primary btnImprimerReportexUsuario' idAdjuntosUsuarios='".$adjunto[$i]["id"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> <button class='btn btn-danger btnEliminarUsuario' idUsuario='".$adjunto[$i]["id"]."' codigo= '".$adjunto[$i]["codigo"]."' usuario='".$adjunto[$i]["nombre_Informe"]."' fotoUsuario='".$adjunto[$i]["foto_Informe"]."' ><i class='fa fa-times'></i></button>";

                } else {

                    $botones = "<button class='btn btn-primary btnImprimerReportexUsuario' idAdjuntosUsuarios='".$adjunto[$i]["id"]."' title='GENERAR ARCHIVO'><i class='fa fa-file-pdf-o'></i></button> ";

                }


                    
                    $datosJson .= '[

                        "'.($i+1).'",
                        "'.$adjunto[$i]["codigo"].'",
                        "'.$adjunto[$i]["tipo_so"].'",
                        "'.$adjunto[$i]["nombre_Informe"].'",
                        "'.$adjunto[$i]["usuario_Informe"].'",
                        "'.$adjunto[$i]["perfil_Informe"].'",
                        "'.$estados.'",
                        "'.$adjunto[$i]["fecha_informe"].'",
                        "'.$botones.'"
                    
                    ],';
                    
                }// for

                $datosJson = substr($datosJson, 0, -1);
                
                $datosJson .= ']
                    }';

                echo $datosJson;
                    

            } // Funcion Mostrar Usuarios

    } // class Tabla Usuario

$activarInventario = new TablaAdjuntosUsuarios();
$activarInventario -> MostrarTablaUsuarios();