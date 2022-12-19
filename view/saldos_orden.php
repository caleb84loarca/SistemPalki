<?php require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";

#session_start();
$_SESSION['idusuario'];
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Saldos de &Oacuterdenes</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informaci&oacuten <small>por Cliente</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Tabs -->
                        <div id="wizard_verticle" class="form_wizard wizard_verticle">
                            <ul class="list-unstyled wizard_steps">
                                <li>
                                    <a href="#step-11">
                                        <span class="step_no">1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-22">
                                        <span class="step_no">2</span>
                                    </a>
                                </li>

                            </ul>

                            <div id="step-11">
                                <h2 class="StepTitle">Paso 1 </h2>
                                <form class="form-horizontal form-label-left">

                                    <span class="section">Seleccionar Cliente y &oacuterden</span>

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

                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Ordenes de Cliente <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">

                                            <select class="form-control" id="ordenCliente" name="ordenCliente" onclick="CargarDetalleDespacho(this.value);">
                                                <option value="0" selected> Seleccionar de la lista </option>;

                                            </select>

                                        </div>
                                    </div>


                                </form>


                            </div>
                            <div id="step-22">
                                <h2 class="StepTitle">Paso 2 </h2>
                                <!-- DIVISION PARA LA TABLA Y CARGA DE DATOS -->
                                <span class="section">Visualizar Datos</span>
                                <div class="right_col" role="main">
                                    <div class="">
                                        <div class="page-title">
                                            <div class="title_left">

                                                <h3>Tabla de Saldos</h3>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12" align="center" id="EspacioTabla">
                                                <!--    <div class="x_panel" id="EspacioTabla">

                                                    

                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <!-- End SmartWizard Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#TbDatosSaldo').DataTable({
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
            document.getElementById("EspacioTabla").innerHTML = this.responseText;
        }

        xlm.open("GET", "../model/ObtenerDetalleDespacho.php?idOrden=" + valor);
        xlm.send();
    }
</script>
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