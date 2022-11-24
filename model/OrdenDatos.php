<?php
require_once "../controllers/BaseDatos.php";

if (count($_POST) > 0) {
    $idcliente = $_POST['idcliente'];
    $idsubcliente = $_POST['idsubcliente'];
    $ordencliente = $_POST['ordencliente'];
    $ordeninterno = $_POST['ordeninterno'];
    $fechaingreso = $_POST['fechaingreso'];
    $fechacliente = $_POST['fechacliente'];
    $destino = $_POST['destinorden'];
    $idembarque = $_POST['idembarque'];
    $observaciones = $_POST['observaciones'];
    $idestado = $_POST['idestado'];
    $idusuario = $_POST['idusuario'];
   
    
}


if (isset($idcliente) && isset($fechaingreso)) {

    aniadir($idcliente, $ordeninterno, $ordencliente, $fechaingreso, $fechacliente, $destino, $observaciones, $idsubcliente, $idembarque, $idestado, $idusuario);

    print "<script> window.location='../view/new_detalleorden.php'; </script>";
}


function aniadir($idcliente, $ordeninterno, $ordencliente, $fechaingreso, $fechacliente, $destino, $observaciones, $idsubcliente, $idembarque, $idestado, $idusuario)
{

    $base = new BaseDatos();
    $conexion = $base->getCon();
    $sql = "insert into orden (cliente_id_cliente,
    ord_nombre,
    ord_nombreclie,
    fecha_orden,
    fecha_ordcliente,
    ord_destino,
    observaciones,
    subcliente_id_subcliente,
    embarque_id_embarque,
    estado_id_estado,
    usuario_id_usuario)
    values ($idcliente,'" . $ordeninterno . "',
    '" . $ordencliente . "',
    '" . $fechaingreso . "',
    '" . $fechacliente . "',
    '" . $destino . "',
    '" . $observaciones . "',$idsubcliente,$idembarque,$idestado,$idusuario)";

    $resultado = sqlsrv_query($conexion, $sql);

    return $resultado;
}


//metodo de actualizar medida


if (isset($altura) && isset($idaltura)) {

    actualizarmedida($altura, $idproduct, $idaltura);

    print "<script> alert('Medida modificada Exitosamente!!'); window.location='../view/new_medida.php'; </script>";
}

function actualizarmedida($altura, $id_product, $id_altura)
{

    $conn = BaseDatos::getCon();
    $sql = "update medida set medida ='" . $altura . "', producto_id_producto=" . $id_product . " where id_medida=" . $id_altura;
    $resultado = sqlsrv_query($conn, $sql) or die(sqlsrv_error());
    return $resultado;
}



//metodo mostrar detalle de la orden
function MostrarDetalleOrd($idDetalleOrden,)
{
    if($idDetalleOrden==null){return;};
    $conexion = BaseDatos::getCon();
    $query = "select do.id_detalleorden, es.estado, sub.nom_subcliente, p.id_producto, p.producto, do.cantidad_unidades, m.id_medida, m.medida, o.id_orden from detalle_orden as do
    inner join producto as p on p.id_producto = do.producto_id_producto
    inner join medida as m on m.id_medida = do.medida_id_medida
    inner join orden as o on o.id_orden = do.orden_id_orden
    inner join subcliente as sub on sub.id_subcliente = o.subcliente_id_subcliente
    inner join estado_orden as es on es.id_estado = o.estado_id_estado
    where id_detalleorden = $idDetalleOrden ";
    $resultado = sqlsrv_query($conexion, $query);

    $valores = sqlsrv_fetch_array($resultado);

    return $valores;

}
   
//metodo mostrar orden
function MostrarOrden($dato)
    {
        $conn = BaseDatos::getCon();
        $sql = "select o.id_orden, o.ord_nombre, o.ord_nombreclie, eo.id_estado, eo.estado, o.fecha_orden, o.fecha_ordcliente, c.clien_compania, 
        sc.nom_subcliente, o.ord_destino, e.id_embarque, e.embarque, o.observaciones from orden as o
        inner join estado_orden as eo on  eo.id_estado=o.estado_id_estado
        inner join embarque as e on e.id_embarque=o.embarque_id_embarque
        inner join cliente as c on c.id_cliente=o.cliente_id_cliente
        inner join subcliente as sc on sc.id_subcliente = o.subcliente_id_subcliente
        where o.id_orden=". $dato;
        $resultado = sqlsrv_query($conn, $sql);
        $fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
    
        return [
            $fila['id_orden'],
            $fila['clien_compania'],
            $fila['nom_subcliente'],
            $fila['ord_nombreclie'],
            $fila['ord_nombre'],
            $fila['ord_destino'],
            $fila['id_estado'],
            $fila['estado'],            
            $fila['id_embarque'], 
            $fila['embarque'],           
            $fila['observaciones']
        ];
    }
    
  
    




?>