<?php require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";

#session_start();
$_SESSION['idusuario'];
?>

  

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Saldos de &Oacuterdenes Por Cliente</h3>
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
                        <form class="" action="../model/ObtenerDetalleDespacho.php" method="post" novalidate>



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


                   <!--         <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Ver Datos de Orden</button>
                                        <button type='reset' class="btn btn-success">Limpiar Formulario</button>
                                        <br>
                                    </div>
                                </div>
                            </div>
                                        -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- DIVISION PARA LA TABLA Y CARGA DE DATOS -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tabla de Saldos</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12" align="center">
                <div class="x_panel">

                    <table id="TbDatosSaldo" class="mdl-data-table" style="width:100%">
                      
                        

                     
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<!-- script de tabla-->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>

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
            document.getElementById("TbDatosSaldo").innerHTML = this.responseText;
        }

        xlm.open("GET", "../model/ObtenerDetalleDespacho.php?idOrden=" + valor);
        xlm.send();
    }
</script>


<!-- cierre script de tabla-->

