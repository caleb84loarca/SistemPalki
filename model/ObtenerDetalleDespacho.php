<!-- <table id="TbDatosSaldo" class="mdl-data-table" style="width:100%"> -->
<table id="datatable-buttons"  class="table table-striped table-bordered"  style="width:100%" table-condensed>

<thead>
    <tr>
      
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

    $idOrden = $_REQUEST["idOrden"];

    $base = new BaseDatos();
    $conexion = $base->getCon();
    $query = "select tabla.ord_nombre, tabla.producto, tabla.medida, format(tabla.cantidad_unidades,'#,0') as cantidad_unidades,
    FORMAT(
        case 
	        when tabla.cantidad_despacho is null then 0	else tabla.cantidad_despacho 
        end,'#,0') as cantidad_despacho,
    FORMAT(
        case 
	        when cantidad_despacho = '0' or cantidad_despacho is null then tabla.cantidad_unidades
	        else
	        ( cast( tabla.cantidad_unidades as int) -  cast(tabla.cantidad_despacho as int)) 
        end, '#,0') as saldo
from ( select o.ord_nombre, p.producto, m.medida, do.cantidad_unidades as cantidad_unidades,
(select SUM(cantidad_despacho) 
		from despacho_det_orden 
		where id_orden= $idOrden 
		and id_producto=p.id_producto 
		and idmedida=m.id_medida) as [cantidad_despacho]
from orden as o
inner join detalle_orden as do on do.orden_id_orden=o.id_orden
inner join producto as p on p.id_producto = do.producto_id_producto
inner join medida as m on m.id_medida=do.medida_id_medida
WHERE o.id_orden = $idOrden) as tabla ";
    $resultado = sqlsrv_query($conexion, $query);

    while ($fila = sqlsrv_fetch_array($resultado)) {

    ?>

        <tr>
        
            <td><?php echo $fila['producto']; ?></td>
            <td><?php echo $fila['medida']; ?></td>
            <td><?php echo $fila['cantidad_unidades']; ?></td>
            <td><?php echo $fila['cantidad_despacho']; ?></td>
            <td> <?php echo $fila['saldo']; ?></td>
         
        </tr>

    <?php };  sqlsrv_close($conexion); ?>
</tbody>
<tfoot>
    <tr>
      
        <th>PRODUCTO</th>
        <th>MEDIDA</th>
        <th>CANTIDAD ORDENADA</th>
        <th>CANTIDAD DESPACHADA</th>
        <th>SALDO ACTUAL</th>

    </tr>
</tfoot>
</table>