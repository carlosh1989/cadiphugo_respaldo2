<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();

extract($_GET);
extract($_POST);

$muni = Municipio::where('id_municipio', $municipio)->first();
$parro = Parroquia::where('id_parrouia', $parroquia)->first();
$sector  = Sector::where('id_municipio', $municipio)->where('id_parroquia',$parroquia)->where('eliminar', '<', 1)->get();

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

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  <!--Import jQuery before materialize.js-->
  <!-- Compiled and minified JavaScript -->
<script src="assets/js/jquery.min.js"></script>
<br>
<div class="col-xs-6 col-md-6 col-md-offset-3 col-sm-12 panel panel-default">
<div class="pull-left">
	<a href="sector_form.php" class="fa fa-home fa-3x"></a>
</div>	<h4 class="text-center text-muted"><a class="fa fa-map fa-2x" href=""></a> Sector</h4>
<hr>
<pre><?php echo $muni->nombre_municipio; ?>, <?php echo $parro->nombre_parroquia; ?></pre>
<hr>
<form action="sector_guardar.php" method="GET">
	<div class="col-xs-10 col-md-10 col-sm-12 panel">
		<input style="width: 100%;" name="direccion" type="text" placeholder="Ingrese nuevo sector CLAP">
	</div>
	<input type="hidden" name="municipio" value="<?php echo $municipio ?>">
	<input type="hidden" name="parroquia" value="<?php echo $parroquia ?>">
	<div class="col-xs-2 col-md-2 col-sm-12 panel">
		<button class="btn btn-success">Ingresar</button>
	</div>
</form>
<hr>
<table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Sector CLAP</th>
        <th>Zona CLAPS</th>
        <th align="center">editar</th>
        <th align="center">eliminar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sector as $s): ?>
		<tr>
	        <td><?php echo $s->id; ?></td>
	        <td><?php echo $s->sector ?></td>
	        <td>
			<?php if (isset($s->clap_zona[0])): ?>
				<a href="zona_clap_busqueda.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $s->id ?>" class="btn btn-primary fa fa-search fa-2x"></a>
			<?php else: ?>
				<a href="zona_clap_create.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $s->id ?>" class="btn btn-success fa fa-plus fa-2x"></a>
			<?php endif ?>
	        </td>
	        <td><a class="btn btn-info text-success fa fa-pencil" href="sector_editar.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $s->id ?>"></a></td>
	        <td><a onclick="return confirm('Esta seguro que quiere borrar esta dirección?')" class="btn btn-danger text-danger fa fa-times-circle" href="sector_eliminar.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $s->id; ?>"></a></td>
 		</tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>