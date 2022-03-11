<?php

if($_SESSION["perfil_Informe"] == "Sujeto Obligado"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administración General de Sujeto Obligado

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Administración General de Sujeto Obligado </li>
        
      </ol>
      
    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border">

           <div class="form-group row" style="width: 80%; margin: 0 auto; padding-bottom: 15px"> 

                <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->
              <!--

               <div class="col-xs-8">

                      <div class="input-group">
         
                         <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                               <select class="form-control input-lg" id="nuevoTipoInformeAdministracionSO" name="nuevoTipoInformeAdministracionSO">
             
                                  <option value="">Selecionar el Infome a Entregar</option>

                                  <option value="Informe Anual">Informe Anual</option>

                                  <option value="1er Informe Bimestral">1er Informe Bimestral</option>

                                  <option value="2do Informe Bimestral">2do Informe Bimestral</option>

                                  <option value="3er Informe Bimestral">3er Informe Bimestral</option>

                                  <option value="4to Informe Bimestral">4to Informe Bimestral</option>

                                  <option value="5to Informe Bimestral">5to Informe Bimestral</option>

                                  <option value="6to Informe Bimestral">6to Informe Bimestral</option>

                               </select>

                       </div>

               </div>

              -->

               <!-- ==================== ENTRADA PARA EL AÑO DEL INFORME =========================== -->

              <!-- 

               <div class="col-xs-4"> 
     
                   <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                          <input type="number" class="form-control input-lg" id="nuevoAnioAdministracionSO" name="nuevoAnioAdministracionSO" placeholder="AÑO" required>

                    </div>

                 </div>
              
              -->  

           </div>
          
        </div>

        <div class="box-body">

             <table id="example" class="table table-bordered table-striped dt-responsive tablasAdministracionSujetosObligadosGeneral " style="width:100%">
             
                <thead>

                    <tr>

                    <th style="width:3%">#</th>
                        <th style="width:35%">Sujeto Obligado</th>
                        <th style="width:15%">Informe Presentado</th>
                        <th style="width:3%">AÑO</th>
                        <th style="width:15%">Fecha de Entrega</th>
                        <th style="width:10%">Estatus</th>
                        <th style="width:19%">Acciones</th>
  
                    </tr>

                </thead>

                <tfoot>

                  <tr>
                        <th style="width:3%">#</th>
                        <th style="width:35%">Sujeto Obligado</th>
                        <th style="width:15%">Informe Presentado</th>
                        <th style="width:3%">AÑO</th>
                        <th style="width:15%">Fecha de Entrega</th>
                        <th style="width:10%">Estatus</th>
                        <th style="width:19%">Acciones</th>
                  </tr>

                </tfoot>  
                                
                <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

                <input type="hidden" value="<?php echo $_SESSION["codigo"]; ?>" id="perfiCodigo"> 


            </table>
          
        </div>

      </div>

    </section>

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
                            <th style="width: 250.00px;text-align: center;">BIMESTRE</th>
                            <th style="width: 270.39px;text-align: center;">INFORME PRESENTADO</th>
                            <th style="width: 124.91px;text-align: center;">AÑO</th>
                            <th style="width: 210.36px;text-align: center;">FECHA DE ENTREGA</th>
                            <th style="width: 117.43px;text-align: center;">TOTAL</th>
                            <th style="width: 219.91px;text-align: center;">ACCIONES</th>
  
                           </tr>

                        </thead>

                        <tbody>

                             <!-- ==================================  APARTADO PARA SOLICITUDES DE INFORMACION ======================================= -->

                          <tr>
                            
                            <td rowspan="3" style="text-align: center;">1</td>

                               <input type="hidden" id="EditaridSI" name="EditaridSI">

                            <td style="background-color:#FFFFFF; color:#000000;" rowspan="3"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOSI" name="EditarSOSI" disabled > </td>

                            <td style="text-align: center;" rowspan="3"> SOLICITUDES DE INFORMACIÓN </td>

                            <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOANIOSI" name="EditarSOANIOSI" disabled> </td>

                            <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOFSI" name="EditarSOFSI" disabled>  </td>

                            <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOTSI" name="EditarSOTSI" disabled> </td>

                            <td rowspan="3" style="text-align: center;"> 

                               <select style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" class="form-control input-lg" name="EditarSORSI">
             
                                  <option value="" id="EditarSORSI"></option>

                                  <!-- <option value="NO ENVIADO">NO ENVIADO</option> -->

                                  <option value="EN REVISIÓN">EN REVISIÓN</option>

                                  <option value="NO COMPLETADO" >NO COMPLETADO</option>

                                  <option value="COMPLETADO">COMPLETADO</option>

                               </select>
                          
                            </td>

                          </tr>

                          <tr>

                              <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>
                            
                          </tr>

                          <tr>
                              
                              <td  style="text-align: center;" colspan="3"> <textarea id="EditarSOOSI" name="EditarSOOSI" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify; "></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>

                          </tr>

                              <!-- ==================================  APARTADO PARA SOLICITUDES DE ARCO ======================================= -->
                            
                          <tr>

                            <td rowspan="3" style="background-color:#E5E5E5;color:#000000;text-align: center;">2</td>

                            <input type="hidden" id="EditaridSA" name="EditaridSA">

                            <td style="background-color:#E5E5E5;color:#000000;" rowspan="3"> <input style="background-color:#E5E5E5;border-color:#E5E5E5;text-align: center;"  type="text" class="form-control input-lg" id="EditarSOSA" name="EditarSOSA" disabled> </td>

                            <td style="background-color:#E5E5E5;color:#000000;text-align: center;" rowspan="3" > SOLICITUDES ARCO</td>

                            <td style="background-color:#E5E5E5;color:#000000;"> <input style="background-color:#E5E5E5;border-color:#E5E5E5;text-align: center;" type="text" class="form-control input-lg" id="EditarSOANIOSA" name="EditarSOANIOSA" disabled>  </td>

                            <td style="background-color:#E5E5E5;color:#000000;"> <input style="background-color:#E5E5E5;border-color:#E5E5E5;text-align: center;" type="text" class="form-control input-lg" id="EditarSOFSA" name="EditarSOFSA" disabled> </td>

                            <td style="background-color:#E5E5E5;color:#000000;"> <input style="background-color:#E5E5E5;border-color:#E5E5E5;text-align: center;" type="text" class="form-control input-lg" id="EditarSOTSA" name="EditarSOTSA" disabled> </td>

                            <td rowspan="3" style="background-color:#E5E5E5;color:#000000;text-align: center;"> 

                                <select style="background-color:#E5E5E5;border-color:#E5E5E5;text-align: center;" class="form-control input-lg" name="EditarSORSA">
             
                                  <option value="" id="EditarSORSA"></option>

                                <!--  <option value="NO ENVIADO">NO ENVIADO</option> -->

                                  <option value="EN REVISIÓN">EN REVISIÓN</option>

                                  <option value="NO COMPLETADO">NO COMPLETADO</option>

                                  <option value="COMPLETADO">COMPLETADO</option>

                                </select>
                          
                            </td>

                          </tr>

                          <tr>

                             <td  style="background-color:#E5E5E5;color:#000000;text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>

                          </tr>

                          <tr>

                             <td  style="background-color:#E5E5E5;color:#000000;text-align: center;" colspan="3"> <textarea id="EditarSOOSA" name="EditarSOOSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify; "></textarea> <!-- <input style="background-color:#E5E5E5;color:#000000; text-align: center;" type="text" class="form-control input-lg"  id="EditarSOOSA" name="EditarSOOSA"> --> </td>

                          </tr>

                              <!-- ==================================  APARTADO PARA SOLICITUDES DE ARCO ======================================= -->

                          <tr>

                            <td rowspan="3" style="text-align: center;">3</td>

                            <input type="hidden" id="EditaridCA" name="EditaridCA">

                            <td style="background-color:#FFFFFF;color:#000000;" rowspan="3"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOCA" name="EditarSOCA" disabled> </td>

                            <td style="text-align: center;" rowspan="3"> CAPACITACIONES </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOANIOCA" name="EditarSOANIOCA" disabled> </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOFCA" name="EditarSOFCA" disabled> </td>

                            <td style="background-color:#FFFFFF;color:#000000;"> <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="EditarSOTCA" name="EditarSOTCA" disabled> </td>
                            
                            <td rowspan="3" style="text-align: center;"> 

                                <select style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" class="form-control input-lg" name="EditarSORCA">
             
                                  <option value="" id="EditarSORCA"></option>

                                 <!-- <option value="NO ENVIADO">NO ENVIADO</option> -->

                                  <option value="EN REVISIÓN">EN REVISIÓN</option>

                                  <option value="NO COMPLETADO">NO COMPLETADO</option>

                                  <option value="COMPLETADO">COMPLETADO</option>

                                </select>
                          
                            </td>

                          </tr>

                          <tr>

                             <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>

                          </tr>

                          <tr>

                             <td colspan="3"> <textarea id="EditarSOOCA" name="EditarSOOCA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:150px;text-align: justify; "></textarea> <!--<input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOCA" name="EditarSOOCA"> --> </td>

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
