<?php
require_once "../controllers/BaseDatos.php";

//metodo de aniadir datos

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


//datos para actualizar productos

$idprod=$_POST['idproducto'];
$product=$_POST['product']; 
$catego=$_POST['catego']; 
$gene=$_POST['gene']; 
$espe=$_POST['especies'];
$subcatego=$_POST['subcatego']; 
$cite=$_POST['cite'];     
$cant_min=$_POST['cant_min']; 
$wktransit=$_POST['wktransitos']; 
$wkcompras=$_POST['wkcompras']; 
$idempaques=$_POST['idempaques']; 
   

if( isset($product) && isset($idempaques) ){

   actualizarcliente($product,$catego,$gene,$espe,$subcatego,$cite,$cant_min,$wktransit,$wkcompras,$idempaques,$idprod);   
   print "<script> alert('Datos Actualizados Exitosamente!!'); window.location='../view/productos.php'; </script>";
}




function actualizarcliente($product,$catego,$gene,$espe,$subcatego,$cite,$cant_min,$wktransit,$wkcompras,$idempaques,$idprod){

    $conn = BaseDatos::getCon();
    $sql = "update cliente set producto='".$product."', categoria='".$catego."', genero='".$gene."', especie='".$espe."',sub_categoria='".$subcatego."',cites_descripcion='".$cite."',cant_minima=".$cant_min.", wk_transito=".$wktransit.", wk_compra=".$wkcompras.", empaque_id_empaque=".$idempaques."
    where id_producto=".$idprod;
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    return $resultado;

    }   



    function mostrarcliente($id_cliente){
        $conn = BaseDatos::getCon();
        $sql = "Select * from cliente where id_cliente='".$id_cliente."'; ";
        $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
        $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
           
        return [
            $fila['id_cliente'],
            $fila['clien_nom1'],
            $fila['clien_nom2'],
            $fila['clien_ape1'],
            $fila['clien_ape2'],
            $fila['clien_compania'],
            $fila['clien_direccion'],
            $fila['clien_correo'],
            $fila['clien_tel1'],
            $fila['clien_tel2'],
            $fila['clien_tel3'],
            $fila['pais_id_pais'],
            $fila['fecha_ingreso']
        ];
    }  


?>