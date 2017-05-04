
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

$muni = Municipio::where('id_municipio', $municipio)->first();
$parro = Parroquia::where('id_parrouia', $parroquia)->first();
$sector  = Sector::where('id', $sector_id )->first();
$zona  = ClapZona::where('id', $zona_id)->first();


$create = Integrantes::create([
	'sector_id'		 => $sector_id,
	'zona_id'		 => $zona_id,
	'tipo_c'		 => $tipo_c,	
	'cedula'		 => $cedula,
	'e_cadip'		 => $e_cadip,
	'e_clap'         => $e_clap,
	'c_municipio'	 => $c_municipio,
	'c_parroquia'    => $c_parroquia,
	'nombre_a'		 => $nombre_a,
	'telefono'		 => $telefono,
	'jefe_carga'	 => $jefe_carga,
	'cargo_clap'     => $cargo_clap,
	'cod_bodega'	 => $cod_bodega,
	'tipo_b'		 => $tipo_b,
	'rif_b'			 => $rif_b,
	'razon_social'	 => $razon_social,
	'municipio'		 => $municipio,
	'parroquia'		 => $parroquia,
	'municipio_int'	 => $municipio_int,
	'parroquia_int'	 => $parroquia_int,
	'tipo_r'		 => $tipo_r,
	'cedula_r'		 => $cedula_r,
	'responsable'	 => $responsable,
	'telefono_r'	 => $telefono_r,
	'eliminar'		 => 0,
]);

header("Location: integrantes_clap_busqueda.php?municipio=".$municipio."&parroquia=".$parroquia."&sector_id=".$sector->id."&zona_id=".$zona->id.""); /* Redirect browser */
exit();
?>