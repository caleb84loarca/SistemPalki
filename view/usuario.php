<?php require_once  "plantilla/plantilla_central.php";?> 

<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Tabla de Usuarios</h3>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12" align="center">
                            <div class="x_panel">

<table id="tbusuarios" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>TIPO DE USUARIO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>PUESTO</th>
                <th>FINCA</th>
                <th>CORREO ELECTRONICO</th>
                <th>TELEFONO</th>
                <th>FECHA DE INGRESO</th>
            </tr>
        </thead>
        <tbody>

<?php 
require_once "../controllers/BaseDatos.php";

$conexion =BaseDatos::getCon();

$sql = "Select t.tipo_usuario, concat(u.nombre1,' ',u.nombre2) as Nombres, concat(u.apellido1,' ',u.apellido2) as Apellidos, u.puesto,u.ubicacion, u.email,u.telefono, u.fecha_ingreso  from usuario as u
inner join tipo_usuario as t on t.id_tipousuario=u.tipo_usario_id_tipousuario";

$resultado= sqlsrv_query($conexion,$sql);

while($fila = sqlsrv_fetch_array($resultado)){

?>
            <tr>
                <td> <?php echo $fila['tipo_usuario'];?> </td>
                <td><?php echo $fila['Nombres'];?></td>
                <td><?php echo $fila['Apellidos'];?></td>
                <td><?php echo $fila['puesto'];?></td>
                <td><?php echo $fila['ubicacion'];?></td>
                <td> <?php echo $fila['email'];?></td>
                <td> <?php echo $fila['telefono'];?></td>
                <td> <?php echo $fila['fecha_ingreso'];?></td>
            </tr>

            <?php }; ?>          
        </tbody>
        <tfoot>
            <tr>
                <th>TIPO DE USUARIO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>PUESTO</th>
                <th>FINCA</th>
                <th>CORREO ELECTRONICO</th>
                <th>TELEFONO</th>
                <th>FECHA DE INGRESO</th>
            </tr>
        </tfoot>
    </table>

            <!-- script de tabla-->

            <script src="js/jquery.dataTables.min.js"></script>
            <script src="js/dataTables.material.min.js"></script>
           
            <script>
                $(document).ready(function() {
                $('#tbusuarios').DataTable( {
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
