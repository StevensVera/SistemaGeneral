<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Administración General de Solicitudes y Capacitaciones

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Administración General de Solicitudes y Capacitaciones</li>
        
      </ol>
       
      <!--========================= Bienvenida para el Nombre de Usuario =======================-->

      <br>

       <?php

          if ($_SESSION["perfil_Informe"] == "Administrador" || $_SESSION["perfil_Informe"] == "Sujeto Obligado" || $_SESSION["perfil_Informe"] == "Observador")  {
            
            echo ' <div class="box box-success">

                    <div class="box-header">
                    
                      <h1>Bienvenido '.$_SESSION["titular_Informe"]. '</h1>
                   
                   </div>';

          }

        ?>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablasAdministracionSO " with="100%">

        <thead>

         <tr>

           <th>#</th>
           <th style="width: 300px">Sujeto Obligado</th>
           <th style="width: 200px">Informe Presentado</th>
           <th style="width: 150px">Fecha de Entrega</th>
           <th style="width: 190px">Estatus</th>
           <th style="width: 150px">Documento</th>
  
         </tr>

        </thead>

          <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

          <input type="hidden" value="<?php echo $_SESSION["codigo"]; ?>" id="perfiCodigo">

        </table>
          
      </div>    

    </section>

  </div>