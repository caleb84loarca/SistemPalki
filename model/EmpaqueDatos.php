<?php
 require_once "../controllers/BaseDatos.php"; 

 $empaque=$_POST['empaque'];   

 
if( isset($empaque) ){

    aniadir($empaque);

   print "<script> alert('Empaque Ingresado Exitosamente!!'); window.location='../view/new_empaque.php'; </script>";
}


$idempaque=$_POST['idempaque'];   
 $modifempaque=$_POST['actualiarempaque'];   
 
if( isset($idempaque) && isset($modifempaque) ){

    actualizarempaque($modifempaque,$idempaque);

   print "<script> alert('Empaque modificado Exitosamente!!'); window.location='../view/new_empaque.php'; </script>";
}




function aniadir($dato){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into empaque (tipo_empaque) VALUES ('".$dato."')";

    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}

   function mostrarempaque($id_empaque){
    $conn = BaseDatos::getCon();
    $sql = "Select * from empaque where id_empaque='".$id_empaque."'; ";
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
       
    return [
        $fila['id_empaque'],
        $fila['tipo_empaque']
    ];
}  


  function actualizarempaque($tipoempaque,$id_empaque){

    $conn = BaseDatos::getCon();
    $sql = "update empaque set tipo_empaque ='".$tipoempaque."' where id_empaque='".$id_empaque."';";
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    return $resultado;

    }   




?>