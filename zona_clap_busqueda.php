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
$sector  = Sector::where('id', $id)->first();
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
    <div class="col-xs-10 col-md-10 col-md-offset-1 col-sm-12 panel panel-default">
      <div class="pull-left">
        <a href="sector_busqueda.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $id ?>" class="fa fa-arrow-left fa-3x"></a>
      </div>
        <div class="pull-right">
        <a href="sector_form.php" class="fa fa-home fa-3x"></a>
      </div>
      <h4 class="text-center text-muted"><a class="fa fa-map-marker fa-2x" href=""></a> Zonas CLAPS</h4>
      <hr>
    <pre><?php echo $muni->nombre_municipio; ?>, <?php echo $parro->nombre_parroquia; ?>, SECTOR: <?php echo $sector->sector ?></pre>
    <hr>
    <form action="sector_guardar.php" method="GET">
      <input type="hidden" name="municipio" value="<?php echo $municipio ?>">
      <input type="hidden" name="parroquia" value="<?php echo $parroquia ?>">
      <div class="col-xs-2 col-md-2 col-sm-12 panel">
        <a href="zona_clap_create.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $id ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Zona CLAP</a>
      </div>
    </form>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>Nombre CLAP</th>
          <th>Comunidad</th>
          <th>Codigo CLAP</th>
          <th>Codigo Bodega</th>
          <th>Codigo CADIP</th>
          <th>Consolidado</th>
          <th>Integrantes CLAP</th>
          <th align="center">Editar</th>
          <th align="center">Eliminar</th>
          <th align="center">Reportes CLAP'S</th>                    
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sector->clap_zona()->where('eliminar', '<', 1)->get() as $s): ?>
        <tr>
          <td><?php echo $s->id; ?></td>
          <td><?php echo $s->nombre_clap ?></td>
          <td><?php echo $s->comunidad ?></td>
          <td><?php echo $s->cod_clap ?></td>
          <td><?php echo $s->cod_bodega ?></td>
          <td><?php echo $s->cod_cadip ?></td>
          <td><?php echo $s->consolidado ?></td>
          <td>
      
            <a href="integrantes_clap_busqueda.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&sector_id=<?php echo $s->sector_id ?>&zona_id=<?php echo $s->id ?>" class="btn btn-primary fa fa-search fa-2x"></a>
        
          </td>
          <td><a class="btn btn-info text-success fa fa-pencil" href="zona_clap_editar.php?id_zona=<?php echo $s->id ?>"></a></td>
          <td><a onclick="return confirm('Esta seguro que quiere borrar Zona CLAP?')" class="btn btn-danger text-danger fa fa-times-circle" href="zona_clap_eliminar.php?zona_id=<?php echo $s->id ?>"></a></td>
          <td>
              <a href="integrantes_clap_excel.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $id ?>" class="btn btn-success"><i class="fa fa-table"> Excel</i></a>
          
              <a href="integrantes_clap_excel.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>