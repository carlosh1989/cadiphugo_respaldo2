<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\Integrantes;
new Eloquent();

extract($_GET);
extract($_POST);

$integrante = Integrantes::find($integrante_id);
$integrante->eliminar = 1;
$integrante->save();

header("Location: integrantes_clap_busqueda.php?municipio=".$municipio."&parroquia=".$parroquia."&sector_id=".$sector_id."&zona_id=".$zona_id.""); /* Redirect browser */
exit();
?>