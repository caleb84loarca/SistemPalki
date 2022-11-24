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

   print "<script> alert('Registro Almacenado Exitosamente!!'); 
   window.location='../view/reclamo_orden.php'; </script>";
}


function GrabarReclamo( $fechaingreso,$ordenCliente,$cantidad,$medidaReclamada,$reclamo,$producto){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "INSERT INTO reclamos (reclamo, orden_id_orden, cantidad_reclamada, fecha_reclamo, id_producto, id_medida)
                        values( '$reclamo', $ordenCliente,        $cantidad,  '$fechaingreso', $producto, $medidaReclamada) ";
    
    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}




?>