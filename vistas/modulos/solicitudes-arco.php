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

        Administración de Solicitudes ARCO

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">  Administración de Solicitudes ARCO </li>
        
      </ol>
      
    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSolicitudesArco"> 

            Agregar Nueva Solicitud ARCO

            </button>
          
        </div>

        <div class="box-body">

             <table class="table table-bordered table-striped dt-responsive tablasSolicitudesArco " with="100%">

                <thead>

                    <tr>

                        <th style="width: 10px" >#</th>
                        <th style="width: 350px">Sujeto Obligado</th>
                        <th style="width: 180px">Informe Presentado</th>
                        <th style="width: 150px;">Total de Solicitudes Información</th>
                        <th style="width: 80px">Estatus</th>
                        <th style="width: 140px">Fecha de Entrega</th>
                        <th style="width: 190px">Acciones</th>
  
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
  ======================= FORMULARIO PARA AGREGAR SOLICITUDES DE ARCO ===========================
  ================================ =============================== ============================-->

<div id="modalAgregarSolicitudesArco" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg" style="width: 85%"> 

    <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #3c8dbc; color:white" >

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Agregar Solicitud Arco</h4>

            </div>

            <div class="modal-body"> 

            <div class="box-body">

              <div class="form-group row" style="width: 80%; margin: 0 auto; padding-bottom: 15px"> 

                <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

                <div class="col-xs-8">

                  <div class="input-group">
         
                    <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                    <select class="form-control input-lg" name="nuevoTipoInformeSA">
             
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

                    <input type="text" class="form-control input-lg" id="nuevoAnioSA" name="nuevoAnioSA" placeholder="AÑO" requiredd>

                   </div>

                  </div>

              </div>

              <!-- ===================== ENTRADA PARA EL TOTAL DE SOLICITUDES PRESENTADAS ==================== -->

              <div class="form-group" style="width: 21%; margin: 0 auto; padding-bottom: 15px">
                
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <input type="text" class="form-control input-lg" id="nuevoSA_Total" name="nuevoSA_Total" placeholder="Total de Solicitudes" required>

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
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionArco" with="100%">

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

                                <input type="number" class="form-control input-lg montoSAMP" onchange="sumarSAMP();" id="nuevoSA_MP_Personal_Escrito" name="nuevoSA_MP_Personal_Escrito" required>

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

                                <input type="number" class="form-control input-lg montoSAMP" onchange="sumarSAMP();" id="nuevoSA_MP_Correo_Electronico" name="nuevoSA_MP_Correo_Electronico" required>

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

                                <input type="number" class="form-control input-lg montoSAMP" onchange="sumarSAMP();" id="nuevoSA_MP_Sistema_Informex" name="nuevoSA_MP_Sistema_Informex" required>

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

                                <input type="number" class="form-control input-lg montoSAMP" onchange="sumarSAMP();" id="nuevoSA_MP_PNT" name="nuevoSA_MP_PNT" required>

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

                                <input type="number" class="form-control input-lg montoSAMP" onchange="sumarSAMP();" id="nuevoSA_MP_No_Disponible" name="nuevoSA_MP_No_Disponible" required >

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

                                <input type="number" class="form-control input-lg" id="nuevoSA_MP_Suma_Total" value="0" name="nuevoSA_MP_Suma_Total" readonly >

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
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

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

                                <input type="number" class="form-control input-lg montoSATS" onchange="sumarSATS();" id="nuevoSA_TS_Persona_Fisica" name="nuevoSA_TS_Persona_Fisica" required>

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

                                <input type="number" class="form-control input-lg montoSATS" onchange="sumarSATS();" id="nuevoSA_TS_Personal_Moral" name="nuevoSA_TS_Personal_Moral" required>

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

                                <input type="number" class="form-control input-lg montoSATS" onchange="sumarSATS();" id="nuevoSA_TS_No_Disponible" name="nuevoSA_TS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_TS_Suma_Total" value="0" name="nuevoSA_TS_Suma_Total" readonly >

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
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Genero del solicitante" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Femenino - "Tipo de Solicitante" -->

                      <tr>

                        <th>1</th>
                        <th>Femenino</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAGS" onchange="sumarSAGS();" id="nuevoSA_GS_Femenino" name="nuevoSA_GS_Femenino" required>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Masculino - "Tipo de Solicitante"-->

                      <tr>

                        <th>2</th>
                        <th>Masculino</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAGS" onchange="sumarSAGS();" id="nuevoSA_GS_Masculino" name="nuevoSA_GS_Masculino" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Anonimo - "Tipo de Solicitante"-->

                      <tr>

                        <th>3</th>
                        <th>Anonimo</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAGS" onchange="sumarSAGS();" id="nuevoSA_GS_Anonimo" name="nuevoSA_GS_Anonimo" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponible - "Tipo de Solicitante" -->

                      <tr>

                        <th>4</th>
                        <th>No disponible</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAGS" onchange="sumarSAGS();" id="nuevoSA_GS_No_Disponible" name="nuevoSA_GS_No_Disponible" required >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Tipo de Solicitante" -->

                      <tr>

                        <th>5</th>
                        <th>Suma Total - Genero del solicitante </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoSA_GS_Suma_Total" value="0" name="nuevoSA_GS_Suma_Total" readonly >

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
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

                  <thead>
                      
                      <!-- TITULOS - "Informacion Solicitada" -->

                      <tr>

                        <th style="width: 20px">#</th>
                        <th style="width: 300px" >CRITERIOS</th>
                        <th style="width: 10px">CANTIDAD</th>

                      </tr>
                  
                  </thead>  

                      <!-- Acceso - "Informacion Solicitada" -->

                      <tr>

                        <th>1</th>
                        <th>Acceso</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAIS" onchange="sumarSAIS();" id="nuevoSA_IS_Acceso" name="nuevoSA_IS_Acceso" required>

                            </div>
                        </th>
                        
                      </tr>

                      <!-- Rectificación - "Informacion Solicitada" -->

                      <tr>

                        <th>2</th>
                        <th>Rectificación</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAIS" onchange="sumarSAIS();" id="nuevoSA_IS_Rectificación" name="nuevoSA_IS_Rectificación" required>

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Oposición - "Informacion Solicitada" -->

                      <tr>

                        <th>3</th>
                        <th>Oposición</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAIS" onchange="sumarSAIS();" id="nuevoSA_IS_Oposición" name="nuevoSA_IS_Oposición" required >

                            </div>
                         </th>
                        
                      </tr>

                      <!-- Cancelacion - "Informacion Solicitada" -->

                      <tr>

                        <th>4</th>
                        <th>Cancelacion</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAIS" onchange="sumarSAIS();" id="nuevoSA_IS_Cancelacion" name="nuevoSA_IS_Cancelacion" required >

                            </div>
                         </th>
                        
                      </tr>

                        <!-- Otro - "Informacion Solicitada" -->

                      <tr>

                        <th>5</th>
                        <th>Otro</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAIS" onchange="sumarSAIS();" id="nuevoSA_IS_Otro" name="nuevoSA_IS_Otro" required >

                            </div>
                         </th>
                        
                      </tr>


                      <!-- No Disponible - "Informacion Solicitada" -->

                      <tr>

                        <th>6</th>
                        <th>No Disponible</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSAIS" onchange="sumarSAIS();" id="nuevoSA_IS_No_Disponible" name="nuevoSA_IS_No_Disponible" required >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Informacion Solicitada" -->

                      <tr>

                        <th>7</th>
                        <th>Suma Total - Informacion Solicitada </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg" id="nuevoSA_IS_Suma_Total" value="0" name="nuevoSA_IS_Suma_Total" readonly >

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
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

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

                                <input type="number" class="form-control input-lg montoSAT" onchange="sumarSAT();" id="nuevoSA_T_Solicitudes_Concluidas" name="nuevoSA_T_Solicitudes_Concluidas" required>

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

                                <input type="number" class="form-control input-lg montoSAT" onchange="sumarSAT();" id="nuevoSA_T_Solicitudes_Pendientes" name="nuevoSA_T_Solicitudes_Pendientes" required>

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

                                <input type="number" class="form-control input-lg montoSAT" onchange="sumarSAT();" name="nuevoSA_T_No_Disponible" required >

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

                                <input type="number" class="form-control input-lg" id="nuevoSA_T_Suma_Total" value="0" name="nuevoSA_T_Suma_Total" readonly >

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

                                <input type="number" class="form-control input-lg montoSAMR" onchange="sumarSAMR();" id="nuevoSA_MR_Medios_electronicos" name="nuevoSA_MR_Medios_electronicos" required>

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

                                <input type="number" class="form-control input-lg montoSAMR" onchange="sumarSAMR();" id="nuevoSA_MR_Copia_Simple" name="nuevoSA_MR_Copia_Simple" required>

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

                                <input type="number" class="form-control input-lg montoSAMR" onchange="sumarSAMR();" id="nuevoSA_MR_Consulta_Directa" name="nuevoSA_MR_Consulta_Directa" required >

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

                                <input type="number" class="form-control input-lg montoSAMR" onchange="sumarSAMR();" id="nuevoSA_MR_Copia_Certificada" name="nuevoSA_MR_Copia_Certificada" required >

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

                                <input type="number" class="form-control input-lg montoSAMR" onchange="sumarSAMR();" id="nuevoSA_MR_Otro" name="nuevoSA_MR_Otro" required >

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

                                <input type="number" class="form-control input-lg montoSAMR" onchange="sumarSAMR();" id="nuevoSA_MR_No_Disponible" name="nuevoSA_MR_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Suma_Total" value="0" name="nuevoSA_MR_Suma_Total" readonly >

                            </div>
                         </th>
                        
                      </tr>

              </table>
        
            </div> 

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
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" class="form-control input-lg" id="nuevoSA_SR_Informacion_Total" name="nuevoSA_SR_Informacion_Total" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Informacion_Parcial" name="nuevoSA_SR_Informacion_Parcial" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Negada_Clasificación" name="nuevoSA_SR_Negada_Clasificación" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Inexistencia_Informacion" name="nuevoSA_SR_Inexistencia_Informacion" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Mixta" name="nuevoSA_SR_Mixta" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_No_Aclarada" name="nuevoSA_SR_No_Aclarada" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Orientada" name="nuevoSA_SR_Orientada" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_En_Tramite" name="nuevoSA_SR_En_Tramite" required>

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

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Improcedente" name="nuevoSA_SR_Improcedente" required>

                            </div>
                         </th>
                        
                      </tr>

                        <!-- No disponibles - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>10</th>
                        <th>Otros</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_Otros" name="nuevoSA_SR_Otros" required >

                            </div>
                         </th>
                        
                      </tr>

                      <!-- No disponibles - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>11</th>
                        <th>No disponibles</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSASR" onchange="sumarSASR();" id="nuevoSA_SR_No_Disponible" name="nuevoSA_SR_No_Disponible" required >

                            </div>
                         </th>
                        
                      </tr>

                       <!-- Total - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>12</th>
                        <th>Suma Total - Sentido en que se emite la respuesta </th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg" id="nuevoSA_SR_Suma_Total" value="0" name="nuevoSA_SR_Suma_Total" readonly >

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

                 <input type="file" class="nuevoArchivoSA" name="nuevoArchivoSA">

                 <p class="help-block">Peso máximo de la foto 200 MB</p>

             </div>   

           </div>  

         </div>

    </div>

     <!-- ================================== BOTON PARA AGREGAR USUARIO ======================================== -->

     <div class="modal-footer">

       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       <button type="submit" class="btn btn-primary">Guardar Solicitud Arco</button>

     </div>

     <?php

         $crearUsuario = new ControladorSolicitudesArco();
         $crearUsuario -> ctrAgregarSolicitudesArco();

     ?>

   </form>

 </div>

  </div>

</div>


<?php
 
 $EliminarSolicitudInformacion = new ControladorSolicitudesArco();
 $EliminarSolicitudInformacion -> ctrBorrarRegistroSolicitudArco();
 $EliminarSolicitudInformacion -> ctrBorrarRegistroSolicitudArco_r();



?>

<!--============================ =============================== ==============================
  ===================== FORMULARIO PARA ACTUALIZAR SOLICITUDES DE INFORMACIÓN ARCO ======================
  ================================ =============================== ============================-->

<div id="modalActualizareSolicitudesArco" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg" style="width: 85%">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #3c8dbc; color:white" >

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Actualizar Solicitudes de ARCO</h4>

          </div>

          <div class="modal-body"> 

            <div class="box-body">

           <div class="form-group row" style="width: 80%; margin: 0 auto; padding-bottom: 15px"> 

                <!-- ========================== ENTRADA PARA ACTUALIZAR EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

               <div class="col-xs-8">

                      <div class="input-group">
         
                         <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                               <select class="form-control input-lg" name="EditarTipoInformeSolicitudesArco" readonly>
             
                                  <option value="" id="EditarTipoInformeSolicitudesArco"></option>


                               </select>

                       </div>

               </div>

               <!-- ==================== ENTRADA PARA ACTUALIZAR EL AÑO DEL INFORME =========================== -->

               <div class="col-xs-4"> 
     
                   <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                          <input type="text" class="form-control input-lg" id="EditarAnioSolicitudesArco" name="EditarAnioSolicitudesArco"  readonly>

                    </div>

                 </div>

           </div>

           <!-- ===================== ENTRADA PARA ACTUALIZAR EL TOTAL DE SOLICITUDES PRESENTADAS ==================== -->

           <div class="form-group" style="width: 21%; margin: 0 auto; padding-bottom: 15px">
                
              <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_Total" name="EditarSolicitudesArco_Total" >

              </div>
    
          </div>
     
     
     <!-- =================================================================================================== 
               ================================= BOTÓN DE "Medio de Presentación" ================================
               =================================================================================================== -->

        <style type="text/css">
      
            #btnSlideMPE{
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

            <button  type="button" id="btnSlideMPE" style="width: 100%;" class="backColor  btn btn-primary btn-lg">

                <span> Medio de Presentación <i class="fa fa-angle-down"> </i> </span>

            </button>
        
        </div>



  <!-- =================================================================================================== 
       =========================== LLENADO DEL CRITERIO "Medio de Presentación" ===========================
       =================================================================================================== -->

    <div id="slideMPE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
        
      <table class="table table-bordered table-striped dt-responsive tablasinformacionArco" with="100%">

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

                        <input type="number" class="form-control input-lg montoSAMPA" onchange="sumarSAMPA();" id="EditarSolicitudesArco_MP_Personal_Escrito" name="EditarSolicitudesArco_MP_Personal_Escrito" >

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

                        <input type="number" class="form-control input-lg montoSAMPA" onchange="sumarSAMPA();" id="EditarSolicitudesArco_MP_Correo_Electronico" name="EditarSolicitudesArco_MP_Correo_Electronico" required>

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

                        <input type="number" class="form-control input-lg montoSAMPA" onchange="sumarSAMPA();" id="EditarSolicitudesArco_MP_Sistema_Informex" name="EditarSolicitudesArco_MP_Sistema_Informex" required>

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

                        <input type="number" class="form-control input-lg montoSAMPA" onchange="sumarSAMPA();" id="EditarSolicitudesArco_MP_PNT" name="EditarSolicitudesArco_MP_PNT" required>

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

                        <input type="number" class="form-control input-lg montoSAMPA" onchange="sumarSAMPA();" id="EditarSolicitudesArco_MP_No_Disponible" name="EditarSolicitudesArco_MP_No_Disponible" required >

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

                        <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_MP_Suma_Total" value="0" name="EditarSolicitudesArco_MP_Suma_Total" readonly >

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
      
            #btnSlideTSE{
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

            <button  type="button" id="btnSlideTSE" style="width: 100%" class="backColor btn btn-primary btn-lg">

                <span> Tipo de Solicitante <i class="fa fa-angle-down"> </i> </span>

            </button>

        </div>

    <!-- =================================================================================================== 
      =========================== LLENADO DEL CRITERIO "Tipo de Solicitante" =============================
      =================================================================================================== -->

      <div id="SlideTSE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
          
        <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

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

                          <input type="number" class="form-control input-lg montoSATSA" onchange="sumarSATSA();" id="EditarSolicitudesArco_TS_Persona_Fisica" name="EditarSolicitudesArco_TS_Persona_Fisica" required>

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

                          <input type="number" class="form-control input-lg montoSATSA" onchange="sumarSATSA();" id="EditarSolicitudesArco_TS_Personal_Moral" name="EditarSolicitudesArco_TS_Personal_Moral" required>

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

                          <input type="number" class="form-control input-lg montoSATSA" onchange="sumarSATSA();" id="EditarSolicitudesArco_TS_No_Disponible" name="EditarSolicitudesArco_TS_No_Disponible" required >

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

                          <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_TS_Suma_Total" value="0" name="EditarSolicitudesArco_TS_Suma_Total" readonly >

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
      
                  #btnSlideGSE{
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

                  <button  type="button" id="btnSlideGSE" style="width: 100%" class="backColor btn btn-primary btn-lg">

                      <span> Genero del solicitante <i class="fa fa-angle-down"> </i> </span>

                  </button>

              </div>

      <!-- =================================================================================================== 
        =========================== LLENADO DEL CRITERIO "Genero del solicitante" =============================
        =================================================================================================== -->

        <div id="SlideGSE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
            
          <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

              <thead>
                  
                  <!-- TITULOS - "Genero del solicitante" -->

                  <tr>

                    <th style="width: 20px">#</th>
                    <th style="width: 300px" >CRITERIOS</th>
                    <th style="width: 10px">CANTIDAD</th>

                  </tr>
              
              </thead>  

                  <!-- Femenino - "Tipo de Solicitante" -->

                  <tr>

                    <th>1</th>
                    <th>Femenino</th>
                    <th> 
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                            <input type="number" class="form-control input-lg montoSAGSA" onchange="sumarSAGSA();" id="EditarSolicitudesArco_GS_Femenino" name="EditarSolicitudesArco_GS_Femenino" required>

                        </div>
                    </th>
                    
                  </tr>

                  <!-- Masculino - "Tipo de Solicitante"-->

                  <tr>

                    <th>2</th>
                    <th>Masculino</th>
                    <th> 
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                            <input type="number" class="form-control input-lg montoSAGSA" onchange="sumarSAGSA();" id="EditarSolicitudesArco_GS_Masculino" name="EditarSolicitudesArco_GS_Masculino" required>

                        </div>
                    </th>
                    
                  </tr>

                  <!-- Anonimo - "Tipo de Solicitante"-->

                  <tr>

                    <th>3</th>
                    <th>Anonimo</th>
                    <th> 
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                            <input type="number" class="form-control input-lg montoSAGSA" onchange="sumarSAGSA();" id="EditarSolicitudesArco_GS_Anonimo" name="EditarSolicitudesArco_GS_Anonimo" required>

                        </div>
                    </th>
                    
                  </tr>

                  <!-- No disponible - "Tipo de Solicitante" -->

                  <tr>

                    <th>4</th>
                    <th>No disponible</th>
                    <th> 
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                            <input type="number" class="form-control input-lg montoSAGSA" onchange="sumarSAGSA();" id="EditarSolicitudesArco_GS_No_Disponible" name="EditarSolicitudesArco_GS_No_Disponible" required >

                        </div>
                    </th>
                    
                  </tr>

                  <!-- Total - "Tipo de Solicitante" -->

                  <tr>

                    <th>5</th>
                    <th>Suma Total - Genero del solicitante </th>
                    <th> 
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                            <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_GS_Suma_Total" value="0" name="EditarSolicitudesArco_GS_Suma_Total" readonly >

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

            #btnSlideISE{
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

            <button  type="button" id="btnSlideISE" style="width: 100%" class="backColor btn btn-primary btn-lg">

                <span> Informacion Solicitada <i class="fa fa-angle-down"> </i> </span>

            </button>

        </div>

    <!-- =================================================================================================== 
      =========================== LLENADO DEL CRITERIO "Informacion Solicitada" =============================
      =================================================================================================== -->

      <div id="SlideISE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
          
        <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

            <thead>
                
                <!-- TITULOS - "Informacion Solicitada" -->

                <tr>

                  <th style="width: 20px">#</th>
                  <th style="width: 300px" >CRITERIOS</th>
                  <th style="width: 10px">CANTIDAD</th>

                </tr>
            
            </thead>  

                <!-- Acceso - "Informacion Solicitada" -->

                <tr>

                  <th>1</th>
                  <th>Acceso</th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg montoSAISA" onchange="sumarSAISA();" id="EditarSolicitudesArco_IS_Acceso" name="EditarSolicitudesArco_IS_Acceso" required>

                      </div>
                  </th>
                  
                </tr>

                <!-- Rectificación - "Informacion Solicitada" -->

                <tr>

                  <th>2</th>
                  <th>Rectificación</th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg montoSAISA" onchange="sumarSAISA();" id="EditarSolicitudesArco_IS_Rectificación" name="EditarSolicitudesArco_IS_Rectificación" required>

                      </div>
                  </th>
                  
                </tr>

                <!-- Oposición - "Informacion Solicitada" -->

                <tr>

                  <th>3</th>
                  <th>Oposición</th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg montoSAISA" onchange="sumarSAISA();" id="EditarSolicitudesArco_IS_Oposición" name="EditarSolicitudesArco_IS_Oposición" required >

                      </div>
                  </th>
                  
                </tr>

                <!-- Cancelacion - "Informacion Solicitada" -->

                <tr>

                  <th>4</th>
                  <th>Cancelacion</th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg montoSAISA" onchange="sumarSAISA();" id="EditarSolicitudesArco_IS_Cancelacion" name="EditarSolicitudesArco_IS_Cancelacion" required >

                      </div>
                  </th>
                  
                </tr>

                  <!-- Otro - "Informacion Solicitada" -->

                <tr>

                  <th>5</th>
                  <th>Otro</th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg montoSAISA" onchange="sumarSAISA();" id="EditarSolicitudesArco_IS_Otro" name="EditarSolicitudesArco_IS_Otro" required >

                      </div>
                  </th>
                  
                </tr>


                <!-- No Disponible - "Informacion Solicitada" -->

                <tr>

                  <th>6</th>
                  <th>No Disponible</th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg montoSAISA" onchange="sumarSAISA();" id="EditarSolicitudesArco_IS_No_Disponible" name="EditarSolicitudesArco_IS_No_Disponible" required >

                      </div>
                  </th>
                  
                </tr>

                <!-- Total - "Informacion Solicitada" -->

                <tr>

                  <th>7</th>
                  <th>Suma Total - Informacion Solicitada </th>
                  <th> 
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                          <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_IS_Suma_Total" value="0" name="EditarSolicitudesArco_IS_Suma_Total" readonly >

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
      
                  #btnSlideTE{
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

                  <button  type="button" id="btnSlideTE" style="width: 100%" class="backColor btn btn-primary btn-lg">

                      <span> Tramites <i class="fa fa-angle-down"> </i> </span>

                  </button>

              </div>

    <!-- =================================================================================================== 
      ================================ LLENADO DEL CRITERIO "Tramites" ==================================
      =================================================================================================== -->

      <div id="SlideTE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
          
        <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

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

                          <input type="number" class="form-control input-lg montoSATA" onchange="sumarSATA();" id="EditarSolicitudesArco_T_Solicitudes_Concluidas" name="EditarSolicitudesArco_T_Solicitudes_Concluidas" required>

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

                          <input type="number" class="form-control input-lg montoSATA" onchange="sumarSATA();" id="EditarSolicitudesArco_T_Solicitudes_Pendientes" name="EditarSolicitudesArco_T_Solicitudes_Pendientes" required>

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

                          <input type="number" class="form-control input-lg montoSATA" onchange="sumarSATA();" id="EditarSolicitudesArco_T_No_Disponible" name="EditarSolicitudesArco_T_No_Disponible" required >

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

                          <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_T_Suma_Total" name="EditarSolicitudesArco_T_Suma_Total" readonly >

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
      
            #btnSlideMRE{
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

          <button  type="button" id="btnSlideMRE" style="width: 100%" class="backColor btn btn-primary btn-lg">

              <span> Modalidad de Respuesta <i class="fa fa-angle-down"> </i> </span>

          </button>

      </div>

    <!-- =================================================================================================== 
      ========================== LLENADO DEL CRITERIO "Modalidad de Respuesta" ==========================
      =================================================================================================== -->

      <div id="SlideMRE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
          
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

                          <input type="number" class="form-control input-lg montoSAMRA" onchange="sumarSAMRA();" id="EditarSolicitudesArco_MR_Medios_electronicos" name="EditarSolicitudesArco_MR_Medios_electronicos" required>

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

                          <input type="number" class="form-control input-lg montoSAMRA" onchange="sumarSAMRA();" id="EditarSolicitudesArco_MR_Copia_Simple" name="EditarSolicitudesArco_MR_Copia_Simple" required>

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

                          <input type="number" class="form-control input-lg montoSAMRA" onchange="sumarSAMRA();" id="EditarSolicitudesArco_MR_Consulta_Directa" name="EditarSolicitudesArco_MR_Consulta_Directa" required >

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

                          <input type="number" class="form-control input-lg montoSAMRA" onchange="sumarSAMRA();" id="EditarSolicitudesArco_MR_Copia_Certificada" name="EditarSolicitudesArco_MR_Copia_Certificada" required >

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

                          <input type="number" class="form-control input-lg montoSAMRA" onchange="sumarSAMRA();" id="EditarSolicitudesArco_MR_Otro" name="EditarSolicitudesArco_MR_Otro" required >

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

                          <input type="number" class="form-control input-lg montoSAMRA" onchange="sumarSAMRA();" id="EditarSolicitudesArco_MR_No_Disponible" name="EditarSolicitudesArco_MR_No_Disponible" required >

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

                          <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_MR_Suma_Total" value="0" name="EditarSolicitudesArco_MR_Suma_Total" readonly >

                      </div>
                  </th>
                  
                </tr>

        </table>

      </div> 

      <hr>

    <!-- ===================================================================================================== 
        ========================= BOTÓN DE "Sentido en que se emite la respuesta" ===========================
         ===================================================================================================== -->
            
          <style type="text/css">
      
              #btnSlideSRE{
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

                <button  type="button" id="btnSlideSRE" style="width: 100%" class="backColor btn btn-primary btn-lg">

                    <span> Sentido en que se emite la respuesta <i class="fa fa-angle-down"> </i> </span>

                </button>
  
            </div>

      <!-- =================================================================================================== 
        ================================ LLENADO DEL CRITERIO "Sentido en que se emite la respuesta" ==================================
        =================================================================================================== -->

            <div id="SlideSRE" class="form-group" style="display: none; width: 85%; margin: 0 auto; padding-bottom: 15px">
                
              <table class="table table-bordered table-striped dt-responsive tablasinformacionarco" with="100%">

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Informacion_Total" name="EditarSolicitudesArco_SR_Informacion_Total" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Informacion_Parcial" name="EditarSolicitudesArco_SR_Informacion_Parcial" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Negada_Clasificación" name="EditarSolicitudesArco_SR_Negada_Clasificación" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Inexistencia_Informacion" name="EditarSolicitudesArco_SR_Inexistencia_Informacion" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Mixta" name="EditarSolicitudesArco_SR_Mixta" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_No_Aclarada" name="EditarSolicitudesArco_SR_No_Aclarada" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Orientada" name="EditarSolicitudesArco_SR_Orientada" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_En_Tramite" name="EditarSolicitudesArco_SR_En_Tramite" required>

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Improcedente" name="EditarSolicitudesArco_SR_Improcedente" required>

                            </div>
                         </th>
                        
                      </tr>


                      <!-- Otros - "Sentido en que se emite la respuesta" -->

                      <tr>

                        <th>10</th>
                        <th>Otros</th>
                        <th> 
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_Otros" name="EditarSolicitudesArco_SR_Otros" required >

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

                                <input type="number" class="form-control input-lg montoSASRA" onchange="sumarSASRA();" id="EditarSolicitudesArco_SR_No_Disponible" name="EditarSolicitudesArco_SR_No_Disponible" required >

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

                                <input type="number" class="form-control input-lg" id="EditarSolicitudesArco_SR_Suma_Total" value="0" name="EditarSolicitudesArco_SR_Suma_Total" readonly>

                            </div>
                         </th>
                        
                      </tr>
                      
              </table>
        
            </div> 

                   <hr>

           <!-- ===================== ENTRADA PARA SUBIR EL ARCHIVO ============================ -->

           <div class="form-group row">

             <div class="col-xs-12">

               <div class="panel">SUBIR ARCHIVO</div>

                 <input type="file" class="nuevoArchivoSA"  name="editarArchivoSA">

                 <p class="help-block">Peso máximo de la foto 200 MB</p>

                 <input type="hidden" id="archivoActualSA" name="archivoActualSA" >

             </div>   

           </div>  

         </div>

        </div>

     
            <!-- ================================== BOTON PARA ACTUALIZAR SOLICITUD DE INFORMACION ======================================== -->

            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Actualizar Solicitud Arco</button>

           </div>

        <?php    
          
           $ActulizarSolicitud = new ControladorSolicitudesArco();
           $ActulizarSolicitud -> ctrActualizarSolicitudArco2();   
        

        ?>

   </form>

 </div>

</div>

</div>

  <!--=========================== ================================== ===================================================================
  =============================== FORMULARIO NOTIFICACION DE OBSERVACIONES - GENERAL DE SUJETOS OBLIGADOS ==============================
  =============================== ================================== ==================================================================-->

<div id="modalInformativoO" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg" style="width: 85%">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #F0BF0C; color:white" >

                <h4 class="modal-title">OBSERVACIONES</h4>

            </div>

            <div class="modal-body"> 

              <div class="box-body">

                <div class="form-group">
                      
                  <table border="1" style="width:100%;">
              
                    <thead>

                        <tr>

                          <th style="width: 230px; text-align: center;">NOMBRE DEL SUJETO OBLIGADO</th>
                          <th colspan="3" style="width: 990.93px;text-align: center;"><input style="text-align: center;" type="text" class="form-control MostrarNombreSOSA" id="MostrarNombreSOSA" name="MostrarNombreSOSA" readonly></th>

                        </tr>
                        <tr>

                          <th style="width: 115px; text-align: center;">BIMESTRE</th>
                          <th style="width: 495.455px;text-align: center;"><input style="text-align: center;" type="text" class="form-control MostrarBimestreSOSA" id="MostrarBimestreSOSA" name="MostrarBimestreSOSA" readonly></th>
                          <th style="width: 115px; text-align: center;">INFORME</th>
                          <th style="width: 495.455px;text-align: center;">SOLICITUDES ARCO</th>
                        
                        </tr>

                    </thead>

                  </table>

                  <br>

                  <table class=" tablaAdministrativa3xSO " border="1" style="width:100%;">
          
                    <thead>
              
                        <tr>

                          <th style="width: 30px; text-align: center;">#</th>
                          <th style="width: 124.91px;text-align: center;">AÑO</th>
                          <th style="width: 280.27px;text-align: center;">FECHA DE ENTREGA</th>
                          <th style="width: 117.43px;text-align: center;">TOTAL</th>
                          <th style="width: 400px;text-align: center;">OBSERVACIÓNES</th>

                        </tr>

                      </thead>

                      <tbody>

                          <!-- ==================================  APARTADO PARA SOLICITUDES DE INFORMACION ======================================= -->

                        <tr>
                          
                          <td rowspan="3" style="text-align: center;">1</td>

                            <input type="hidden" id="EditaridSA" name="EditaridSA">

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarANIOSOSA" id="MostrarANIOSOSA" name="MostrarANIOSOSA" disabled> </td>

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarFechaSOSA" id="MostrarFechaSOSA" name="MostrarFechaSOSA" disabled>  </td>

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarTotalSOSA" id="MostrarTotalSOSA" name="MostrarTotalSOSA" disabled> </td>

                          <td rowspan="3" style="text-align: center;"> 

                            <iframe type="application/pdf" id="MostrarArchivoObservacionesSOSA" name="MostrarArchivoObservacionesSOSA" width="565" height="300"  frameborder="0" ></iframe>
                        
                          </td>

                        </tr>

                        <tr>

                            <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>
                          
                        </tr>

                        <tr>
                            
                            <td  style="text-align: center;" colspan="3"> <textarea id="MostrarObservacionesSOSA" name="MostrarObservacionesSOSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:240px;text-align: justify; "></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>

                        </tr>

                      </tbody>

                  </table>

                </div>
                
                
              </div>
              
            </div>

          <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          </div>


        </form>

      </div>

    </div>

</div>

<!--=========================== ================================== =============================================================================================================
  =============================== FORMULARIO NOTIFICACION DE REQUERIMIENTO ARCO - AMONESTACION PRIVADA - GENERAL DE SUJETOS OBLIGADOS ==============================
  =============================== ================================== ===========================================================================================================-->

<div id="modalInformativo" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg" style="width: 85%">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #F0BF0C; color:white" >

              <h4 class="modal-title">REQUERIMIENTO SOLICITUDES ARCO - AMONESTACION PRIVADA</h4>

          </div>

          <div class="modal-body"> 

            <div class="box-body">

              <div class="form-group">
                    
                <table border="1" style="width:100%;">
            
                  <thead>

                      <tr>

                        <th style="width: 230px; text-align: center;">NOMBRE DEL SUJETO OBLIGADO</th>
                        <th colspan="3" style="width: 990.93px;text-align: center;"><input style="text-align: center;" type="text" class="form-control MostrarNombreSOSA" id="MostrarNombreSOSA" name="MostrarNombreSOSA" readonly></th>

                      </tr>
                      <tr>

                        <th style="width: 115px; text-align: center;">BIMESTRE</th>
                        <th style="width: 495.455px;text-align: center;"><input style="text-align: center;" type="text" class="form-control MostrarBimestreSOSA" id="MostrarBimestreSOSA" name="MostrarBimestreSOSA" readonly></th>
                        <th style="width: 115px; text-align: center;">INFORME</th>
                        <th style="width: 495.455px;text-align: center;">SOLICITUDES ARCO</th>
                      
                      </tr>

                  </thead>

                </table>

                <br>

                <table class=" tablaAdministrativa3xSO " border="1" style="width:100%;">
        
                  <thead>
            
                      <tr>

                        <th style="width: 30px; text-align: center;">#</th>
                        <th style="width: 124.91px;text-align: center;">AÑO</th>
                        <th style="width: 280.27px;text-align: center;">FECHA DE ENTREGA</th>
                        <th style="width: 117.43px;text-align: center;">TOTAL</th>
                        <th style="width: 400px;text-align: center;">REQUERIMIENTO</th>

                      </tr>

                    </thead>

                    <tbody>

                        <!-- ==================================  APARTADO PARA SOLICITUDES DE INFORMACION ======================================= -->

                      <tr>
                        
                        <td rowspan="3" style="text-align: center;">1</td>

                          <input type="hidden" id="EditaridSA" name="EditaridSA">

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarANIOSOSA" id="MostrarANIOSOSA" name="MostrarANIOSOSA" disabled> </td>

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarFechaSOSA" id="MostrarFechaSOSA" name="MostrarFechaSOSA" disabled>  </td>

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarTotalSOSA" id="MostrarTotalSOSA" name="MostrarTotalSOSA" disabled> </td>

                        <td rowspan="3" style="text-align: center;"> 

                          <iframe type="application/pdf" id="MostrarArchivoAmonestacionPrivadaSOSA" name="MostrarArchivoAmonestacionPrivadaSOSA" width="565" height="300"  frameborder="0" ></iframe>
                      
                        </td>

                      </tr>

                      <tr>

                          <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>
                        
                      </tr>

                      <tr>
                          
                          <td  style="text-align: center;" colspan="3"> <textarea id="MostrarAmonestacionPrivadaSOSA" name="MostrarAmonestacionPrivadaSOSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:240px;text-align: justify; "></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>

                      </tr>

                    </tbody>

                </table>

              </div>
              
              
            </div>
            
          </div>

        <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>


      </form>

    </div>

  </div>

</div>


<!--=========================== ================================== =============================================================================================================
  =============================== FORMULARIO NOTIFICACION DE REQUERIMIENTO SOLICITUDES ARCO - AMONESTACION PÚBLICA - GENERAL DE SUJETOS OBLIGADOS ==============================
  =============================== ================================== ===========================================================================================================-->

<div id="modalInformativoAP" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg" style="width: 85%">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" style="background: #F0BF0C; color:white" >

              <h4 class="modal-title">REQUERIMIENTO SOLICITUDES ARCO - AMONESTACION PÚBLICA</h4>

          </div>

          <div class="modal-body"> 

            <div class="box-body">

              <div class="form-group">
                    
                <table border="1" style="width:100%;">
            
                  <thead>

                      <tr>

                        <th style="width: 230px; text-align: center;">NOMBRE DEL SUJETO OBLIGADO</th>
                        <th colspan="3" style="width: 990.93px;text-align: center;"><input style="text-align: center;" type="text" class="form-control MostrarNombreSOSA" id="MostrarNombreSOSA" name="MostrarNombreSOSA" readonly></th>

                      </tr>
                      <tr>

                        <th style="width: 115px; text-align: center;">BIMESTRE</th>
                        <th style="width: 495.455px;text-align: center;"><input style="text-align: center;" type="text" class="form-control MostrarBimestreSOSA" id="MostrarBimestreSOSA" name="MostrarBimestreSOSA" readonly></th>
                        <th style="width: 115px; text-align: center;">INFORME</th>
                        <th style="width: 495.455px;text-align: center;">SOLICITUDES ARCO</th>
                      
                      </tr>

                  </thead>

                </table>

                <br>

                <table class=" tablaAdministrativa3xSO " border="1" style="width:100%;">
        
                  <thead>
            
                      <tr>

                        <th style="width: 30px; text-align: center;">#</th>
                        <th style="width: 124.91px;text-align: center;">AÑO</th>
                        <th style="width: 280.27px;text-align: center;">FECHA DE ENTREGA</th>
                        <th style="width: 117.43px;text-align: center;">TOTAL</th>
                        <th style="width: 400px;text-align: center;">REQUERIMIENTO</th>

                      </tr>

                    </thead>

                    <tbody>

                        <!-- ==================================  APARTADO PARA SOLICITUDES DE INFORMACION ======================================= -->

                      <tr>
                        
                        <td rowspan="3" style="text-align: center;">1</td>

                          <input type="hidden" id="EditaridSA" name="EditaridSA">

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarANIOSOSA" id="MostrarANIOSOSA" name="MostrarANIOSOSA" disabled> </td>

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarFechaSOSA" id="MostrarFechaSOSA" name="MostrarFechaSOSA" disabled>  </td>

                          <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg MostrarTotalSOSA" id="MostrarTotalSOSA" name="MostrarTotalSOSA" disabled> </td>

                        <td rowspan="3" style="text-align: center;"> 

                          <iframe type="application/pdf" id="MostrarArchivoAmonestacionPublicaSOSA" name="MostrarArchivoAmonestacionPublicaSOSA" width="565" height="300"  frameborder="0" ></iframe>
                      
                        </td>

                      </tr>

                      <tr>

                          <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>
                        
                      </tr>

                      <tr>
                          
                          <td  style="text-align: center;" colspan="3"> <textarea id="MostrarAmonestacionPublicaSOSA" name="MostrarAmonestacionPublicaSOSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:240px;text-align: justify; "></textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>

                      </tr>

                    </tbody>

                </table>

              </div>
              
              
            </div>
            
          </div>

        <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>


      </form>

    </div>

  </div>

</div>

<!--=========================== ================================== =============================================================================================================
  =============================== FORMULARIO NOTIFICACION DE REQUERIMIENTO SOLICITUDES ARCO - PROCESO DE SANCIÓN - GENERAL DE SUJETOS OBLIGADOS ==============================
  =============================== ================================== ===========================================================================================================-->

  <div id="modalInformativoPS" class="modal fade" role="dialog">

<div class="modal-dialog modal-lg" style="width: 85%">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background: #FF1700; color:white" >

            <h4 class="modal-title">REQUERIMIENTO SOLICITUDES ARCO - PROCESO DE SANCIÓN</h4>

        </div>

        <div class="modal-body"> 

          <div class="box-body">

            <div class="form-group">
                  
              <table border="1" style="width:100%;">
          
                <thead>

                    <tr>

                      <th style="width: 230px; text-align: center;">NOMBRE DEL SUJETO OBLIGADO</th>
                      <th colspan="3" style="width: 990.93px;text-align: center;"><input style="text-align: center;" type="text" class="form-control" id="MostrarNombreSOSA" name="MostrarNombreSOSA" readonly></th>

                    </tr>
                    <tr>

                      <th style="width: 115px; text-align: center;">BIMESTRE</th>
                      <th style="width: 495.455px;text-align: center;"><input style="text-align: center;" type="text" class="form-control" id="MostrarBimestreSOSA" name="MostrarBimestreSOSA" readonly></th>
                      <th style="width: 115px; text-align: center;">INFORME</th>
                      <th style="width: 495.455px;text-align: center;">SOLICITUDES ARCO</th>
                    
                    </tr>

                </thead>

              </table>

              <br>

              <table class=" tablaAdministrativa3xSO " border="1" style="width:100%;">
      
                <thead>
          
                    <tr>

                      <th style="width: 30px; text-align: center;">#</th>
                      <th style="width: 124.91px;text-align: center;">AÑO</th>
                      <th style="width: 280.27px;text-align: center;">FECHA DE ENTREGA</th>
                      <th style="width: 117.43px;text-align: center;">TOTAL</th>
                      <th style="width: 400px;text-align: center;">REQUERIMIENTO</th>

                    </tr>

                  </thead>

                  <tbody>

                      <!-- ==================================  APARTADO PARA SOLICITUDES DE INFORMACION ======================================= -->

                    <tr>
                      
                      <td rowspan="3" style="text-align: center;">1</td>

                        <input type="hidden" id="EditaridSA" name="EditaridSA">

                      <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="MostrarANIOSOSA" name="MostrarANIOSOSA" disabled> </td>

                      <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="MostrarFechaSOSA" name="MostrarFechaSOSA" disabled>  </td>

                      <td style="background-color:#FFFFFF;color:#000000;" > <input style="background-color:#FFFFFF;border-color:#FFFFFF;text-align: center;" type="text" class="form-control input-lg" id="MostrarTotalSOSA" name="MostrarTotalSOSA" disabled> </td>

                      <td rowspan="3" style="text-align: center;"> 

                        <iframe type="application/pdf" id="MostrarArchivoSOSA" name="MostrarArchivoSOSA" width="565" height="300"  frameborder="0" ></iframe>
                    
                      </td>

                    </tr>

                    <tr>

                        <td  style="text-align: center;" colspan="3" disabled> OBSERVACIÓNES </td>
                      
                    </tr>

                    <tr>
                        
                        <td  style="text-align: center;" colspan="3"> <textarea id="MostrarObservacionesSOSA" name="MostrarObservacionesSOSA" class="form-control input-lg"  style="resize:none; font-size:14px; width:100%;height:240px;text-align: justify; ">PONGASE EN CONTACTO CON LA SECRETARIA EJECUTIVA DEL INSTITUO DE TRANSPARENCIA Y ACCESO A LA INFOMACION PUBLICA DEL ESTADO DE NAYARIT, PARA MAS DETALLAES SOBRE EL TEMA DE SANCION </textarea> <!-- <input style="text-align: center;" type="text" class="form-control input-lg" id="EditarSOOSI" name="EditarSOOSI" id="" name=""> --> </td>

                    </tr>

                  </tbody>

              </table>

            </div>
            
            
          </div>
          
        </div>

      <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      </div>


    </form>

  </div>

</div>

</div>