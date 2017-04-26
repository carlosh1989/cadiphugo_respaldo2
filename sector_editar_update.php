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
$sector = Sector::where('id',$id)->first();

$sector->id_municipio = $municipio;
$sector->id_parroquia = $parroquia;
$sector->direccion = $direccion;
$sector->save();

header("Location: sector_busqueda.php?municipio=".$municipio."&parroquia=".$parroquia.""); /* Redirect browser */
exit();
?>