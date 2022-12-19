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
                <h3>Despacho de &Oacuterden</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informacion del Pedido</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="../model/DespachoOrdenDatos.php" method="post" novalidate>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Seleccionar Cliente <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="cliente" name="cliente" onclick="CargarOrdenes(this.value);">
                                        <option value="0"> Seleccionar de la lista </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select id_cliente, clien_compania from cliente order by clien_compania asc";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_cliente']; ?>"> <?php echo $valores['clien_compania']; ?> </option>';

                                        <?php };  ?>
                                    </select>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Ordenes de Cliente <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="ordenCliente" name="ordenCliente">
                                        <option value="0"> Seleccionar de la lista </option>;

                                    </select>

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Seleccionar el Producto <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idproducto" name="idproducto" onclick="CargarMedida(this.value);">
                                        <option value="0"> Seleccionar de la lista </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select * from producto";

                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_producto']; ?>"> <?php echo $valores['producto']; ?> </option>';

                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Medida Despachada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idmedida" name="idmedida">
                                        <option value="0"> Seleccionar de la lista </option>;

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad Despachada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cant_despacho" required="required" class="form-control" name="cant_despacho">
                                </div>
                            </div>


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Despacho<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="fechadespacho" required='required'>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Semana de Despacho <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="wk_despacho" required="required" class="form-control" name="wk_despacho" value="<?php echo date("W") . date("y"); ?>">
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Llegada<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="fechallegada" required='required'>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Semana de Llegada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="wk_despacho" required="required" class="form-control" name="wk_llegada" value="<?php $semana = date("W") + 3;
                                                                                                                                            echo $semana . date("y"); ?>">
                                </div>
                            </div>


                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Registrar</button>
                                        <button type='reset' class="btn btn-success">Limpiar Formulario</button>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Despacho de &Oacuterdenes (Detalle)</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12" align="left">
                <div class="x_panel">

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabla de Datos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                       <!--     <button id="exporttable" class="btn btn-success"> <i class="fa fa-file-excel-o"></i> Excel </button></a>
                                        <button id="exportpdf" class="btn btn-info"> <i class="fa fa-file-pdf-o"></i> PDF </button></a>  -->
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%" table-condensed>
                                        <!--   <table id="tbempaque" class="mdl-data-table" style="width:100%" table-condensed>  -->
                                        <thead>
                                            <tr>
                                                <th>ORDEN INTERNA</th>
                                                <th>PRODUCTO</th>
                                                <th>MEDIDA</th>
                                                <th>UND. DESPACHADA</th>
                                                <th>SEMANA DESPACHO</th>

                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $conexion = BaseDatos::getCon();
                                            $query = "select ddo.id_det_despacho, o.id_orden, o.ord_nombre,p.producto, m.medida, format(ddo.cantidad_despacho,'#,0')as despacho, ddo.wk_despacho from despacho_det_orden as ddo
                                                    inner join orden as o on o.id_orden=ddo.id_orden
                                                    inner join producto as p on p.id_producto=ddo.idproducto
                                                    inner join medida as m on m.id_medida=ddo.idmedida ";
                                            $resultado = sqlsrv_query($conexion, $query);

                                            while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td> <?php echo $fila['ord_nombre'];  ?> </td>
                                                    <td> <?php echo $fila['producto'];  ?> </td>
                                                    <td> <?php echo $fila['medida'];  ?> </td>
                                                    <td> <?php echo $fila['despacho'];  ?> </td>
                                                    <td> <?php echo $fila['wk_despacho'];  ?> </td>


                                                    <td>
                                                        <a href="modif_despacho.php?id=<?php echo $fila['id_det_despacho']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>
                                                        <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
                                                    </td>
                                                </tr>
                                            <?php  }; sqlsrv_close($conexion); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ORDEN INTERNA</th>
                                                <th>PRODUCTO</th>
                                                <th>MEDIDA</th>
                                                <th>UND. DESPACHADA</th>
                                                <th>SEMANA DESPACHO</th>

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
        </div>
    </div>
</div>

<br>
<br>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>
<script src="js/jquery.table2excel.min.js"></script>

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

<!-- script de tabla-->
<script>
    $(document).ready(function() {
        $('#tbempaque').DataTable({
            autoWidth: false,
            columnDefs: [{
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            }]
        });
    });

    //funcion para exportar tabla a excel
    $(function() {
        $('#exporttable').click(function(e) {
            var table = $('#tbempaque');
            if (table && table.length) {
                $(table).table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "Tabla Detalle Ordenes" + new Date().toISOString() + ".xls",

                    //filename: "Tabla de Ordenes" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xlsx",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: false
                });
            }
        });

    });
</script>
<!-- cierre script de tabla-->

<script>
    function CargarMedida(valor) {

        const xlm = new XMLHttpRequest();
        xlm.onload = function() {
            document.getElementById('idmedida').innerHTML = this.responseText;
        }

        xlm.open("GET", "../model/ObtenerMedidaPlanta.php?idPlanta=" + valor);
        xlm.send();
    }

    function CargarOrdenes(valor) {
        const xml = new XMLHttpRequest();

        xml.onload = function() {
            document.getElementById("ordenCliente").innerHTML = this.responseText;
        }

        xml.open("Get", "../model/ObtenerOrdenCliente.php?idCliente=" + valor);
        xml.send();

    }
</script>

<!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->