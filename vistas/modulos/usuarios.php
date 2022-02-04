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

        Administrar Usuarios

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Administrar Usuarios</li>
        
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">

        <!--========================== BOTÓN AGREGAR USUARIO ==============================--> 

        <div class="box-header with-border">
        
            <button class="btn btn-primary" data-toggle="modal"  data-target="#modalAgregarUsuario">
          
             Agregar Participante

          </button>

        </div>

         <!--======================== CUERPO DEL PAGINA USUARIO ==========================--> 

        <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablasUsuariosSO" with="100%">

                <thead>

                  <tr>

                      <th>#</th>
                      <th style="width: 10px">Codigo</th>
                      <th style="width: 160px">Tipo Sujeto Obligado</th>
                      <th style="width: 220px">Nombre SO</th>
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

            <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

            

        </div>
      
      </div>

    </section>

</div>

  <!--============================ =============================== ==============================
  ================================ FORMULARIO PARA AGREGAR USUARIO ==============================
  ================================ =============================== ============================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

   <div class="modal-dialog modal-lg">

    <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background: #3c8dbc; color:white" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Usuarios</h4>

        </div>

        <div class="modal-body"> 

           <div class="box-body">

               <!-- ===== FILA 1 - CODIGO DEl SUJETO OBLIGADO - NOMBRE DEl SUJETO OBLIGADO  ===== -->

              <div class="form-group row"> 

                   <!-- ========================== ENTRADA PARA EL CODIGO DEl SUJETO OBLIGADO ========================= -->

                  <div class="col-xs-4"> 
        
                        <div class="input-group">

                             <span class="input-group-addon"><i class="fa fa-codepen" aria-hidden="true"></i></span>

                             <input type="text" class="form-control input-lg" id = "nuevoCodigoSO" name="nuevoCodigoSO" placeholder="Ingresar Codigo" required>

                        </div>

                  </div>

                   <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

                  <div class="col-xs-8">

                         <div class="input-group">
            
                            <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                                  <select class="form-control input-lg" name="nuevoTipoSO">
                
                                     <option value="">Selecionar Tipo de Sujeto Obligado</option>

                                     <option value="Administrativo Interno ITAI">Administrativo Interno ITAI</option>

                                     <option value="Poder Ejecutivo_Dependencias">Poder Ejecutivo Dependencias</option>

                                     <option value="Poder Ejecutivo_Entidades">Poder Ejecutivo Entidades</option>

                                     <option value="Poder_Legislativo">Poder Legislativo</option>

                                     <option value="Poder Judicial">Poder Judicial</option>

                                     <option value="Partidos Políticos">Partidos Políticos</option>

                                     <option value="Personas Morales">Personas Morales</option>

                                     <option value="Sindicatos">Sindicatos</option>

                                     <option value="Ayuntamientos">Ayuntamientos</option>

                                     <option value="Sistemas DIF">Sistemas DIF</option>

                                     <option value="Organismos Operadores de Agua Potable y Alcantarillado">Organismos Operadores de Agua Potable y Alcantarillado</option>

                                     <option value="Organismos_Públicos_Descentralizados">Organismos Públicos Descentralizados</option>


                                  </select>

                          </div>

                  </div>

              </div>

            <!-- ========================== ENTRADA PARA EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

              <div class="form-group" style="width: 80%; margin: 0 auto; padding-bottom: 15px">
                
                    <div class="input-group">
          
                        <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoNombreSO" placeholder="Ingresar Sujeto Obligado" required>

                    </div>
        
              </div>

              <div class="form-group row">

                 <!-- ==================== ENTRADA PARA EL NOMBRE DEL TITULAR DE TRANSPARENCIA ==================== -->

                 <div class="col-xs-7"> 
        
                     <div class="input-group">
        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                         <input type="text" class="form-control input-lg" name="nuevoNombreUT" placeholder="Ingresar Titular de Transparencia o Administrador ITAI" required>

                     </div>

                 </div>

                 <!-- =================== ENTRADA PARA EL USUARIO DEL TITULAR DE TRANSPARENCIA ======================= -->

                 <div class="col-xs-5">

                    <div class="input-group">
        
                        <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoUsuarioUT" placeholder="Ingresar Usuario" required>

                    </div>
                 
                 </div>   
      
              </div>

            <!-- =================== ENTRADA PARA LA CONTRASEÑA DEL USUARIO DEL TITULAR DE TRANSPARENCIA ======================= -->

              <div class="form-group row">

                <div class="col-xs-6">
        
                  <div class="input-group">
        
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>

                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required> 
                  </div>

                </div> 

                  <!-- ================================== ENTRADA PARA EL PERFIL DEL USUARIO ======================================== --> 

                <div class="col-xs-6">

                    <div class="input-group">
            
                        <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                            <select class="form-control input-lg" name="nuevoPerfil">
       
                                <option value="">Selecionar perfil</option>

                                <option value="Administrador">Administrador</option>

                                <option value="Sujeto Obligado">Sujeto Obligado</option>

                                <option value="Observador">Observador</option>

                            </select>

                    </div>

                </div>
      
               </div>

              <!-- ================================== ENTRADA PARA SUBIR FOTOGRAFIA ======================================== -->

              <div class="form-group row">

                <div class="col-xs-6">
              
                  <div class="panel">SUBIR FOTO</div>

                    <input type="file" class="nuevaFoto" name="nuevaFoto">

                    <p class="help-block">Peso máximo de la foto 2MB</p>

                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar"  width="100px">

                </div>

                <!-- ================================== ENTRADA PARA SUBIR ARCHIVO PDF ======================================== -->

                <div class="col-xs-6">

                  <div class="panel">SUBIR ARCHIVO</div>

                    <input type="file" class="nuevoArchivo" name="nuevoArchivo">

                    <p class="help-block">Peso máximo de la foto 20 MB</p>

                </div>   

              </div>  

            </div>
               
          </div>

        <!-- ================================== BOTON PARA AGREGAR USUARIO ======================================== -->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

            $crearUsuario = new ControladorUsuariosInformes();
            $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

  <!--=========================== ================================== ==============================
  =============================== FORMULARIO PARA ACTUALIZAR USUARIO ==============================
  =============================== ================================== ============================-->

  <div id="modalActualizarUsuario" class="modal fade" role="dialog">

<div class="modal-dialog modal-lg">

 <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

     <div class="modal-header" style="background: #3c8dbc; color:white" >

       <button type="button" class="close" data-dismiss="modal">&times;</button>

       <h4 class="modal-title">Actualizar Usuarios</h4>

     </div>

     <div class="modal-body"> 

        <div class="box-body">

            <!-- ===== FILA 1 - CODIGO DEl SUJETO OBLIGADO - NOMBRE DEl SUJETO OBLIGADO  ===== -->

           <div class="form-group row"> 

                <!-- ========================== ENTRADA PARA ACTUALIZAR EL CODIGO DEl SUJETO OBLIGADO ========================= -->

               <div class="col-xs-4"> 
     
                     <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-codepen" aria-hidden="true"></i></span>

                          <input type="text" class="form-control input-lg" name="editarCodigoSO" id="editarCodigoSO" required>

                     </div>

               </div>

                <!-- ========================== ENTRADA PARA ACTUALIZAR EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

               <div class="col-xs-8">

                      <div class="input-group">
         
                         <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span> 

                               <select class="form-control input-lg" name="editarTipoSO">
             
                                  <option value="" id="editarTipoSO"></option>

                                  <option value="Administrativo Interno ITAI">Administrativo Interno ITAI</option>

                                  <option value="Poder Ejecutivo Dependencias">Poder Ejecutivo Dependencias</option>

                                  <option value="Poder Ejecutivo Entidades">Poder Ejecutivo Entidades</option>

                                  <option value="Poder Legislativo">Poder Legislativo</option>

                                  <option value="Poder Judicial">Poder Judicial</option>

                                  <option value="Partidos_Políticos">Partidos Políticos</option>

                                  <option value="Personas Morales">Personas Morales</option>

                                  <option value="Sindicatos">Sindicatos</option>

                                  <option value="Ayuntamientos">Ayuntamientos</option>

                                  <option value="Sistemas DIF">Sistemas DIF</option>

                                  <option value="Organismos Operadores de Agua Potable y Alcantarillado">Organismos Operadores de Agua Potable y Alcantarillado</option>

                                  <option value="Organismos Públicos Descentralizados">Organismos Públicos Descentralizados</option>


                               </select>

                       </div>

               </div>

           </div>

         <!-- ========================== ENTRADA PARA ACTUALIZAR EL NOMBRE DEl SUJETO OBLIGADO ========================= -->

           <div class="form-group" style="width: 80%; margin: 0 auto; padding-bottom: 15px">
             
                 <div class="input-group">
       
                     <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>

                     <input type="text" class="form-control input-lg" name="editarNombreSO" id="editarNombreSO" required>

                 </div>
     
           </div>

           <div class="form-group row">

              <!-- ==================== ENTRADA PARA EDITAR EL NOMBRE DEL TITULAR DE TRANSPARENCIA ==================== -->

              <div class="col-xs-7"> 
     
                  <div class="input-group">
     
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control input-lg" name="editarNombreUT" id="editarNombreUT" required>

                  </div>

              </div>

              <!-- =================== ENTRADA PARA EDITAR EL USUARIO DEL TITULAR DE TRANSPARENCIA ======================= -->

              <div class="col-xs-5">

                 <div class="input-group">
     
                     <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>

                     <input type="text" class="form-control input-lg" name="editarUsuarioUT" id="editarUsuarioUT" required>

                 </div>
              
              </div>   
   
           </div>

         <!-- =================== ENTRADA PARA EDITAR LA CONTRASEÑA DEL USUARIO DEL TITULAR DE TRANSPARENCIA ======================= -->

           <div class="form-group row">

             <div class="col-xs-6">
     
               <div class="input-group">
     
                 <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>

                 <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la Nueva Contraseña" > 
                 
                 <input type="hidden" name="passwordActual" id="passwordActual">
     
               </div>

             </div> 

               <!-- ================================== ENTRADA PARA EDITAR EL PERFIL DEL USUARIO ======================================== --> 

             <div class="col-xs-6">

                 <div class="input-group">
         
                     <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                         <select class="form-control input-lg" name="editarPerfil">

                             <option value="" id="editarPerfil"></option>

                             <option value="Administrador">Administrador</option>

                             <option value="SujetoObligado">Sujeto Obligado</option>

                             <option value="Observador">Observador</option>

                         </select>

                 </div>

             </div>
   
            </div>

           <!-- ================================== ENTRADA PARA EDITAR FOTOGRAFIA ======================================== -->

           <div class="form-group row">
            
              <div class="col-xs-6">
            
                 <div class="panel">ACTUALIZAR FOTO</div>

                 <input type="file" class="nuevaFotoEditar" name="editarFoto">

                 <p class="help-block">Peso máximo de la foto 200 MB</p>

                 <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

                 <input type="hidden" name="fotoActual" id="fotoActual">

              </div>

              <div class="col-xs-6">

                 <div class="panel">ACTUALIZAR ARCHIVO</div>

                  <input type="file" class="nuevoArchivo"  name="editarArchivo">

                  <p class="help-block">Peso máximo de la foto 200 MB</p>

                  <input type="hidden" name="archivoActual" id="archivoActual">

              </div>

           </div>  

          </div>
            
        </div>

     <!-- ================================== BOTÓN PARA EDITAR EL USUARIO ======================================== -->

     <div class="modal-footer">

       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       <button type="submit" class="btn btn-primary">Editar usuario</button>

     </div>

     <?php

      $editarUsuarios = new ControladorUsuariosInformes();
      $editarUsuarios -> ctrEditarUsuario();


     ?>

   </form>

 </div>

</div>

</div>

<?php

  $borrarUsuario = new ControladorUsuariosInformes();
  $borrarUsuario -> ctrBorrarUsuario();

?>