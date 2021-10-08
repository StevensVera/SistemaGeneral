<?php


    class ControladorSolicitudesInformes{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablaSI($itemCodigo, $valor){

          /* Tabla Solicitudes */
          $tabla = "solicitudes_informacion";
          /* Campos Solicitudes de Información */
          $so = "SI_Nombre_Sujeto_Obligado";
          $ip = "SI_Informe_Presentado";
          $ipa = "SI_Anios";
          $tsi = "SI_TOTAL_SOLICITUDES";
          $fe = "SI_Fecha";

          $respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSI($itemCodigo, $valor, $tabla, $so, $ip, $ipa, $tsi, $fe );

          return $respuesta;

        }

        static public function ctrMostrarTablaSINOUSABLE($item,$valor){

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
        
            //$respuesta = ModeloSolicitudesInformacion::MdlMostrarTablaSINOUSABLE($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU);
    
            //return $respuesta;

            //var_dump($respuesta);

          } // Mostrar Tablas SI
       

     /* =========== AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */     

          static public function ctrAgregarSolicitudInformacion(){
            
            if (isset($_POST["nuevoAnioSI"])) { 

                // Agregado el SO a la Tabla, mediante su Sesión.
                //$SObligado = "H. Ayuntamiento de Acaponeta";
                $SObligado = $_SESSION["nombre_Informe"];

                // Agregamos Tabla
                $tablaSI = "solicitudes_informacion";
                
                // Cocatenacion Codigo "InformePresentado + Año"
                $espacio = " ";

                $CodigoIPA = $_POST["nuevoTipoInformeSI"].$espacio.$_POST["nuevoAnioSI"];

                // Ingresamos el Codigo Unico del Sujeto Obligado
                
                //$Codigo = "A.1";

                $Codigo = $_SESSION["codigo"];
                
                /* Datos - Array */
                $datos = array( "Si_Codigo_SO" => $Codigo, 
                                "Si_Codigo_Informe_Anios" => $CodigoIPA,
                                "SI_Nombre_Sujeto_Obligado" => $SObligado,
                                "SI_Informe_Presentado" => $_POST["nuevoTipoInformeSI"],
                                "SI_Anios" => $_POST["nuevoAnioSI"], 
                                "SI_TOTAL_SOLICITUDES" => $_POST["nuevoSI_Total"]);
                                
                $respuesta = ModeloSolicitudesInformacion::MdlAgregarSI($tablaSI, $datos);

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