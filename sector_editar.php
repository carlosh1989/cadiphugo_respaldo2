<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\BaseMisiones;
use Models\Bodega;
use Models\BodegaComparacion;
use Models\Clap2;
use Models\Clap;
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();

extract($_GET);
extract($_POST);

$municipio_actual = Municipio::where('id_municipio',$municipio)->first();
$parroquia_actual = Parroquia::where('id_parrouia',$parroquia)->first();
$sector = Sector::where('id',$id)->first();
?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->

  <!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Let browser know website is optimized for mobile-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  <!--Import jQuery before materialize.js-->
  <!-- Compiled and minified JavaScript -->
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

<br><br>



<br>
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="jefe">
  	  <div class="col-xs-6 col-md-6 col-md-offset-3 col-sm-12 panel panel-default">
		<h4 class="text-center text-muted"><a class="fa fa-map" href=""></a> Editar Sector</h4>
		<form action="sector_editar_update.php" method="GET">
<input type="hidden" name="id" value="<?php echo $id ?>">
 <div class="form-group">
            <?php $municipios = Municipio::all(); ?>
            <select name="municipio" id="municipio"class="form-control" required>	
            <option value="<?php echo $municipio_actual->id_municipio ?>"><?php echo $municipio_actual->nombre_municipio ?></option>
            <?php foreach ($municipios as $municipio): ?>
                 <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
            <?php endforeach ?>
            </select>
 </div>

 <div class="form-group">
 	
			<select name="parroquia" id="parroquia"class="form-control" required>
        <option value="<?php echo $parroquia_actual->id_parrouia ?>"><?php echo $parroquia_actual->nombre_parroquia ?></option>
			</select>
 </div>

 <div class="form-group">
   <input style="width: 100%;" name="sector" type="text" value="<?php echo $sector->sector ?>" onChange="javascript:this.value=this.value.toUpperCase();">
 </div>



		<hr>
		  <button class="btn btn-success pull-right" type="submit">
		  	Guardar <i class="fa fa-save"></i></button>
		
		</form>
		<br><br>

  </div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>