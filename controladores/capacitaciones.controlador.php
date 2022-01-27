<?php

    class ControladorCapacitaciones{

      /* =========== MOSTRAR DATOS TABLA - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */
        
        static public function ctrMostrarTablasCA($itemCodigo, $valor){

          /* Tabla Solicitudes */
          $tabla = "capacitaciones";
          /* Campos Solicitudes de Información */
          //$so = "SI_Nombre_Sujeto_Obligado";
          //$ip = "SI_Informe_Presentado";
          //$ipa = "SI_Anios";
          //$tsi = "SI_TOTAL_SOLICITUDES";
          //$fe = "SI_Fecha";

          $respuesta = ModeloCapacitacion::MdlMostrarTablaCa($itemCodigo, $valor, $tabla);

          return $respuesta;

        }

      /* =========== AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

        static public function ctrAgregarCapacitacion(){

          if (isset($_POST["nuevoAnioCapacitaciones"])) {

            // Agregado el SO a la Tabla, mediante su Sesión.
            //$SObligado = "H. Ayuntamiento de Acaponeta";
            $SObligado = $_SESSION["nombre_Informe"];

            // Agregamos Tabla
            $tablaCA = "capacitaciones";
                
            // Cocatenacion Codigo "InformePresentado + Año"
            $espacio = " ";

            $CodigoIPA = $_POST["nuevoTipoCapacitaciones"].$espacio.$_POST["nuevoAnioCapacitaciones"];

            // Ingresamos el Codigo Unico del Sujeto Obligado
                
            //$Codigo = "A.1";

            $Codigo = $_SESSION["codigo"];

                            /* Datos - Array */
            $datos = array( "CA_Codigo_SO" => $Codigo, 
                            "CA_Codigo_Informe_Anios" => $CodigoIPA,
                            "CA_Nombre_Sujeto_Obligado" => $SObligado,
                            "CA_Informe_Presentado" => $_POST["nuevoTipoCapacitaciones"],
                            "CA_Anios" => $_POST["nuevoAnioCapacitaciones"], 
                            "CA_Total_Capacitacion" => $_POST["nuevoCapacitaciones_Total"],
                            //"** Capacitaciones **",
                            "CA_Capacitaciones_Recibidas" => $_POST["nuevoCapacitaciones_Recibidas"],
                            "CA_Capacitaciones_Ortogadas" => $_POST["nuevoCapacitaciones_Ortogadas"],
                            "CA_Total_Servidores_Publicos" => $_POST["nuevoCapacitaciones_Total_Servidores_Publicos"],
                            "CA_Acciones_Realizadas_Transparencia" => $_POST["nuevoCapacitaciones_Acciones_Realizadas_Transparencia"],
                        );

                $respuesta = ModeloCapacitacion::mdlagregarCA($tablaCA, $datos);

                if($respuesta == "ok"){

                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡La Capacitación, ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "capacitaciones";

                            }

                        });
                    

                        </script>';

                } // if

          }// End if

        } // End Function


      /* ================  EDITAR - MOSTRAR LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   ================= */ 

        static public function ctrMostrarCapacitacionesEditar($item, $valor){

          $tabla = "Capacitaciones";

          $respuesta = ModeloCapacitacion::mdlMostrarRegistroEditarCA($tabla, $item, $valor);

          return $respuesta;

        }

      /* ===============  EDITAR - LOS DATOS REGISTRADOS - DESDE LA UNIDAD DE TRANSPARENCIA   =================*/
      
      static public function ctrActualizarCapacitaciones(){

        if (isset($_POST["EditarAnioCapacitaciones"])) {

          $tabla = "capacitaciones";

          $datos = array(
                         "CA_Informe_Presentado"=> $_POST["EditarTipoCapacitaciones"],
                         "CA_Anios"=> $_POST["EditarAnioCapacitaciones"],
                         "CA_Total_Capacitacion"=> $_POST["EditarCapacitaciones_Total"],
                         "CA_Capacitaciones_Recibidas"=> $_POST["EditarCapacitaciones_Recibidas"],
                         "CA_Capacitaciones_Ortogadas"=> $_POST["EditarCapacitaciones_Ortogadas"],
                         "CA_Total_Servidores_Publicos"=> $_POST["EditarCapacitaciones_Total_Servidores_Publicos"],
                         "CA_Acciones_Realizadas_Transparencia"=> $_POST["EditarCapacitaciones_Acciones_Realizadas_Transparencia"]

          );

          $respuesta = ModeloCapacitacion::mdlEditarCapacitaciones($tabla, $datos);

          if($respuesta == "ok"){
            
            echo'<script>

             swal({
               type: "success",
               title: "El Informe ha sido cambiado correctamente",
               showConfirmButton: true,
               confirmButtonText: "Cerrar"
               }).then(function(result){

                 if (result.value) {

                   window.location = "capacitaciones";

                }

              })

            </script>';

          } //End If
         
        } // End If

      }// End CtrActualizar

      /* =========== ELIMINAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

        static public function ctrBorrarRegistroCapacitacion(){

          if (isset($_GET["idCA"])) {

            $tabla = "Capacitaciones";

            $datos = $_GET["idCA"];

            $respuesta = ModeloCapacitacion::mdlBorrarRegistroInformacion($tabla, $datos);

            if($respuesta == "ok"){
    
              echo'<script>
      
                swal({
                    type: "success",
                    title: "El Registro, ha sido borrada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
      
                        window.location = "capacitaciones";
      
                        }
                      })
      
                </script>';
    
            } // if 

          } // End Function

        }// End Function
        
    } // End Class