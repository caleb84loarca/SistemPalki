<?php require_once "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
session_start(); ?>




  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Home <strong>Control Pedidos</strong></small></h3>
              </div>              
            </div>

 <!-- top tiles -->
 <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">
              <?php             
             
             $conn = BaseDatos::getCon();
             $query="select count(id_usuario) as usuario from usuario;";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $fila['usuario'];        }         
             
             ?>


              </div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i> Ordenes Activas</span>
              <div class="count">
              <?php            
             $conn = BaseDatos::getCon();
             $query="select count(id_orden) as orden from orden;";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $fila['orden'];        }         
             
             ?>

              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-underline"></i>nd. Ordenadas</span>
              <div class="count green">
              <?php            
             $conn = BaseDatos::getCon();
             $query="SELECT FORMAT(sum(cantidad_unidades),'#,0') as unidades from detalle_orden";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $fila['unidades'];        }         
             
             ?>

              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-underline"></i>nd. Despachadas</span>
              <div class="count">
              <?php            
             $conn = BaseDatos::getCon();
             $query="select format(sum(cantidad_despacho),'#,0') as unidades from despacho_det_orden";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $fila['unidades'];        }               
             ?>         
             </div>
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
        


          <div class="clearfix"></div>
          <div class="col-md-8 col-sm-4 ">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Device Usage</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>       
                   
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-12 col-md-12 col-sm-7 ">
                          <p class="">Device</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                          <p class="">Progress</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>IZOTE </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>PONY </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>MAYA TREE </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>MOMMIES RAMIFICADA </p>
                            </td>
                            <td>15%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

          

            
          <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">UNIDADES DESPACHADAS POR MEDIDA</div>
                <div class="panel panel-body">
                    <div id="cargaLineal"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#cargaLineal').load('grafica.php');

    });
</script>



</div>

          </div>
        </div>
        <!-- /page content -->




