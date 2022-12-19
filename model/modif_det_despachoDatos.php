<?php
 require_once "../controllers/BaseDatos.php"; 


 $idDetalleDespacho = $_GET['id'];
 $idproducto=$_POST['idproducto'];
 $idMedida=$_POST['idmedida'];   
 $Cantidad=$_POST['cant_despacho']; 
 $fechaDespacho =$_POST['fechadespacho']; 
 $wkDespacho =$_POST['wk_despacho'];
 $fechaLlega =$_POST['fechallegada']; 
 $wkLlegada =$_POST['wk_llegada'];



 ActualizarDetalleDespacho($Cantidad, $wkDespacho, $wkLlegada, $fechaDespacho,$fechaLlega, $idMedida,$idproducto,$idDetalleDespacho );

 function ActualizarDetalleDespacho($Cantidad, $wkDespacho, $wkLlegada, $fechaDespacho,$fechaLlega, $idMedida,$idproducto,$idDetalleDespacho ){

    try {
        $conn = BaseDatos::getCon();
        $sql = " update despacho_det_orden
            set cantidad_despacho = $Cantidad,
            wk_despacho= $wkDespacho,
            wk_arribo= $wkLlegada,
            fecha_etd = '$fechaDespacho',
            fecha_eta ='$fechaLlega', 
            idmedida = $idMedida,
            idproducto = $idproducto
            where id_det_despacho = $idDetalleDespacho";
        sqlsrv_query($conn, $sql);    

        print "<script> alert('Registro Actualizado con Exito.!!'); window.location='../view/despacho_orden.php'; </script>";

    } catch (Throwable $th) {
        throw $th;
    }finally{
        sqlsrv_close($conn);
    }  
}


?>