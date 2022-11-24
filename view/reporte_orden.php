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
                        <div class="col-md-12 col-sm-12">
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
  <form class="" action="../model/ReporteOrdenData.php" method="post" novalidate>             
               
                
  <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Cliente <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                             
                            <select class="form-control" id="idcliente" name="idcliente">
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
                          
                              <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden (Inicial)<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="fechaingreso" required='required'></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de &Oacuterden (Final)<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="fechafinal" required='required'></div>
                                        </div>

               

                          <input  class="form-control col" type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario'];?>" disable>
                                                                                                           
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <br>
                                                    <button type='submit' class="btn btn-primary">Registrar</button>
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
                            <h3>&Oacuterdenes Cargadas</h3>
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
                <th>ORDEN INTERNO</th>
                <th>ORDEN SEGUN CLIENTE</th>   
                <th>STATUS DE ORDEN</th>                 
                <th>CLIENTE</th>  
                <th>SUBCLIENTE</th> 
                <th>ORDEN DE DESTINO</th> 
                <th>TIPO DE EMBARQUE</th> 
                <th>OBSERVACIONES</th> 
                <th>ACCIONES</th>   
            </tr>
        </thead>
        <tbody>
           
        <?php 
            
            $conn = BaseDatos::getCon();
            $sql = "select * from orden
            where fecha_orden between '".$fechaingreso."' and '".$fechafinal."' and cliente_id_cliente=".$idcliente;
            $resultado = sqlsrv_query($conn,$sql) or die(sqlsrv_error()); 
            $fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
       
             return [
                $fila['cliente_id_cliente'],
                $fila['ord_destino']
                ];


            $conexion=BaseDatos::getCon();   
            $query = "select * from orden";
            $resultado = sqlsrv_query($conexion,$query);  

            while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
            ?>
        <tr>
            <td> <?php echo $fila['ord_nombre'];  ?> </td>
            <td> <?php echo $fila['ord_nombreclie'];  ?> </td>  
            <td> <?php echo $fila['estado_id_estado'];  ?> </td> 
            <td> <?php echo $fila['cliente_id_cliente'];  ?> </td>  
            <td> <?php echo $fila['subcliente_id_subcliente'];  ?> </td>   
            <td> <?php echo $fila['ord_destino'];  ?> </td>   
            <td> <?php echo $fila['embarque_id_embarque'];  ?> </td>   
            <td> <?php echo $fila['observaciones'];  ?> </td>   
             
<td>          
<a href="new_orden.php?id=<?php echo $fila['id_orden']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true" >Modificar</a>
 <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
</td>
        </tr>
        <?php  };?>                       
        </tbody>
        <tfoot>
            <tr>
                <th>ORDEN INTERNO</th>
                <th>ORDEN SEGUN CLIENTE</th>   
                <th>STATUS DE ORDEN</th>
                <th>CLIENTE</th>
                <th>SUBCLIENTE</th>
                <th>ORDEN DE DESTINO</th> 
                <th>TIPO DE EMBARQUE</th> 
                <th>OBSERVACIONES</th> 
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
               
                 

  
 <!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->

