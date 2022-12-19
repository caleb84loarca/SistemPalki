<?php
 require_once "../controllers/BaseDatos.php"; 


 $idReclamOrden = $_GET['id'];


 EliminarReclamOrden($idReclamOrden);

 function EliminarReclamOrden($idReclamOrden){
    try {
           $conn = BaseDatos::getCon();
           $sql = "update reclamos set id_estado = 8 ".           
            "where id_reclamo = $idReclamOrden";
    sqlsrv_query($conn, $sql);    
    } catch (Throwable $th) {
        throw $th;
    }finally{
        sqlsrv_close($conn);
    }
    
    print "<script> alert('Registro Elimando con Exito.!!'); window.location='../view/reclamo_orden.php'; </script>";


}
  