<aside class="main-sidebar">

    <!-- =============================  MENU LATERAL ================================= -->

    <section class="sidebar">

        <ul class="sidebar-menu">

         <!--========== MENU DE INICIO =========== -->
          <?php
             
           if ($_SESSION["perfil_Informe"] == "Administrador" || $_SESSION["perfil_Informe"] == "Observador"){
  
            echo   ' <li class="active" >
                    
                        <a href="dashboard">
                            
                        <i class="fa fa-tachometer" aria-hidden="true"></i>

                            <span>dashboard</span>

                        </a>
                        
                    </li>';
            }     

            ?>

            <!--========== MENU DE INICIO =========== -->

            
            <?php
             
             if ($_SESSION["perfil_Informe"] == "Administrador" || $_SESSION["perfil_Informe"] == "Sujeto Obligado"){

                echo  '<li class="active">
            
                            <a href="inicio">
                    
                                <i class="fa fa-home"></i>

                                <span>Inicio</span>

                            </a>
                
                        </li>';

              }        

            ?>

             

            <!--========== MENU DE USUARIOS =========== -->

            <?php
             
             if ($_SESSION["perfil_Informe"] == "Administrador" || $_SESSION["perfil_Informe"] == "Observador"){

                echo    '<li>
                    
                        <a href="usuarios">
                            
                            <i class="fa fa-user"></i>

                            <span>Usuarios</span>

                        </a>
                        
                    </li>';

             }       

            ?>       

            <!--========== MENU DE SOLICITUDES DE CAPACITACION =========== -->

            <?php
             
                if ($_SESSION["perfil_Informe"] == "Administrador" || $_SESSION["perfil_Informe"] == "Sujeto Obligado"){


                echo  '<li>
            
                        <a href="solicitudes-informacion">
                            
                        <i class="fa fa-book" aria-hidden="true"></i>

                            <span>Sol. de Información</span>

                        </a>
                    
                    </li>

                    <!--========== MENU DE SOLICITUDES ARCO =========== -->

                    <li>
                
                        <a href="solicitudes-arco">
                            
                        <i class="fa fa-shield" aria-hidden="true"></i>

                            <span>Solicitudes Arco</span>

                        </a>
                    
                    </li>

                     <!--========== MENU DE CAPACITACIONES =========== -->

                     <li>
                
                        <a href="capacitaciones">
                            
                        <i class="fa fa-comments" aria-hidden="true"></i>

                            <span>Capacitaciones</span>

                        </a>
                
                    </li>';

                }

             ?>

        </ul>
    
    </section>

</aside>