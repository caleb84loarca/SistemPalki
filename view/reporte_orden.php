<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";

#session_start();
$_SESSION['idusuario'];
?>

<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ingresar Datos de &Oacuterden</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reporte de &Oacuterdenes por Fecha</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="reporte_orden.php" method="post" novalidate>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Cliente <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idcliente" name="idcliente">
                                        <option value="0"> Seleccionar de la lista </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select * from cliente";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value="<?php echo $valores['id_cliente']; ?>"> <?php echo $valores['clien_compania']; ?> </option>';

                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden (Inicial)<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="fechaingreso" required='required'>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden (Final)<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="fechafinal" required='required'>
                                </div>
                            </div>



                            <input class="form-control col" type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>" disable>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Ver Datos</button>
                                        <button type='reset' class="btn btn-success">Limpiar Formulario</button>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="x_panel">
                    <div class="x_title">
                        <h2>&Oacuterdenes Para   </h2>
                        <?php
                        
                            if ( $_POST !=null )
                            {
                                $idcliente=$_POST['idcliente']; 
                               
                                $fechaingreso=$_POST['fechaingreso'];
                                $fechaFinal=$_POST['fechafinal'];
                            
                                echo "<h3>". $idcliente." Del ". $fechaingreso." Al ". $fechaFinal."</h3>";
                            }
                            else{ return 0;}
                           
                         ?>

                        <ul class="nav navbar-right panel_toolbox">
                            <!--    <button id="exporttable" class="btn btn-success"> <i class="fa fa-file-excel-o"></i> Excel </button></a>
                                      <button id="exportpdf" class="btn btn-info"> <i class="fa fa-file-pdf-o"></i> PDF </button></a>     -->
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content" id="TablaOrden">

                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%" table-condensed>
                            <thead>
                                <tr>
                                    <th>ORDEN INTERNO</th>
                                    <th>ORDEN SEGUN CLIENTE</th>
                                    <th>STATUS DE ORDEN</th>                                   
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                
                                
                                    $sql = "select o.id_orden, o.ord_nombre, o.ord_nombreclie, est.estado, cli.clien_compania as cliente from orden as o
                                        inner join estado_orden as est on est.id_estado = o.estado_id_estado
                                        inner join cliente as cli on cli.id_cliente = o.cliente_id_cliente
                                        where fecha_orden between '".$fechaingreso."' and '".$fechaFinal."' and cliente_id_cliente=".$idcliente;
                                    $resultado = sqlsrv_query($conexion,$sql);                                                   
                                
                                while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td> <?php echo $fila['ord_nombre'];  ?> </td>
                                        <td> <?php echo $fila['ord_nombreclie'];  ?> </td>
                                        <td> <?php echo $fila['estado'];  ?> </td>
                                      
                                       
                                        <td>                                         
                                            <a href="detalle_orden.php?idOrden=<?php echo $fila['id_orden']; ?>" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Ver Detalle</a>

                                            <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
                                        </td>
                                    </tr>
                                <?php  };
                                sqlsrv_close($conexion); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ORDEN INTERNO</th>
                                    <th>ORDEN SEGUN CLIENTE</th>
                                    <th>STATUS DE ORDEN</th>                                   
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<br>
<br>






<!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->


 <!-- Datatables -->
 <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="plugins/jszip/dist/jszip.min.js"></script>
    <script src="plugins/pdfmake/build/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/build/vfs_fonts.js"></script>