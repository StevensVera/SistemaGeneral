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

        Administración de Solicitudes de Información

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">  Administración de Solicitudes de Información </li>
        
      </ol>
      
    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSolicitudesInformacionLlenado"> 

            Agregar Nueva Solicitudes Información

            </button>
          
        </div>

        <div class="box-body">

             <table class="table table-bordered table-striped dt-responsive tablasSolicitudesInformacion" with="100%">

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Sujeto Obligado</th>
                        <th>Total de Solicitudes Información</th>
                        <th>Informe Presentado</th>
                        <th>Fecha de Entrega</th>
                        <th>Acciones</th>
  
                    </tr>

                </thead>

            </table>
          
        </div>
       
      </div>

      <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSolicitudesInformacionDetalles"> 

            Agregar Detalles de la Solicitudes Información

            </button>
          
        </div>

        <div class="box-body">

             <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Sujeto Obligado</th>
                        <th>Titular SO</th>
                        <th>Informe Presentado</th>
                        <th>Fecha de Entrega</th>
                        <th>Acciones</th>
  
                    </tr>

                </thead>

            </table>
          
        </div>
       
      </div>

    </section>
    

  </div>

  <!--============================ =============================== ==============================
  ===================== FORMULARIO PARA AGREGAR SOLICITUDES DE INFORMACIÓN ======================
  ================================ =============================== ============================-->

<div id="modalAgregarSolicitudesInformacionLlenado" class="modal fade" role="dialog">

<div class="modal-dialog modal-lg" style="width: 85%">

 <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

     <div class="modal-header" style="background: #3c8dbc; color:white" >

       <button type="button" class="close" data-dismiss="modal">&times;</button>

       <h4 class="modal-title">Agregar Solicitudes de Informacion</h4>

     </div>

     <div class="modal-body"> 

        <div class="box-body">

           <div class="form-group row" style="width: 80%; margin: 0 auto; padding-bottom: 15px"> 

                <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

               <div class="col-xs-8">

                      <div class="input-group">
         
                         <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                               <select class="form-control input-lg" name="nuevoTipoInformeSI">
             
                                  <option value="">Selecionar el Infome a Entregar</option>

                                  <option value="Informe Anual">Informe Anual</option>

                                  <option value="1er Informe Bimestral">1er Informe Bimestral</option>

                                  <option value="2do Informe Bimestral">2do Informe Bimestral</option>

                                  <option value="3er Informe Bimestral">3er Informe Bimestral</option>

                                  <option value="3to Informe Bimestral">3er Informe Bimestral</option>

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

                          <input type="text" class="form-control input-lg" name="nuevoAnioSI" placeholder="AÑO" required>

                    </div>

                 </div>

           </div>

           <!-- ===================== ENTRADA PARA EL TOTAL DE SOLICITUDES PRESENTADAS ==================== -->

           <div class="form-group" style="width: 21%; margin: 0 auto; padding-bottom: 15px">
                
              <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <input type="text" class="form-control input-lg" id="nuevoSI_MP_Total" name="nuevoSI_MP_Total" placeholder="Total de Solicitudes" require>

              </div>
    
          </div>

          <hr>

          <!-- =================================================================================================== 
               ================================= BOTÓN DE "Medio de Presentación" ================================
               =================================================================================================== -->

          <style type="text/css">
      
              #btnSlide{
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

                  <button  type="button" id="btnSlide" style="width: 100%;" class="backColor  btn btn-primary btn-lg">
      
                     <span> Medio de Presentación <i class="fa fa-angle-down"> </i> </span>

                  </button>
          
          </div>

          <!-- =================================================================================================== 
               =========================== LLENADO DEL CRITERIO "Medio de Presentación" ===========================
               =================================================================================================== -->

            <div id="slide" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Medio de Presentación" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  </thead>  

                      <!-- Personal / Escrito - "Medio de Presentación" -->

                      <tr>

                        <th>1</th>
                        <th>Personal / Escrito</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MP_Personal_Escrito" name="nuevoSI_MP_Personal_Escrito" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Correo Electrónico - "Medio de Presentación"-->

                      <tr>

                        <th>2</th>
                        <th>Correo Electrónico</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MP_Correo_Electronico" name="nuevoSI_MP_Correo_Electronico" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Sistema Infomex - "Medio de Presentación" -->

                      <tr>

                        <th>3</th>
                        <th>Sistema Infomex</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MP_Sistema_Informex" name="nuevoSI_MP_Sistema_Informex" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- PNT - "Medio de Presentación" -->

                      <tr>

                        <th>4</th>
                        <th>Plataforma Nacional de Transparencia</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MP_PNT" name="nuevoSI_MP_PNT" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponible - "Medio de Presentación" -->

                      <tr>

                        <th>5</th>
                        <th>No disponible</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MP_No_Disponible" name="nuevoSI_MP_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Medio de Presentación" -->

                      <tr>

                        <th>6</th>
                        <th>Suma Total - Medio de Presentación </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MP_Suma_Total" name="nuevoSI_MP_Suma_Total" require >

                            </div>
                         </th>
                        
                      </tr>

                  

              </table>
        
            </div>

            <!-- =======================================     LINEA     ============================================ -->

            <hr>

           <!-- =================================================================================================== 
                ================================= BOTÓN DE "Tipo de Solicitante" ==================================
                =================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideTS{
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

                <button  type="button" id="btnSlideTS" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Tipo de Solicitante <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        <!-- =================================================================================================== 
             =========================== LLENADO DEL CRITERIO "Tipo de Solicitante" =============================
             =================================================================================================== -->

            <div id="SlideTS" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Tipo de Solicitante" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Persona fisica - "Tipo de Solicitante" -->

                      <tr>

                        <th>1</th>
                        <th>Persona fisica</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_Persona_Fisica" name="nuevoSI_TS_Persona_Fisica" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Persona moral - "Tipo de Solicitante"-->

                      <tr>

                        <th>2</th>
                        <th>Persona moral</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_Personal_Moral" name="nuevoSI_TS_Personal_Moral" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponible - "Tipo de Solicitante" -->

                      <tr>

                        <th>3</th>
                        <th>No disponible</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_No_Disponible" name="nuevoSI_TS_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Tipo de Solicitante" -->

                      <tr>

                        <th>4</th>
                        <th>Suma Total - Tipo de Solicitante </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_Suma_Total" name="nuevoSI_TS_Suma_Total" require >

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div>

              <!-- =======================================     LINEA     ============================================ -->

            <hr>

           <!-- ===================================================================================================== 
                ================================= BOTÓN DE "Genero del solicitante" =================================
                ===================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideGS{
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

                <button  type="button" id="btnSlideGS" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Genero del solicitante <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        <!-- =================================================================================================== 
             =========================== LLENADO DEL CRITERIO "Genero del solicitante" =============================
             =================================================================================================== -->

            <div id="SlideGS" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Genero del solicitante" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Persona fisica - "Tipo de Solicitante" -->

                      <tr>

                        <th>1</th>
                        <th>Persona fisica</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_Persona_Fisica" name="nuevoSI_TS_Persona_Fisica" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Persona moral - "Tipo de Solicitante"-->

                      <tr>

                        <th>2</th>
                        <th>Persona moral</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_Personal_Moral" name="nuevoSI_TS_Personal_Moral" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponible - "Tipo de Solicitante" -->

                      <tr>

                        <th>3</th>
                        <th>No disponible</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_No_Disponible" name="nuevoSI_TS_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Tipo de Solicitante" -->

                      <tr>

                        <th>4</th>
                        <th>Suma Total - Genero del solicitante </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_TS_Suma_Total" name="nuevoSI_TS_Suma_Total" require >

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div>

             <!-- =======================================     LINEA     ============================================ -->

            <hr>

            <!-- ===================================================================================================== 
                ================================= BOTÓN DE "Informacion Solicitada" =================================
                ===================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideIS{
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

                <button  type="button" id="btnSlideIS" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Informacion Solicitada <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        <!-- =================================================================================================== 
             =========================== LLENADO DEL CRITERIO "Informacion Solicitada" =============================
             =================================================================================================== -->

            <div id="SlideIS" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Informacion Solicitada" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Obligaciones de transparencia - "Informacion Solicitada" -->

                      <tr>

                        <th>1</th>
                        <th>Obligaciones de transparencia</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_IS_Obligaciones_Transparencia" name="nuevoSI_IS_Obligaciones_Transparencia" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Reservada - "Informacion Solicitada" -->

                      <tr>

                        <th>2</th>
                        <th>Reservada</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_IS_Reservada" name="nuevoSI_IS_Reservada" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Confidencial - "Informacion Solicitada" -->

                      <tr>

                        <th>3</th>
                        <th>Confidencial</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_IS_Confidencial" name="nuevoSI_IS_Confidencial" require >

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Otro - "Informacion Solicitada" -->

                      <tr>

                        <th>4</th>
                        <th>Otro</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_IS_Otro" name="nuevoSI_IS_Otro" require >

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No Disponible - "Informacion Solicitada" -->

                      <tr>

                        <th>5</th>
                        <th>No Disponible</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_IS_No_Disponible" name="nuevoSI_IS_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Informacion Solicitada" -->

                      <tr>

                        <th>6</th>
                        <th>Suma Total - Informacion Solicitada </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_IS_Suma_Total" name="nuevoSI_IS_Suma_Total" require >

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div>


            <!-- =======================================     LINEA     ============================================ -->

            <hr>

           <!-- ===================================================================================================== 
                ======================================== BOTÓN DE "Tramites" ========================================
                ===================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideT{
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

                <button  type="button" id="btnSlideT" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Tramites <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        <!-- =================================================================================================== 
             ================================ LLENADO DEL CRITERIO "Tramites" ==================================
             =================================================================================================== -->

            <div id="SlideT" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Tramites" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Solicitudes Concluidas - "Tramites" -->

                      <tr>

                        <th>1</th>
                        <th>Solicitudes Concluidas</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_T_Solicitudes_Concluidas" name="nuevoSI_T_Solicitudes_Concluidas" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Solicitudes Pendientes - "Tramites" -->

                      <tr>

                        <th>2</th>
                        <th>Solicitudes Pendientes</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_T_Solicitudes_Pendientes" name="nuevoSI_T_Solicitudes_Pendientes" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponibles - "Tramites" -->

                      <tr>

                        <th>3</th>
                        <th>No disponibles</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_T_No_Disponible" name="nuevoSI_T_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Tramites" -->

                      <tr>

                        <th>4</th>
                        <th>Suma Total - Tramites </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_T_Suma_Total" name="nuevoSI_T_Suma_Total" require >

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div>

             <!-- =======================================     LINEA     ============================================ -->

            <hr>

           <!-- ===================================================================================================== 
                ================================== BOTÓN DE "Modalidad de Respuesta" ================================
                ===================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideMR{
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

                <button  type="button" id="btnSlideMR" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Modalidad de Respuesta <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        <!-- =================================================================================================== 
             ========================== LLENADO DEL CRITERIO "Modalidad de Respuesta" ==========================
             =================================================================================================== -->

            <div id="SlideMR" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Tramites" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Medios electrónicos - "Modalidad de Respuesta" -->

                      <tr>

                        <th>1</th>
                        <th>Medios electrónicos</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_Medios_electronicos" name="nuevoSI_MR_Medios_electronicos" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Copia simple - "Modalidad de Respuesta" -->

                      <tr>

                        <th>2</th>
                        <th>Copia simple</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_Copia_Simple" name="nuevoSI_MR_Copia_Simple" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Consulta Directa - "Modalidad de Respuesta" -->

                      <tr>

                        <th>3</th>
                        <th>Consulta Directa</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_Consulta_Directa" name="nuevoSI_MR_Consulta_Directa" require >

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Copia certificada - "Modalidad de Respuesta" -->

                      <tr>

                        <th>4</th>
                        <th>Copia certificada</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_Copia_Certificada" name="nuevoSI_MR_Copia_Certificada" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Otro - "Modalidad de Respuesta" -->

                      <tr>

                        <th>5</th>
                        <th>Otro</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_Otro" name="nuevoSI_MR_Otro" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- No disponibles - "Modalidad de Respuesta" -->

                      <tr>

                        <th>6</th>
                        <th>No disponibles</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_No_Disponible" name="nuevoSI_MR_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Modalidad de Respuesta" -->

                      <tr>

                        <th>7</th>
                        <th>Suma Total - Tramites </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_MR_Suma_Total" name="nuevoSI_MR_Suma_Total" require >

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div> 

             <!-- =======================================     LINEA     ============================================ -->

            <hr>
            
           <!-- ===================================================================================================== 
                ================================== BOTÓN DE "Obligaciones Solicitadas" ================================
                ===================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideOS{
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

                <button  type="button" id="btnSlideOS" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Obligaciones Solicitadas <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        
            <div class="form-group row" style="width: 100%; margin: 0 auto; padding-bottom: 15px"> 

                  <!-- =================================================================================================== 
                      ========================== LLENADO DEL CRITERIO "Obligaciones Solicitadas" ==========================
                      =================================================================================================== -->

              <div id="SlideOS" class="form-group" style="display: none; width: 100%; margin: 0 auto; padding-bottom: 15px">

                  <!-- ===================================  SEGUNDA COLUMNA "Obligaciones Solicitadas" =================================================== -->

                  <div class="col-xs-6">
                          
                      <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                            <thead>
                                
                                <!-- TITULOS - "Tramites" -->

                                <tr>

                                  <th style="width: 20px">#</th>
                                  <th style="width: 250px" >CRITERIOS</th>
                                  <th style="width: 50px">CANTIDAD</th>

                                </tr>
                            
                            </thead>  

                                <!-- Marco normativo - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>1</th>
                                  <th>Marco normativo</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Marco_Normativo" name="nuevoSI_OS_Marco_Normativo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Estructura orgánica - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>2</th>
                                  <th>Estructura orgánica</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Estructura_Orgánica" name="nuevoSI_OS_Estructura_Orgánica" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Funciones de cada área - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>3</th>
                                  <th>Funciones de Cada Área</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Funciones_Cada_Area" name="nuevoSI_OS_Funciones_Cada_Area" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Metas y objetivos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>4</th>
                                  <th>Metas y objetivos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Metas_Objetivos" name="nuevoSI_OS_Metas_Objetivos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Indicadores relacionados cpn temas de interés público o trascendencia social - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>5</th>
                                  <th>Indicadores Relacionados con Temas de Interés Público o Trascendencia Social</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Indicadores_Relacionados" name="nuevoSI_OS_Indicadores_Relacionados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Indicadores que Permitan Rendir Cuentas de sus Objetivos y Resultados - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>6</th>
                                  <th>Indicadores que Permitan Rendir Cuentas de sus Objetivos y Resultados</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Indicadores_Rendir_Cuentas" name="nuevoSI_OS_Indicadores_Rendir_Cuentas" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Directorio de servidores públicos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>7</th>
                                  <th>Directorio de Servidores Públicos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Servidores_Publicos" name="nuevoSI_OS_Indicadores_Directorio_Servidores_Publicos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Remuneraciones del Personal - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>8</th>
                                  <th>Remuneraciones del personal</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Remuneraciones_Personal" name="nuevoSI_OS_Remuneraciones_Personal" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Gastos de representación y víaticos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>9</th>
                                  <th>Gastos de Representación y Víaticos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Gastos_Representación_Víaticos" name="nuevoSI_OS_Gastos_Representación_Víaticos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Pazas de base, confianza y/o plazas vacantes - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>10</th>
                                  <th>Plazas de Base, Confianza y/oPlazas Vacantes</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Plazas_Vacantes" name="nuevoSI_OS_Plazas_Vacantes" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Contratacion de servicios profesionales por honorarios - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>11</th>
                                  <th>Contratacion de Servicios Profesionales por Honorarios</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Contratacion_Servicios" name="nuevoSI_OS_Contratacion_Servicios" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Versiones públicas de las declaraciones patrimoniales de los servidores públicos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>12</th>
                                  <th>Versiones Públicas de las Declaraciones Patrimoniales de los Servidores Públicos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Versiones_Públicas" name="nuevoSI_OS_Versiones_Públicas" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Domicilio y Dirección Electronica de la Unidad de Transparencia - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>13</th>
                                  <th>Domicilio y Dirección Electronica de la Unidad de Transparencia</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Domicilio_Dirección" name="nuevoSI_OS_Domicilio_Dirección" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Convocatoria a Concursos para Ocupar Cargos Públicos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>14</th>
                                  <th>Convocatoria a Concursos para Ocupar Cargos Públicos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Convocatoria_Concursos" name="nuevoSI_OS_Convocatoria_Concursos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Informacion de los programas  de subsidios, estimulos y apoyos  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>15</th>
                                  <th>Informacion de los Programas de Subsidios, Estimulos y Apoyos </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Informacion_Programas" name="nuevoSI_OS_Informacion_Programas" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Condiciones generales de trabajo, contratos o convenios que regules las relaciones laborales del personal de base y/o confianza - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>16</th>
                                  <th>Condiciones Generales de Trabajo, Contratos o Convenios que Regules las Relaciones Laborales del Personal de Base y/o Confianza</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Condiciones_Generales_Trabajo" name="nuevoSI_OS_Condiciones_Generales_Trabajo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Recursos públicos económicos en especie o donativos que sean entregados a los sindicatos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>17</th>
                                  <th>Recursos Públicos Económicos en Especie o Donativos que sean Entregados a los Sindicatos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Recursos_Publicos_Economicos" name="nuevoSI_OS_Recursos_Publicos_Economicos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Información curricular de los servidores públicoss - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>18</th>
                                  <th>Información curricular de los servidores públicos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Información_Curricular" name="nuevoSI_OS_Información_Curricular" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Servidores públicos sancionados - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>19</th>
                                  <th>Servidores Públicos Sancionados</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Servidores_Publicos_Sancionados" name="nuevoSI_OS_Servidores_Publicos_Sancionados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Servicios que se Ofrecen - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>20</th>
                                  <th>Servicios que se Ofrecen</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Servicios_Ofrecen" name="nuevoSI_OS_Servicios_Ofrecen" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Tramites, requisitos y formatos que se ofrecen - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>21</th>
                                  <th>Tramites, Requisitos y Formatos que se Ofrecen</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Tramites_Requisitos_Formatos" name="nuevoSI_OS_Tramites_Requisitos_Formatos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Presupuesto asignado e informes del ejercicio trimestral del gasto - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>22</th>
                                  <th>Presupuesto Asignado e Informes del Ejercicio Trimestral del Gasto</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Presupuesto_Asignado" name="nuevoSI_OS_Presupuesto_Asignado" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Informacion relativa a la deuda pública - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>23</th>
                                  <th>Informacion Relativa a la Deuda Pública</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Informacion_Relativa" name="nuevoSI_OS_Informacion_Relativa" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Montos designados a comunicación social y publicidad - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>24</th>
                                  <th>Montos designados a comunicación social y publicidad</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Montos_Designados" name="nuevoSI_OS_Montos_Designados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Informes de Resultados de Auditorias - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>25</th>
                                  <th>Informes de resultados de auditorias</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Informes_Resultados_Auditorias" name="nuevoSI_OS_Informes_Resultados_Auditorias" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Resultados de dictaminación de estados financieros - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>26</th>
                                  <th>Resultados de Dictaminación de Estados Financieros</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Resultados_Dictaminación" name="nuevoSI_OS_Resultados_Dictaminación" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Informes de resultados de auditorias - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>27</th>
                                  <th>Montos, Criterios, Convocatorias del Listado de Personas Fisicas o Morales que Tengan Asignado Recursos Públicos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Montos_Criterios_Convocatorias" name="nuevoSI_OS_Montos_Criterios_Convocatorias" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Concesiones, contratos, convenios, permisos, licencias o autorizaciones otorgados  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>28</th>
                                  <th>Concesiones, Contratos, Convenios, Permisos, Licencias o Autorizaciones Otorgados </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Concesiones_Contratos_Convenios" name="nuevoSI_OS_Concesiones_Contratos_Convenios" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Resultados de los procesos de adjudicaciones directas,invitaciones restringidad y licitaciones  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>29</th>
                                  <th>Resultados de los Procesos de Adjudicaciones Directas, Invitaciones Restringidad y Licitaciones </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Resultados_Procesos" name="nuevoSI_OS_Resultados_Procesos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Informes que generen los sujetos obligados - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>30</th>
                                  <th>Informes que Generen los Sujetos Obligados</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Informes_Resultados" name="nuevoSI_OS_Informes_Resultados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Estadisticas que generen en cumplimiento de sus facultades, competencias  o funciones - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>31</th>
                                  <th>Estadisticas que Generen en Cumplimiento de sus Facultades, Competencias  o Funciones</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Estadisticas_Generen_Cumplimiento" name="nuevoSI_OS_Estadisticas_Generen_Cumplimiento" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Avances prográmaticos o presupuestales, balances generales y su estado financiero - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>32</th>
                                  <th>Avances Prográmaticos o Presupuestales, Balances Generales y su Estado Financiero</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Avances_Programaticos" name="nuevoSI_OS_Avances_Programaticos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Padrón de proveedores y contratistas - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>33</th>
                                  <th>Padrón de Proveedores y Contratistas</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Padrón_Proveedores" name="nuevoSI_OS_Padrón_Proveedores" require >

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Convenios de coordinación de concertación con los sectores social y privado - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>34</th>
                                  <th>Convenios de coordinación de concertación con los sectores social y privado</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Convenios_Coordinación" name="nuevoSI_OS_Convenios_Coordinación" require >

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Inventario de bienes muebles e inmuebles en posesión y propiedad - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>35</th>
                                  <th>Inventario de Bienes Muebles e Inmuebles en Posesión y Propiedad - Obligaciones Solicitadas </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Inventario_Bienes" name="nuevoSI_OS_Inventario_Bienes" require >

                                      </div>
                                  </th>
                                  
                                </tr>

                        </table>
                  
                  </div>
                      
                  <!-- ===================================  SEGUNDA COLUMNA "Obligaciones Solicitadas" =================================================== -->

                   <div class="col-xs-6">

                         <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                            <thead>
                                
                                <!-- TITULOS - "Tramites" -->

                                <tr>

                                  <th style="width: 20px">#</th>
                                  <th style="width: 250px" >CRITERIOS</th>
                                  <th style="width: 50px">CANTIDAD</th>

                                </tr>
                            
                            </thead>  

                                <!-- Recomendaciones emitidas por organismos de derechos humanos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>36</th>
                                  <th>Recomendaciones Emitidas por Organismos de Derechos Humanos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Recomendaciones_Emitidas" name="nuevoSI_OS_Recomendaciones_Emitidas" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Resoluciones y laudos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>37</th>
                                  <th>Resoluciones y Laudos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Resoluciones_Laudos" name="nuevoSI_OS_Resoluciones_Laudos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Mecanismos de participación ciudadana - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>38</th>
                                  <th>Mecanismos de Participación Ciudadana</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Mecanismos_Participación" name="nuevoSI_OS_Mecanismos_Participación" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Programas ofrecidos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>39</th>
                                  <th>Programas Ofrecidos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Programas_Ofrecidoss" name="nuevoSI_OS_Programas_Ofrecidoss" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Actas y resoluciones del Comité de Transparencia  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>40</th>
                                  <th>Actas y resoluciones del Comité de Transparencia </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Actas_Resoluciones" name="nuevoSI_OS_Actas_Resoluciones" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Evaluaciones y encuentas realizadas por los sujetos obligados a programas financiados con recurso público - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>41</th>
                                  <th>Evaluaciones y Encuentas Realizadas por los Sujetos Obligados a Programas Financiados con Recurso Público</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Evaluaciones_Encuentas" name="nuevoSI_OS_Evaluaciones_Encuentas" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Estudios financiados con recurso público - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>42</th>
                                  <th>Estudios Financiados con Recurso Público</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Estudios_Financiados" name="nuevoSI_OS_Estudios_Financiados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Listado de jubilados y pensionados y los montos que reciben - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>43</th>
                                  <th>Listado de Jubilados y Pensionados y los Montos que Reciben</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Listado_Jubilados" name="nuevoSI_OS_Listado_Jubilados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Ingresos recibidos por cualquier concepto señalando el nombre de quines lo reciben, administran y ejercen - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>44</th>
                                  <th>Ingresos Recibidos por Cualquier Concepto Señalando el Nombre de Quines lo Reciben, Administran y Ejercen</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Gastos_Ingresos_Recibidos" name="nuevoSI_OS_Gastos_Ingresos_Recibidos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Donaciones hechas a terceros en dinero o en especie  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>45</th>
                                  <th>Donaciones Hechas a Terceros en Dinero o en Especie </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Donaciones_Hechas" name="nuevoSI_OS_Donaciones_Hechas" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Catálogos de Disposición y Guía de Archivo Documental  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>46</th>
                                  <th>Catálogos de Disposición y Guía de Archivo Documental </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Catalogos_Disposicion" name="nuevoSI_OS_Catalogos_Disposicion" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Actas de sesiones ordinarias y estraordinarias de los conejos consultivos, así como opiniones y recomendaciones que emitan - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>47</th>
                                  <th>Actas de Sesiones Ordinarias y Estraordinarias de los Conejos Consultivos, así como Opiniones y Recomendaciones que Emitan</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Actas_Sesiones" name="nuevoSI_OS_Actas_Sesiones" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Listado de Solicitudes y Proveedores de Servicios o Aplicaciones de internet para la intervención de comunicaciones privadas - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>48</th>
                                  <th>Listado de Solicitudes y Proveedores de Servicios o Aplicaciones de Internet para la Intervención de Comunicaciones Privadas</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Listado_Solicitudes" name="nuevoSI_OS_Listado_Solicitudes" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Gacetas Municipales - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>49</th>
                                  <th>Gacetas Municipales</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Gacetas_Municipales" name="nuevoSI_OS_Gacetas_Municipales" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Plan de Desarrollo Municipal  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>50</th>
                                  <th>Plan de Desarrollo Municipal</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Plan_Desarrollo" name="nuevoSI_OS_Plan_Desarrollo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Condiciones Generales de Trabajo, Contratos o Convenios que Regules las Relaciones Laborales del Personal de Base y/o Confianza - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>51</th>
                                  <th>Condiciones Generales de Trabajo, Contratos o Convenios que Regules las Relaciones Laborales del Personal de Base y/o Confianza</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Condiciones_Generales_Trabajo" name="nuevoSI_OS_Condiciones_Generales_Trabajo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Recursos públicos económicos en especie o donativos que sean entregados a los sindicatos - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>52</th>
                                  <th>Recursos Públicos Económicos en Especie o Donativos que sean Entregados a los Sindicatos</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Recursos_Publicos_Economicos" name="nuevoSI_OS_Recursos_Publicos_Economicos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Plan de Desarrollo Urbano  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>53</th>
                                  <th>Plan de Desarrollo Urbano</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Plan_Desarrollo_Urbano" name="nuevoSI_OS_Plan_Desarrollo_Urbano" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Programa de Ordenamiento Territorial - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>54</th>
                                  <th>Programa de Ordenamiento Territorial</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Programa_Ordenamiento" name="nuevoSI_OS_Programa_Ordenamiento" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Programa de Uso de Suelo - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>55</th>
                                  <th>Programa de Uso de Suelo</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Programa_Suelo" name="nuevoSI_OS_Programa_Suelo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Tipos de Uso de Suelo - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>56</th>
                                  <th>Tipos de Uso de Suelo</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Tipos_Suelo" name="nuevoSI_OS_Tipos_Suelo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Licencia de Uso de Suelo - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>57</th>
                                  <th>Licencia de Uso de Suelo</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Licencia_Suelo" name="nuevoSI_OS_Licencia_Suelo" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Licencias de Construcción - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>58</th>
                                  <th>Licencias de Construcción</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Licencias_Construcción" name="nuevoSI_OS_Licencias_Construcción" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Montos designados a comunicación social y publicidad - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>59</th>
                                  <th>Montos designados a comunicación social y publicidad</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Montos_Designados" name="nuevoSI_OS_Montos_Designados" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Actas de Cabildo - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>60</th>
                                  <th>Actas de Cabildo</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Actas_Cabildos" name="nuevoSI_OS_Actas_Cabildos" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Presupuesto Sostenible - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>61</th>
                                  <th>Presupuesto Sostenible</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Presupuesto_Sostenible " name="nuevoSI_OS_Presupuesto_Sostenible" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Evaluaciones LDF - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>62</th>
                                  <th>Evaluaciones LDF</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Evaluaciones_LDF" name="nuevoSI_OS_Evaluaciones_LDF" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                  <!-- Subsidios  - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>63</th>
                                  <th>Subsidios </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Subsidios" name="nuevoSI_OS_Subsidios" require>

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Otro - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>68</th>
                                  <th>Otro</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Otro" name="nuevoSI_OS_Otro" require >

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- No disponibles - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>69</th>
                                  <th>No disponibles</th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_No_Disponible" name="nuevoSI_OS_No_Disponible" require >

                                      </div>
                                  </th>
                                  
                                </tr>

                                <!-- Total - "Obligaciones Solicitadas" -->

                                <tr>

                                  <th>70</th>
                                  <th>Suma Total - Obligaciones Solicitadas </th>
                                  <th> 
                                    <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                          <input type="text" class="form-control input-lg" id="nuevoSI_OS_Suma_Total" name="nuevoSI_OS_Suma_Total" require >

                                      </div>
                                  </th>
                                  
                                </tr>

                        </table>

                  </div>

            </div> 

        </div> 

         <!-- =======================================     LINEA     ============================================ -->

            <hr>

           <!-- ===================================================================================================== 
                ========================= BOTÓN DE "Sentido en que se emite la respuesta" ===========================
                ===================================================================================================== -->
            
            <style type="text/css">
      
                #btnSlideSR{
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

                <button  type="button" id="btnSlideSR" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Sentido en que se emite la respuesta <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

        <!-- =================================================================================================== 
             ================================ LLENADO DEL CRITERIO "Sentido en que se emite la respuesta" ==================================
             =================================================================================================== -->

            <div id="SlideSR" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionsolicitudes" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Informacion total - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>1</th>
                        <th>Informacion total</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Informacion_Total" name="nuevoSI_SR_Informacion_Total" require>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Informacion parcial - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>2</th>
                        <th>Informacion parcial</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Informacion_Parcial" name="nuevoSI_SR_Informacion_Parcial" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- Negada por clasificación - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>3</th>
                        <th>Negada por Clasificación</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Negada_Clasificación" name="nuevoSI_SR_Negada_Clasificación" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- Inexistencia de la informacion - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>4</th>
                        <th>Inexistencia de la Informacion</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Inexistencia_Informacion" name="nuevoSI_SR_Inexistencia_Informacion" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- Mixta - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>5</th>
                        <th>Mixta</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Mixta" name="nuevoSI_SR_Mixta" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- No aclarada - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>6</th>
                        <th>No Aclarada</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_No_Aclarada" name="nuevoSI_SR_No_Aclarada" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- Orientada - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>7</th>
                        <th>Orientada</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Orientada" name="nuevoSI_SR_Orientada" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- En Tramite- "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>8</th>
                        <th>En Tramite</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_En_Tramite" name="nuevoSI_SR_En_Tramite" require>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- Improcedente - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>9</th>
                        <th>Improcedente</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Improcedente" name="nuevoSI_SR_Improcedente" require>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponibles - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>10</th>
                        <th>No disponibles</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_No_Disponible" name="nuevoSI_SR_No_Disponible" require >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>11</th>
                        <th>Suma Total - Sentido en que se emite la respuesta </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSI_SR_Suma_Total" name="nuevoSI_SR_Suma_Total" require >

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

                 <input type="file" id="nuevoArchivo" name="nuevoArchivo">

                 <p class="help-block">Peso máximo de la foto 200 MB</p>

             </div>   

           </div>  

         </div>

    </div>

     <!-- ================================== BOTON PARA AGREGAR USUARIO ======================================== -->

     <div class="modal-footer">

       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       <button type="submit" class="btn btn-primary">Guardar Solicitud de Información</button>

     </div>

     <?php

         $crearUsuario = new ControladorUsuariosInformes();
         $crearUsuario -> ctrCrearUsuario();

     ?>

   </form>

 </div>

</div>

</div>


  <!--============================ =============================== ==============================
  ================================ FORMULARIO PARA DETALLES DE SOLICITUD ==============================
  ================================ =============================== ============================-->

  <div id="modalAgregarSolicitudesInformacionDetalles" class="modal fade" role="dialog">

   <div class="modal-dialog modal-lg" style="width: 95%">

    <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background: #3c8dbc; color:white" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Solicitudes Información</h4>

        </div>

        <div class="modal-body"> 

           <div class="box-body">

              <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

              <div class="form-group" style="width: 80%; margin: 0 auto; padding-bottom: 15px">
                
                    <div class="input-group">
          
                        <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoNombreSO">

                    </div>
        
              </div>

              <div class="form-group row">

                 <!-- ==================== ENTRADA PARA EL NOMBRE DEL TITULAR DE TRANSPARENCIA ==================== -->

                 <div class="col-xs-6"> 
        
                     <div class="input-group">
        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                         <input type="text" class="form-control input-lg" name="nuevoNombreUT" placeholder="Ingresar Titular de Transparencia o Administrador ITAI" required>

                     </div>

                 </div>
                
                 <!-- ================================== ENTRADA PARA EL PERFIL DEL USUARIO ======================================== --> 

                <div class="col-xs-6">

                    <div class="input-group">
            
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                            <select class="form-control input-lg" name="nuevoPerfil">
       
                                <option value="">Selecionar perfil</option>

                                <option value="Administrador">Administrador</option>

                                <option value="SujetoObligado">Sujeto Obligado</option>

                                <option value="Observador">Observador</option>

                            </select>

                    </div>

                </div>
      
               </div>

              <!-- ================================== ENTRADA PARA SUBIR FOTOGRAFIA ======================================== -->

              <div class="form-group row">

                <div class="col-xs-6">
              
                  <div class="panel">SUBIR FOTO</div>

                    <input type="file" id="nuevaFoto" name="nuevaFoto">

                    <p class="help-block">Peso máximo de la foto 200 MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

                </div>

                <div class="col-xs-6">

                  <div class="panel">SUBIR ARCHIVO</div>

                    <input type="file" id="nuevoArchivo" name="nuevoArchivo">

                    <p class="help-block">Peso máximo de la foto 200 MB</p>

                </div>   

              </div>
              
              <div class="form-group">

                    <table class="table table-bordered table-striped dt-responsive tablasUsuariosSO" with="100%">

                        <thead>

                            <tr>

                            <th>#</th>
                      <th style="width: 10px">Codigo</th>
                      <th style="width: 140px">Tipo Sujeto Obligado</th>
                      <th style="width: 210px">Nombre SO</th>
                      <!--<th >Titular</th> -->
                      <th style="width: 100px">Usuario</th>
                      <!--<th>Foto</th> -->
                      <th style="width: 80px">Perfil</th>
                      <th style="width: 60px">Estado</th>
                      <th style="width: 110px">Fecha</th>
                      <th>Acciones</th>

                            </tr>

                        </thead>

                    </table>

             </div>
               
          </div>

      </div>
        

        <!-- ================================== BOTON PARA AGREGAR USUARIO ======================================== -->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Solicitud</button>

        </div>

        <?php

          // $crearUsuario = new ControladorUsuariosInformes();
          // $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>