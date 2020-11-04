<!--ENCABEZADO DE PLANILLA-->
<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once "../controllers/BaseDatos.php"; 
require_once "../model/OrdenDatos.php"; 
            
session_start();
$_SESSION['idusuario'];
$mostrar = mostrarorden($_GET['id']);

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
                                    <h2>Formulario para Modificar &Oacuterden</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
  <form class="" action="../model/OrdenDatos.php" method="post" novalidate>             
               
  <input id="middle-name" class="form-control col" type="hidden" name="orden" value="<?php echo $mostrar[0];?>" >                       
                           
                
  <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Cliente <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" class="form-control col" type="text" name="orden" value="<?php echo $mostrar[1];?>" disabled >                       
                              
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nombre del Subcliente <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">

                            <input id="middle-name" class="form-control col" type="text" name="orden" value="<?php echo $mostrar[2];?>" disabled>   
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Id de &Oacuterden (Cliente)</label>
                            <div class="col-md-6 col-sm-6 ">
                              <input id="middle-name" class="form-control col" type="text" name="ordencliente" value="<?php echo $mostrar[3];?>" disabled>
                            </div>
                          </div>              
                          
                            <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Id de &Oacuterden (Interno)</label>
                            <div class="col-md-6 col-sm-6 ">
                              <input id="middle-name" class="form-control col" type="text" name="ordeninterno" value="<?php echo $mostrar[4];?>" >
                            </div>
                          </div>     
                          
                         

                          <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Destino de &Oacuterden (Pa&iacutes)</label>
                            <div class="col-md-6 col-sm-6 ">
                              <input id="middle-name" class="form-control col" type="text" name="ord_destino" value="<?php echo $mostrar[5];?>">
                            </div>
                          </div>     

                        

                          <div class="form-group row">
           <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tipo de Embarque <span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idembarque" name="idembarque">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from embarque";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_embarque'];?>"> <?php echo $valores['embarque'];?>  </option>';
     
     <?php } ?>
  </select> 
              </div>
                </div>

                <div class="form-group row">
           <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Estado de Orden <span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idestado" name="idestado">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from estado_orden";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_estado'];?>"> <?php echo $valores['estado'];?>  </option>';
     
     <?php } ?>
  </select> 
              </div>
                </div>

                <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Observaciones</label>
                            <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control col" rows="5" cols="50" id="observaciones" name="observaciones" value=""><?php echo $mostrar[6];?></textarea>                             
                            </div>
                          </div>     
               

                          <input  class="form-control col" type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario'];?>" disable>
                                                                                                           
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <br>
                                                    <button type='submit' class="btn btn-primary">Actualizar</button>
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


<script> window.onload = document.getElementById('observaciones').select(); </script>
           

            

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
            
            $conexion=BaseDatos::getCon();   
            $query = "select o.id_orden, o.ord_nombre, o.ord_nombreclie, eo.estado, o.fecha_orden, o.fecha_ordcliente, c.clien_compania, 
            sc.nom_subcliente, o.ord_destino, e.embarque, o.observaciones from orden as o
            inner join estado_orden as eo on  eo.id_estado=o.estado_id_estado
            inner join embarque as e on e.id_embarque=o.embarque_id_embarque
            inner join cliente as c on c.id_cliente=o.cliente_id_cliente
            inner join subcliente as sc on sc.id_subcliente = o.subcliente_id_subcliente
            ";
            $resultado = sqlsrv_query($conexion,$query);  

            while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
            ?>
        <tr>
            <td> <?php echo $fila['ord_nombre'];  ?> </td>
            <td> <?php echo $fila['ord_nombreclie'];  ?> </td>  
            <td> <?php echo $fila['estado'];  ?> </td> 
            <td> <?php echo $fila['clien_compania'];  ?> </td>  
            <td> <?php echo $fila['nom_subcliente'];  ?> </td>   
            <td> <?php echo $fila['ord_destino'];  ?> </td>   
            <td> <?php echo $fila['embarque'];  ?> </td>   
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

