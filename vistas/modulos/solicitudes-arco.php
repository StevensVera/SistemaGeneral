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

                        <th>#</th>
                        <th style="width: 300px">Sujeto Obligado</th>
                        <th style="width: 150px">Informe Presentado</th>
                        <th style="width: 80px">Año</th>
                        <th style="width: 160px">Total de Solicitudes Información</th>
                        <th style="width: 110px">Fecha de Entrega</th>
                        <th style="width: 150px">Acciones</th>
  
                    </tr>

                </thead>

                <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

                <input type="hidden" value="<?php echo $_SESSION["codigo"]; ?>" id="perfiCodigo">

            </table>
          
        </div>
       
      </div>

      <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSolicitudesArcoDetalles"> 

            Agregar Detalles de la Solicitud Arco

            </button>
          
        </div>

        <div class="box-body">

             <table class="table table-bordered table-striped dt-responsive tablasDetallesinformacionArco" with="100%">

                <thead>

                    <tr>

                        <th>#</th>
                        <th >Sujeto Obligado</th>
                        <th>Titular SO</th>
                        <th>Informe Presentado</th>
                        <th>Total de Solicitudes</th>
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

                          <input type="text" class="form-control input-lg" name="nuevoAnioSA" placeholder="AÑO" requiredd>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MP_Personal_Escrito" name="nuevoSA_MP_Personal_Escrito" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MP_Correo_Electronico" name="nuevoSA_MP_Correo_Electronico" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MP_Sistema_Informex" name="nuevoSA_MP_Sistema_Informex" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MP_PNT" name="nuevoSA_MP_PNT" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MP_No_Disponible" name="nuevoSA_MP_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MP_Suma_Total" name="nuevoSA_MP_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_TS_Persona_Fisica" name="nuevoSA_TS_Persona_Fisica" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_TS_Personal_Moral" name="nuevoSA_TS_Personal_Moral" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_TS_No_Disponible" name="nuevoSA_TS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_TS_Suma_Total" name="nuevoSA_TS_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_GS_Femenino" name="nuevoSA_GS_Femenino" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_GS_Masculino" name="nuevoSA_GS_Masculino" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_GS_Anonimo" name="nuevoSA_GS_Anonimo" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_GS_No_Disponible" name="nuevoSA_GS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_GS_Suma_Total" name="nuevoSA_GS_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_Acceso" name="nuevoSA_IS_Acceso" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_Rectificación" name="nuevoSA_IS_Rectificación" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_Oposición" name="nuevoSA_IS_Oposición" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_Cancelacion" name="nuevoSA_IS_Cancelacion" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_Otro" name="nuevoSA_IS_Otro" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_No_Disponible" name="nuevoSA_IS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_IS_Suma_Total" name="nuevoSA_IS_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_T_Solicitudes_Concluidas" name="nuevoSA_T_Solicitudes_Concluidas" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_T_Solicitudes_Pendientes" name="nuevoSA_T_Solicitudes_Pendientes" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_T_No_Disponible" name="nuevoSA_T_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_T_Suma_Total" name="nuevoSA_T_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Medios_electronicos" name="nuevoSA_MR_Medios_electronicos" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Copia_Simple" name="nuevoSA_MR_Copia_Simple" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Consulta_Directa" name="nuevoSA_MR_Consulta_Directa" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Copia_Certificada" name="nuevoSA_MR_Copia_Certificada" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Otro" name="nuevoSA_MR_Otro" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_No_Disponible" name="nuevoSA_MR_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_MR_Suma_Total" name="nuevoSA_MR_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Informacion_Total" name="nuevoSA_SR_Informacion_Total" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Informacion_Parcial" name="nuevoSA_SR_Informacion_Parcial" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Negada_Clasificación" name="nuevoSA_SR_Negada_Clasificación" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Inexistencia_Informacion" name="nuevoSA_SR_Inexistencia_Informacion" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Mixta" name="nuevoSA_SR_Mixta" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_No_Aclarada" name="nuevoSA_SR_No_Aclarada" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Orientada" name="nuevoSA_SR_Orientada" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_En_Tramite" name="nuevoSA_SR_En_Tramite" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Improcedente" name="nuevoSA_SR_Improcedente" required>

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Otros" name="nuevoSA_SR_Otros" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_No_Disponible" name="nuevoSA_SR_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="nuevoSA_SR_Suma_Total" name="nuevoSA_SR_Suma_Total" required >

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



?>


 <!--============================ =============================== ==============================
  ======================= FORMULARIO PARA ACTUALIZAR SOLICITUDES DE ARCO ===========================
  ================================ =============================== ============================-->

<div id="modalActualizareSolicitudesArco" class="modal fade" role="dialog">

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

                               <select class="form-control input-lg" name="EditarTipoInformeSA" readonly>
             
                                  <option value="" id="EditarTipoInformeSA"></option>

                               </select>

                       </div>

               </div>

               <!-- ==================== ENTRADA PARA EL AÑO DEL INFORME =========================== -->

               <div class="col-xs-4"> 
     
                   <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                          <input type="text" class="form-control input-lg" id="EditarAnioSA"  name="EditarAnioSA"  requiredd>

                    </div>

                 </div>

           </div>

           <!-- ===================== ENTRADA PARA EL TOTAL DE SOLICITUDES PRESENTADAS ==================== -->

           <div class="form-group" style="width: 21%; margin: 0 auto; padding-bottom: 15px">
                
              <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>

                    <input type="text" class="form-control input-lg" id="EditarSA_Total" name="EditarSA_Total"  required>

              </div>
    
          </div>

          <hr>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MP_Personal_Escrito" name="EditarSA_MP_Personal_Escrito" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MP_Correo_Electronico" name="EditarSA_MP_Correo_Electronico" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MP_Sistema_Informex" name="EditarSA_MP_Sistema_Informex" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MP_PNT" name="EditarSA_MP_PNT" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MP_No_Disponible" name="EditarSA_MP_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MP_Suma_Total" name="EditarSA_MP_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_TS_Persona_Fisica" name="EditarSA_TS_Persona_Fisica" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_TS_Personal_Moral" name="EditarSA_TS_Personal_Moral" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_TS_No_Disponible" name="EditarSA_TS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_TS_Suma_Total" name="EditarSA_TS_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_GS_Femenino" name="EditarSA_GS_Femenino" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_GS_Masculino" name="EditarSA_GS_Masculino" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_GS_Anonimo" name="EditarSA_GS_Anonimo" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_GS_No_Disponible" name="EditarSA_GS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_GS_Suma_Total" name="EditarSA_GS_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_Acceso" name="EditarSA_IS_Acceso" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_Rectificación" name="EditarSA_IS_Rectificación" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_Oposición" name="EditarSA_IS_Oposición" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_Cancelacion" name="EditarSA_IS_Cancelacion" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_Otro" name="EditarSA_IS_Otro" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_No_Disponible" name="EditarSA_IS_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_IS_Suma_Total" name="EditarSA_IS_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_T_Solicitudes_Concluidas" name="EditarSA_T_Solicitudes_Concluidas" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_T_Solicitudes_Pendientes" name="EditarSA_T_Solicitudes_Pendientes" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_T_No_Disponible" name="EditarSA_T_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_T_Suma_Total" name="EditarSA_T_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MR_Medios_electronicos" name="EditarSA_MR_Medios_electronicos" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MR_Copia_Simple" name="EditarSA_MR_Copia_Simple" required>

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

                                <input type="text" class="form-control input-lg" id="SA_MR_Consulta_Directa" name="SA_MR_Consulta_Directa" required >

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

                                <input type="text" class="form-control input-lg" id="SA_MR_Copia_Certificada" name="SA_MR_Copia_Certificada" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MR_Otro" name="EditarSA_MR_Otro" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MR_No_Disponible" name="EditarSA_MR_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_MR_Suma_Total" name="EditarSA_MR_Suma_Total" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Informacion_Total" name="EditarSA_SR_Informacion_Total" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Informacion_Parcial" name="EditarSA_SR_Informacion_Parcial" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Negada_Clasificación" name="EditarSA_SR_Negada_Clasificación" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Inexistencia_Informacion" name="EditarSA_SR_Inexistencia_Informacion" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Mixta" name="EditarSA_SR_Mixta" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_No_Aclarada" name="EditarSA_SR_No_Aclarada" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Orientada" name="EditarSA_SR_Orientada" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_En_Tramite" name="EditarSA_SR_En_Tramite" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Improcedente" name="EditarSA_SR_Improcedente" required>

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Otros" name="EditarSA_SR_Otros" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_No_Disponible" name="EditarSA_SR_No_Disponible" required >

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

                                <input type="text" class="form-control input-lg" id="EditarSA_SR_Suma_Total" name="EditarSA_SR_Suma_Total" required >

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

       <button type="submit" class="btn btn-primary">Editar Solicitud Arco</button>

     </div>

     <?php

         $ActualizarSolicitudArco = new ControladorSolicitudesArco();
         $ActualizarSolicitudArco -> ctrActualizarSolicitudArco(); 

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

                         <input type="text" class="form-control input-lg" name="nuevoNombreUT" placeholder="Ingresar Titular de Transparencia o Administrador ITAI" requiredd>

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