<?php
 require_once "../controllers/BaseDatos.php"; 

 $idcliente=str_replace(' ','',$_POST['idcliente']); 
 $idsubcliente=$_POST['idsubcliente']; 
 $ordencliente=$_POST['ordencliente'];
 $ordeninterno=$_POST['ordeninterno'];
 $fechaingreso=$_POST['fechaingreso'];
 $fechacliente=$_POST['fechacliente'];
 $destino=$_POST['destinorden'];
 $idembarque=str_replace(' ','',$_POST['idembarque']); 
 $observaciones=$_POST['observaciones'];  
 $idestado=$_POST['idestado'];    
 $idusuario=$_POST['idusuario'];

 
if( isset($idcliente) && isset($fechaingreso) ){

    aniadir($idcliente,$ordeninterno,$ordencliente,$fechaingreso,$fechacliente,$destino,$observaciones,$idsubcliente,$idembarque,$idestado,$idusuario);

   print "<script> window.location='../view/new_detalleorden.php'; </script>";
}


function aniadir($idcliente,$ordeninterno,$ordencliente,$fechaingreso,$fechacliente,$destino,$observaciones,$idsubcliente,$idembarque,$idestado,$idusuario){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into orden (cliente_id_cliente,
    ord_nombre,
    ord_nombreclie,
    fecha_orden,
    fecha_ordcliente,
    ord_destino,
    observaciones,
    subcliente_id_subcliente,
    embarque_id_embarque,
    estado_id_estado,
    usuario_id_usuario)
    values ($idcliente,'".$ordeninterno."',
    '".$ordencliente."',
    '".$fechaingreso."',
    '".$fechacliente."',
    '".$destino."',
    '".$observaciones."',$idsubcliente,$idembarque,$idestado,$idusuario)";
    
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