<?php

    class ControladorSolicitudesArco{

    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

    static public function ctrMostrarTablaAR($itemCodigo, $valor){

        /* Tabla Solicitudes de Arco */
             $tabla = "solicitudes_arco";
        /* Campos Solicitudes de Arco */
             $so = "SA_Nombre_Sujeto_Obligado";
             $ip = "SA_Informe_Presentado";
             $ipa = "SA_Anios";
             $tsi = "SA_TOTAL_SOLICITUDES";
             $fe = "SA_Fecha";
            
            $respuesta = ModeloSolicitudesArco::ctrMostrarTablaAR($itemCodigo,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe);
        
            return $respuesta;

            //var_dump($respuesta);

            
    } // Mostrar Tablas ARCO


    /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
    
        static public function ctrAgregarSolicitudesArco(){
            
            if (isset($_POST["nuevoAnioSA"])) {
                
                // Agregado el SO a la Tabla, mediante su Sesión.
                $SObligado = $_SESSION["nombre_Informe"];

                // Agregamos Tabla
                $tablaSA = "solicitudes_arco";

                // Concatenacion Codigo "InformePresentado + Año" 
                $espacio = " ";

                $CodigoIPA = $_POST["nuevoTipoInformeSA"].$espacio.$_POST["nuevoAnioSA"];

                // Ingresamos el Codigo Unico del Sujeto Obligado

                $Codigo = $_SESSION["codigo"];

                /* datos - Array */

               $datos = array ("SA_Codigo_SO" => $Codigo,
                               "SA_Codigo_Informe_Anios" => $CodigoIPA,
                               "SA_Nombre_Sujeto_Obligado" => $SObligado,
                               "SA_Informe_Presentado" => $_POST["nuevoTipoInformeSA"],
                               "SA_Anios" => $_POST["nuevoAnioSA"], 
                               "SA_TOTAL_SOLICITUDES" => $_POST["nuevoSA_Total"],
                                //"** Medio de Presentación **",
                               "SA_Medio_Presentacion_Personal_Escrito" => $_POST["nuevoSA_MP_Personal_Escrito"],
                               "SA_Medio_Presentacion_Correo_Electronico" => $_POST["nuevoSA_MP_Correo_Electronico"],
                               "SA_Medio_Presentacion_Sistema_Infomex" => $_POST["nuevoSA_MP_Sistema_Informex"],
                               "SA_Medio_Presentacion_PNT" => $_POST["nuevoSA_MP_PNT"],
                               "SA_Medio_Presentacion_No_disponible" => $_POST["nuevoSA_MP_No_Disponible"],
                               "SA_Medio_Presentacion_Suma_Total" => $_POST["nuevoSA_MP_Suma_Total"]


                            
                            );

               $respuesta = ModeloSolicitudesArco::MdlAgregarSA($tablaSA, $datos);


               if($respuesta == "ok"){

                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡La Solicitud de Informes Bimestrales, ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "solicitudes-arco";

                            }

                        });
                    

                        </script>';

                } // if

            } // if 

        } // Funcion para agregar Solitud Arco

} // ControladorSolicitudesArco




?>