<!--ENCABEZADO DE PLANILLA-->
<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once "../controllers/BaseDatos.php"; 
require_once "../model/MedidaDatos.php";
            
session_start();
?> 

 <!-- page content -->
             
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Ingresar Nuevas Medias/Alturas</h3>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Informacion de Medida/Altura de Planta</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
  <form class="" action="../model/MedidaDatos.php" method="post" novalidate>             
               
                  <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Ingresar Medida <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6">
                           <input class="form-control" data-validate-words="1" name="medida" placeholder="ex. 20 cm" required="required" />
                         </div>
                   </div>

                   <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Aplicar a Producto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idempaque" name="idproducto">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from producto";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value=" <?php echo $valores['id_producto'];?>"> <?php echo $valores['id_producto']." - ".$valores['producto'];?>  </option>';
     
     <?php } ?>
  </select> 
                            


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
                            <h3>Listado de Medidas/Alturas Actuales a Productos</h3>
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

<table id="tbempaque" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>ID MEDIDA</th>
                <th>MEDIDA DE PRODUCTO</th> 
                <th>ASIGNADO A PRODUCTO</th>                 
                <th>ACCIONES</th>              
               
            </tr>
        </thead>
        <tbody>
           
        <?php 
            
            $conexion=BaseDatos::getCon();   
            $query = "select m.id_medida, m.medida, p.producto from medida as m
            inner join producto as p on p.id_producto=m.producto_id_producto;
            ";
            $resultado = sqlsrv_query($conexion,$query);  

            while ($fila = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
            ?>
        <tr>
            <td> <?php echo $fila['id_medida'];  ?> </td>
            <td> <?php echo $fila['medida'];  ?> </td>  
            <td> <?php echo $fila['producto'];  ?> </td>                  
<td>          
<a href="modif_medida.php?id=<?php echo $fila['id_medida']; ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true" >Modificar</a>
 <!-- <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>  -->
</td>
        </tr>
        <?php  };?>                       
        </tbody>
        <tfoot>
            <tr>
                <th>ID MEDIDA</th>
                <th>MEDIDA DE PRODUCTO</th> 
                <th>ASIGNADO A PRODUCTO</th>                 
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
            </div>



  
 <!-- /page content -->
<!--PIE DE PAGINA DE PLANILLA-->

