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

?>