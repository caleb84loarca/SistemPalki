<!--ENCABEZADO DE PLANILLA-->
<?php 
require_once  "plantilla/plantilla_central.php"; 
?> 

 <!-- page content -->
             
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Ingresar Nuevos Productos</h3>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Formulario</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
  <form class="" action="" method="post" novalidate>             
                <span class="section">Informaci&oacuten del Producto</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Producto <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="producto" placeholder="ex. Yucca Guatemalensis" required="required" />
                                            </div>
                                        </div>
                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Categoria<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="categoria" placeholder="ex. Izote" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">SubCategoria<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="subcategoria" placeholder="ex. Izote" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Genero<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="genero" placeholder="ex. Izote" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre Cites<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="cites" placeholder="ex. Izote" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Especie<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="especie" placeholder="ex. Izote" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Cantidad Minima<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="cantidad_min" placeholder="ex. 1,000" required="required" />
                                            </div>
                      </div>

                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Semana en Transito<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="wktransito" placeholder="ex. 4" required="required" />
                                            </div>
                      </div>


                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Semana de Compra<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="wkcompra" placeholder="ex. 5" required="required" />
                                            </div>
                      </div>


                      <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tipo de Empaque<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">

                                            <select class="form-control" id="idempaque" name="idpais">
                                            <option value="0"> Seleccionar de la lista </option>;
<?php
    require_once "../controllers/BaseDatos.php"; 
    $base = new BaseDatos();
    $conexion=$base->getCon();                                              
    $query = "select * from empaque";
    $resultado = sqlsrv_query($conexion,$query);    
    while ($valores = sqlsrv_fetch_array($resultado)) {
      // En esta sección estamos llenando el select con datos extraidos de una base de datos.
      ?>      
       <option value="  <?php echo $valores['id_empaque'];?>"> <?php echo $valores['id_empaque']." - ".$valores['tipo_empaque'];?>  </option>';
     
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
                            <h3>Listado de Productos Actuales</h3>
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
                <th>EMPAQUES No.</th>
                <th>EMPAQUES ACTIVOS</th>   
                <th>ACTUALIZACIONES</th>              
               
            </tr>
        </thead>
        <tbody>
           
        <?php 
            require_once "../controllers/BaseDatos.php"; 
            $base = new BaseDatos();
            $conexion=$base->getCon();   
            $query = "select * from empaque";
            $resultado = sqlsrv_query($conexion,$query);  

            while ($fila = sqlsrv_fetch_array($resultado)) {
            ?>
        <tr>
            <td> <?php echo $fila['id_empaque'];  ?> </td>
            <td> <?php echo $fila['tipo_empaque'];  ?> </td>  
<td>          
<a href="#" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Modificar</a>
<a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Eliminar</a>
</td>
        </tr>
        <?php  };?>                       
        </tbody>
        <tfoot>
            <tr>
                <th>EMPAQUES No.</th>
                <th>EMPAQUES ACTIVOS</th>   
                <th>ACTUALIZACIONES</th>                
               
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
            
            <hr/>
    
    <!-- Javascript functions -->
  <script>
    function hideshow(){
      var password = document.getElementById("password1");
      var slash = document.getElementById("slash");
      var eye = document.getElementById("eye");
      
      if(password.type === 'password'){
        password.type = "text";
        slash.style.display = "block";
        eye.style.display = "none";
      }
      else{
        password.type = "password";
        slash.style.display = "none";
        eye.style.display = "block";
      }

    }
  </script>

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
            
 <!-- /page content -->




