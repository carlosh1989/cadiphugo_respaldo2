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
use Models\ClapZona;
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();
extract($_GET);
extract($_POST);
$zona = ClapZona::where('id',$id_zona)->first();
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
				<div class="pull-left">
					<a href="zona_clap_busqueda.php?municipio=<?php echo $zona->sector->municipio->id_municipio ?>&parroquia=<?php echo $zona->sector->parroquia->id_parrouia ?>&id=<?php echo $zona->sector->id ?>" class="fa fa-arrow-left fa-3x"></a>
				</div>
				<h4 class="text-center text-muted"><a class="fa fa-map-marker fa-2x" href=""></a> Sectores CLAP</h4>
				<br>
			<pre><?php echo $zona->sector->municipio->nombre_municipio ?>, <?php echo $zona->sector->parroquia->nombre_parroquia ?>, SECTOR: <?php echo $zona->sector->sector ?></pre>
			<form action="zona_clap_editar_guardar.php" method="GET">
				<div class="form-group form-group-lg">
					<input type="hidden" name="zona_id" value="<?php echo $zona->id ?>">
					<input style="width: 100%;" name="nombre_clap" type="text" value="<?php echo $zona->nombre_clap ?>" placeholder="Ingrese nombre de CLAP">
					<br>
					<br>
					<input style="width: 100%;" name="subsector" value="<?php echo $zona->subsector ?>" type="text" placeholder="Sub-Sector" onChange="javascript:this.value=this.value.toUpperCase();" required>
				    <br>
				    <br>
					<input style="width: 100%;" name="comunidad" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $zona->comunidad ?>" type="text" placeholder="Comunidad" required>
					<br>
					<br>
					<input style="width: 100%;" name="cod_clap" value="<?php echo $zona->cod_clap ?>" type="text" placeholder="Codigo de CLAP">
					<br>
					<br>
					<input style="width: 100%;" name="cod_bodega" value="<?php echo $zona->cod_bodega ?>" type="text" placeholder="Codigo de Bodega">
					<br>
					<br>
					<input style="width: 100%;" name="cod_cadip" value="<?php echo $zona->cod_cadip ?>" type="text" placeholder="Codigo CADIP">
					<br>
					<br>
					<input style="width: 100%;" name="consolidado" value="<?php echo $zona->consolidado ?>" type="text" placeholder="Consolidado">
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