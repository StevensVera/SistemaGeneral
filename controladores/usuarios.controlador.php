<?php

    class ControladorUsuariosInformes{

     /* ====================== CUIDAD MUCHO ESTA FUNCION ============================== */

    static public function ctrIngresoUsuarioInformes2(){

        if(isset($_POST["ingUsuarioInforme"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuarioInforme"]) && 
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPasswordInforme"])){

                $tablaUsuarios = "usuarios";

                $tablaInformesSO = "informesso";
                $Campo1InformeSO = "idSO";
                $Campo2InformeSO = "InformePresentado";

                $item = "usuario_Informe";

                $valor = $_POST["ingUsuarioInforme"];

                $respuesta = ModeloUsuariosInforme::MdlMostrarUsuariosInforme($tablaUsuarios,$tablaInformesSO,$item,$valor, $Campo1InformeSO,$Campo2InformeSO);

                var_dump($respuesta);
                
            } // End if preg_match

        }// End if isset

    } // End Function ctrIngresoUsuarioInformes   


    /* ================= CUIDAD MUCHO ESTA FUNCION - FUNCION LLAVES FORANEAS ==================== */

    static public function ctrIngresoUsuarioInformesllaves(){

        if(isset($_POST["ingUsuarioInforme"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuarioInforme"]) && 
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPasswordInforme"])){

                /* ==== Tabla Informesso ==== */
                $tablaInformesSO = "informesso";
                /* ===== Tabla Usuario ===== */
                $tablaUsuarios = "usuarios";
                /* ==== Tabla Solicitudes_Informacion ==== */
                $tablaSI = "solicitudes_informacion";
                /* ==== Tabla Solicitudes_Informacion ==== */
                $tablaAR = "solicitudes_arco";
                /* ==== Tabla Solicitudes_Informacion ==== */
                $tablaCA = "capacitaciones";


                /* ============ ID de la Tabla de Informes SO ========= */
                $IdInformeSO = "idSO";
                /* ======= Nombre del Informe Tabla la Usuario ======== */
                $NombreInformeUsuario = "nombre_Informe";
                /* ===== Informe Presentado Tabla de Informes SO ====== */
                $InformePresentadoInformeSO = "InformePresentado";
                /* ======= Anio de la Tabla de la Informes SO ========= */
                $AnioInformeSO = "Anio";
                /* ===== Total de Solicitudes Tabla de la Informes SI = */
                $TotalSolicitudesSI = "SI_TOTAL_SOLICITUDES";
                /* ===== Total de Solicitudes Tabla de la Informes SA = */
                $TotalSolicitudesSA = "SA_TOTAL_SOLICITUDES";
                /* ===== Total de Solicitudes Tabla de la Informes CA = */
                $TotalSolicitudesCA = "Cantidad_Capacitacion";
                /* =============  Fecha Informe Presentado  =========== */
                $FechaInformeSO = "fecha";

                $item = "usuario_Informe";

                $valor = $_POST["ingUsuarioInforme"];

                $respuesta = ModeloUsuariosInforme::MdlMostrarUsuariosInformellaves($tablaInformesSO,$tablaUsuarios, $tablaSI,$tablaAR,$tablaCA, $IdInformeSO,$NombreInformeUsuario, $InformePresentadoInformeSO,$AnioInformeSO,$TotalSolicitudesSI,$TotalSolicitudesSA,$TotalSolicitudesCA,$FechaInformeSO,$item,$valor);

                var_dump($respuesta);
                
            } // End if preg_match

        }// End if isset

    } // End Function ctrIngresoUsuarioInformes  


     /* =================== METODO PDF - MOSTRAR DATOS INDIVUDALES REGISTRADOS POR USUARIO =============== */

    static public function ctrMostrarPDFUsuario ($item, $valor){

        $tabla = "usuarios";

        $respuesta = ModeloUsuariosInforme::mdlMostrarPDFUsuario($tabla,$item,$valor);

        return $respuesta;

    }

    /* ====================== METODO EDITAR - MOSTRAR LOS DATOS REGISTRADOS ============================== */

    static public function ctrMostrarAdjuntosEditarUsuarios($item,$valor){

        $tabla = "usuarios";

        $respuesta = ModeloUsuariosInforme::mdlMostrarAdjuntosEditarUsuarios($tabla, $item, $valor);

        return $respuesta;


    }

    /* ====================== METODO PARA MOSTRAR TABLA DE USUARIO ============================== */

    static public function ctrMostrarTablaUsuario($item,$valor,$orden){

        $tabla = "usuarios";

        $respuesta = ModeloUsuariosInforme::MdlMostrarTablaUsuario($item,$valor,$orden,$tabla);

        return $respuesta;
        
    }

    /* ====================== METODO PARA INICIO DE SESION USUARIO ============================== */

        static public function ctrIngresoUsuarioInformes(){

            if(isset($_POST["ingUsuarioInforme"])){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuarioInforme"]) && 
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPasswordInforme"])){

                    $encriptar = crypt($_POST["ingPasswordInforme"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');   
                    
                    $tablaUsuarios = "usuarios";

                    $item = "usuario_Informe";

                    $valor = $_POST["ingUsuarioInforme"];

                    $respuesta = ModeloUsuariosInforme::MdlMostrarUsuariosInforme($tablaUsuarios,$item,$valor);

                    if($respuesta["usuario_Informe"] == $_POST["ingUsuarioInforme"] && $respuesta["password_Informe"] == $encriptar){

                        if ($respuesta["estado_Informe"] == 1) {
                        
                            $_SESSION["iniciarSesionInformes"] = "ok";
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["codigo"] = $respuesta["codigo"];
                            $_SESSION["tipo_so"] = $respuesta["tipo_so"];
                            $_SESSION["nombre_Informe"] = $respuesta["nombre_Informe"];
                            $_SESSION["titular_Informe"] = $respuesta["titular_Informe"];
                            $_SESSION["usuario_Informe"] = $respuesta["usuario_Informe"];
                            $_SESSION["perfil_Informe"] = $respuesta["perfil_Informe"];
                            $_SESSION["foto_Informe"] = $respuesta["foto_Informe"];
                            $_SESSION["archivo_Informe"] = $respuesta["archivo_Informe"];

                            echo '<script>

                                    window.location = "inicio";
                                
                                </script>';

                        }else {

                            echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';
                        }     

                    }else{

                        echo '<br><div class = "alert alert-danger"> Error al ingresar, vuelve a intentarlo </div>';

                    }
                    
                } // End if preg_match

            }// End if isset

        } // End Function ctrIngresoUsuarioInformes

    /* ====================== METODO PARA AGREGAR USUARIO ============================== */
    
        static public function ctrCrearUsuario(){

            if (isset($_POST["nuevoUsuarioUT"])) {
                
            $pattern    = '/^(?:[;\/?:@&=+$,]|(?:[^\W_]|[-_.!~*\()\[\] ])|(?:%[\da-fA-F]{2}))*$/';
            $pattern2    = '/^(?:[;\/?:@&=+$,]|(?:[^\W_]|[-_.!~*\()\[\] ])|(?:%[\da-fA-F]{2}))*$/';

                if(preg_match('/^[a-zA-Z0-9]|[.][a-zA-Z0-9]+$/', $_POST["nuevoCodigoSO"]) ||
                   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreUT"])  ||
                   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoUsuarioUT"]) ||
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]
                   )){

                /* ================== VALIDAR IMAGEN =================== */
                
                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                     
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ==========================*/

                    $espacio = " ";
                    
                    $directorioImagen = "vistas/img/usuarios/".$_POST["nuevoCodigoSO"].$espacio.$_POST["nuevoNombreSO"];
                    
                    mkdir($directorioImagen, 0775);

                    /*==================== APLICAMOS LAS FUNCIONES DE LA IMAGEN ============================ */

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        /* ================= GUARDARMOS LA IMAGEN EN EL DIRECTORIO ===============*/

                        $aletorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["nuevoCodigoSO"].$espacio.$_POST["nuevoNombreSO"]."/".$aletorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aletorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoCodigoSO"].$espacio.$_POST["nuevoNombreSO"]."/".$aletorio.".jpg";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

                }

                /* ================= VALIDAR ARCHIVO PDF =================*/

                $ruta2 = "";

                if (isset($_FILES["nuevoArchivo"]["tmp_name"])){

                    /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                    
                    $espacio = " ";

                    $directorioArchivo = "vistas/pdfs/usuarios/".$_POST["nuevoCodigoSO"].$espacio.$_POST["nuevoNombreSO"];

                    mkdir($directorioArchivo, 0775);

                    /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                    $aletorio = mt_rand(100,999);

                    if ($_FILES["nuevoArchivo"]["type"] == "application/pdf") {
                        
                        $ruta2 = "vistas/pdfs/usuarios/".$_POST["nuevoCodigoSO"].$espacio.$_POST["nuevoNombreSO"]."/".$aletorio.".pdf";

                        move_uploaded_file ($_FILES["nuevoArchivo"]["tmp_name"], $ruta2);

                    }

                } 
                
                $tabla = "usuarios";

                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("codigo" => $_POST["nuevoCodigoSO"],
                               "tipo_so" => $_POST["nuevoTipoSO"],
                               "nombre_Informe" => $_POST["nuevoNombreSO"],
                               "titular_Informe" => $_POST["nuevoNombreUT"],
                               "usuario_Informe" => $_POST["nuevoUsuarioUT"],
                               "password_Informe" => $encriptar,
                               "perfil_Informe" => $_POST["nuevoPerfil"],
                               "foto_Informe" => $ruta,
                               "archivo_Informe" => $ruta2);

                $respuesta = ModeloUsuariosInforme::mdlAgregarUsuario($tabla, $datos);
                
                if ($respuesta == "ok") {

                    echo '<script>

                            swal({
 
                               type: "success",
                               title: "¡El Usuario ha sido guardado correctamente!",
                               showConfirmButton: true,
                               confirmButtonText: "Cerrar"
 
                                }).then(function(result){
 
                                if(result.value){
                        
                                  window.location = "usuarios";
 
                                }
 
                               });
            
                         </script>';
                    

                } // END IF VALIDACION DE ACEPTACION DE USUARIO
                   
            

                }else{

                    echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        text: "Favor de revisar la correcta insercion del Codigo,Nombre UT, Usuario y Contraseña ",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

                    
                } // END ELSE VALIDACION DE ERROR AL INGRESAR USUARIO.
                
            } //END 1er Condicion




        } // END FUNCION CREAR USUARIO
    
    /* ====================== METODO PARA ACTUALIZAR USUARIO ============================== */
    
        static public function ctrEditarUsuario(){

            if (isset($_POST["editarUsuarioUT"])) {

        
                    /* =================== VALIDAR FOTO PARA ACUTALIZAR =================== */

                    $rutaFoto = $_POST["fotoActual"];

                    if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                        
                        list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO ==========================*/

                        $espacio = " ";
                        
                        $directorioImagen = "vistas/img/usuarios/".$_POST["editarCodigoSO"].$espacio.$_POST["editarNombreSO"];

                        /*================== VALIDAMOS EXISTENCIA DE OTRA IMAGEN EN LA BASE DE DATOS ================== */

                        if(!empty($_POST["fotoActual"])){
                            
                            unlink($_POST["fotoActual"]);

                        } else {
                            
                            mkdir($directorioImagen, 0775);

                        }
                        
                    
                        /*==================== APLICAMOS LAS FUNCIONES DE LA IMAGEN ============================ */

                        if ($_FILES["editarFoto"]["type"] == "image/jpeg"){

                            /* ================= GUARDARMOS LA IMAGEN EN EL DIRECTORIO ===============*/

                            $aletorio = mt_rand(100,999);

                            $rutaFoto = "vistas/img/usuarios/".$_POST["editarCodigoSO"].$espacio.$_POST["editarNombreSO"]."/".$aletorio.".jpg";

                            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $rutaFoto);

                        }

                        if ($_FILES["editarFoto"]["type"] == "image/png"){

                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/

                            $aletorio = mt_rand(100,999);

                            $rutaFoto = "vistas/img/usuarios/".$_POST["editarCodigoSO"].$espacio.$_POST["editarNombreSO"]."/".$aletorio.".jpg";

                            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagepng($destino, $rutaFoto);

                        }

                    }

                    /* =================== VALIDAR ARCHIVO PDF PARA ACUTALIZAR =================== */

                    $rutaArchivo = $_POST["archivoActual"];

                    if (isset($_FILES["editarArchivo"]["tmp_name"]) && !empty($_FILES["editarArchivo"]["tmp_name"])){

                        /*==================== CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR EL ARCHIVO PDF ==========================*/
                        
                        $espacio = " ";

                        $directorioArchivo = "vistas/pdfs/usuarios/".$_POST["editarCodigoSO"].$espacio.$_POST["editarNombreSO"];

                        /*================== VALIDAMOS EXISTENCIA DE OTRA ARCHIVO PDF EN LA BASE DE DATOS ================== */

                        if(!empty($_POST["archivoActual"])){
                            
                            unlink($_POST["archivoActual"]);

                        } else {
                            
                            mkdir($directorioArchivo, 0775);

                        }

                        /*==================== APLICAMOS LAS FUNCIONES AL ARCHIVO ============================ */

                        $aletorio = mt_rand(100,999);

                        if ($_FILES["editarArchivo"]["type"] == "application/pdf") {
                            
                            $rutaArchivo = "vistas/pdfs/usuarios/".$_POST["editarCodigoSO"].$espacio.$_POST["editarNombreSO"]."/".$aletorio.".pdf";

                            move_uploaded_file ($_FILES["editarArchivo"]["tmp_name"], $rutaArchivo);

                        }

                    } 

                    
                    $tabla = "usuarios";

                    if ($_POST["editarPassword"] != "" ){
                    
                        if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        
                            $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                        } else {

                            echo '<script>

                            swal({

                            type: "success",
                            title: "¡El Usuario no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                                }).then(function(result){

                                if(result.value){
                        
                                window.location = "usuarios";

                                }

                            });
            
                        </script>';

                        }

                    } else{
                        
                        $encriptar = $_POST["passwordActual"];

                    }

                

                    $datos = array("codigo"=>$_POST["editarCodigoSO"],
                                "tipo_so"=>$_POST["editarTipoSO"],
                                "nombre_Informe"=>$_POST["editarNombreSO"],
                                "titular_Informe"=>$_POST["editarNombreUT"],
                                "usuario_Informe"=>$_POST["editarUsuarioUT"],
                                "password_Informe"=>$encriptar,
                                "perfil_Informe"=>$_POST["editarPerfil"],
                                "foto_Informe" => $rutaFoto, 
                                "archivo_Informe" => $rutaArchivo);
                                

                    $respuesta = ModeloUsuariosInforme::mdlEditarUsuario($tabla, $datos);                               

                    if ($respuesta == "ok") {
                        
                        echo'<script>

                        swal({
                            type: "success",
                            title: "El Usuario ha sido cambiado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {

                                        window.location = "usuarios";

                                        }
                                    })

                        </script>';


                    }

                

            }


        }

    /* ============ AQUI VALIDAMOS TODA LA INFORMACION QUE PUDIERA ESTA EXISTENTE  ================= */
       // 1.- VALIDAR CODIGO 
       
       static public function ctrValidarInformacionExitente($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuariosInforme::mdlValidarInformacionExitente($tabla, $item, $valor);

		return $respuesta;
	}

    /* ====================== METODO PARA BORRAR USUARIO ============================== */
        
        static public function ctrBorrarUsuario(){

            if (isset($_GET["idUsuario"])){
                
                $espacio = " ";
                
                $tabla = "usuarios";
                $datos = $_GET["idUsuario"];

                if($_GET["fotoUsuario"] != ""){

                    unlink($_GET["fotoUsuario"]);
                    rmdir('vistas/img/usuarios/'.$_GET["codigo"].$espacio.$_GET["usuario"]); 

                }

                $respuesta = ModeloUsuariosInforme::mdlBorrarUsuario($tabla,$datos);

                if($respuesta == "ok"){

                    echo '<script>

                            swal({
                                type: "success",
                                title: "El usuario, ha sido borrada correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){

                                      if (result.value) {

                                         window.location = "usuarios";

                                        }
                                })

                          </script>';
                }else {

                    echo '<script>

					swal({
						  type: "error",
						  title: "No se puede eliminar el Usuario Seleccionado",
						  text: "Esta eliminación, no puede ser llevada acabó, porqué existen usuarios relaccionados.",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

                } 

            } // IF PARA ESTABLECER LA ELIMINACION

        } // FUNCION BORRAR USUARIO

    }
