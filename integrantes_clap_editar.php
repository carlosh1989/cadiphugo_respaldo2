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
use Models\Integrantes;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();
extract($_GET);
extract($_POST);
$integrante = Integrantes::where('id',$id_integrante)->first();
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
					<div class="pull-left">
						<a href="integrantes_clap_busqueda.php?municipio=<?php echo $integrante->sector->municipio->id_municipio ?>&parroquia=<?php echo $integrante->sector->parroquia->id_parrouia ?>&sector_id=<?php echo $integrante->sector->id ?>&zona_id=<?php echo $integrante->zona_id ?>" class="fa fa-arrow-left fa-3x"></a>
					</div>
					<h4 class="text-center text-muted"><a class="fa fa-user-circle fa-2x" href=""></a> Editar Integrante CLAP <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; Según Planilla Suministrada</h4>
					<br>
					<pre><?php echo $integrante->sector->municipio->nombre_municipio ?>, <?php echo $integrante->sector->parroquia->nombre_parroquia ?>, SECTOR: <?php echo $integrante->sector->sector ?></pre>
				<form action="integrantes_clap_editar_guardar.php" method="POST	">
					<div class="form-group">
						<input type="hidden" name="integrante_id" value="<?php echo $integrante->id ?>">
						<input type="hidden" name="sector_id" value="<?php echo $integrante->sector_id ?>">
						<input type="hidden" name="zona_id" value="<?php echo $integrante->zona_id ?>">
						<input type="hidden" name="municipio" value="<?php echo $integrante->parroquia ?>">
						<input type="hidden" name="parroquia" value="<?php echo $integrante->municipio ?>">
						<br>
						
						<div class="form-group">
						<h4>Integrante CLAP</h4>
							<select style="width: 8%;" name="tipo_c" required="required">
							<option selected="selected" value="<?php echo $integrante->tipo_c?>"> <?php echo $integrante->tipo_c ?></option>
							  <optgroup label='-------'></optgroup>
							<option value="V">V</option>
							<option value="E">E</option>
							</select>
							<br>
							<br>
							<input style="width: 100%;" name="cedula" type="number" value="<?php echo $integrante->cedula ?>" placeholder="Cedula del Integrante">
							<br>
							<br>
							<input style="width: 100%;" name="nombre_a" type="text" placeholder="Nombres y Apellidos del Integrante" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $integrante->nombre_a ?>">
							<br>
							<br>
							<input style="width: 100%;" name=" telefono" type="number" placeholder="Teléfono del Integrante" value="<?php echo $integrante->telefono ?>">
							<br>
							<br>
							<h4>Bodega CLAP</h4>
							<input style="width: 100%;" name="cod_bodega" type="text" placeholder="Código de la Bodega" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $integrante->cod_bodega ?>">
							<br>
							<br>
							<select style="width: 8%;" name="tipo_b" required="required">
							<option selected="selected" value="<?php echo $integrante->tipo_b?>"> <?php echo $integrante->tipo_b ?></option>
							  <optgroup label='-------'></optgroup>
								<option value="J">J</option>
								<option value="V">V</option>
								<option value="E">E</option>
								<option value="G">G</option>
								<option value="P">P</option>
							</select>
							<br>
							<br>
							<input style="width: 100%;" name="rif_b" type="number" placeholder="RIF de la Bodega" value="<?php echo $integrante->rif_b ?>" >
							<br>
							<br>
							<input style="width: 100%;" name="razon_social" type="text" placeholder="Nombre de la Bodega (RAZÓN SOCIAL)" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $integrante->razon_social ?>" >

							<br>				
							<br>				
							<?php $municipio = Municipio::where('id_municipio',$integrante->municipio)->first(); ?>
							<select name="municipio" id="municipio"class="form-control" required>
								<option selected="selected" value="<?php echo $municipio->id_municipio ?>" > <?php echo $municipio->nombre_municipio ?></option>
							<optgroup label='-------'></optgroup>
							<?php $municipios = Municipio::all(); ?>
							<?php foreach ($municipios as $municipio): ?>
							<option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
							<?php endforeach ?>
						</select>
						
					<br>
					<?php $parroquia = Parroquia::where('id_parrouia',$integrante->parroquia)->first(); ?>
						<select name="parroquia" id="parroquia"class="form-control">
						<option selected="selected" value="<?php echo $parroquia->id_parroquia ?>" > <?php echo $parroquia->nombre_parroquia ?></option>
						</select>
	
					<br>
					<h4>Responsable Bodega CLAP</h4>
					<select style="width: 8%;" name="tipo_r" required="required">
						<option selected="selected" value="<?php echo $integrante->tipo_r?>"> <?php echo $integrante->tipo_r ?></option>
					  <optgroup label='-------'></optgroup>
						<option value="V">V</option>
						<option value="E">E</option>
					</select>
					<br>
					<br>
					<input style="width: 100%;" name="cedula_r" type="number" placeholder="Cedula del Bodeguero" value="<?php echo $integrante->cedula_r?>" >
					<br>
					<br>
					<input style="width: 100%;" name="responsable" type="text" placeholder="Nombres y Apellidos del Bodeguero" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $integrante->responsable?>" >
					<br>
					<br>
					<input style="width: 100%;" name="telefono_r" type="number" placeholder="Teléfono del Bodeguero" value="<?php echo $integrante->telefono_r?>" >
					<hr>
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