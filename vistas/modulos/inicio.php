<div class="content-wrapper">
    
    <section class="content-header">

      <h1>

        Página de Inicio

        <small>Panel de Control</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Tablero</li>
        
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
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>