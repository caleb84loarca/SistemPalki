<!--ENCABEZADO DE PLANILLA-->
<?php 
require_once  "plantilla/plantilla_central.php"; 
require_once "../controllers/BaseDatos.php"; 
require_once "../model/EmpaqueDatos.php";            
#session_start();

$mostrar = mostrarempaque($_GET['id']);

?> 


<!-- page content -->
             
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Actualizar Datos del Empaque</h3>
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
  <form class="" action="../model/EmpaqueDatos.php" method="POST" novalidate>    
  
  <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align">Id Empaque <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <input type="hidden" name="idempaque" value="<?php echo $mostrar[0];?>" />  
              <input class="form-control" name="idempaque" value="<?php echo $mostrar[0];?>" required="required" disabled />
            </div>
       </div>
               
      <div class="field item form-group">
          <label class="col-form-label col-md-3 col-sm-3  label-align">Editar Empaque <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input class="form-control" data-validate-words="1" name="actualiarempaque" value="<?php echo $mostrar[1];?>" required="required" />
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