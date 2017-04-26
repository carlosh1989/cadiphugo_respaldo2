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


$create = ClapZona::create([
	'sector_id'	 => $sector_id,
	'nombre_clap'	 => $nombre_clap,
	'cod_clap'		 => $cod_clap,
	'cod_cadip'		 => $cod_cadip,
	'consolidado'	=> $consolidado,
	'eliminar'		=> 0,
	'comunidad' 	=> $comunidad,
	'cod_bodega'	=> $cod_bodega,
]);

header("Location: sector_busqueda.php?municipio=".$municipio."&parroquia=".$parroquia.""); /* Redirect browser */
exit();
?>
