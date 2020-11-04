<?php require_once  "plantilla/plantilla_central.php";?> 

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

<table id="tbusuarios" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>NOMBRE ORDEN</th>
                <th>PRODUCTO</th>
                <th>MEDIDA</th>
                <th>CANTIDAD ORDENADA</th>
                <th>CANTIDAD DESPACHADA</th>
                <th>SALDO ACTUAL</th>           
               
            </tr>
        </thead>
        <tbody>

<?php 
require_once "../controllers/BaseDatos.php";

$conexion =BaseDatos::getCon();

$sql = "select o.ord_nombre, p.producto, m.medida, format(do.cantidad_unidades,'#,0') as cantidad_unidades, format(ddo.cantidad_despacho,'#,0') as cantidad_despacho, 
format(sum(do.cantidad_unidades -ddo.cantidad_despacho),'#,0') as saldo from orden as o
inner join detalle_orden as do on do.orden_id_orden=o.id_orden
inner join despacho_det_orden as ddo on ddo.id_orden = o.id_orden
inner join producto as p on p.id_producto = do.producto_id_producto
inner join medida as m on m.id_medida=do.medida_id_medida
group by o.ord_nombre, p.producto, m.medida, do.cantidad_unidades, ddo.cantidad_despacho";

$resultado= sqlsrv_query($conexion,$sql);

while($fila = sqlsrv_fetch_array($resultado)){

?>
            <tr>
                <td> <?php echo $fila['ord_nombre'];?> </td>
                <td><?php echo $fila['producto'];?></td>
                <td><?php echo $fila['medida'];?></td>
                <td><?php echo $fila['cantidad_unidades'];?></td>
                <td><?php echo $fila['cantidad_despacho'];?></td>
                <td> <?php echo $fila['saldo'];?></td>              
            </tr>

            <?php }; ?>          
        </tbody>
        <tfoot>
            <tr>
            <th>NOMBRE ORDEN</th>
                <th>PRODUCTO</th>
                <th>MEDIDA</th>
                <th>CANTIDAD ORDENADA</th>
                <th>CANTIDAD DESPACHADA</th>
                <th>SALDO ACTUAL</th>           
               
            </tr>
        </tfoot>
    </table>

            <!-- script de tabla-->

            <script src="js/jquery.dataTables.min.js"></script>
            <script src="js/dataTables.material.min.js"></script>
           
            <script>
                $(document).ready(function() {
                $('#tbusuarios').DataTable( {
                    autoWidth: false,
                    columnDefs: [
                        {
                            targets: ['_all'],
                            className: 'mdc-data-table__cell'
                        }
                    ]
                } );
            } );
            </script>
            <!-- cierre script de tabla-->

                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
