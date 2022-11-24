<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
include_once "../model/OrdenDatos.php";

#session_start();
$_SESSION['idusuario'];
$mostrar = MostrarOrden($_GET['idOrden']);

?>

<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modificar Datos de &Oacuterden</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Formulario para Actualizar &Oacuterden</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="../model/Modif_ordenDatos.php" method="post" novalidate>

                            <input id="middle-name" class="form-control col" type="hidden" name="orden" value="<?php echo $mostrar[0]; ?>">


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Cliente <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control col" type="text" name="orden" value="<?php echo $mostrar[1]; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nombre del Subcliente <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <input id="middle-name" class="form-control col" type="text" name="orden" value="<?php echo $mostrar[2]; ?>" disabled>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Id de &Oacuterden (Cliente)</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control col" type="text" name="ordencliente" value="<?php echo $mostrar[3]; ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Id de &Oacuterden (Interno)</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control col" type="text" name="ordeninterno" value="<?php echo $mostrar[4]; ?>">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Destino de &Oacuterden (Pa&iacutes)</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control col" type="text" name="ord_destino" value="<?php echo $mostrar[5]; ?>">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tipo de Embarque <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idembarque" name="idembarque">
                                        <option value="<?php echo $mostrar[8] ?>"> <?php echo $mostrar[9] ?> </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select * from embarque";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_embarque']; ?>"> <?php echo $valores['embarque']; ?> </option>';

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Estado de Orden <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idestado" name="idestado">
                                        <option value="<?php echo $mostrar[6] ?>"> <?php echo $mostrar[7] ?> </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select * from estado_orden";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_estado']; ?>"> <?php echo $valores['estado']; ?> </option>';

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Observaciones</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control col" rows="5" cols="50" id="observaciones" name="observaciones" value=""><?php echo $mostrar[10]; ?></textarea>
                                </div>
                            </div>


                            <input class="form-control col" type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>" disable>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Actualizar</button>
                                        <button type='reset' class="btn btn-success">Limpiar Formulario</button>
                                        <button type='button' class="btn btn-danger" onClick="location.href='new_orden.php'">Cancelar</button> 
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.onload = document.getElementById('observaciones').select();
</script>

<!-- script de tabla-->

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.material.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tbempaque').DataTable({
            autoWidth: false,
            columnDefs: [{
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            }]
        });
    });
</script>
<!-- cierre script de tabla-->


<!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->