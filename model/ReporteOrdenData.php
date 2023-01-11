<?php
 require_once "../controllers/BaseDatos.php"; 

 $idcliente=$_POST['idcliente']; 
 $fechaingreso=$_POST['fechaingreso'];
 $fechaFinal=$_POST['fechafinal'];
 
 
 
if( isset($idcliente) && isset($fechaingreso) ){

    mostrarorden($idcliente,$fechaingreso,$fechaFinal);

   print "<script> window.location='../view/reporte_orden.php'; </script>";
}


function consultaorden($idcliente,$fechaingreso,$fechaFinal){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "select * from orden
    where fecha_orden between '".$fechaingreso."' and '".$fechaFinal."' and cliente_id_cliente=".$idcliente;
    
    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}


//metodo de actualizar medida



 
if( isset($altura) && isset($idaltura) ){

    actualizarmedida($altura,$idproduct,$idaltura);

   print "<script> alert('Medida modificada Exitosamente!!'); window.location='../view/new_medida.php'; </script>";
}

function actualizarmedida($altura,$id_product,$id_altura){

    $conn = BaseDatos::getCon();
    $sql = "update medida set medida ='".$altura."', producto_id_producto=".$id_product." where id_medida=".$id_altura;
    $resultado = sqlsrv_query($conn,$sql); 
    return $resultado;

    }   


//metodo mostrar orden

   function mostrarorden($idcliente,$fechaingreso,$fechafinal){
    $conn = BaseDatos::getCon();
    $sql = "select o.id_orden, o.ord_nombre, o.ord_nombreclie, est.estado  from orden as o
        inner join estado_orden as est on est.id_estado = o.estado_id_estado
        where fecha_orden between '".$fechaingreso."' and '".$fechafinal."' and cliente_id_cliente=".$idcliente;
    $resultado = sqlsrv_query($conn,$sql); 
    $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
       
   return [
        $fila['id_orden'],
        $fila['ord_nombre'],
        $fila['ord_nombreclie'],
        $fila['estado']
    ]; 
}  


  



?>