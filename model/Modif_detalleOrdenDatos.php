<?php
 require_once "../controllers/BaseDatos.php"; 


 $idDetalleOrden = $_POST['idDetalleOrden'];
 $idproducto=$_POST['idproducto'];
 $idMedida=$_POST['idmedida'];   
 $Cantidad=$_POST['cantidad']; 
 $idOrden = $_POST['idOrden'];


 ActualizarDetalleOrden($idDetalleOrden, $idMedida, $idproducto, $Cantidad, $idOrden);

 function ActualizarDetalleOrden($idDetalleOrden, $idMedida, $idproduct, $Cantidad, $idOrden){
    $conn = BaseDatos::getCon();
    $sql = "update detalle_orden
        set cantidad_unidades = $Cantidad,
            producto_id_producto = $idproduct,
            medida_id_medida = $idMedida
        where id_detalleorden = $idDetalleOrden";
    sqlsrv_query($conn, $sql);    
 
    print "<script> alert('Registro Actualizado con Exito.!!'); window.location='../view/detalle_orden.php?idOrden=$idOrden'; </script>";


}
  

