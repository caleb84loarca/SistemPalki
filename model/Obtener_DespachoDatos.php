<?php

require_once "../controllers/BaseDatos.php";


function ObtenerDespachoDatos($idDespacho)
{
    $base = new BaseDatos();
    $conexion = $base->getCon();
    $query = "select ddo.id_det_despacho, cli.clien_compania, o.id_orden, o.ord_nombre, p.id_producto, p.producto, m.id_medida, m.medida, format(ddo.cantidad_despacho,'#,0')as despacho, CONVERT(date,ddo.fecha_etd) as fechadespacho,  ddo.wk_despacho from despacho_det_orden as ddo
    inner join orden as o on o.id_orden=ddo.id_orden
    inner join producto as p on p.id_producto=ddo.idproducto
    inner join medida as m on m.id_medida=ddo.idmedida
    inner join cliente as cli on cli.id_cliente = o.cliente_id_cliente
    where ddo.id_det_despacho = $idDespacho ";
    $resultado = sqlsrv_query($conexion, $query);

    $valores = sqlsrv_fetch_array($resultado);

    return $valores;
}
