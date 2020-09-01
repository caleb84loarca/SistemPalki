<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once  "controllers/BaseDatos.php"; 
?> 

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

<table id="tbusuario" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Puestos</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
        </thead>
        
        <tbody>

            <?php 
            $conexion = Conectarbd();
            $sql = "Select * from usuario";
            $result = mysqli_query($conexion,$sql);

            while ($mostrar = $result->fetch_array()) {                
           
         ?>
            <tr>
                <td><?php echo $mostrar['idsuario']; ?></td>
                <td><?php echo $mostrar['primernombre']." ".$mostrar['segundonombre']; ?></td>
                <td><?php echo $mostrar['primerapellido']." ".$mostrar['segundoapellido']; ?></td>
                <td><?php echo $mostrar['puesto']; ?></td>
                <td><?php echo $mostrar['correo']; ?></td>
                <td><?php echo $mostrar['telefono']; ?></td>
            </tr>
        <?php } ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Id Usuario</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Puestos</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
        </tfoot>
    </table>

            <!-- script de tabla-->

            <script src="js/jquery.dataTables.min.js"></script>
            <script src="js/dataTables.material.min.js"></script>
           
            <script>
                $(document).ready(function() {
                $('#tbusuario').DataTable( {
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
