<header class="main-header"> 

    <!-- ======================== LOGOTIPO ========================== -->

    <a href="inicio" class="logo">
        
        <!-- ============================= LOGO MINI ================================ -->

        <!-- ====== VERSION SISTEMA INVENTARIO ====== -->

        <!--

        <span class="logo-mini">

            <img src="vistas/img/plantilla/icono-blanco.png" class="img-responsive" style="padding: 10px"> 

        </span>

        -->

        <!-- ===== VERSION SISTEMA INFORMES ======= -->
        
            <span class="logo-mini"><b>ITAI</b></span>

        <!-- ============================= LOGO NORMAL =============================== -->

        <!-- ====== VERSION SISTEMA INVENTARIO ====== -->

        <!--

        <span class="logo-lg">

            <img src="vistas/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding: 10px 0px"> 

        </span>

        -->

        <!-- ===== VERSION SISTEMA INFORMES ======= -->

        <span class="logo-lg"><b>Sistema ITAI</b></span>


    </a>

    <!-- ======================== BARRA DE NAVEGACIÓN ========================== -->

    <nav class="navbar navbar-static-top" role="navigation">

        <!-- ========== BOTÓN DE NAVEGACION ============= -->

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle Navagation</span>

        </a>

        <!-- ========== PERFIL DE USUARIO ============= -->

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toogle" data-toggle="dropdown">

                    <?php

                        if ($_SESSION["foto_Informe"] != "") {
                            
                            echo '<img src="'.$_SESSION["foto_Informe"].'" class="user-image">';    

                        }else {

                            echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

                        } 

                    ?>
                        <span class="hidden-xs"><?php echo $_SESSION["nombre_Informe"]; ?> <span>

                    </a>

                     <!-- =========== DROPDOWN - TOGGLE ============= -->

                    <ul class="dropdown-menu"> 

                        <li class="user-body">

                            <div class="pull-right">

                                <a href="salirsesion" class="btn btn-default btn-flat">salir</a>

                            </div>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>


    </nav>


</header>