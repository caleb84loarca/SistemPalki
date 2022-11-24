<?php
 require_once "../controllers/BaseDatos.php"; 

 $idcliente=$_POST['cliente']; 
 $fechaingreso=$_POST['fechaingreso'];
 $fechacliente=$_POST['fechafinal'];
 
 
 
if( isset($idcliente) && isset($fechaingreso) ){

    mostrarorden($idcliente,$fechaingreso,$fechafinal);

   print "<script> window.location='../view/reporte_orden.php'; </script>";
}


function consultaorden($idcliente,$fechaingreso,$fechafinal){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "select * from orden
    where fecha_orden between '".$fechaingreso."' and '".$fechafinal."' and cliente_id_cliente=".$idcliente;
    
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
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    return $resultado;

    }   


//metodo mostrar orden

   function mostrarorden($idcliente,$fechaingreso,$fechafinal){
    $conn = BaseDatos::getCon();
    $sql = "select * from orden
    where fecha_orden between '".$fechaingreso."' and '".$fechafinal."' and cliente_id_cliente=".$idcliente;
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
       
    return [
        $fila['cliente_id_cliente'],
        $fila['ord_destino']
    ];
}  


  



?>