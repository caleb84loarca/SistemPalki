<table id="TbDatosSaldo" class="mdl-data-table" style="width:100%">




                                                  
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
    $query = "select o.ord_nombre, p.producto, m.medida, format(do.cantidad_unidades,'#,0') as cantidad_unidades, format(ddo.cantidad_despacho,'#,0') as cantidad_despacho, 
format(sum(do.cantidad_unidades -ddo.cantidad_despacho),'#,0') as saldo from orden as o
inner join detalle_orden as do on do.orden_id_orden=o.id_orden
inner join despacho_det_orden as ddo on ddo.id_orden = o.id_orden
inner join producto as p on p.id_producto = do.producto_id_producto
inner join medida as m on m.id_medida=do.medida_id_medida
WHERE o.id_orden = $idOrden
group by o.ord_nombre, p.producto, m.medida, do.cantidad_unidades, ddo.cantidad_despacho ";
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

    <?php }; ?>
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