

<?php
$conexion = new mysqli('localhost', 'root', 'itai12345', 'sistemaitaiinformes');

if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}

if (!$conexion->set_charset("utf8")) {
    printf("Error al cargar el conjunto de caracteres utf8: %s\n", $conexion->error);
    exit();
}

?>

<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administración General de Sujeto Obligado ( ENTREGA )

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Administración General de Sujeto Obligado ( ENTREGA ) </li>
        
      </ol>
      
    </section>

    <section class="content">

      <div class="box">

          <div class="box-header with-border">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSOIBNoEntega"> 

                  Agregar Requerimiento Privado

              </button>

        </div>

        <style>

    </style>

        <div class="box-body">

             <table id="example" class="table table-bordered table-striped dt-responsive tablasAdministracionSujetosObligadosGeneral " style="width:100%">
             
                <thead>

                    <tr>

                        <th style="width:3%; background-color: #3c8dbc; color: black;">#</th>
                        <th style="width:35%; background-color: #3c8dbc; color: black;">Sujeto Obligado</th>
                        <th style="width:15%; background-color: #3c8dbc; color: black;">Informe Presentado</th>
                        <th style="width:3%; background-color: #3c8dbc; color: black;">AÑO</th>
                        <th style="width:15%; background-color: #3c8dbc; color: black;">Fecha de Entrega</th>
                        <th style="width:10%; background-color: #3c8dbc; color: black;">Estatus</th>
                        <th style="width:19%; background-color: #3c8dbc; color: black;">Acciones</th>
  
                    </tr>

                </thead>


                                
                <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

                <input type="hidden" value="<?php echo $_SESSION["codigo"]; ?>" id="perfiCodigo"> 


            </table>

            <button id="btn1">clon</button>

            
          
        </div>

      </div>

    </section>

  </div>

   <!--=============================== ====================================== =============================================================================
       =============================== FORMULARIO PARA AGREGAR ADMINISTRACIÓN GENERAL DE SUJETOS OBLIGADOS = NO ENTREGARON ===============================
       =============================== ====================================== =============================================================================-->

  <div id="modalAgregarSOIBNoEntega" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg" style="width: 85%">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #3c8dbc; color:white" >

            <h4 class="modal-title">AGREGAR SUJETO OBLIGADO - MODALIDAD DE AMONESTACIÓN PRIVADA</h4>

              </div>

                <div class="modal-body"> 

                   <div class="box-body">

                    <div class="form-group"> 

                    <div class="form-group" style="width: 80%; margin: 0 auto; padding-bottom: 15px">
                        
                        <div class="input-group">
              
                          <span class="input-group-addon">Sujetos Obligados</span>

                            <select  id="agregarRequerimientoAGSujetoObligadoSolo" class="form-control input-lg agregarRequerimientoAGSujetoObligadoSolo" name="agregarRequerimientoAGSujetoObligadoSolo" >

                              <?php

                                $result = $conexion->query(

                                 "SELECT id, nombre_informe FROM usuarios ORDER BY nombre_Informe;"

                                  );

                                    if ($result->num_rows > 0) {

                                      while ($row = $result->fetch_assoc()) {     

                                         echo '<option  value="'.$row['nombre_informe'].'">'.$row['nombre_informe'].'</option>';
                                      }
                                    }
                              ?>

                            </select>

                        </div>
            
                      </div>

                      <div class="form-group" style="width: 80%; margin: 0 auto; padding-bottom: 15px">
                        
                        <div class="input-group">
              
                          <span class="input-group-addon">Confirme Sujetos Obligados</span>

                            <select  id="agregarRequerimientoAGSujetoObligado" class="form-control input-lg agregarRequerimientoAGSujetoObligado" name="agregarRequerimientoAGSujetoObligado" >

                              <?php

                                $result = $conexion->query(

                                 "SELECT id, nombre_informe FROM usuarios ORDER BY nombre_Informe;"

                                  );

                                    if ($result->num_rows > 0) {

                                      while ($row = $result->fetch_assoc()) {     

                                         echo '<option  value="'.$row['id'].'">'.$row['nombre_informe'].'</option>';
                                      }
                                    }
                              ?>

                            </select>

                        </div>
            
                      </div>

                      <div class="form-group row" style="width: 100%; margin: 0 auto; padding-bottom: 15px">

                        <div class="col-xs-3"> 

                            <div class="input-group">

                              <span class="input-group-addon">Codigo SO</span>

                              <select id="agregarRequerimientoAGCodigoSO" class="form-control input-lg agregarRequerimientoAGCodigoSO" name="agregarRequerimientoAGCodigoSO"></select>

                            </div>

                        </div>

                        <div class="col-xs-6">

                          <div class="input-group">

                              <span class="input-group-addon">Informe</span>

                              <select id="agregarRequerimientoAGInformeBimestral" class="form-control input-lg agregarRequerimientoAGInformeBimestral" name="agregarRequerimientoAGInformeBimestral">
                 
                                  <option value="">Seleccione Informe Bimestral</option>

                                  <option value="1er Informe Bimestral">1er Informe Bimestral</option>
                  
                                  <option value="2do Informe Bimestral">2do Informe Bimestral</option>

                                  <option value="3er Informe Bimestral">3er Informe Bimestral</option>

                                  <option value="4to Informe Bimestral">4to Informe Bimestral</option>

                                  <option value="5to Informe Bimestral">5to Informe Bimestral</option>

                                  <option value="Informe Anual">Informe Anual</option>


                              </select>

                          </div>

                        </div>

                        <div class="col-xs-3">

                          <div class="input-group">

                              <span class="input-group-addon">Año</span>

                              <input type="text" id="agregarRequerimientoAGAnio" class="form-control input-lg agregarRequerimientoAGAnio" name="agregarRequerimientoAGAnio" required>

                          </div>

                        </div>   
   

                      </div>
                     
                      <br>

                     <table class=" tablaAdministrativa3xSO " border="1" style="width: 80%; margin: 0 auto; padding-bottom: 15px">
             
                       <thead>
                
                          <tr>

                            <th style="width: 230.36px;text-align: center;">OBSERVACIÓNES</th>
  
                          </tr>

                        </thead>

                        <tbody>

                        <!-- ==============================================================================================================================
                             ============================================= APARTADO PARA SOLICITUDES DE INFORMACION =======================================
                             ============================================================================================================================== -->
                          <!-- ============================================================================================================================== -->
                          <tr>

                              <td  style="text-align: center;" disabled> OBSERVACIÓNES REQUERIMIENTO DE AMONESTACIÓN PRIVADA </td>
                            
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>
                              
                              <td  style="text-align: center;" > <textarea id="agregarRequerimientoAGObservacionesPrivada" name="agregarRequerimientoAGObservacionesPrivada" class="form-control input-lg agregarRequerimientoAGObservacionesPrivada"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;"></textarea> </td>
                              
                          </tr>

                        </tbody>

                     </table>

                  </div>

                  <div class="form-group ">

                    <div class="panel">SUBIR ARCHIVO</div>

                    <input type="file" class="nuevoArchivoRequerimientoPrivado"  name="nuevoArchivoRequerimientoPrivado">

                    <p class="help-block">Peso máximo de la foto 200 MB</p>

                  </div>   

                </div>
                
              </div>

            <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Enviar Requerimiento</button>

            </div>

               <?php    

                   $AdministradorSO = new ControladorAdministracionGeneralSO();
                   $AdministradorSO -> ctrAgregarAGSolicitudInformacion(); 

              ?>

          </form>

        </div>

      </div>

    </div>

   <!--=========================== ================================== ===================================================================
  =============================== FORMULARIO PARA ACTUALIZAR ADMINISTRACIÓN GENERAL DE SUJETOS OBLIGADOS ==============================
  =============================== ================================== ==================================================================-->

    <div id="modalActualizarAdministracionSOGeneral" class="modal fade" role="dialog">

      <div class="modal-dialog modal-lg" style="width: 85%">

        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">

              <div class="modal-header" style="background: #3c8dbc; color:white" >

                  <h4 class="modal-title">REVISIÓN</h4>

              </div>

              <div class="modal-body"> 

                <div class="box-body">

                  <div class="form-group"> 

                    <table border="1" style="width:100%;">
             
                       <thead>

                          <tr>

                            <th style="width: 230px; text-align: center;">NOMBRE DEL SUJETO OBLIGADO</th>
                            <th style="width: 990.93px;text-align: center;"><input style="text-align: center;" type="text" class="form-control" id="EditarSONSI" name="EditarSONSI" disabled></th>

                           </tr>

                        </thead>

                        <tbody>

                     </table>

                    <br>

                    <table class=" tablaAdministrativa3xSO " border="1" style="width:100%;">
             
                       <thead>
                
                          <tr>

                            <th style="width: 30px; text-align: center;">#</th>
                            <th style="width: 225.00px;text-align: center;">BIMESTRE</th>
                            <th style="width: 225.39px;text-align: center;">INFORME PRESENTADO</th>
                            <th style="width: 149.91px;text-align: center;">AÑO</th>
                            <th style="width: 230.36px;text-align: center;">FECHA DE ENTREGA</th>
                            <th style="width: 142.43px;text-align: center;">TOTAL</th>
                            <th style="width: 219.91px;text-align: center;">ACCIONES</th>
  
                           </tr>

                        </thead>

                        <tbody>

                        <!-- ==============================================================================================================================
                             ============================================= APARTADO PARA SOLICITUDES DE INFORMACION =======================================
                             ============================================================================================================================== -->

                          <tr>
                            
                            <td rowspan="7" style="text-align: center;">1</td>
                              
                               <!-- SE USA ID PARA ACTUALIZAR EL REGISTRO DEL SI -->
                               <input type="hidden" id="EditaridSI" name="EditaridSI">
                               <!-- SE USA EL NOMBRE DEL SUJETO OBLIGADO PARA ALTA DEL ARCHIVO DE REQUERIMIENTOS -->
                               <input type="hidden" id="EditarNombreSujetoObligadoRSI" name="EditarNombreSujetoObligadoRSI">
                               <!-- SE USA EL CODIGO DEL SUJETO OBLIGADO PARA ALTA DEL ARCHIVO DE REQUERIMIENTOS -->
                               <input type="hidden" id="EditarCodigoSujetoObligadoRSI" name="EditarCodigoSujetoObligadoRSI">

                            <td style="background-color:#FFFFFF; color:#000000;" rowspan="7"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOSI" name="EditarSOSI" readonly > </td>

                            <td style="text-align: center;" rowspan="7"> SOLICITUDES DE INFORMACIÓN </td>

                            <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOANIOSI" name="EditarSOANIOSI" readonly> </td>

                            <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOFSI" name="EditarSOFSI" disabled>  </td>

                            <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOTSI" name="EditarSOTSI" disabled> </td>

                            <td  style="text-align: center;" rowspan="1" > 

                               <select style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" class="form-control input-lg" id="SelectSI" name="EditarSORSI">
             
                                  <option value="" id="EditarSORSI"></option>

                                  <option value="NO ENVIADO">NO ENVIADO</option>

                                  <option value="EN REVISIÓN">EN REVISIÓN</option>

                                  <option value="OBSERVACIÓNES">OBSERVACIÓNES</option>

                                  <option value="AMONESTACIÓN PRIVADA">AMONESTACIÓN PRIVADA</option>

                                  <option value="AMONESTACIÓN PÚBLICA">AMONESTACIÓN PÚBLICA</option>

                                  <option value="PROCESO DE SANCIÓN">PROCESO DE SANCION</option>

                                  <option value="FINALIZADO">FINALIZADO</option>

                               </select>
                          
                            </td>

                          </tr>
                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES GENERALES </td>
                              <td  style="text-align: center;" colspan="1" disabled> OBSERVACIÓNES </td>
                              
                          </tr>
                          <tr>

                             <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOGSI" name="EditarSOOGSI" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                             <td  style="text-align: center;" > 
                                  
                                  <div class="panel">ANEXAR OBSERVACIÓNES</div>

                                      <input type="file" id="nuevoArchivoObservacionesSI" class="nuevoArchivoObservacionesSI"  name="editarArchivoObservacionesSI" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualObservacionesSI" name="archivoActualObservacionesSI" >
                              </td>
                              
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES REQUERIMIENTO DE AMONESTACIÓN PRIVADA </td>
                              <td  style="text-align: center;"  disabled>  REQUERIMIENTO - AMONESTACIÓN PRIVADA </td>
                            
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>
                              
                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOSI" name="EditarSOOSI" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                              <td  style="text-align: center;" > 
                                  
                                  <div class="panel">ANEXAR REQUERIMIENTO - AMONESTACIÓN PRIVADA</div>

                                      <input type="file" id="nuevoArchivoRequerimientoSI" class="nuevoArchivoRequerimientoSI"  name="editarArchivoRequerimientoSI" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualRequerimientoSI" name="archivoActualRequerimientoSI" >
                              </td>
                              
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES REQUERIMIENTO DE AMONESTACIÓN PÚBLICA </td>
                              <td  style="text-align: center;"  disabled>  REQUERIMIENTO - AMONESTACIÓN PÚBLICA </td>
                            
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>
                              
                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOPSI" name="EditarSOOPSI" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                              <td  style="text-align: center; " > 
                                  
                                  <div class="panel">ANEXAR REQUERIMIENTO - AMONESTACIÓN PÚBLICA</div>

                                      <input type="file" id="nuevoArchivoRequerimientoPublicaSI" class="nuevoArchivoRequerimientoPublicaSI"  name="editarArchivoRequerimientoPublicaSI" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualRequerimientoPublicaSI" name="archivoActualRequerimientoPublicaSI" >
                              </td>
                              
                          </tr>

                          <!-- ========================================================================================================================
                               ============================================== APARTADO PARA SOLICITUDES DE ARCO =======================================
                               ======================================================================================================================== -->
                            
                          <tr>

                            <td rowspan="7" style="background-color:#FFFFFF;color:#000000;text-align: center;">2</td>

                                <!-- SE USA ID PARA ACTUALIZAR EL REGISTRO DEL SA -->
                                <input type="hidden" id="EditaridSA" name="EditaridSA">
                                <!-- SE USA EL NOMBRE DEL SUJETO OBLIGADO PARA ALTA DEL ARCHIVO DE REQUERIMIENTOS -->
                                <input type="hidden" id="EditarNombreSujetoObligadoRSA" name="EditarNombreSujetoObligadoRSA">
                                <!-- SE USA EL CODIGO DEL SUJETO OBLIGADO PARA ALTA DEL ARCHIVO DE REQUERIMIENTOS -->
                                <input type="hidden" id="EditarCodigoSujetoObligadoRSA" name="EditarCodigoSujetoObligadoRSA">  

                            <td style="background-color:#FFFFFF;color:#000000;" rowspan="7"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;"  type="text" class="form-control input-lg" id="EditarSOSA" name="EditarSOSA" readonly> </td>

                            <td style="background-color:#FFFFFF;color:#000000;text-align: center;" rowspan="7" > SOLICITUDES ARCO</td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOANIOSA" name="EditarSOANIOSA" readonly>  </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOFSA" name="EditarSOFSA" disabled> </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOTSA" name="EditarSOTSA" disabled> </td>

                            <td style="background-color:#FFFFFF;color:#000000;text-align: center;" rowspan="1" > 

                                <select style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" id="SelectSA" class="form-control input-lg" name="EditarSORSA">
             
                                  <option value="" id="EditarSORSA"></option>

                                  <option value="NO ENVIADO">NO ENVIADO</option>

                                  <option value="EN REVISIÓN">EN REVISIÓN</option>

                                  <option value="OBSERVACIÓNES">OBSERVACIÓNES</option>

                                  <option value="AMONESTACIÓN PRIVADA">AMONESTACIÓN PRIVADA</option>

                                  <option value="AMONESTACIÓN PÚBLICA">AMONESTACIÓN PÚBLICA</option>

                                  <option value="PROCESO DE SANCIÓN">PROCESO DE SANCIÓN</option>

                                  <option value="FINALIZADO">FINALIZADO</option>

                                </select>
                          
                            </td>

                          </tr>
                           <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES GENERALES </td>
                              <td  style="text-align: center;" colspan="1" disabled> OBSERVACIÓNES </td>
                              
                          </tr>
                          <tr>

                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOGSA" name="EditarSOOGSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                              <td  style="text-align: center;"> 
                                  
                                  <div class="panel">ANEXAR OBSERVACIÓNES</div>

                                      <input type="file" id="nuevoArchivoObservacionesSA"  class="nuevoArchivoObservacionesSA"  name="editarArchivoObservacionesSA" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualObservacionesSA" name="archivoActualObservacionesSA" >
                              </td>

                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>

                             <td  style="background-color:#FFFFFF;color:#000000;text-align: center;" colspan="3" disabled> OBSERVACIÓNES REQUERIMIENTO DE AMONESTACIÓN PRIVADA </td>
                             <td  style="text-align: center;"  disabled>  REQUERIMIENTO - AMONESTACIÓN PRIVADA </td>
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>

                             <td  style="background-color:#FFFFFF;color:#000000;text-align: center;" colspan="3"> <textarea id="EditarSOOSA" name="EditarSOOSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="background-color:#E5E5E5;color:#000000; text-align: center;" type="text" class="form-control input-lg"  id="EditarSOOSA" name="EditarSOOSA"> --> </td>
                             <td  style="text-align: center;"> 
                                  
                                  <div class="panel">ANEXAR REQUERIMIENTO - AMONESTACIÓN PRIVADA</div>

                                      <input type="file" id="nuevoArchivoRequerimientoSA"  class="nuevoArchivoRequerimientoSA"  name="editarArchivoRequerimientoSA" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualRequerimientoSA" name="archivoActualRequerimientoSA" >
                              </td>

                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled>OBSERVACIÓNES REQUERIMIENTO DE AMONESTACIÓN PÚBLICA </td>
                              <td  style="text-align: center;"  disabled>  REQUERIMIENTO - AMONESTACIÓN PÚBLICA </td>
                            
                          </tr>
                          <!-- ============================================================================================================================== -->
                          <tr>
                              
                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOPSA" name="EditarSOOPSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify; " readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                              <td  style="text-align: center;"> 
                                  
                                  <div class="panel">ANEXAR REQUERIMIENTO - AMONESTACIÓN PÚBLICA</div>

                                      <input type="file"  id="nuevoArchivoRequerimientoPublicaSA" class="nuevoArchivoRequerimientoPublicaSA"  name="editarArchivoRequerimientoPublicaSA" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualRequerimientoPublicaSA" name="archivoActualRequerimientoPublicaSA" >
                              </td>
                              
                          </tr>
                          
                         <!-- ========================================================================================================================
                              ========================================== APARTADO PARA SOLICITUDES DE ARCO ===========================================
                              ======================================================================================================================== -->

                          
                          <tr>

                            <td rowspan="7" style="text-align: center;">3</td>

                                <!-- SE USA ID PARA ACTUALIZAR EL REGISTRO DEL CA -->
                                <input type="hidden" id="EditaridCA" name="EditaridCA">
                                <!-- SE USA EL NOMBRE DEL SUJETO OBLIGADO PARA ALTA DEL ARCHIVO DE REQUERIMIENTOS -->
                                <input type="hidden" id="EditarNombreSujetoObligadoRCA" name="EditarNombreSujetoObligadoRCA">
                                <!-- SE USA EL CODIGO DEL SUJETO OBLIGADO PARA ALTA DEL ARCHIVO DE REQUERIMIENTOS -->
                                <input type="hidden" id="EditarCodigoSujetoObligadoRCA" name="EditarCodigoSujetoObligadoRCA">  

                            <td style="background-color:#FFFFFF;color:#000000;" rowspan="7"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOCA" name="EditarSOCA" readonly> </td>

                            <td style="text-align: center;" rowspan="7"> CAPACITACIONES </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOANIOCA" name="EditarSOANIOCA" readonly> </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOFCA" name="EditarSOFCA" disabled> </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOTCA" name="EditarSOTCA" disabled> </td>
                            
                            <td style="text-align: center;" rowspan="1"> 

                                <select style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" class="form-control input-lg" id="SelectCA" name="EditarSORCA">
             
                                  <option value="" id="EditarSORCA"></option>

                                  <option value="NO ENVIADO">NO ENVIADO</option>

                                  <option value="EN REVISIÓN">EN REVISIÓN</option>

                                  <option value="OBSERVACIÓNES">OBSERVACIÓNES</option>

                                  <option value="AMONESTACIÓN PRIVADA">AMONESTACIÓN PRIVADA</option>

                                  <option value="AMONESTACIÓN PÚBLICA">AMONESTACIÓN PÚBLICA</option>

                                  <option value="PROCESO DE SANCIÓN">PROCESO DE SANCIÓN</option>

                                  <option value="FINALIZADO">FINALIZADO</option>

                                </select>
                          
                            </td>

                          </tr>
                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES GENERALES </td>
                              <td  style="text-align: center;" colspan="1" disabled> OBSERVACIÓNES </td>
                              
                          </tr>
                          <tr>

                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOGCA" name="EditarSOOGCA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                              <td  style="text-align: center;"> 
                                  
                                  <div class="panel">ANEXAR OBSERVACIÓNES</div>

                                      <input type="file" id="nuevoArchivoObservacionesCA"  class="nuevoArchivoObservacionesCA"  name="editarArchivoObservacionesCA" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualObservacionesCA" name="archivoActualObservacionesCA" >
                              </td>

                          </tr>

                          <tr>

                             <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES REQUERIMIENTO - AMONESTACIÓN PRIVADA </td>
                             <td  style="text-align: center;"  disabled>  REQUERIMIENTO - AMONESTACIÓN PRIVADA </td>

                          </tr>

                          <tr>

                             <td colspan="3"> <textarea id="EditarSOOCA" name="EditarSOOCA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!--<input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOCA" name="EditarSOOCA"> --> </td>
                             <td  style="text-align: center;"> 
                                  
                                  <div class="panel">ANEXAR REQUERIMIENTO - AMONESTACIÓN PRIVADA</div>

                                      <input type="file" id="nuevoArchivoRequerimientoCA"  class="nuevoArchivoRequerimientoCA"  name="editarArchivoRequerimientoCA" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualRequerimientoCA" name="archivoActualRequerimientoCA" >
                              </td>

                          </tr>
                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES REQUERIMIENTO - AMONESTACIÓN PÚBLICA </td>
                              <td  style="text-align: center;"  disabled>  REQUERIMIENTO - AMONESTACIÓN PÚBLICA </td>
                            
                          </tr>

                          <tr>
                              
                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOPCA" name="EditarSOOPCA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify;" readonly></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>
                              <td  style="text-align: center;"> 
                                  
                                  <div class="panel">ANEXAR REQUERIMIENTO - AMONESTACIÓN PÚBLICA</div>

                                      <input type="file" id="nuevoArchivoRequerimientoPublicaCA" class="nuevoArchivoRequerimientoPublicaCA"  name="editarArchivoRequerimientoPublicaCA" disabled>

                                          <p class="help-block">Peso máximo de la foto 20 MB</p>

                                          <input type="hidden" id="archivoActualRequerimientoPublicaCA" name="archivoActualRequerimientoPublicaCA" >
                              </td>
                              
                          </tr>
                          
                        </tbody>

                     </table>

                  </div>
                    
                </div>
                
              </div>

            <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">ACTUALIZAR REVISIÓN</button>

            </div>

            <?php
            
              $editarAdministradorSO = new ControladorAdministracionGeneralSO();
              $editarAdministradorSO -> ctrAdministracionGeneralSOModal();

            ?>

          </form>

        </div>

      </div>

    </div>

 <!--=========================== ================================== ===================================================================
  =============================== FORMULARIO PARA ACTUALIZAR ADMINISTRACIÓN GENERAL DE SUJETOS OBLIGADOS ==============================
  =============================== ================================== ==================================================================-->

<!--

<div id="modalActualizarAdministracionSOGeneral" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg" style="width: 60%">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #3c8dbc; color:white" >

              <h4 class="modal-title">Calificar Informe</h4>

          </div>

          <div class="modal-body"> 

            <div class="box-body">

              <div class="form-group row"> 

                  <div class="col-xs-12"> 

                          <table class="table table-bordered table-striped dt-responsive tablasAdministracionSujetosObligadosGeneralxSO" style="width: 100%">
                      
                              <thead>

                                <tr>

                                  <th>#</th>
                                  <th>Sujeto Obligado</th>
                                  <th>Informe Presentado</th>
                                  <th>Cantidad</th>
                                  <th>Fecha de Entrega</th>
                                  <th>Acciones</th>
            
                                </tr>

                              </thead>

                              <tfoot>

                                <tr>

                                  <th>#</th>
                                  <th>Sujeto Obligado</th>
                                  <th>Informe Presentado</th>
                                  <th>Cantidad</th>
                                  <th>Fecha de Entrega</th>
                                  <th>Acciones</th>

                                </tr>
                                
                              </tfoot>  
                                          
                                <input type="hidden" value="<?php // echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuarioxSO">

                                <input type="hidden" value="<?php  //echo $_SESSION["codigo"]; ?>" id="perfiCodigoxSO"> 

                            </table>
          
                  </div>

              </div>
                
            </div>
            
          </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-default pull-left">Salir</button>

            <button type="submit" class="btn btn-primary">Calificar Informe de solicitud</button>

        </div>

        <?php
        
        /*
          $editarUsuarios = new ControladorUsuariosInformes();
          $editarUsuarios -> ctrEditarUsuario();
        */

        ?>

      </form>

    </div>

  </div>

</div>

-->
