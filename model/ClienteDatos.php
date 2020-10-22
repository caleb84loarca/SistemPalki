<?php
require_once "../controllers/BaseDatos.php";

 $nom1=$_POST['clien_nom1']; 
 $nom2=$_POST['clien_nom2']; 
 $ape1=$_POST['clien_ape1']; 
 $ape2=$_POST['clien_ape2']; 
 $compania=$_POST['compania']; 
 $direccion=$_POST['direccion']; 
 $email=$_POST['email'];  
 $tel1=$_POST['telefono1']; 
 $tel2=$_POST['telefono2']; 
 $tel3=$_POST['telefono3']; 
 $idpais=str_replace(' ','',$_POST['idpais']); 
 $fechaingreso=$_POST['fechaingreso'];   

if( isset($nom1) && isset($compania) && isset($email) ){

 aniadir($nom1,$nom2,$ape1,$ape2,$compania,$direccion,$email,$tel1,$tel2,$tel3,$fechaingreso,$idpais);   
    print "<script> window.location='../view/Cliente.php'; </script>";
}

function aniadir($nom1,$nom2,$ape1,$ape2,$compania,$direccion,$email,$tel1,$tel2,$tel3,$fechaingreso,$idpais){
     
    $base = new BaseDatos();
    $conexion=$base->getCon();
$sql = "insert into cliente (clien_nom1,clien_nom2,clien_ape1,clien_ape2,clien_compania,clien_direccion,clien_correo,clien_tel1,clien_tel2,clien_tel3,pais_id_pais,fecha_ingreso)
values('".$nom1."','".$nom2."','".$ape1."','".$ape2."','".$compania."','".$direccion."','".$email."','".$tel1."','".$tel2."','".$tel3."','".$idpais."','".$fechaingreso."')";

       
    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}

?>