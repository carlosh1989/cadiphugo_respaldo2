<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\ClapZona;
new Eloquent();

extract($_GET);
extract($_POST);

$zona = ClapZona::find($zona_id);
$zona->nombre_clap = $nombre_clap;
$zona->cod_clap = $cod_clap;
$zona->cod_cadip = $cod_cadip;
$zona->consolidado = $consolidado;
$zona->comunidad = $comunidad;
$zona->cod_bodega = $cod_bodega;
$zona->save();

header("Location: zona_clap_busqueda.php?municipio=".$zona->sector->id_municipio."&parroquia=".$zona->sector->id_parroquia."&id=".$zona->sector_id.""); /* Redirect browser */
exit();
?>
