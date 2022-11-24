<?php

require_once "../controllers/BaseDatos.php";

$idCliente = $_REQUEST["idCliente"];

if ($idCliente == null) {
    return;
}

$base = new BaseDatos();
$conexion = $base->getCon();
$query = "select o.id_orden, o.ord_nombre, c.clien_compania from orden as o
inner join cliente as c on c.id_cliente = o.cliente_id_cliente
where c.id_cliente  =  $idCliente";
$resultado = sqlsrv_query($conexion, $query);

$valores = sqlsrv_fetch_array($resultado) ;

if( $valores[0]== null){ 
    echo  "<option value=0> No Existe Ordenes para este Cliente </option>";
    
 };

while ($valores = sqlsrv_fetch_array($resultado) ) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.}
  
?>
    <option value="<?php echo $valores['id_orden']; ?>"> <?php echo $valores['ord_nombre']; ?> </option>

<?php
};
?>