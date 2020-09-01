<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once  "controllers/BaseDatos.php"; 
require_once  "model/UsuarioDatos.php"; 

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
        <thead class="text-center">
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
                $con = new BaseDatos();
                $conexion = $con->Conectarbd();

                $sql = "Select * from usuario";

                $resultado = $conexion->prepare($sql);
                $resultado->execute();
                $usuarios = $resultado->fetchALL(PDO::FETCH_ASSOC);

                
                foreach ($usuarios as $usuario) {                        
           
         ?>
            <tr>
                <td><?php echo $usuario['idsuario']; ?></td>
                <td><?php echo $usuario['primernombre']." ".$mostrar['segundonombre']; ?></td>
                <td><?php echo $usuario['primerapellido']." ".$mostrar['segundoapellido']; ?></td>
                <td><?php echo $usuario['puesto']; ?></td>
                <td><?php echo $usuario['correo']; ?></td>
                <td><?php echo $usuario['telefono']; ?></td>
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
