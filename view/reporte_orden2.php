  <!--ENCABEZADO DE PLANILLA-->
  <?php
    require_once  "plantilla/plantilla_central.php";
    require_once "../controllers/BaseDatos.php";

    #session_start();
    $_SESSION['idusuario'];
    ?>

  <!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="page-title">
              <div class="title_left">
                  <h3>Ingresar Datos de &Oacuterden</h3>
              </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">

                      <div class="x_title">
                          <h2>Reporte de &Oacuterdenes por Fecha</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>

                      <div class="x_content">

                          <!-- Smart Wizard -->
                          <p>Seleccionar al cliente y luego el rango de fechas en las cuales necesita visualizar las ordenes.</p>
                          <div id="wizard" class="form_wizard wizard_horizontal">
                              <ul class="wizard_steps">
                                  <li>
                                      <a href="#step-1">
                                          <span class="step_no">1</span>
                                          <span class="step_descr">
                                              Paso 1<br />
                                          </span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#step-2">
                                          <span class="step_no">2</span>
                                          <span class="step_descr">
                                              Paso 2<br />
                                              <!--  <small>Step 2 description</small> -->
                                          </span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#step-3">
                                          <span class="step_no">3</span>
                                          <span class="step_descr">
                                              Paso 3<br />

                                          </span>
                                      </a>
                                  </li>
                              </ul>


                              <div id="step-1">

                                  <form class="" action="../model/ReporteOrdenData.php" method="post" novalidate>


                                      <div class="form-group row">
                                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Cliente <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 ">

                                              <select class="form-control" id="idcliente" name="idcliente">
                                                  <option value="0"> Seleccionar de la lista </option>;
                                                  <?php

                                                    $base = new BaseDatos();
                                                    $conexion = $base->getCon();
                                                    $query = "select * from cliente";
                                                    $resultado = sqlsrv_query($conexion, $query);
                                                    while ($valores = sqlsrv_fetch_array($resultado)) {
                                                        // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                                    ?>
                                                      <option value="<?php echo $valores['id_cliente']; ?>"> <?php echo $valores['clien_compania']; ?> </option>';

                                                  <?php };
                                                    sqlsrv_close($conexion); ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden (Inicial)<span class="required">*</span></label>
                                          <div class="col-md-6 col-sm-6">
                                              <input class="form-control" class='date' type="date" name="fechaingreso" required='required'>
                                          </div>
                                      </div>

                                      <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden (Final)<span class="required">*</span></label>
                                          <div class="col-md-6 col-sm-6">
                                              <input class="form-control" class='date' type="date" name="fechafinal" required='required'>
                                          </div>
                                      </div>

                                      <input class="form-control col" type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>" disable>

                                  </form>

                              </div>


                              <div id="step-2">
                                  <div class="x_panel">
                                      <div class="x_title">
                                          <h2>Tabla de Datos</h2>

                                          <ul class="nav navbar-right panel_toolbox">
                                              <!--    <button id="exporttable" class="btn btn-success"> <i class="fa fa-file-excel-o"></i> Excel </button></a>
                                                     <button id="exportpdf" class="btn btn-info"> <i class="fa fa-file-pdf-o"></i> PDF </button></a>     -->
                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                              </li>
                                          </ul>

                                          <div class="clearfix"></div>

                                      </div>
                                      <div class="x_content" id="TablaOrden">

                                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%" table-condensed>
                                              <thead>
                                                  <tr>
                                                      <th>ORDEN INTERNO</th>
                                                      <th>ORDEN SEGUN CLIENTE</th>
                                                      <th>STATUS DE ORDEN</th>
                                                      <th>ACCIONES</th>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                                  <?php

                                                    $conexion = BaseDatos::getCon();
                                                    $query = "select o.id_orden, o.ord_nombre, o.ord_nombreclie, eo.estado, o.fecha_orden, o.fecha_ordcliente, c.clien_compania, 
                                                sc.nom_subcliente, o.ord_destino, e.embarque, o.observaciones from orden as o
                                                inner join estado_orden as eo on  eo.id_estado=o.estado_id_estado
                                                inner join embarque as e on e.id_embarque=o.embarque_id_embarque
                                                inner join cliente as c on c.id_cliente=o.cliente_id_cliente
                                                inner join subcliente as sc on sc.id_subcliente = o.subcliente_id_subcliente
                                                where eo.estado <>'ANULADO' ";
                                                    $resultado = sqlsrv_query($conexion, $query);

                                                    while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
                                                    ?>
                                                      <tr>
                                                          <td> <?php echo $fila['ord_nombre'];  ?> </td>
                                                          <td> <?php echo $fila['ord_nombreclie'];  ?> </td>
                                                          <td> <?php echo $fila['estado'];  ?> </td>


                                                          <td>
                                                              <a href="detalle_orden.php?idOrden=<?php echo $fila['id_orden']; ?>" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Ver Detalle</a>

                                                              <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
                                                          </td>
                                                      </tr>
                                                  <?php  };
                                                    sqlsrv_close($conexion); ?>
                                              </tbody>
                                              <tfoot>
                                                  <tr>
                                                      <th>ORDEN INTERNO</th>
                                                      <th>ORDEN SEGUN CLIENTE</th>
                                                      <th>STATUS DE ORDEN</th>
                                                      <th>ACCIONES</th>
                                                  </tr>
                                              </tfoot>
                                          </table>

                                      </div>
                                  </div>

                              </div>



                              <div id="step-3">
                                  <h2 class="StepTitle">Step 3 Content</h2>
                                  <p>
                                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                      eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                  </p>
                                  <p>
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                      in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                  </p>
                              </div>

                          </div>
                          <!-- End SmartWizard Content -->


                          <br>
                          <br>

                          <!-- /page content -->