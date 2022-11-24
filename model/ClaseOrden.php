<?php
   require_once("../controllers/BaseDatos.php");

class ClaseOrdenes
{
    
   
    public function __construct(){}

    function DatosOrden( $idOrden )
    {        
        $query = "select o.id_orden, o.ord_nombre, o.fecha_orden, o.fecha_ordcliente, c.clien_compania, e.estado, em.embarque from orden as o
        inner join cliente as c on c.id_cliente= o.cliente_id_cliente
        inner join estado_orden as e on e.id_estado = o.estado_id_estado
        inner join embarque as em on em.id_embarque = o.embarque_id_embarque
         where id_orden=$idOrden";


    }







}

?>