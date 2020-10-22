<!DOCTYPE html>
<html lang="en-En esp">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" type="image/png" href="images/logo.png" />

    <title>Palki, S.A. | Control Pedidos</title>

    <!-- Bootstrap -->
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- principal Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">

     <link rel="stylesheet" href="css/material-components-web.min.css">
 <link rel="stylesheet"  href="css/dataTables.material.min.css">

  </head>

<body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="./?index.html" class="site_title">  <i class="fa fa-futbol-o" ></i>  <span>Control Pedidos</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> <?php                 
                 require_once "../controllers/BaseDatos.php";
                 $conexion=BaseDatos::getCon();
                $nombre= $_POST['nombreusuario'];
                $pass= $_POST['password'];

                $sql = "SELECT * FROM usuario where nombre1='$nombre' and contrasena = '$pass'";

                  if(($result = sqlsrv_query($conexion,$sql)) !== false){
       
                       while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
           
                            echo $row['nombre1']." ".$row['apellido1'];          

                        }        
                   }             
                
                ?>  </h2>
              </div>
            </div>
            <br>
            <!-- /menu profile quick info -->

     

            <!-- sidebar menu  style="background-image: url('images/sidebar-2.jpg')" pegar para estilo-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >  
                <div class="menu_section">
                <h3>Menu General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio </a>
                    <ul class="nav child_menu">
                      <li><a href="./?./?index.html">Vista Principal <i class="fa fa-dashboard" ></i></a></li>
                      <li><a href="./?index2.html">Dashboard2</a></li>
                      <li><a href="new_orden.php">Ingresar Ordenes <i class="fa fa-shopping-cart"></i> </a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-desktop"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="usuario.php">Usuarios  <i class="fa fa-users"></i></a>  </li>
                      <li><a href="Cliente.php">Clientes <i class="fa fa-smile-o" ></i> </a></li>
                      <li><a href="productos.php">Productos <i class="fa fa-smile-o" ></i> </a></li>
                     
                     
                    </ul>
                  </li>

                  <li><a><i class="fa fa-cogs"></i> Mantenimiento <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="new_usuario.php">Usuarios</a></li>             
                      <li><a href="new_cliente.php">Clientes</a></li>
                      <li><a href="new_producto.php">Productos</a></li>
                      <li><a href="new_empaque.php">Empaque</a></li>
                      
                    </ul>
                  </li>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                  <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                  </a>
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="../index.php">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

                </ul>
              </div>            

            </div>
            <!-- /sidebar menu -->

         

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
             <nav class="nav navbar-nav">
                <ul class=" navbar-right">                
             <?php
                        // Prints the day
                        echo "Guatemala ".date("l") . ", ";
                        // Prints the day, date, month, year, time, AM or PM
                        echo date("d F Y")." - Semana ".date("Wy")." -";
                          ?>

                      <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                          <img src="images/logo.png" >John Doe
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item"  href="javascript:;"> Perfil</a>
                           
                          <a class="dropdown-item"  href="../index.php"><i class="fa fa-sign-out pull-right"></i> Salir del Sistema</a>
                        </div>
                      </li>  
                 
                </ul>
              </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- contenido de pagina -->






        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Sistema Control Pedios -  <a href="#">Palki, S.A.</a>
          </div>
          <div class="clearfix">Caleb Loarca</div>
        </footer>
        <!-- /footer content -->
     

    <!-- jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>

    <!-- validator -->
    <script src="plugins/validator/multifield.js"></script>
    <script src="plugins/validator/validator.js"></script>   

    <!-- Custom Theme Scripts -->
    <script src="plugins/js/custom.min.js"></script>

<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>


</body>

</html>