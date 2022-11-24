<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";

#session_start();
?>

<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Asignar Detalle de &Oacuterden</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informacion del Pedido</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="../model/DetalleOrdenDatos.php" method="post" novalidate>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> &Oacuterden <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idOrden" name="orden">
                                        <option value="0"> Seleccionar de la lista </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select id_orden, ord_nombre from orden order by id_orden desc";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_orden']; ?>"> <?php echo $valores['ord_nombre']; ?> </option>';

                                        <?php } ?>
                                    </select>

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Selecionar el Producto <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idproducto" name="idproducto" onchange="CargaMedida(this.value);" >
                                        <option value="0"> Seleccionar de la lista </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select * from producto";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_producto']; ?>"> <?php echo $valores['producto']; ?> </option>';

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Medida Requerida <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idmedida" name="idmedida">
                                        <option value="0"> Seleccionar de la lista </option>;
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad a Solicitar <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cantidad" required="required" class="form-control" name="cantidad">
                                </div>
                            </div>



                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary" onclick="Alerta();">Registrar</button>
                                        <button type='reset' class="btn btn-success">Limpiar Formulario</button>
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







<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>L&iacuteneas Cargadas en Detalle</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12" align="center">
                <div class="x_panel">

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tabla de Datos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="tbempaque" class="mdl-data-table" style="width:100%" table-condensed>
                                        <thead>
                                            <tr>
                                                <th>PRODUCTO</th>
                                                <th>MEDIDAS</th>
                                                <th>CANTIDAD</th>
                                                <th>SUBCLIENTE</th>
                                                <th>ESTADO DE ORDEN</th>
                                                <th>ORDEN INTERNA</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $conexion = BaseDatos::getCon();
                                            $query = " select do.id_detalleorden, p.producto, m.medida, do.cantidad_unidades, e.estado, sub.nom_subcliente, o.ord_nombre, e.id_estado from detalle_orden as do
                                            inner join producto as p on p.id_producto=do.producto_id_producto
                                            inner join medida as m on m.id_medida=do.medida_id_medida
                                            inner join orden as o on o.id_orden=do.orden_id_orden
                                            inner join subcliente as sub on sub.id_subcliente=o.subcliente_id_subcliente
                                            inner join estado_orden as e on e.id_estado = o.estado_id_estado
                                            where e.id_estado <>8 and e.estado<>'ANULADO' ";
                                            $resultado = sqlsrv_query($conexion, $query);

                                            while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td> <?php echo $fila['producto'];  ?> </td>
                                                    <td> <?php echo $fila['medida'];  ?> </td>
                                                    <td> <?php echo $fila['cantidad_unidades'];  ?> </td>
                                                    <td> <?php echo $fila['nom_subcliente'];  ?> </td>
                                                    <td> <?php echo $fila['estado'];  ?> </td>
                                                    <td> <?php echo $fila['ord_nombre'];  ?> </td>
                                                    <td>
                                                        <a href="../model/Modif_detalleOrdenDatos.php?id=<?php echo $fila['id_detalleorden']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>
                                                        <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php  }; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>PRODUCTO</th>
                                                <th>MEDIDAS</th>
                                                <th>CANTIDAD</th>
                                                <th>SUBCLIENTE</th>
                                                <th>ESTADO DE ORDEN</th>
                                                <th>ORDEN INTERNA</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </tfoot>
                                    </table>

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


                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        
                        function CargaMedida(idPlanta)
                        {
                            const xhtml = new XMLHttpRequest();
                            xhtml.onload = function()
                            {
                                document.getElementById("idmedida").innerHTML = this.responseText;
                                
                            }
                            xhtml.open("GET", "../model/ObtenerMedidaPlanta.php?idPlanta="+idPlanta);
                            xhtml.send();

                        }

                        function Alerta(){
                            alert("Registro agregado a la Orden con éxito.!!");
                        }

                    </script>



                    <!-- /page content -->
                    <!--PIE DE PAGINA DE PLANILLA-->