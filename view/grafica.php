
<?php 
require_once "../controllers/BaseDatos.php";
//require_once "../view/plantilla/plantilla_central.php";
$conn = BaseDatos::getCon();

    $query="select m.medida, format(ddo.cantidad_despacho,'#,0')as despacho from despacho_det_orden as ddo
    inner join orden as o on o.id_orden=ddo.id_orden
    inner join medida as m on m.id_medida=ddo.idmedida order by m.medida";

    $result= sqlsrv_query($conn,$query);

    $valorY=array();//despacho
    $valorX=array();//medida

    while($fila = sqlsrv_fetch_array($result)){
        $valoresY[]=$fila[1];
        $valoresx[]=$fila[0];
    }

    $datosx=json_encode($valoresx);
    $datosy=json_encode($valoresY);
?>

<div id="grafica"></div>    

<script type="text/javascript">
    function crearCadenaLinea(json){
        var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed){
                arr.push(parsed[x]);
            }

            return arr;  
    }
</script>

<script type="text/javascript">
    datosX =crearCadenaLinea('<?php echo $datosx;?>');
    datosY =crearCadenaLinea('<?php echo $datosy;?>');

    var trace1 = {
        x: datosX,
        y: datosY,
  //type: 'scatter'
  type: 'bar'

};   
    var data = [trace1];
    
    Plotly.newPlot('grafica', data);

 </script>


