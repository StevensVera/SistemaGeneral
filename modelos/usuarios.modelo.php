<?php

    require_once "conexion.php";

    class ModeloUsuariosInforme{

        /*============================= CUIDAD MUCHO ESTA FUNCION ======================================*/

        static public function MdlMostrarUsuariosInforme2($tablaUsuarios,$tablaInformesSO,$item,$valor,$Campo1InformeSO,$Campo2InformeSO){

            $stmt = Conexion::conectar()->prepare("SELECT $Campo1InformeSO,$Campo2InformeSO FROM $tablaInformesSO INNER JOIN $tablaUsuarios ON $tablaUsuarios.id = $tablaInformesSO.idusuario WHERE $tablaUsuarios.$item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            // fetch, funciona para retorna una sola fila de la tabla.
            return $stmt -> fetchAll();


        }

        /* ================= CUIDAD MUCHO ESTA FUNCION - FUNCION LLAVES FORANEAS ==================== */

        static public function MdlMostrarUsuariosInformellaves($tablaInformesSO,$tablaUsuarios, $tablaSI,$tablaAR,$tablaCA, $IdInformeSO,$NombreInformeUsuario, $InformePresentadoInformeSO,$AnioInformeSO,$TotalSolicitudesSI,$TotalSolicitudesSA,$TotalSolicitudesCA,$FechaInformeSO,$item,$valor){

            $stmt = Conexion::conectar()->prepare(
            "SELECT $tablaInformesSO.$IdInformeSO, $tablaUsuarios.$NombreInformeUsuario,$tablaInformesSO.$InformePresentadoInformeSO, $tablaInformesSO.$AnioInformeSO, $tablaSI.$TotalSolicitudesSI, $tablaAR.$TotalSolicitudesSA, $tablaCA.$TotalSolicitudesCA, $tablaInformesSO.$FechaInformeSO 
            FROM $tablaInformesSO 
            INNER JOIN $tablaUsuarios 
            ON $tablaUsuarios.id = $tablaInformesSO.idusuario 
            INNER JOIN $tablaSI
            ON $tablaSI.idSI = $tablaInformesSO.idSI
            INNER JOIN $tablaAR
            ON $tablaAR.idSAR = $tablaInformesSO.idSAR
            INNER JOIN $tablaCA
            ON $tablaCA.idCA = $tablaInformesSO.idCA
        
             WHERE $tablaUsuarios.$item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            // fetch, funciona para retorna una sola fila de la tabla.
            return $stmt -> fetchAll();


        }

        /*=========== METODO PDF - MOSTRAR DATOS INDIVUDALES REGISTRADOS POR USUARIO =========*/

        static public function mdlMostrarPDFUsuario($tabla, $item, $valor){

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

        /*============================= METODO EDITAR - MOSTRAR LOS DATOS REGISTRADO ======================================*/

        static public function mdlMostrarAdjuntosEditarUsuarios($tabla,$item,$valor){
	
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



        /*============================= MOSTRAR TABLA USUARIOS ======================================*/

         static public function MdlMostrarTablaUsuario($item,$valor,$orden,$tabla){
            
            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

                $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden ASC");

                $stmt -> execute();

                return $stmt -> fetchAll();

            }

            $stmt -> close();

            $stmt = null;


         }

        /*============================= MOSTRAR USUARIOS ======================================*/

        static public function MdlMostrarUsuariosInforme($tablaUsuarios,$item,$valor){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaUsuarios WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            // fetch, funciona para retorna una sola fila de la tabla.
            return $stmt -> fetch();

        }

        /*============================= AGREGAR USUARIOS =====================================*/

        static public function mdlAgregarUsuario($tabla,$datos){

            $statement = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, tipo_so,nombre_Informe, titular_Informe, usuario_Informe, password_Informe, perfil_Informe, foto_Informe, archivo_Informe) 
            VALUES (:codigo, :tipo_so, :nombre_Informe, :titular_Informe, :usuario_Informe, :password_Informe,:perfil_Informe, :foto_Informe, :archivo_Informe) ");
            
            $statement->bindParam(":codigo", $datos["codigo"],PDO::PARAM_STR);
            $statement->bindParam(":tipo_so", $datos["tipo_so"],PDO::PARAM_STR);
            $statement->bindParam(":nombre_Informe", $datos["nombre_Informe"],PDO::PARAM_STR);
            $statement->bindParam(":titular_Informe", $datos["titular_Informe"],PDO::PARAM_STR);
            $statement->bindParam(":usuario_Informe", $datos["usuario_Informe"],PDO::PARAM_STR);
            $statement->bindParam(":password_Informe", $datos["password_Informe"],PDO::PARAM_STR);
            $statement->bindParam(":perfil_Informe", $datos["perfil_Informe"],PDO::PARAM_STR);
            $statement->bindParam(":foto_Informe", $datos["foto_Informe"],PDO::PARAM_STR);
            $statement->bindParam(":archivo_Informe", $datos["archivo_Informe"],PDO::PARAM_STR);


            if($statement->execute()){

                return "ok";
    
            }else{
    
                return "error";
            
            }
    
            $statement->close();
            $statement = null;

        }

        /*============================ ACTUALIZAR USUARIOS ===================================*/

        static public function mdlEditarUsuario($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, tipo_so = :tipo_so, nombre_Informe = :nombre_Informe, titular_Informe = :titular_Informe, usuario_Informe = :usuario_Informe, password_Informe = :password_Informe, perfil_Informe = :perfil_Informe, foto_Informe = :foto_Informe, archivo_Informe = :archivo_Informe  WHERE codigo = :codigo");
    
            //$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_so", $datos["tipo_so"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_Informe", $datos["nombre_Informe"], PDO::PARAM_STR);
            $stmt->bindParam(":titular_Informe", $datos["titular_Informe"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario_Informe", $datos["usuario_Informe"], PDO::PARAM_STR);
            $stmt->bindParam(":password_Informe", $datos["password_Informe"], PDO::PARAM_STR);
            $stmt->bindParam(":perfil_Informe", $datos["perfil_Informe"], PDO::PARAM_STR);
            $stmt->bindParam(":foto_Informe", $datos["foto_Informe"], PDO::PARAM_STR);
            $stmt->bindParam(":archivo_Informe", $datos["archivo_Informe"], PDO::PARAM_STR);

           // $stmt->bindParam(":ultimo_login_Informe", $datos["ultimo_login_Informe"], PDO::PARAM_STR);
    
            if($stmt->execute()){
    
                return "ok";
    
            }else{
    
                return "error";
            
            }
    
            $stmt->close();
            $stmt = null;
    }


        /*============================= BORRAR USUARIOS ======================================*/

        static public function mdlBorrarUsuario($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		    $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

                try {

                    if ($stmt -> execute()){
                        
                        return "ok";
                    }
                
                }catch(PDOException $e)
                {
                  
                  echo 'Error'.$e->getMessage();;

                }

		    $stmt = null;
       
        } // End function mdlBorrarUsuario

        /* ===========================  ACTIVAR EL ESTADO DEL USUARIO  ================================== */

        static public function mdlActualizarEstadoUsuario($tabla,$item1,$valor1,$item2,$valor2){
            
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

       /* ============ AQUI VALIDAMOS TODA LA INFORMACION QUE PUDIERA ESTA EXISTENTE  ================= */
       // 1.- VALIDAR CODIGO 

       static public function mdlValidarInformacionExitente($tabla, $item, $valor){

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

        }
            
    }