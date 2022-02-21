<?php

if($_SESSION["perfil_Informe"] == "Observador"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administración de Capacitaciones

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Administración de Capacitaciones</li>
        
      </ol>
      
    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCapacitacionesLlenado"> 

            Agregar Datos de Capacitaciones

            </button>
          
        </div>

        <div class="box-body">

             <table class="table table-bordered table-striped dt-responsive tablasCapacitaciones " with="100%">

                <thead>

                    <tr>

                        <th>#</th>
                        <th style="width: 300px">Sujeto Obligado</th>
                        <th style="width: 150px">Informe Presentado</th>
                        <th style="width: 80px">Año</th>
                        <th style="width: 160px">Total de Capacitaciones</th>
                        <th style="width: 110px">Fecha de Entrega</th>
                        <th style="width: 150px">Acciones</th>
  
                    </tr>

                </thead>

                <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

                <input type="hidden" value="<?php echo $_SESSION["codigo"]; ?>" id="perfiCodigo">

            </table>
          
        </div>
       
      </div>

    </section>

  </div>

  <!--============================ =============================== ==============================
  ======================= FORMULARIO PARA AGREGAR CAPACITACIONES ===========================
  ================================ =============================== ============================-->

<div id="modalAgregarCapacitacionesLlenado" class="modal fade" role="dialog">

<div class="modal-dialog modal-lg" style="width: 85%">

 <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

     <div class="modal-header" style="background: #3c8dbc; color:white" >

       <button type="button" class="close" data-dismiss="modal">&times;</button>

       <h4 class="modal-title">Agregar Capacitaciones</h4>

     </div>

     <div class="modal-body"> 

        <div class="box-body">

           <div class="form-group row" style="width: 80%; margin: 0 auto; padding-bottom: 15px"> 

                <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

               <div class="col-xs-8">

                      <div class="input-group">
         
                         <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                               <select class="form-control input-lg" id="nuevoTipoCapacitaciones" name="nuevoTipoCapacitaciones">
             
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

               <!-- ==================== ENTRADA PARA EL AÑO DEL INFORME =========================== -->

               <div class="col-xs-4"> 
     
                   <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                          <input type="text" class="form-control input-lg" id="nuevoAnioCapacitaciones" name="nuevoAnioCapacitaciones" placeholder="AÑO" requiredd>

                    </div>

                 </div>

           </div>

           <!-- ===================== ENTRADA PARA EL TOTAL DE CAPACITACIONES PRESENTADAS ==================== -->

           <div class="form-group" style="width: 21%; margin: 0 auto; padding-bottom: 15px">
                
              <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <input type="text" class="form-control input-lg" id="nuevoCapacitaciones_Total" name="nuevoCapacitaciones_Total" placeholder="Total Capacitaciones" required>

              </div>
    
          </div>


          <div class="form-group" style="width: 50%; margin: 0 auto; padding-bottom: 15px">
                
                <div class="input-group">

  
                      <input type="hidden" class="form-control input-lg" id="InformeAnios" name="InformeAnios" placeholder="Total Capacitaciones" required>
  
                </div>
      
            </div>

          <hr>

          <!-- =================================================================================================== 
               ================================= BOTÓN DE "Medio de Presentación" ================================
               =================================================================================================== -->

          <style type="text/css">
      
              #btnSlideCapacitacionA{
                width: 450px;
                border: 0px;
                font-size:25px;
                padding: 2px;
              }

             .backColor, .backColor a{
                background:#47bac1;
                color: #FFFFFF;
              } 
    
          </style>
          

          <div style="width: 60%; margin: 0 auto; padding-bottom: 15px">

                  <button  type="button" id="btnSlideCapacitacionA" style="width: 100%;" class="backColor  btn btn-primary btn-lg">
      
                     <span> Capacitaciones <i class="fa fa-angle-down"> </i> </span>

                  </button>
          
          </div>

          <!-- =================================================================================================== 
               =========================== LLENADO DEL CRITERIO "CAPACITACIONES" ===========================
               =================================================================================================== -->

            <div id="slideCapacitacionA" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionArco" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "CAPACITACIONES" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  </thead>  

                      <!-- Personal / Escrito - "Capacitaciones Recibidas" -->

                      <tr>

                        <th>1</th>
                        <th>Capacitaciones Recibidas</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoCA" onchange="sumarCA();"  id="nuevoCapacitaciones_Recibidas" name="nuevoCapacitaciones_Recibidas" required>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Correo Electrónico - "Capacitaciones Ortogadas"-->

                      <tr>

                        <th>2</th>
                        <th>Capacitaciones Ortogadas</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoCA" onchange="sumarCA();"  id="nuevoCapacitaciones_Ortogadas" name="nuevoCapacitaciones_Ortogadas" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Sistema Infomex - "Total Servidores Publicos" -->

                      <tr>

                        <th>3</th>
                        <th>Total Servidores Publicos</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg" id="nuevoCapacitaciones_Total_Servidores_Publicos" name="nuevoCapacitaciones_Total_Servidores_Publicos" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- "Demas acciones realizadas en Transparencia, Acceso a la Información y de Interés Público que se Realicen" -->
                      <!--
                      <tr>

                        <th>4</th>
                        <th>Demas acciones realizadas en Transparencia, Acceso a la Información y de Interés Público que se Realicen</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoCapacitaciones_Acciones_Realizadas_Transparencia" name="nuevoCapacitaciones_Acciones_Realizadas_Transparencia" required>

                            </div>
                         </th>
                        
                      </tr>
                      <tr>
                      -->
                      <!-- "SUMA TOTAL DE CAPACITACIONES" -->
                        <th>4</th>
                        <th>Suma Total</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg" id="nuevoCapacitaciones_Suma_Total" value="0" name="nuevoCapacitaciones_Suma_Total" readonly>

                            </div>
                         </th>
                        
                      </tr>


              </table>
        
            </div>
            
       <!-- =======================================     LINEA     ============================================ -->

       <hr>

           <!-- ===================== ENTRADA PARA SUBIR EL ARCHIVO ============================ -->

           <div class="form-group row">

             <div class="col-xs-12">

               <div class="panel">SUBIR ARCHIVO</div>

                 <input type="file" class="nuevoArchivoCA" name="nuevoArchivoCA">

                 <p class="help-block">Peso máximo de la foto 200 MB</p>

             </div>   

           </div>  

         </div>

    </div>

     <!-- ================================== BOTON PARA AGREGAR USUARIO ======================================== -->

     <div class="modal-footer">

       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       <button type="submit" class="btn btn-primary">Guardar Capacitaciones</button>

     </div>

     <?php

        $crearCapacitaciones = new ControladorCapacitaciones();
        $crearCapacitaciones -> ctrAgregarCapacitacion();

     ?>

   </form>

 </div>

</div>

</div>


<?php
 
   $EliminarSolicitudInformacion = new ControladorCapacitaciones();
   $EliminarSolicitudInformacion -> ctrBorrarRegistroCapacitacion();

?>


  <!--============================ =============================== ==============================
  ======================= FORMULARIO PARA ACTUALIZAR CAPACITACIONES ===========================
  ================================ =============================== ============================-->

<div id="modalAgregarCapacitacionesEditar" class="modal fade" role="dialog">

<div class="modal-dialog modal-lg" style="width: 85%">

 <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

     <div class="modal-header" style="background: #3c8dbc; color:white" >

       <button type="button" class="close" data-dismiss="modal">&times;</button>

       <h4 class="modal-title">Agregar Capacitaciones</h4>

     </div>

     <div class="modal-body"> 

        <div class="box-body">

           <div class="form-group row" style="width: 80%; margin: 0 auto; padding-bottom: 15px"> 

                <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

               <div class="col-xs-8">

                      <div class="input-group">
         
                         <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                               <select class="form-control input-lg"  name="EditarTipoCapacitaciones"  readonly>

                                  <option value="" id="EditarTipoCapacitaciones"></option>

                               </select>

                       </div>

               </div>

               <!-- ==================== ENTRADA PARA EL AÑO DEL INFORME =========================== -->

               <div class="col-xs-4"> 
     
                   <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                          <input type="text" class="form-control input-lg" id="EditarAnioCapacitaciones" name="EditarAnioCapacitaciones" readonly >

                    </div>

                 </div>

           </div>

           <!-- ===================== ENTRADA PARA EL TOTAL DE CAPACITACIONES PRESENTADAS ==================== -->

           <div class="form-group" style="width: 21%; margin: 0 auto; padding-bottom: 15px">
                
              <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <input type="text" class="form-control input-lg" id="EditarCapacitaciones_Total" name="EditarCapacitaciones_Total" placeholder="Total Capacitaciones" required>

              </div>
    
          </div>
          <hr>

          <!-- =================================================================================================== 
               ================================= BOTÓN DE "Medio de Presentación" ================================
               =================================================================================================== -->

          <style type="text/css">
      
              #btnSlideCapacitacion{
                width: 450px;
                border: 0px;
                font-size:25px;
                padding: 2px;
              }

             .backColor, .backColor a{
                background:#47bac1;
                color: #FFFFFF;
              } 
    
          </style>
          

          <div style="width: 60%; margin: 0 auto; padding-bottom: 15px">

                  <button  type="button" id="btnSlideCapacitacion" style="width: 100%;" class="backColor  btn btn-primary btn-lg">
      
                     <span> Capacitaciones <i class="fa fa-angle-down"> </i> </span>

                  </button>
          
          </div>

          <!-- =================================================================================================== 
               =========================== LLENADO DEL CRITERIO "CAPACITACIONES" ===========================
               =================================================================================================== -->

            <div id="slideCapacitacion" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionArco" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "CAPACITACIONES" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  </thead>  

                      <!-- Personal / Escrito - "Capacitaciones Recibidas" -->

                      <tr>

                        <th>1</th>
                        <th>Capacitaciones Recibidas</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoCAA" onchange="sumarCAA();" id="EditarCapacitaciones_Recibidas" name="EditarCapacitaciones_Recibidas" required>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Correo Electrónico - "Capacitaciones Ortogadas"-->

                      <tr>

                        <th>2</th>
                        <th>Capacitaciones Ortogadas</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoCAA" onchange="sumarCAA();" id="EditarCapacitaciones_Ortogadas" name="EditarCapacitaciones_Ortogadas" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Sistema Infomex - "Total Servidores Publicos" -->

                      <tr>

                        <th>3</th>
                        <th>Total Servidores Publicos</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="EditarCapacitaciones_Total_Servidores_Publicos" name="EditarCapacitaciones_Total_Servidores_Publicos" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- "Demas acciones realizadas en Transparencia, Acceso a la Información y de Interés Público que se Realicen" -->
                      <!--
                      <tr>

                        <th>4</th>
                        <th>Demas acciones realizadas en Transparencia, Acceso a la Información y de Interés Público que se Realicen</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="EditarCapacitaciones_Acciones_Realizadas_Transparencia" name="EditarCapacitaciones_Acciones_Realizadas_Transparencia" required>

                            </div>
                         </th>
                        
                      </tr>
                      -->

                      <!-- Sistema Infomex - "Total Servidores Publicos" -->

                      <tr>

                        <th>4</th>
                        <th>Suma Total</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg" id="EditarCapacitaciones_Suma_Total" value="0" name="EditarCapacitaciones_Suma_Total" readonly>

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div>
            
       <!-- =======================================     LINEA     ============================================ -->

       <hr>

           <!-- ===================== ENTRADA PARA SUBIR EL ARCHIVO ============================ -->

           <div class="form-group row">

             <div class="col-xs-12">

               <div class="panel">SUBIR ARCHIVO</div>

                 <input type="file" class="nuevoArchivoCA" name="editarArchivoCA">

                 <p class="help-block">Peso máximo de la foto 200 MB</p>

                 <input type="hidden" id="archivoActualCA" name="archivoActualCA" >


             </div>   

           </div>  

         </div>

    </div>

     <!-- ================================== BOTON PARA AGREGAR USUARIO ======================================== -->

     <div class="modal-footer">

       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       <button type="submit" class="btn btn-primary">Editar Capacitaciones</button>

     </div>

            <?php

              $ActualizarCapacitacion = new ControladorCapacitaciones();
              $ActualizarCapacitacion -> ctrActualizarCapacitaciones();


            ?>

   </form>

 </div>

</div>

</div>
