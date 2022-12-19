<?php
 require_once "../controllers/BaseDatos.php"; 

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

   actualizarproducto($product,$catego,$gene,$espe,$subcatego,$cite,$cant_min,$wktransit,$wkcompras,$idempaques,$idprod);   
   print "<script> alert('Datos Actualizados Exitosamente!!'); window.location='../view/productos.php'; </script>";
}

function actualizarproducto($product,$catego,$gene,$espe,$subcatego,$cite,$cant_min,$wktransit,$wkcompras,$idempaques,$idprod){

    $conn = BaseDatos::getCon();
    $sql = "update producto set producto='".$product."', categoria='".$catego."', genero='".$gene."', especie='".$espe."',sub_categoria='".$subcatego."',cites_descripcion='".$cite."',cant_minima=".$cant_min.", wk_transito=".$wktransit.", wk_compra=".$wkcompras.", empaque_id_empaque=".$idempaques."
    where id_producto=".$idprod;
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    return $resultado;

    }   

?>