<?php

require_once "../controllers/BaseDatos.php";

$idPlanta = $_REQUEST["idPlanta"];
if($idPlanta==null){return;}

$base = new BaseDatos();
$conexion = $base->getCon();
$query = "select id_medida, medida from medida where producto_id_producto = $idPlanta";
$resultado = sqlsrv_query($conexion, $query);
while ($valores = sqlsrv_fetch_array($resultado)) {
    // En esta sección estamos llenando el select con datos extraidos de una base de datos.}?>
    <option value="<?php echo $valores['id_medida']; ?>"> <?php echo $valores['medida']; ?> </option>

<?php
    };
    
?>