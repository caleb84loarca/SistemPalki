<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="view/images/logo.png" />
   
    <title>Control Pedidos | PALKI </title>
   
    <!-- Bootstrap -->
    <link href="view/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="view/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="view/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="view/plugins/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="view/css/custom.min.css" rel="stylesheet">
  </head>

    <!-- inicio cuerpo de pagina -->

  <body class="login" style="background-image: url(view/images/fondos_palki/fondopalki4.jpg); background-size: cover; padding: 0; margin: 0;" >

    <div>
      <a class="hiddenanchor" id="user_id"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <!-- formulario de login  controllers/conexion.php-->
            <form action="controllers/conexionsql3.php" method="post" class="form-horizontal"  role="form">
              <h3>Control de Pedidos</h3>

              <div>                    
                        <!-- /.login-logo -->
                  <img src="view/images/unnamed.png" width="300" height="250" aling="center">                    
                  <div class="separator"></div>
                  <i class="fa fa-user"></i>
                  <input type="text" class="form-control" placeholder="Username" required="" name="nombreusuario" />
              </div>

              <div>
                <i class="fa fa-key"></i>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" pattern="([a-z])([A-Z]){4,8})" title="Solo letras o numeros" />
              </div>
              <div>                
                  <button type="submit" class="btn btn-round btn-secondary">Acceder</button>  

                  <a class="reset_pass" href="../sistempalki/error404.php">Olvido su password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div class="clearfix"></div>
                <br />

                <div>                 
                  <p><i class="fa fa-copyright"></i>2020 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
