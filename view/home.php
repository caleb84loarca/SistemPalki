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
            <div class="col-md-3 col-sm-4  tile_stats_count">
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
            <div class="col-md-3 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-underline"></i>nd. Ordenadas</span>
              <div class="count green">
              <?php            
             $conn = BaseDatos::getCon();
             $query="SELECT FORMAT(sum(cantidad_unidades),'#,0') as unidades from detalle_orden";
             $resultado = sqlsrv_query($conn,$query) or die(sqlsrv_error());
             while ($filas = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
             echo $filas['unidades'];        }         
             
             ?>

              </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
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
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i> 12% </i> From last Week</span>
            </div>
           
           
          </div>
        </div>
          <!-- /top tiles -->
        

          

            
 <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                <h4>UNIDADES DESPACHADAS POR MEDIDA </h4> </div>
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




