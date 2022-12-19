<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";

#session_start();

$base = new BaseDatos();


#session_start();
$_SESSION['idusuario'];
$VerReclamo = $_GET["idreclamo"]; 

if ( isset($verReclamo)) {
    return 0;
};



?>

<!-- page content -->



<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Reclamo al Detalle</h3>
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
                                    <h2>Datos </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="tbDetalleReclamo" class="mdl-data-table" style="width:100%" table-condensed>
                                        <thead>
                                            <tr>
                                                <th>STATUS DE ORDEN</th>
                                                <th>SUBCLIENTE</th>
                                                <th>PRODUCTO/ARTICULO</th>
                                                <th>CANTIDAD DE UNIDADES</th>
                                                <th>MEDIDA</th>
                                                <th>COMENTARIOS</th>
                                                <th>ACCIONES</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php                                                                                    

                                            $conexion = BaseDatos::getCon();
                                            $query = "select rec.id_reclamo, c.clien_compania as cliente, sc.nom_subcliente,  o.ord_nombre, datepart(YEAR, rec.fecha_reclamo) as ANIO, DATEPART(ISO_WEEK, rec.fecha_reclamo) as semana_reclamo, p.producto, m.medida,  rec.cantidad_reclamada, rec.id_estado, rec.reclamo  from reclamos as rec
                                            inner join orden as o on o.id_orden = rec.orden_id_orden
                                            inner join medida as m on m.id_medida = rec.id_medida
                                            inner join producto as p on p.id_producto = rec.id_producto
                                            inner join cliente as c on c.id_cliente = o.cliente_id_cliente
                                            inner join subcliente as sc on sc.id_subcliente = o.subcliente_id_subcliente
											where rec.id_reclamo=$VerReclamo and rec.id_estado=7";

                                          
                                            $resultado = sqlsrv_query($conexion, $query);

                                            while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td> <?php echo $fila['cliente'];  ?> </td>
                                                    <td> <?php echo $fila['nom_subcliente'];  ?> </td>
                                                    <td> <?php echo $fila['producto'];  ?> </td>
                                                    <td> <?php echo $fila['cantidad_reclamada'];  ?> </td>
                                                    <td> <?php echo $fila['medida'];  ?> </td>
                                                    <td> <?php echo $fila['reclamo'];  ?> </td>

                                                    <td>
                                                        <a href="modif_reclamo.php?id=<?php echo $fila['id_reclamo']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>
                                                        <a href="../model/Eliminar_ReclamoDatos.php?id=<?php echo $fila['id_reclamo']; ?> " class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php  };
                                            sqlsrv_close($conexion); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>STATUS DE ORDEN</th>
                                                <th>SUBCLIENTE</th>
                                                <th>PRODUCTO/ARTICULO</th>
                                                <th>CANTIDAD DE UNIDADES</th>
                                                <th>MEDIDA</th>
                                                <th>COMENTARIOS</th>
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
            <a class="btn btn-secondary" href="reclamo_orden.php" role="button">Regresar</a>
        </div>
    </div>

</div>



<!-- script de tabla-->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tbDetalleReclamo').DataTable({
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