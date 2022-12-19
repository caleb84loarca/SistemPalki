<?php
 require_once "../controllers/BaseDatos.php"; 



 $idcliente=$_POST['cliente']; 
 $fechaingreso=$_POST['fechaReclamo'];
 $ordenCliente=$_POST['ordenCliente'];
 $cantidad = $_POST['cantReclamo'];
 $medidaReclamada = $_POST['idmedida'];
 $reclamo = $_POST['reclamo'];
 $producto = $_POST['idproducto'];
 
 
if( isset($idcliente) && isset($fechaingreso) && isset($ordenCliente) && isset($cantidad) && isset($medidaReclamada) && isset($reclamo)    ){

    GrabarReclamo($fechaingreso,$ordenCliente,$cantidad,$medidaReclamada,$reclamo, $producto);

   print "<script> window.location='../view/reclamo_orden.php'; alert('Registro Almacenado Exitosamente!!');  </script>";
}


function GrabarReclamo( $fechaingreso,$ordenCliente,$cantidad,$medidaReclamada,$reclamo,$producto){
   try {
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "INSERT INTO reclamos (reclamo, orden_id_orden, cantidad_reclamada, fecha_reclamo, id_producto, id_medida, id_estado)
                        values( '$reclamo', $ordenCliente,        $cantidad,  '$fechaingreso', $producto, $medidaReclamada, 7)";
    
    $resultado = sqlsrv_query($conexion,$sql);  

   } catch (Throwable $th) {
     $th;
   }finally{
    sqlsrv_close($conexion);
   }
   
    return $resultado;
}





?>