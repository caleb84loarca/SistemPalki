<!--ENCABEZADO DE PLANILLA-->
<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";


#session_start();
$_SESSION['idusuario'];
$DetalleReclamo = MostrarReclamo($_GET['id']);

function MostrarReclamo($valor)
{
    try {
        $base = new BaseDatos();
        $conexion = $base->getCon();
        $sql = "select rec.id_reclamo, c.clien_compania as cliente, sc.nom_subcliente,  o.ord_nombre, datepart(YEAR, rec.fecha_reclamo) as ANIO, DATEPART(ISO_WEEK, rec.fecha_reclamo) as semana_reclamo, p.producto, m.medida,  rec.cantidad_reclamada, rec.id_estado, rec.reclamo  from reclamos as rec
     inner join orden as o on o.id_orden = rec.orden_id_orden
     inner join medida as m on m.id_medida = rec.id_medida
     inner join producto as p on p.id_producto = rec.id_producto
     inner join cliente as c on c.id_cliente = o.cliente_id_cliente
     inner join subcliente as sc on sc.id_subcliente = o.subcliente_id_subcliente
     where rec.id_reclamo=$valor and rec.id_estado=7";

        $resultado = sqlsrv_query($conexion, $sql);
        $filas = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
    } catch (Throwable $th) {
        echo "<script> alert('Error en: $th');</script>";
    } finally {
        sqlsrv_close($conexion);
    }

    return $filas;
}


?>

<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modificar Reclamo de &Oacuterden</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informaci&oacuten</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="../model/Modif_ReclamoDatos.php" method="post" novalidate>

                            <div class="form-group row">
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="hidden" id="idReclamo" class="form-control" name="idReclamo" value="<?php echo $DetalleReclamo['id_reclamo']; ?>">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Seleccionar Cliente <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <input id="nomCliente" class="form-control" name="nomCliente" value="<?php echo $DetalleReclamo['cliente']; ?>" disabled>

                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> &Oacuterden <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="nomCliente" class="form-control" name="nomCliente" value="<?php echo $DetalleReclamo['ord_nombre']; ?>" disabled>

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Producto / Articulo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">

                                    <input id="nomCliente" class="form-control" name="nomCliente" value="<?php echo $DetalleReclamo['producto']; ?>" disabled>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Medida Despachada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="nomCliente" class="form-control" name="nomCliente" value="<?php echo $DetalleReclamo['medida']; ?>" disabled>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad Reclamada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="cantReclamo" required="required" class="form-control" name="cantReclamo" value="<?php echo $DetalleReclamo['cantidad_reclamada']; ?>">
                                </div>
                            </div>


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Reclamo<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="fechaReclamo" id="fechaReclamo" required='required'>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Detalle de Reclamo</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control col" rows="5" cols="50" id="reclamo" name="reclamo"><?php echo $DetalleReclamo['reclamo']; ?></textarea>
                                </div>
                            </div>



                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <br>
                                        <button type='submit' class="btn btn-primary">Actualizar</button>
                                        <button type='reset' class="btn btn-success" >Cancelar</button>
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
    <div class="form-group row" aling="right">
        <div class="col-md-6 col-sm-6 ">
            <a class="btn btn-secondary" href="reclamo_orden.php" role="button">Regresar</a>
        </div>
    </div>

</div>
<br>
