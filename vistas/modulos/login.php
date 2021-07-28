
<div id="back"></div>

<div class="login-box" style="background: white">



 <!-- ======================= IMAGEN LOGIN ======================= -->

  <div class="login-logo" >

    <img src="vistas/img/plantilla/itai_nayarit.jpg" class="img-responsive" style="padding: 30px 100px 0px 100px;">

  </div>

 <!-- ===================== MENSAJE DE INGRESO DE USUARIO AL SISTEMA ====================== -->  

  <p class="login-box-msg" style="font-weight:bold">Ingresa al Sistema</p>

  <!-- ======================= FORMULARIO LOGIN ======================= -->

  <div class="login-box-body">

    <form  method="post">

      <!-- ======================= CAMPO PARA INGRESAR USUARIO ======================= -->

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Ingrese Usuario" name="ingUsuarioInforme" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <!-- ====================== CAMPO PARA INGRESAR CONTRASEÑA ====================== -->

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="ingPasswordInforme" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <!-- ====================== BOTÓN PARA INGRESAR AL SISTEMA ====================== -->

      <div class="row">
    
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

        </div>
   
      </div>

      <?php

        $login = new ControladorUsuariosInformes();
        $login -> ctrIngresoUsuarioInformes();

      ?>

    </form>

  </div>

</div>