<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
#session_start();
?>


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Listado de Productos Actuales</h3>
            </div>
        </div>
            <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12" align="center">
                <div class="x_panel">

                    <div class="x_title">
                        <h2>Tabla de Datos</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%" table-condensed>
                            <thead>
                                <tr>
                                    <th>ID PRODUCTO</th>
                                    <th>PRODUCTOS</th>
                                    <th>CATEGORIAS</th>
                                    <th>GENERO</th>
                                    <th>ESPECIE</th>
                                    <th>SUB CATEGORIA</th>
                                    <th>NOMBRE EN CITES</th>
                                    <th>CANTIDAD MINIMA</th>
                                    <th>SEMANAS EN TRANSITO</th>
                                    <th>TIPO DE EMPAQUE</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $base = new BaseDatos();
                                $conexion = $base->getCon();
                                $query = "Select p.id_producto, p.producto,p.categoria,p.genero, p.especie,p.sub_categoria,p.cites_descripcion,p.cant_minima,p.wk_transito,e.tipo_empaque  from producto as p
            inner join empaque as e on e.id_empaque=p.empaque_id_empaque  ";
                                $resultado = sqlsrv_query($conexion, $query);

                                while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td> <?php echo $fila['id_producto'];  ?> </td>
                                        <td> <?php echo $fila['producto'];  ?> </td>
                                        <td> <?php echo $fila['categoria'];  ?> </td>
                                        <td> <?php echo $fila['genero'];  ?> </td>
                                        <td> <?php echo $fila['especie'];  ?> </td>
                                        <td> <?php echo $fila['sub_categoria'];  ?> </td>
                                        <td> <?php echo $fila['cites_descripcion'];  ?> </td>
                                        <td> <?php echo $fila['cant_minima'];  ?> </td>
                                        <td> <?php echo $fila['wk_transito'];  ?> </td>
                                        <td> <?php echo $fila['tipo_empaque'];  ?> </td>

                                        <td>
                                            <a href="modif_producto.php?id=<?php echo $fila['id_producto']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>
                                            <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a> -->
                                        </td>
                                    </tr>
                                <?php  };
                                sqlsrv_close($conexion); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID PRODUCTO</th>
                                    <th>PRODUCTOS</th>
                                    <th>CATEGORIAS</th>
                                    <th>GENERO</th>
                                    <th>ESPECIE</th>
                                    <th>SUB CATEGORIA</th>
                                    <th>NOMBRE EN CITES</th>
                                    <th>CANTIDAD MINIMA</th>
                                    <th>SEMANAS EN TRANSITO</th>
                                    <th>TIPO DE EMPAQUE</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                        </table>




                    </div> <!-- xconten-->

                </div><!-- panel-->
            </div><!-- col-->
        </div><!-- row-->
    </div><!-- class-->
</div><!-- rigthcol-->

<br>
<br>

<!-- script de tabla-->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tbproducto').DataTable({
            autoWidth: false,
            columnDefs: [{
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            }]
        });
    });
</script>
<!-- cierre script de tabla-->

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