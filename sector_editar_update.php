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
$sec = Sector::where('id',$id)->first();

$sec->id_municipio = $municipio;
$sec->id_parroquia = $parroquia;
$sec->sector = $sector;
$sec->save();

header("Location: sector_busqueda.php?municipio=".$municipio."&parroquia=".$parroquia.""); /* Redirect browser */
exit();
?>