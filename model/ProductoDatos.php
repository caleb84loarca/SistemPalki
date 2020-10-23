<?php
 require_once "../controllers/BaseDatos.php"; 

 $producto=$_POST['producto']; 
 $categoria=$_POST['categoria']; 
 $genero=$_POST['genero']; 
 $especie=$_POST['especie'];
 $subcategoria=$_POST['subcategoria']; 
 $cites=$_POST['cites'];     
 $cantidad_min=$_POST['cantidad_min']; 
 $wktransito=$_POST['wktransito']; 
 $wkcompra=$_POST['wkcompra']; 
 $idempaque=$_POST['idempaque']; 
    

if( isset($producto) && isset($idempaque) ){

    aniadir($producto,$categoria,$genero,$especie,$subcategoria,$cites,$cantidad_min,$wktransito,$wkcompra,$idempaque);   
    print "<script> window.location='../view/productos.php'; </script>";
}

function aniadir($producto,$categoria,$genero,$subcategoria,$cites,$especie,$cantidad_min,$wktransito,$wkcompra,$idempaque){
   
    $base = new BaseDatos();
    $conexion=$base->getCon();
    $sql = "insert into producto (producto,categoria,genero,especie,sub_categoria,cites_descripcion,cant_minima, wk_transito,wk_compra,empaque_id_empaque) 
    values ('".$producto."','".$categoria."','".$genero."','".$especie."','".$subcategoria."','".$cites."','".$cantidad_min."',".$wktransito.",'".$wkcompra."','".$idempaque."')";
    
    $resultado = sqlsrv_query($conexion,$sql);  

    return $resultado;
}

//metodo para mostrar los productos

function mostrarproducto($id_producto){
    $conn = BaseDatos::getCon();
    $sql = "Select * from producto where id_producto='".$id_producto."'; ";
    $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
    $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
       
    return [
        $fila['id_producto'],
        $fila['producto'],
        $fila['categoria'],
        $fila['genero'],
        $fila['especie'],
        $fila['sub_categoria'],
        $fila['cites_descripcion'],
        $fila['cant_minima'],
        $fila['wk_transito'],
        $fila['wk_compra'],
        $fila['empaque_id_empaque']
        
    ];
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