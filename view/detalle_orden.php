<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
require_once "../model/OrdenDatos.php";
#session_start();

$base = new BaseDatos();

#session_start();
$_SESSION['idusuario'];
$VerOrden = $_GET["idOrden"];


if (isset($_GET["idDetalle"])) {
    return 0;
};

?>

<!-- page content -->



<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Datos Cargados a &Oacuterden</h3>
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
                                    <h2></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="tbDetalleOrden" class="mdl-data-table" style="width:100%" table-condensed>
                                        <thead>
                                            <tr>
                                                <th>STATUS DE ORDEN</th>
                                                <th>SUBCLIENTE</th>
                                                <th>PRODUCTO/ARTICULOE</th>
                                                <th>CANTIDAD DE UNIDADES</th>
                                                <th>MEDIDA</th>
                                                <th>ACCIONES</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $conexion = BaseDatos::getCon();
                                            $query = "select do.id_detalleorden, es.estado as estadorden, sub.nom_subcliente, p.id_producto, p.producto, do.cantidad_unidades, m.id_medida, m.medida, o.id_orden, do.estado from detalle_orden as do
                                            inner join producto as p on p.id_producto = do.producto_id_producto
                                            inner join medida as m on m.id_medida = do.medida_id_medida
                                            inner join orden as o on o.id_orden = do.orden_id_orden
                                            inner join subcliente as sub on sub.id_subcliente = o.subcliente_id_subcliente
                                            inner join estado_orden as es on es.id_estado = o.estado_id_estado
                                             where orden_id_orden = $VerOrden and do.estado is null";
                                            $resultado = sqlsrv_query($conexion, $query);

                                            while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td> <?php echo $fila['estadorden'];  ?> </td>
                                                    <td> <?php echo $fila['nom_subcliente'];  ?> </td>
                                                    <td> <?php echo $fila['producto'];  ?> </td>
                                                    <td> <?php echo $fila['cantidad_unidades'];  ?> </td>
                                                    <td> <?php echo $fila['medida'];  ?> </td>

                                                    <td>
                                                        <a href="modif_detalleorden.php?idDetalle=<?php echo $fila['id_detalleorden']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>
                                                        <a href="../model/Eliminar_DetalleOrden.php?idDetalle=<?php echo $fila['id_detalleorden']; ?>&idOrden=<?php echo $VerOrden; ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php  };
                                            sqlsrv_close($conexion); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>STATUS DE ORDEN</th>
                                                <th>SUBCLIENTE</th>
                                                <th>PRODUCTO/ARTICULOE</th>
                                                <th>CANTIDAD DE UNIDADES</th>
                                                <th>MEDIDA</th>
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

    <div class="form-group row" aling="right">
        <div class="col-md-6 col-sm-6 ">
            <a class="btn btn-secondary" href="new_orden.php" role="button">Regresar</a>
        </div>
    </div>

</div>



<!-- script de tabla-->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tbDetalleOrden').DataTable({
            autoWidth: false,
            columnDefs: [{
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            }]
        });
    });
</script>
<!-- cierre script de tabla-->



<script>
    function ObtenerIdCliente(int) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById('idsubcliente').innerHTML = this.responseText;

        }

        xhttp.open("GET", "../model/ClienteDatos.php?Cliente=" + int);

        xhttp.send();

    }




    function ObtenerSubCliente() {
        let subcliente = document.getElementById('idsubcliente');
        console.log(subcliente.value);

    }
</script>









<!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->