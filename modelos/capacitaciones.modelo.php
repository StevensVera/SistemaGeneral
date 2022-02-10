<?php
    
    require_once "conexion.php";

    class ModeloCapacitacion{

          static public function MdlMostrarTablaCa($itemCodigo, $valor, $tabla ){


                $stmt = Conexion::conectar()->prepare("SELECT *
                                                        FROM $tabla 
                                                        WHERE $tabla.$itemCodigo = :$itemCodigo" );

                        $stmt -> bindParam(":".$itemCodigo, $valor, PDO::PARAM_STR);

                        $stmt -> execute();

                        return $stmt -> fetchAll();

                            /*
                        $stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                        FROM $tabla 
                                                        INNER JOIN $tablaDSI ON $tablaDSI.idSI = $tabla.idSI 
                                                        INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                        WHERE $tablaU.$item = :$item" );

                        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

                        $stmt -> execute();

                        return $stmt -> fetchAll();

                    */

            } // End Funcion MdlMostrarTablaCa

          /* =========== FUNCIÓN - AGREGAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 

            static public function mdlagregarCA($tablaCA, $datos){

                $stmt = Conexion::conectar()->prepare(
                    "INSERT INTO $tablaCA( 
                        CA_Codigo_SO,
                        CA_Codigo_UnicoInforme_Anios,
                        CA_Codigo_Tipo_Informe_Anios,
                        CA_Codigo_Informe_Anios,
                        CA_Nombre_Sujeto_Obligado,
                        CA_Informe_Presentado,
                        CA_Anios,
                        CA_Total_Capacitacion,
                        CA_Capacitaciones_Recibidas,
                        CA_Capacitaciones_Ortogadas,
                        CA_Total_Servidores_Publicos,
                        CA_Acciones_Realizadas_Transparencia,
                        CA_Archivo
                        )
                        VALUES(
                        :CA_Codigo_SO,
                        :CA_Codigo_UnicoInforme_Anios,
                        :CA_Codigo_Tipo_Informe_Anios,
                        :CA_Codigo_Informe_Anios,
                        :CA_Nombre_Sujeto_Obligado,
                        :CA_Informe_Presentado,
                        :CA_Anios,
                        :CA_Total_Capacitacion,
                        :CA_Capacitaciones_Recibidas,
                        :CA_Capacitaciones_Ortogadas,
                        :CA_Total_Servidores_Publicos,
                        :CA_Acciones_Realizadas_Transparencia,
                        :CA_Archivo

                        )");

                        $stmt -> bindParam(":CA_Codigo_SO", $datos["CA_Codigo_SO"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Codigo_UnicoInforme_Anios", $datos["CA_Codigo_UnicoInforme_Anios"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Codigo_Tipo_Informe_Anios", $datos["CA_Codigo_Tipo_Informe_Anios"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Codigo_Informe_Anios", $datos["CA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Nombre_Sujeto_Obligado", $datos["CA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Informe_Presentado", $datos["CA_Informe_Presentado"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Anios", $datos["CA_Anios"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Total_Capacitacion", $datos["CA_Total_Capacitacion"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Capacitaciones_Recibidas", $datos["CA_Capacitaciones_Recibidas"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Capacitaciones_Ortogadas", $datos["CA_Capacitaciones_Ortogadas"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Total_Servidores_Publicos", $datos["CA_Total_Servidores_Publicos"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Acciones_Realizadas_Transparencia", $datos["CA_Acciones_Realizadas_Transparencia"], PDO::PARAM_STR);
                        $stmt -> bindParam(":CA_Archivo", $datos["CA_Archivo"], PDO::PARAM_STR);

                        if ($stmt -> execute()) {
	 
                            return "ok";
                    
                          }else {
                    
                            return "error";
                
                        } // else
                
            } // End Funcion mdlagregarCA
                
          /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - MOSTRAR DATOS - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */   //
    
          static public function mdlMostrarRegistroEditarCA($tabla,$item,$valor){
	
            if($item != null){
    
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $stmt -> execute();
    
                return $stmt -> fetch();
    
              }else{
    
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    
                $stmt -> execute();
    
                return $stmt -> fetchAll();
    
              }
    
              $stmt -> close();
    
              $stmt = null;


           } // Funcion para mostrar los datos a editar.

          /* =========== FUNCIÓN - SOLICITUDES DE INFORMACION - EDITAR - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 
           
           static public function mdlEditarCapacitaciones($tabla, $datos){

            $stmt = Conexion::conectar()->prepare(

              "UPDATE $tabla SET 
               CA_Informe_Presentado = :CA_Informe_Presentado,
               CA_Anios = :CA_Anios,
               CA_Total_Capacitacion = :CA_Total_Capacitacion,

               CA_Capacitaciones_Recibidas = :CA_Capacitaciones_Recibidas,
               CA_Capacitaciones_Ortogadas = :CA_Capacitaciones_Ortogadas,
               CA_Total_Servidores_Publicos = :CA_Total_Servidores_Publicos,
               CA_Acciones_Realizadas_Transparencia = :CA_Acciones_Realizadas_Transparencia,
               CA_Archivo = :CA_Archivo
               WHERE CA_Informe_Presentado = :CA_Informe_Presentado ");


              $stmt -> bindParam(":CA_Informe_Presentado", $datos["CA_Informe_Presentado"], PDO::PARAM_STR);
              $stmt -> bindParam(":CA_Anios", $datos["CA_Anios"], PDO::PARAM_STR);
              $stmt -> bindParam(":CA_Total_Capacitacion", $datos["CA_Total_Capacitacion"], PDO::PARAM_STR);

              $stmt -> bindParam(":CA_Capacitaciones_Recibidas", $datos["CA_Capacitaciones_Recibidas"], PDO::PARAM_STR);
              $stmt -> bindParam(":CA_Capacitaciones_Ortogadas", $datos["CA_Capacitaciones_Ortogadas"], PDO::PARAM_STR);
              $stmt -> bindParam(":CA_Total_Servidores_Publicos", $datos["CA_Total_Servidores_Publicos"], PDO::PARAM_STR);
              $stmt -> bindParam(":CA_Acciones_Realizadas_Transparencia", $datos["CA_Acciones_Realizadas_Transparencia"], PDO::PARAM_STR);
              $stmt -> bindParam(":CA_Archivo", $datos["CA_Archivo"], PDO::PARAM_STR);
                  
              if($stmt->execute()){
  
                return "ok";
          
              }else{
           
                return "error";
              
              }
          
              $stmt->close();
              $stmt = null;

           }
          
        
          /* =========== ELIMINAR - SOLICITUDES DE INFORMACION - DESDE LA UNIDAD DE TRANSPARENCIA ================ */ 

            static public function mdlBorrarRegistroInformacion($tabla, $datos){

              $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCA = :idCA");
        
              $stmt -> bindParam(":idCA", $datos, PDO::PARAM_INT);
        
              if($stmt -> execute()){
        
                return "ok";
            
              }else{
        
                return "error";	
        
              }
        
              $stmt -> close();
        
              $stmt = null;
        
            }

            /*=========== METODO PDF - MOSTRAR DATOS SOLICITUD DE INFORMACION =========*/

          static public function mdlMostrarPDFCapacitaciones($tabla, $item, $valor){

           if ($item != null) {
  
               $statement = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      
               $statement -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      
               $statement -> execute();
      
               return $statement -> fetch();
                  
           }else {
      
               $statement = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      
               $statement -> execute();
      
               return $statement -> fetchAll();
      
                }
      
               $statement -> close();
      
               $statement = null;
  
  
           }     

          /* ===========================  ACTIVAR EL ESTADO DEL USUARIO  ================================== */

          static public function mdlActualizarEstadoCapacitaciones($tabla,$item1,$valor1,$item2,$valor2){
            
            $statement = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2" );

            $statement -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

            $statement ->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

            if ($statement ->execute()) {
            
               return "ok";

            }else {

                return "error";

            }

            $statement -> close();
        
            $statement = null;


       } // End function mdlActualizarEstadoUsuario




    }