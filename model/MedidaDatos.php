<?php
 require_once "../controllers/BaseDatos.php"; 

 
if( isset($medida) && isset($producto) ){

    $medida=$_POST['medida'];
    $producto=$_POST['idproducto'];   
    aniadir($medida,$producto);

   print "<script> alert('Medida Ingresada Exitosamente!!'); window.location='../view/new_medida.php'; </script>";
}


function aniadir($dato,$dato2){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into medida (medida, producto_id_producto) VALUES ('".$dato."',".$dato2.")";

    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}


//metodo de actualizar medida



 
if( isset($altura) && isset($idaltura) ){

    $altura=$_POST['altura'];   
    $idproduct=$_POST['idproduct'];   
    $idaltura=$_POST['idaltura'];

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