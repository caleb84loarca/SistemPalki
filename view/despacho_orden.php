<!--ENCABEZADO DE PLANILLA-->
<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once "../controllers/BaseDatos.php"; 
            
session_start();
$_SESSION['idusuario'];
?> 

 <!-- page content -->
             
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Despacho de &Oacuterden</h3>
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
  <form class="" action="../model/DespachoOrdenDatos.php" method="post" novalidate>             
               
                
  <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> &Oacuterden <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                             
                            <select class="form-control" id="idempaque" name="orden">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from orden";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_orden'];?>"> <?php echo $valores['ord_nombre'];?>  </option>';
     
     <?php } ?>
  </select>
                              
                            </div>
                          </div>

                          

           <div class="form-group row">
           <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Seleccionar el Producto <span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idproducto" name="idproducto">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from producto";
    
    /*$query="select p.producto, m.medida, do.cantidad_unidades, o.ord_nombre from detalle_orden as do
    inner join producto as p on p.id_producto=do.producto_id_producto
    inner join medida as m on m.id_medida=do.medida_id_medida
    inner join orden as o on o.id_orden=do.orden_id_orden
    where o.id_orden=".$valores['id_orden']; */

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
           <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Medida Despachada <span class="required">*</span>
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
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad Despachada <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="cant_despacho" required="required" class="form-control" name="cant_despacho">
  </div>
</div>


                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Despacho<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='date' type="date" name="fechadespacho" required='required'></div>
                                   </div>            


                                   <div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Semana de Despacho <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="wk_despacho" required="required" class="form-control" name="wk_despacho" value="<?php echo date("W");?>">
  </div>
</div>

<div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Llegada<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6">
                                      <input class="form-control" class='date' type="date" name="fechallegada" required='required'></div>
                                   </div>            


<div class="form-group row">
  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Semana de Llegada <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 ">
    <input type="text" id="wk_despacho" required="required" class="form-control" name="wk_llegada" value="<?php echo date("W");?>">
  </div>
</div>


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
                            <h3>Despacho de &Oacuterdenes (Detalle)</h3>
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
                <th>ORDEN INTERNA</th>
                <th>PRODUCTO</th>   
                <th>MEDIDA</th>  
                <th>UND. DESPACHADA</th>                  
                <th>SEMANA DESPACHO</th>
                                    
                <th>ACCIONES</th>   
            </tr>
        </thead>
        <tbody>
           
        <?php 
            
            $conexion=BaseDatos::getCon();   
            $query = "select o.ord_nombre,p.producto, m.medida, format(ddo.cantidad_despacho,'#,0')as despacho, ddo.wk_despacho from despacho_det_orden as ddo
            inner join orden as o on o.id_orden=ddo.id_orden
            inner join producto as p on p.id_producto=ddo.idproducto
            inner join medida as m on m.id_medida=ddo.idmedida
            ";
            $resultado = sqlsrv_query($conexion,$query);  

            while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
            ?>
        <tr>
            <td> <?php echo $fila['ord_nombre'];  ?> </td>
            <td> <?php echo $fila['producto'];  ?> </td>  
            <td> <?php echo $fila['medida'];  ?> </td>        
            <td> <?php echo $fila['despacho'];  ?> </td>    
            <td> <?php echo $fila['wk_despacho'];  ?> </td>
           
                            
<td>          
<a href="new_orden.php?id=<?php echo $fila['id_detalleorden']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true" >Modificar</a>
 <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
</td>
        </tr>
        <?php  };?>                       
        </tbody>
        <tfoot>
            <tr>
                <th>ORDEN INTERNA</th>
                <th>PRODUCTO</th>   
                <th>MEDIDA</th>  
                <th>UND. DESPACHADA</th>                  
                <th>SEMANA DESPACHO</th>
                                       
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
           


  
 <!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->


