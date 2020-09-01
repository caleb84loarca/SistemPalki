<!DOCTYPE html>
<html lang="en">
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
                <h2>John Doe</h2>
              </div>
            </div>
            <br>
            <!-- /menu profile quick info -->

     

            <!-- sidebar menu  style="background-image: url('images/sidebar-2.jpg')" pegar para estilo-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"  >  
                <div class="menu_section">
                <h3>Menu General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio </a>
                    <ul class="nav child_menu">
                      <li><a href="./?./?index.html">Vista Principal</a></li>
                      <li><a href="./?index2.html">Dashboard2</a></li>
                      <li><a href="./?index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-desktop"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="usuario.php">Usuarios</a></li>
                      <li><a href="#">Clientes</a></li>
                     
                     
                    </ul>
                  </li>

                  <li><a><i class="fa fa-cogs"></i> Mantenimiento <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>                         
                        <a href="new_usuario.php">Nuevo Usuario</a></li>             
                      <li><a href="new_cliente.php">Nuevo Cliente</a></li>
                      
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
                      <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                          <img src="images/logo.png" >John Doe
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item"  href="javascript:;"> Profile</a>
                           
                          <a class="dropdown-item"  href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </div>
                      </li>  
                 
                </ul>
              </nav>
            </div>
        </div>
        <!-- /top navigation -->
