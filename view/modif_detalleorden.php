<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
require_once "../model/OrdenDatos.php";
#session_start();

$base = new BaseDatos();

#session_start();
$_SESSION['idusuario'];
$DetalleOrdenLinea = MostrarDetalleOrd($_GET["idDetalle"]);
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modificar Detalle de &Oacuterden</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Formulario para Modificar Informacion del Pedido</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="../model/Modif_detalleOrdenDatos.php" method="POST" novalidate>

                            <div class="form-group row" >                               
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="hidden" id="idDetalleOrden" class="form-control" name="idDetalleOrden" value="<?php echo $DetalleOrdenLinea[0]; ?>">
                                </div>
                            </div>         

                            <div class="form-group row" >                               
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="hidden" id="idOrden" class="form-control" name="idOrden" value="<?php echo $DetalleOrdenLinea[8]; ?>">
                                </div>
                            </div>      

                         

                             <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado<span class="denied">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="estado" class="form-control" name="estado" value="<?php echo $DetalleOrdenLinea[1]; ?>" disabled>
                                </div>
                            </div>                          

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Subcliente<span class="denied">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cantidad" class="form-control" name="cantidad" value="<?php echo $DetalleOrdenLinea[2]; ?>" disabled>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Selecionar el Producto <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idproducto" name="idproducto" onclick="CargaMedida(this.value);" >
                                        <option value="<?php echo $DetalleOrdenLinea[3]; ?>" selected> <?php echo $DetalleOrdenLinea[4]; ?>  </option>;
                                        <?php

                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select * from producto";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value="<?php echo $valores['id_producto']; ?>"> <?php echo $valores['producto']; ?> </option>'

                                        <?php } ?>
                                    </select>

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Medida Requerida <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <select class="form-control" id="idmedida" name="idmedida">
                                        <option value="<?php echo $DetalleOrdenLinea[6]; ?>" selected> <?php echo $DetalleOrdenLinea[7]; ?>  </option>
                                        <?php
                                        $base = new BaseDatos();
                                        $conexion = $base->getCon();
                                        $query = "select id_medida, medida from medida";
                                        $resultado = sqlsrv_query($conexion, $query);
                                        while ($valores = sqlsrv_fetch_array($resultado)) {
                                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                        ?>
                                            <option value=" <?php echo $valores['id_medida']; ?>"> <?php echo $valores['medida']; ?> </option>';

                                        <?php } ?>



                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad Solicitada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cantidad" required="required" class="form-control" name="cantidad" value="<?php echo $DetalleOrdenLinea[5]; ?>">
                                </div>
                            </div>



                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Registrar Actualizaci&oacuten</button>
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
    function ObtenerIdCliente(int) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById('idsubcliente').innerHTML = this.responseText;

        }

        xhttp.open("GET", "../model/ClienteDatos.php?Cliente=" + int);

        xhttp.send();

    }

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

</script>









<!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->