<?php
 require_once "../controllers/BaseDatos.php"; 

 $orden=$_POST['ordenCliente'];
 $idproducto=$_POST['idproducto'];
 $idmedida=$_POST['idmedida'];   
 $cantdespacho=$_POST['cant_despacho']; 
 $fechadespacho=$_POST['fechadespacho']; 
  $wkdespacho=$_POST['wk_despacho']; 
 $fechallega=$_POST['fechallegada'];
   $wkllegada=$_POST['wk_llegada'];  
   
   

 
if( isset($orden) && isset($cantdespacho) ){

    AgregarDespachoOrden($cantdespacho,$wkdespacho,$wkllegada,$fechadespacho,$fechallega,$orden,$idmedida,$idproducto);

   print "<script> window.location='../view/despacho_orden.php'; alert('Registro Operado Exitosamente!!'); </script>";
}


function AgregarDespachoOrden($cantdespacho,$wkdespacho,$wkllegada,$fechadespacho,$fechallega,$orden,$idmedida,$idproducto){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into despacho_det_orden (cantidad_despacho,wk_despacho,wk_arribo,fecha_etd,fecha_eta, id_orden, idmedida, idproducto) VALUES (".$cantdespacho.",".$wkdespacho.",".$wkllegada.",'".$fechadespacho."','".$fechallega."',".$orden.",".$idmedida.",".$idproducto.")";
    
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


//metodo mostrar medida

   function mostrarmedida($id_medida){
    $conn = BaseDatos::getCon();
    $sql = "Select * from medida where id_medida='".$id_medida."'; ";
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
       
    return [
        $fila['id_medida'],
        $fila['medida']
    ];
}  


  



?>