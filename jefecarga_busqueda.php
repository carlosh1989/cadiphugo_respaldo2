
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

                                            </div>

                                 
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="well with-header">
                                            <div class="header bordered-green"><li class="fa fa-users fa-2x red-text"></li> Busqueda de Jefes y carga familiar</div>
                                        <form action="jefecarga_preview.php" method="POST">
                                            
                                                <?php $municipios = Municipio::all(); ?>
                                                <select name="municipio" id="municipioB">
                                                <option value="">MUNICIPIO</option>
                                                <optgroup label='-------'></optgroup>
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
                                            <br><br>
                                            </div>
                                        </div>
                                </div>


                                            </div>
                                       


