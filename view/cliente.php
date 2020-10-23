<?php require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php"; 
session_start();

?> 

<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Tabla de Clientes</h3>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12" align="center">
                            <div class="x_panel">

<table id="tbclientes" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>ID CLIENTE</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>COMPAÑIA</th>
                <th>DIRECCION</th>
                <th>PAIS</th>
                <th>CORREO / EMAIL</th>
                <th>TELEFONOS</th>
                <th>FECHA REGISTRO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php                
                $conexion= BaseDatos::getCon();
$sql ="Select c.id_cliente, concat(c.clien_nom1,' ',c.clien_nom2) as Nombres, concat(c.clien_ape1,' ',c.clien_ape2) as Apellidos, c.clien_compania,c.clien_direccion, p.nombre_pais, c.clien_correo, concat(c.clien_tel1,'; ',c.clien_tel2,'; ',c.clien_tel3) AS telefonos, c.fecha_ingreso from cliente as c inner join pais as p on p.id_pais=c.pais_id_pais";
                
               
                $resultado = sqlsrv_query($conexion,$sql);

                while($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC) ){

             ?>
            <tr>
                <td> <?php echo $fila['id_cliente'];   ?> </td>
                <td> <?php echo $fila['Nombres'];      ?> </td>
                <td> <?php echo $fila['Apellidos'];    ?> </td>
                <td> <?php echo $fila['clien_compania'];  ?> </td>
                <td> <?php echo $fila['clien_direccion']; ?> </td>
                <td> <?php echo $fila['nombre_pais'];  ?> </td>                
                <td> <?php echo $fila['clien_correo']; ?> </td>
                <td> <?php echo $fila['telefonos'];    ?> </td>              
                <td> <?php echo $fecha = $fila['fecha_ingreso']->format('d/m/yy');  ?> </td>  
                
<td>          
<a href="#" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>

</td>             
            </tr>
          
                <?php }; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID CLIENTE</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>COMPAÑIA</th>
                <th>DIRECCION</th>
                <th>PAIS</th>
                <th>CORREO / EMAIL</th>
                <th>TELEFONOS</th>
                <th>FECHA REGISTRO</th>
                <th>ACCIONES</th>
            </tr>
        </tfoot>
    </table>

            <!-- script de tabla-->

            <script src="js/jquery.dataTables.min.js"></script>
            <script src="js/dataTables.material.min.js"></script>
           
            <script>
                $(document).ready(function() {
                $('#tbclientes').DataTable( {
                    autoWidth: false,
                    columnDefs: [
                        {
                            targets: ['_all'],
                            className: 'mdc-data-table__cell'
                        }
                    ]
                } );
            } );
            </script>
            <!-- cierre script de tabla-->

                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="ln_solid"></div>
