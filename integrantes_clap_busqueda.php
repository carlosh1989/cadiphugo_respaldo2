<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\ClapZona;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();
extract($_GET);
extract($_POST);
$muni = Municipio::where('id_municipio', $municipio)->first();
$parro = Parroquia::where('id_parrouia', $parroquia)->first();
$sector  = Sector::where('id', $sector_id)->first();
$zona  = ClapZona::where('id', $zona_id)->first();
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
    <div class="col-xs-12 col-md-12 col-sm-12 panel panel-default">
    </div>
        <div class="pull-right">
        <a href="sector_form.php" class="fa fa-home fa-3x"></a>
      </div>
      <div class="pull-left">
        <a href="zona_clap_busqueda.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $sector_id ?>" class="fa fa-arrow-left fa-3x"></a>
      </div>

      <h4 class="text-center text-muted"><a class="fa fa-user-circle fa-2x" href=""></a> Integrantes CLAPS</h4>
      <hr>
    <pre><?php echo $muni->nombre_municipio; ?>, <?php echo $parro->nombre_parroquia; ?>, SECTOR: <?php echo $sector->sector ?>, COMUNIDAD: <?php echo $zona->comunidad ?> </pre>
    <hr>
    <form action="sector_guardar.php" method="GET">
      <input type="hidden" name="municipio" value="<?php echo $municipio ?>">
      <input type="hidden" name="parroquia" value="<?php echo $parroquia ?>">
      <div class="col-xs-2 col-md-2 col-sm-12 panel">
        <a href="integrantes_clap_create_consulta.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&id=<?php echo $sector_id ?>&zona_id=<?php echo $zona->id ?>&sector_id=<?php echo $sector->id ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Integrante CLAP</a>
      </div>
    </form>
    <hr>
    <table class="table">
    <style>
.table td {
   text-align: center;   
}

.table th {
   text-align: center;   
}
    </style>
      <thead>
        <tr> 
          <th>id</th>
          <th>Tipo</th>
          <th>Cedula</th>
          <th>CLAP</th>
          <th>Nombres y Apellidos</th>
          <th>Teléfono</th>
          <th>¿Jefe ó Carga?</th>
          <th>Código Bodega</th>
          <th>Tipo</th>
          <th>RIF</th>
          <th>Bodega</th>
          <th>Municpio</th>
          <th>Parroquia</th>
          <th>Tipo</th>
          <th>Cedula</th>
          <th>Responsable</th>
          <th>Teléfono</th>
          <th align="center">editar</th>
          <th align="center">eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($zona->integrantes_clap()->where('eliminar', '<', 1)->get() as $s): ?>
        <tr>
          <td><?php echo $s->id; ?></td>
          <td><?php echo $s->tipo_c ?></td>
          <td><?php echo $s->cedula ?></td>
          <td>
          <?php if ($s->e_cadip == false): ?>
            SI
          <?php else: ?>
            NO
          <?php endif ?>
          </td>
          <td><?php echo $s->nombre_a ?></td>
          <td><?php echo $s->telefono ?></td>
          <td>
          <?php if ($s->jefe_carga == 1): ?>
            JEFE
          <?php else: ?>
            CARGA
          <?php endif ?>
          </td>
          <td><?php echo $s->cod_bodega ?></td>
          <td><?php echo $s->tipo_b ?></td>
          <td><?php echo $s->rif_b ?></td>
          <td><?php echo $s->razon_social ?></td>
          <td>
          <?php  
          $nombre_municipio = Municipio::where('id_municipio',$s->municipio)->first();
          echo $nombre_municipio->nombre_municipio;
          ?>
          </td>
          <td>
          <?php  
          $nombre_parroquia = Parroquia::where('id_parrouia',$s->parroquia)->first();
          echo $nombre_parroquia->nombre_parroquia;
          ?>
          </td>
          <td><?php echo $s->tipo_r ?></td>
          <td><?php echo $s->cedula_r ?></td>
          <td><?php echo $s->responsable ?></td>
          <td><?php echo $s->telefono_r ?></td>
          
          <td><a class="btn btn-info text-success fa fa-pencil" href="integrantes_clap_editar.php?id_integrante=<?php echo $s->id ?>"></a></td>
          <td><a onclick="return confirm('Esta seguro que quiere borrar Zona CLAP?')" class="btn btn-danger text-danger fa fa-times-circle" href="integrantes_clap_eliminar.php?zona_id=<?php echo $zona_id ?>&sector_id=<?php echo $sector_id ?>&parroquia=<?php echo $parroquia ?>&municipio=<?php echo $municipio ?>&integrante_id=<?php echo $s->id; ?>"></a></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>