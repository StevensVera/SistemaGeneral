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

               <!-- ==================== ENTRADA PARA EL AÑO DEL INFORME =========================== -->

               <div class="col-xs-4"> 
     
                   <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                          <input type="number" class="form-control input-lg" id="nuevoAnioAdministracionSO" name="nuevoAnioAdministracionSO" placeholder="AÑO" required>

                    </div>

                 </div>

           </div>
          
        </div>

        <div class="box-body">

             <table id="example" class="table table-bordered table-striped dt-responsive tablasAdministracionSujetosObligadosGeneral " style="width:100%">
p
                <thead>

                    <tr>

                        <th>#</th>
                        <th style="width: 300px">Sujeto Obligado</th>
                        <th style="width: 150px">Informe Presentado Tipo</th>
                        <th style="width: 150px">Informe Presentado</th>
                        <th style="width: 150px">AÑO</th>
                        <th style="width: 100px">Total de Capacitaciones</th>
                        <th style="width: 110px">Fecha de Entrega</th>
                        <th style="width: 110px">Estatus</th>
                        <th style="width: 210px">Acciones</th>
  
                    </tr>

                </thead>
                                
                <input type="hidden" value="<?php echo $_SESSION["perfil_Informe"]; ?>" id="perfilOcultoUsuario">

                <input type="hidden" value="<?php echo $_SESSION["codigo"]; ?>" id="perfiCodigo"> 


            </table>
          
        </div>
       
      </div>

    </section>

  </div>