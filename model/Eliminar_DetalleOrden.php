<?php
 require_once "../controllers/BaseDatos.php"; 


 $idDetalleOrden = $_GET['idDetalle'];
 $idOrden = $_GET['idOrden'];

 EliminarDetalleOrden($idDetalleOrden, $idOrden);

 function EliminarDetalleOrden($idDetalleOrden, $idOrden){
    $conn = BaseDatos::getCon();
    $sql = "update detalle_orden
        set estado = 8           
        where id_detalleorden = $idDetalleOrden";
    sqlsrv_query($conn, $sql);    
 
    print "<script> alert('Registro Actualizado con Exito.!!'); window.location='../view/detalle_orden.php?idOrden=$idOrden'; </script>";


}
  