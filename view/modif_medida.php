<!--ENCABEZADO DE PLANILLA-->
<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once "../controllers/BaseDatos.php"; 
require_once "../model/MedidaDatos.php";            
session_start();

$mostrar = mostrarmedida($_GET['id']);

?> 


<!-- page content -->
             
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Actualizar Datos de Medida</h3>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Formulario de Actualizaci&oacuten</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
  <form class="" action="../model/MedidaDatos.php" method="POST" novalidate>    
  
  <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align">Medida/Altura  <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <input type="hidden" name="idaltura" value="<?php echo $mostrar[0];?>" />  
              <input class="form-control" name="altura" value="<?php echo $mostrar[1];?>" required="required" />
            </div>
       </div>
               
       <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Aplicar a Producto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" id="idproducto" name="idproduct">
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
                                                <div class="col-md-6 offset-md-7">
                                                    <br>
                                                    <button type='submit' class="btn btn-primary">Actualizar</button>                                                   
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