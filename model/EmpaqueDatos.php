<?php
 require_once "../controllers/BaseDatos.php"; 

 $empaque=$_POST['empaque'];   

if( isset($empaque) ){

    aniadir($empaque);   
    print "<script> window.location='../view/new_empaque.php'; </script>";
}

function aniadir($empaque){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into empaque (tipo_empaque) VALUES ('".$empaque."')";

    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}

?>