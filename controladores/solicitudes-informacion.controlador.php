<?php


    class ControladorSolicitudesInformes{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablaSI($item,$valor){

          /* Tabla Solicitudes de Informacion */
            $tabla = "solicitudes_informacion";
          /* Campos Solicitudes de Informacion */
            $so = "SI_Nombre_Sujeto_Obligado";
            $ip = "SI_Informe_Presentado";
            $ipa = "SI_Anios";
            $tsi = "SI_TOTAL_SOLICITUDES";
            $fe = "SI_Fecha";
          /* Tabla detalle usuario */
            $tablaDSI = "detalle_usuario_si";
          /* Tabla Usuario */
            $tablaU = "usuarios";
          /* codigo */
        
            $respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSI($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU);
    
            return $respuesta;

            //var_dump($respuesta);

          } // Mostrar Tablas SI

     /* =========== AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */     

          static public function ctrAgregarSolicitudInformacion(){
            
            if (isset($_POST["SI_Informe_Presentado"])) { 

                // Agregado el SO a la Tabla, mediante su Sesión.
                $SObligado = "H. Ayuntamiento de Acaponeta";

                // Agregamos Tabla
                $tablaSI = "solicitudes_informacion";

                // Cocatenacion Codigo "InformePresentado + Año"

                $espacio = " ";

                //$Codigo = $_POST["nuevoTipoInformeSI"].$espacio.$_POST["nuevoAnioSI"];

                /* Datos - Array */
                $datos = array(
                                "SI_Nombre_Sujeto_Obligado" => $SObligado,
                                "SI_Informe_Presentado" => $_POST["nuevoTipoInformeSI"],
                                "SI_Anios" => $_POST["nuevoAnioSI"], 
                                "SI_TOTAL_SOLICITUDES" => $_POST["nuevoSI_Total"]);
                                
                $respuesta = ModeloSolicitudesInformacion::MdlAgregarSI($tablaSI, $datos);

                var_dump($respuesta);
                
              

                if($respuesta == "ok"){

                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡La Solicitud de Informes Bimestrales, ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "solicitudes-informacion";

                            }

                        });
                    

                        </script>';

                } // if

              

            }// if   

          } // Funcion Agregar Soliciud Informacion

    } //ControladorSolicitudesInformes

?>