<?php
 require_once "../controllers/BaseDatos.php"; 

 $nombre1=$_POST['nombre1']; 
 $nombre2=$_POST['nombre2']; 
 $apellido1=$_POST['apellido1']; 
 $apellido2=$_POST['apellido2']; 
 $puesto=$_POST['puesto']; 
 $ubicacion=$_POST['ubicacion']; 
 $email=$_POST['email']; 
 $telefono=$_POST['telefono']; 
 $fechaingreso=$_POST['fechaingreso']; 
 $contrasena=$_POST['contrasena']; 
 $tipousuario=$_POST['tipousuario'];   

if( isset($nombre1) && isset($contrasena) ){

    aniadir($nombre1,$nombre2,$apellido1,$apellido2,$puesto,$ubicacion,$email,$telefono,$fechaingreso,$contrasena,$tipousuario);   
    print "<script> window.location='../view/usuario.php'; </script>";
}

function aniadir($nombre1,$nombre2,$apellido1,$apellido2,$puesto,$ubicacion,$email,$telefono,$fechaingreso,$contrasena,$tipousuario){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into usuario (nombre1,nombre2,apellido1,apellido2,puesto,contrasena,tipo_usario_id_tipousuario,ubicacion, email, telefono,fecha_ingreso) 
    values ('".$nombre1."','".$nombre2."','".$apellido1."','".$apellido2."','".$puesto."','".$contrasena."',".$tipousuario.",'".$ubicacion."','".$email."','".$telefono."','".$fechaingreso."')";
    

    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}

?>