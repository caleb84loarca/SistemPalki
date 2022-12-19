<?php
 require_once "../controllers/BaseDatos.php"; 

 $idReclamoOrden = $_POST['idReclamo'];
 $cantidadReclamada = $_POST['cantReclamo'];
 $reclamo = $_POST['reclamo'];
 
 

 ActualizarReclamoOrden($idReclamoOrden, $cantidadReclamada, $reclamo );
 

 function ActualizarReclamoOrden($idReclamoOrden, $cantidadReclamada, $reclamo ){
    try {
        $conn = BaseDatos::getCon();
        $sql = "update reclamos
            set cantidad_reclamada= $cantidadReclamada, reclamo = '$reclamo'
            where id_reclamo = $idReclamoOrden ";
        sqlsrv_query($conn, $sql);    

    } catch (Throwable $th) {
        throw $th;
    }finally{
        sqlsrv_close($conn);   

    }     
    print "<script> alert('Registro Actualizado con Exito.!!'); window.location='../view/detalle_reclamo.php?idreclamo=$idReclamoOrden'; </script>";
 
}

?>
