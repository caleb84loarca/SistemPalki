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
                <h3>Reclamo de &Oacuterden</h3>
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
                        <form class="" action="../model/ReclamoOrdenData.php" method="post" novalidate>


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
                                            <option value="<?php echo $valores['id_cliente']; ?>"> <?php echo $valores['clien_compania']; ?> </option>';

                                        <?php } ?>
                                    </select>

                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> &Oacuterden <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="ordenCliente" name="ordenCliente">
                                        <option value="0"> Seleccionar de la lista </option>;

                                    </select>

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Selecionar el Producto <span class="required">*</span>
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

                                        <?php } ?>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad Reclamada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cantReclamo" required="required" class="form-control" name="cantReclamo">
                                </div>
                            </div>


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Reclamo<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="fechaReclamo" id="fechaReclamo" required='required'>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Detalle de Reclamo</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control col" rows="5" cols="50" id="reclamo" name="reclamo" placeholder="Observaciones Aqui"></textarea>
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
                <h3>Reclamos de &Oacuterdenes</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12" align="center">
                <div class="x_panel">

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabla de Datos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="col-md-10 text-right">
                                        <button id="exporttable" class="btn btn-success"> <i class="fa fa-file-excel-o"></i> Excel </button></a>
                                        <button id="exportpdf" class="btn btn-info"> <i class="fa fa-file-pdf-o"></i> PDF </button></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="tbempaque" class="mdl-data-table" style="width:100%" table-condensed>
                                        <thead>
                                            <tr>
                                                <th>CLIENTE</th>
                                                <th>ORDEN INTERNA</th>
                                                <th>PRODUCTO</th>
                                                <th>MEDIDA</th>
                                                <th>CANTIDAD RECLAMADA</th>
                                                <th>SEMANA RECLAMO</th>

                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $conexion = BaseDatos::getCon();
                                            $query = "select rec.id_reclamo, c.clien_compania as cliente, sc.nom_subcliente,  o.ord_nombre, datepart(YEAR, rec.fecha_reclamo) as ANIO, DATEPART(ISO_WEEK, rec.fecha_reclamo) as semana_reclamo, p.producto, m.medida,  rec.cantidad_reclamada, rec.id_estado  from reclamos as rec
                                            inner join orden as o on o.id_orden = rec.orden_id_orden
                                            inner join medida as m on m.id_medida = rec.id_medida
                                            inner join producto as p on p.id_producto = rec.id_producto
                                            inner join cliente as c on c.id_cliente = o.cliente_id_cliente
                                            inner join subcliente as sc on sc.id_subcliente = o.subcliente_id_subcliente where id_estado = 7";
                                            $resultado = sqlsrv_query($conexion, $query);

                                            while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <tr>

                                                    <td> <?php echo $fila['cliente'];  ?> </td>
                                                    <td> <?php echo $fila['ord_nombre'];  ?> </td>
                                                    <td> <?php echo $fila['producto'];  ?> </td>
                                                    <td> <?php echo $fila['medida'];  ?> </td>
                                                    <td> <?php echo $fila['cantidad_reclamada'];  ?> </td>
                                                    <td> <?php echo $fila['semana_reclamo'];  ?> </td>


                                                    <td>
                                                        <a href="detalle_reclamo.php?idreclamo=<?php echo $fila['id_reclamo']; ?>" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Ver Detalle</a>
                                                    </td>
                                                </tr>
                                            <?php  };
                                            sqlsrv_close($conexion); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>CLIENTE</th>
                                                <th>ORDEN INTERNA</th>
                                                <th>PRODUCTO</th>
                                                <th>MEDIDA</th>
                                                <th>CANTIDAD RECLAMADA</th>
                                                <th>SEMANA RECLAMO</th>

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





<!-- /page content -->
<!-- script de tabla-->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>
<script src="js/jquery.table2excel.min.js"></script>

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

    function CargarOrdenes(valor) {
        const xml = new XMLHttpRequest();

        xml.onload = function() {
            document.getElementById("ordenCliente").innerHTML = this.responseText;
        }

        xml.open("Get", "../model/ObtenerOrdenCliente.php?idCliente=" + valor);
        xml.send();

    }

    function CargarDetalleDespacho(valor) {

        const xlm = new XMLHttpRequest();
        xlm.onload = function() {
            document.getElementById("TbDatosSaldo").innerHTML = this.responseText;
        }

        xlm.open("GET", "../model/ObtenerDetalleDespacho.php?idOrden=" + valor);
        xlm.send();
    }

    function CargarMedida(valor) {

        const xml = new XMLHttpRequest();

        xml.onload = function() {
            document.getElementById("idmedida").innerHTML = this.responseText;
        }


        xml.open("GET", "../model/ObtenerMedidaPlanta.php?idPlanta=" + valor);
        xml.send();

    };

    //funcion para exportar tabla a excel
    $(function() {
        $('#exporttable').click(function(e) {
            var table = $('#tbempaque');
            if (table && table.length) {
                $(table).table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "Tabla Reclamo" + new Date().toISOString() + ".xls",

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
<!--PIE DE PAGINA DE PLANILLA-->