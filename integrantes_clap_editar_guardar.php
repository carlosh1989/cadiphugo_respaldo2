
<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\ClapZona;
use Models\Integrantes;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();

extract($_GET);
extract($_POST);

$integrante = Integrantes::find($integrante_id);
	

Krumo::dump($integrante);

// $create = Integrantes::create([
// 	'sector_id'		 => $sector_id,
// 	'zona_id'		 => $zona_id,
// 	'tipo_c'		 => $tipo_c,	
// 	'cedula'		 => $cedula,
// 	'e_cadip'		 => 0,	
// 	'nombre_a'		 => $nombre_a,
// 	'telefono'		 => $telefono,
// 	'jefe_carga'	 => 1,
// 	'cod_bodega'	 => $cod_bodega,
// 	'tipo_b'		 => $tipo_b,
// 	'rif_b'			 => $rif_b,
// 	'razon_social'	 => $razon_social,
// 	'municipio'		 => $municipio,
// 	'parroquia'		 => $parroquia,
// 	'tipo_r'		 => $tipo_r,
// 	'cedula_r'		 => $cedula_r,
// 	'responsable'	 => $responsable,
// 	'telefono_r'	 => $telefono_r,
// 	'eliminar'		 => 0,
// ]);

//header("Location: integrantes_clap_busqueda.php?municipio=".$municipio."&parroquia=".$parroquia."&sector_id=".$sector->id."&zona_id=".$zona->id.""); /* Redirect browser */
//exit();
?>