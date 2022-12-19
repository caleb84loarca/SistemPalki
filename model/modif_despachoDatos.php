<?php
 require_once "../controllers/BaseDatos.php"; 


 $idDetalleOrden = $_POST['idDetalleOrden'];
 $idproducto=$_POST['idproducto'];
 $idMedida=$_POST['idmedida'];   
 $Cantidad=$_POST['cantidad']; 
 $idOrden = $_POST['idOrden'];


 ActualizarDespachOrden($idDetalleOrden, $idMedida, $idproducto, $Cantidad, $idOrden);

 function ActualizarDespachOrden($idDetalleOrden, $idMedida, $idproduct, $Cantidad, $idOrden){

    try {
        $conn = BaseDatos::getCon();
        $sql = "update detalle_orden
            set cantidad_unidades = $Cantidad,
                producto_id_producto = $idproduct,
                medida_id_medida = $idMedida
            where id_detalleorden = $idDetalleOrden";
        sqlsrv_query($conn, $sql);    

        print "<script> alert('Registro Actualizado con Exito.!!'); window.location='../view/despacho_orden.php?idOrden=$idOrden'; </script>";

    } catch (Throwable $th) {
        throw $th;
    }finally{
        sqlsrv_close($conn);
    }  
}
  
