<?php
require_once "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
?>

  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>&Oacuterdenes</h3>
              </div>              
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ingreso de &Oacuterdenes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>  
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>Formato B&aacutesico para la toma de &oacuterdenes recibidas por los clientes.</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Paso 1<br />
                                              <small>Detalle de &Oacuterden</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Paso 2<br />
                                              <small>Datos del Cliente</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Paso 3<br />
                                              <small>Estado del Pedido</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Paso 4<br />
                                              <small>Observaciones Finales</small>
                                          </span>
                          </a>
                        </li>
                      </ul>



 <!--INICIO DE ETAPA 1 -->
 <div id="step-1">
                        <form class="form-horizontal form-label-left" action="../model/ProductoDatos.php" method="post" novalidate>

                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Cliente <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                             
                            <select class="form-control" id="idempaque" name="idcliente">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from cliente";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_cliente'];?>"> <?php echo $valores['id_cliente']." - ".$valores['clien_compania'];?>  </option>';
     
     <?php } ?>
  </select>
                              
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nombre del Subcliente <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idempaque" name="idsubcliente">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from subcliente";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_subcliente'];?>"> <?php echo $valores['id_subcliente']." - ".$valores['nom_subcliente'];?>  </option>';
     
     <?php } ?>
  </select> 
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Id de &Oacuterden (Cliente)</label>
                            <div class="col-md-6 col-sm-6 ">
                              <input id="middle-name" class="form-control col" type="text" name="middle-name">
                            </div>
                          </div>              
                          
                            <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Id de &Oacuterden (Interno)</label>
                            <div class="col-md-6 col-sm-6 ">
                              <input id="middle-name" class="form-control col" type="text" name="middle-name">
                            </div>
                          </div>     
                          
                         

                          <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="fechaingreso" required='required'></div>
                                        </div>

                        </form>

                      </div> <!-- cierra div step1 -->




<!--INICIO DE ETAPA 1 -->

<div id="step-2">
                        <h2 class="StepTitle">Detalle del Pedido</h2>
                        
   <form class="form-horizontal form-label-left">
   <form class="" action="../model/DetalleOrdenDatos.php" method="post" novalidate>      
      <div class="form-group row">
           <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Selecionar el Producto <span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idproducto" name="idproducto">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from producto";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_producto'];?>"> <?php echo $valores['producto'];?>  </option>';
     
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
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from medida";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_medida'];?>"> <?php echo $valores['medida'];?>  </option>';
     
     <?php } ?>
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

<div class="form-group row">  
  <div class="col-md-6 col-sm-6 ">    
      <button type='submit' class="btn btn-primary">Cargar Datos</button>     
  </div>
</div>
</form>

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
                <th>ACCIONES</th>   
            </tr>
        </thead>
        <tbody>
           
        <?php 
            
            $conexion=BaseDatos::getCon();   
            $query = "select * from detalle_orden";
            $resultado = sqlsrv_query($conexion,$query);  

            while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
            ?>
        <tr>
            <td> <?php echo $fila['producto_id_producto'];  ?> </td>
            <td> <?php echo $fila['medida_id_medida'];  ?> </td>  
            <td> <?php echo $fila['cantidad_unidades'];  ?> </td>                
<td>          
<a href="new_orden.php?id=<?php echo $fila['id_detalleorden']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true" >Modificar</a>
 <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
</td>
        </tr>
        <?php  };?>                       
        </tbody>
        <tfoot>
            <tr>
                <th>PRODUCTO</th>
                <th>MEDIDAS</th>   
                <th>CANTIDAD</th>
                <th>ACCIONES</th>   
            </tr>
        </tfoot>
    </table>

            <!-- script de tabla-->

            <script src="js/jquery.dataTables.min.js"></script>
            <script src="js/dataTables.material.min.js"></script>
           
            <script>
            
                $(document).ready(function() {
                $('#tbempaque').DataTable( {                   
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
            
    

                      </div><!-- cierra div step2 -->





                     
    <!--INICIO DE ETAPA 3 -->
                      <div id="step-3">
                        <h2 class="StepTitle">Step 3 Content</h2>
                       
                        <form class="form-horizontal form-label-left">

<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="first-name" required="required" class="form-control  ">
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
  </div>
</div>
<div class="form-group row">
  <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name / Initial</label>
  <div class="col-md-6 col-sm-6 ">
    <input id="middle-name" class="form-control col" type="text" name="middle-name">
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
  <div class="col-md-6 col-sm-6 ">
    <div id="gender" class="btn-group" data-toggle="buttons">
      <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
        <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
      </label>
      <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
        <input type="radio" name="gender" value="female" class="join-btn"> Female
      </label>
    </div>
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input id="birthday" class="date-picker form-control" required="required" type="text">
  </div>
</div>


                      </div> <!-- cierra div step3 -->

                    </div>
                  
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
        <!-- /page content -->