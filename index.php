
    <script src="assets/js/skins.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>



<script language="javascript">
$(document).ready(function(){
   $("#municipio").change(function () {
           $("#municipio option:selected").each(function () {
            idmunicipio = $(this).val();
            $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
                $("#parroquia").html(data);
            }); 
            window.console&&console.log(idmunicipio);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#parroquia").change(function () {
           $("#parroquia option:selected").each(function () {
            idparroquia = $(this).val();
            $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
                $("#bodega").html(data);
            }); 
            window.console&&console.log(idparroquia);           
        });
   })

});
</script>


<script language="javascript">
$(document).ready(function(){
   $("#municipioB").change(function () {
           $("#municipioB option:selected").each(function () {
            idmunicipio = $(this).val();
            $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
                $("#parroquiaB").html(data);
            }); 
            window.console&&console.log(idmunicipio);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#parroquiaB").change(function () {
           $("#parroquiaB option:selected").each(function () {
            idparroquia = $(this).val();
            $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
                $("#bodegaB").html(data);
            }); 
            window.console&&console.log(idparroquia);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#municipioC").change(function () {
           $("#municipioC option:selected").each(function () {
            idmunicipio = $(this).val();
            $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
                $("#parroquiaC").html(data);
            }); 
            window.console&&console.log(idmunicipio);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#parroquiaC").change(function () {
           $("#parroquiaC option:selected").each(function () {
            idparroquia = $(this).val();
            $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
                $("#bodegaC").html(data);
            }); 
            window.console&&console.log(idparroquia);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#municipioD").change(function () {
           $("#municipioD option:selected").each(function () {
            idmunicipio = $(this).val();
            $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
                $("#parroquiaD").html(data);
            }); 
            window.console&&console.log(idmunicipio);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#parroquiaD").change(function () {
           $("#parroquiaD option:selected").each(function () {
            idparroquia = $(this).val();
            $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
                $("#bodegaD").html(data);
            }); 
            window.console&&console.log(idparroquia);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#municipioE").change(function () {
           $("#municipioE option:selected").each(function () {
            idmunicipio = $(this).val();
            $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
                $("#parroquiaE").html(data);
            }); 
            window.console&&console.log(idmunicipio);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#parroquiaE").change(function () {
           $("#parroquiaE option:selected").each(function () {
            idparroquia = $(this).val();
            $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
                $("#bodegaE").html(data);
            }); 
            window.console&&console.log(idparroquia);           
        });
   })

});
</script>




<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
use DB\Eloquent;
use Models\Municipio;

require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

new Eloquent();
//\krumo::dump($comercios);
?>
                <div class="page-body">
					<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<h5 class="row-title before-darkorange"><i class="fa fa-list-alt darkorange"></i>Busquedas segun municipio, parroquia y bodega</h5>
              </div>

										<div class="col-lg-12 col-sm-6 col-xs-12">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs" id="myTab3">
                                            <li class="tab-sky active">
                                                <a aria-expanded="true" data-toggle="tab" href="#home3">
                                                    Jefe de familia
                                                </a>
                                            </li>

                                            <li class="tab-red">
                                                <a aria-expanded="false" data-toggle="tab" href="#profile3">
                                                    Jefe y carga familiar
                                                </a>
                                            </li>

                                            <li class="tab-orange">
                                                <a aria-expanded="false" data-toggle="tab" href="#dropdown13">
                                                    Solos
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="home3" class="tab-pane active">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-xs-12">
										<div class="well with-header">
											<div class="header bordered-green"><li class="fa fa-user-plus fa-2x red-text"></li> Busqueda Jefe de familia</div>
										
										<form action="jefe_preview.php" method="POST">
											
												<?php $municipios = Municipio::all(); ?>
												<select name="municipio" id="municipio">
												<?php foreach ($municipios as $municipio): ?>
													 <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
												<?php endforeach ?>
												</select>
									
								
												<select name="parroquia" id="parroquia">
												</select>
								
									
												<select name="bodega" id="bodega">
												</select>
										
										
										<hr>
											<div class="col-lg-2 col-sm-12 col-xs-12">
												<button class="btn btn-danger btn-lg" type="submit" value="buscar">
												Buscar  <i class="fa fa-search"></i> 
												</button>
											</div>
											</form>
											</div>
										</div>
								</div>
                                            </div>

                                 <div id="profile3" class="tab-pane">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-xs-12">
										<div class="well with-header">
											<div class="header bordered-green"><li class="fa fa-users fa-2x red-text"></li> Busqueda Jefe de familia y la carga familiar</div>
										<form action="jefecarga_preview.php" method="POST">
											
												<?php $municipios = Municipio::all(); ?>
												<select name="municipio" id="municipioB">
												<?php foreach ($municipios as $municipio): ?>
													 <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
												<?php endforeach ?>
												</select>
									
								
												<select name="parroquia" id="parroquiaB">
												</select>
								
									
												<select name="bodega" id="bodegaB">
												</select>
										
										
										<hr>
											<div class="col-lg-2 col-sm-12 col-xs-12">
												<button class="btn btn-danger btn-lg" type="submit" value="buscar">
												Buscar  <i class="fa fa-search"></i> 
												</button>
											</div>
											</div>
											</form>
										</div>
								</div>
                                            </div>

                                            <div id="dropdown13" class="tab-pane">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-xs-12">
										<div class="well with-header">
											<div class="header bordered-green"><li class="fa fa-user fa-2x red-text"></li> Busqueda de las personas solas</div>
										<form action="solo_preview.php" method="POST">
											
												<?php $municipios = Municipio::all(); ?>
												<select name="municipio" id="municipioC">
												<?php foreach ($municipios as $municipio): ?>
													 <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
												<?php endforeach ?>
												</select>
									
								
												<select name="parroquia" id="parroquiaC">
												</select>
								
									
												<select name="bodega" id="bodegaC">
												</select>
										
										
										<hr>
											<div class="col-lg-2 col-sm-12 col-xs-12">
												<button class="btn btn-danger btn-lg" type="submit" value="buscar">
												Buscar  <i class="fa fa-search"></i> 
												</button>
											</div>
											</div>
										</div>
								</div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>





                                               <div id="profile3" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="well with-header">
                                            <div class="header bordered-green"><li class="fa fa-users fa-2x red-text"></li> Busqueda Jefe de familia con huellas certificadas y la carga familiar</div>
                                        <form action="jefehuella_preview.php" method="POST">
                                            
                                                <?php $municipios = Municipio::all(); ?>
                                                <select name="municipio" id="municipioD">
                                                <?php foreach ($municipios as $municipio): ?>
                                                     <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                                                <?php endforeach ?>
                                                </select>
                                    
                                
                                                <select name="parroquia" id="parroquiaD">
                                                </select>
                                
                                    
                                                <select name="bodega" id="bodegaD">
                                                </select>
                                        
                                        
                                        <hr>
                                            <div class="col-lg-2 col-sm-12 col-xs-12">
                                                <button class="btn btn-danger btn-lg" type="submit" value="buscar">
                                                Buscar  <i class="fa fa-search"></i> 
                                                </button>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                </div>



                                               <div id="profile3" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="well with-header">
                                            <div class="header bordered-green"><li class="fa fa-users fa-2x red-text"></li> Busqueda CLAP Jefe de familia con huellas certificadas y la carga familiar</div>
                                        <form action="jefeclaphuella_preview.php" method="POST">
                                            
                                                <?php $municipios = Municipio::all(); ?>
                                                <select name="municipio" id="municipioE">
                                                <?php foreach ($municipios as $municipio): ?>
                                                     <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                                                <?php endforeach ?>
                                                </select>
                                    
                                
                                                <select name="parroquia" id="parroquiaE">
                                                </select>
                                
                                    
                                                <select name="bodega" id="bodegaE">
                                                </select>
                                        
                                        
                                        <hr>
                                            <div class="col-lg-2 col-sm-12 col-xs-12">
                                                <button class="btn btn-danger btn-lg" type="submit" value="buscar">
                                                Buscar  <i class="fa fa-search"></i> 
                                                </button>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                </div>
                                

                                            </div>

                                    <div class="horizontal-space"></div>
                                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
    <!--Basic Scripts-->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>


    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="assets/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/js/charts/sparkline/sparkline-init.js"></script>

    <!--Easy Pie Charts Needed Scripts-->
    <script src="assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/js/charts/easypiechart/easypiechart-init.js"></script>

    <!--Flot Charts Needed Scripts-->
    <script src="assets/js/charts/flot/jquery.flot.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.pie.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.tooltip.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.orderBars.js"></script>

