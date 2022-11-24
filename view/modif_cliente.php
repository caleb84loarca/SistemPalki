<?php
require_once  "plantilla/plantilla_central.php";
require_once "../controllers/BaseDatos.php";
require_once "../model/ClienteDatos.php";
#session_start();

$mostrar = mostrarcliente($_GET['id']);

?>

<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Actualizar Datos del Cliente</h3>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Formulario de Actualizaci&oacuten de datos al Cliente</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li> 
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
  <form class="" action="../model/clientedatos.php" method="post" novalidate>             
  <input type="hidden"  name="idcliente" value="<?php echo $mostrar[0]?>" />

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Nombre <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="clie_nom1" value="<?php echo $mostrar[1]?>"require="required" />
                                            </div>
                                        </div>
                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Nombre<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="clie_nom2" value="<?php echo $mostrar[2]?>" required="required" />
                                            </div>
                      </div>
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="clie_ape1" value="<?php echo $mostrar[3]?>" required="required" />
                                            </div>
                                        </div>
                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Apellido<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="clie_ape2" value="<?php echo $mostrar[4]?>" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre de la Compañia<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="cliecompania"  value="<?php echo $mostrar[5]?>" data-validate-length-range="5,15" type="text"  /></div>
                                        </div>


                                        
                                    <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Direccion<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="cliedireccion"  value="<?php echo $mostrar[6]?>" data-validate-length-range="5,15" type="text" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                 <input class="form-control" type="email" class='email' name="cliemail" data-validate-linked='email' value="<?php echo $mostrar[7]?>" required='required'></div>
                                        </div>


                                                                      

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Pais<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">

                                            <select class="form-control" id="idpais" name="id_pais">
                                            <option value="0"> Seleccionar de la lista </option>;

<?php
    require_once "../controllers/BaseDatos.php"; 
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from pais";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>
      
       <option value="  <?php echo $valores['id_pais'];?>"> <?php echo $valores['id_pais']." - ".$valores['nombre_pais'];?>  </option>';
     
     <?php } ?>
      
 
  </select>


                                            </div>
                                        </div>





                                        
                                       
                                         <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone 1<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="tele1" value="<?php echo $mostrar[8]?>" required='required' /></div>
                                        </div>
                                       
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone 2<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="tele2" value="<?php echo $mostrar[9]?>" data-validate-length-range="8,20" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone 3<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="tele3" value="<?php echo $mostrar[10]?>" data-validate-length-range="8,20" /></div>
                                        </div>

                                <!--        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Fecha de Ingreso<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="fechaingreso" required='required'></div>
                                        </div>  -->
                                       
                                                                        
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

<div class="ln_solid"></div>
 
    
    <!-- Javascript functions -->
 
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>
