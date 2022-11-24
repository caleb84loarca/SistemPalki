<!--ENCABEZADO DE PLANILLA-->
<?php require_once "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
#session_start(); ?>


        <!-- page content -->
 <div class="right_col" role="main">
          <!-- top tiles -->
          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
               <span><?php
                        // Prints the day
                        echo "Guatemala ".date("l") . ", ";
                        // Prints the day, date, month, year, time, AM or PM
                        echo date("d F Y");
                          ?>

              </span> 
            <b class="caret"></b>
    <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?php             
             
              $conn = BaseDatos::getCon();
              $query="select count(id_usuario) as usuario from usuario;";
              $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
              while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
              echo $fila['usuario'];        }         
              
              ?></div>
              <span class="count_bottom"><i class="green">100% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> Ordenes Activas</span>
              <div class="count"><?php            
             $conn = BaseDatos::getCon();
             $query="select count(id_orden) as orden from orden;";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $fila['orden'];        }         
             
             ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-underline"></i>nd. Ordenadas</span>
              <div class="count green">
              <?php            
             $conn = BaseDatos::getCon();
             $query="select sum(cantidad_unidades) as unidades from detalle_orden";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $fila['unidades'];        }         
             
             ?>

              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
        </div>
      
          <!-- /top tiles -->

       
  <!-- small box -->
                

  

  
        <!-- /page content -->