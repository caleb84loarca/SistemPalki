<?php
 require_once "../controllers/BaseDatos.php"; 

 $idOrden = $_POST['orden'];
 $idEmbarque = $_POST['idembarque'];
 $Destino = $_POST['ord_destino'];
 $idEstado=$_POST['idestado'];
 $Observaciones=$_POST['observaciones'];   


 ActualizarOrden($idOrden, $idEmbarque, $Destino, $idEstado, $Observaciones );
 

 function ActualizarOrden($idOrden, $idEmbarque, $Destino, $idEstado, $Observaciones){
    $conn = BaseDatos::getCon();
    $sql = "UPDATE orden SET embarque_id_embarque = $idEmbarque,  ord_destino = '$Destino',
            estado_id_estado = $idEstado, observaciones = '$Observaciones' 
            where id_orden = $idOrden";
    sqlsrv_query($conn, $sql);    
 
    print "<script> alert('Registro Actualizado con Exito.!!'); window.location='../view/new_orden.php'; </script>";


}
  
