
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
//Krumo::dump($integrante);
$int = Integrantes::find($integrante_id);

if(!$parroquia)
{
	$parroquia = $int->parroquia;
}

if(!$municipio)
{
	$municipio = $int->municipio;
}

$datos = array(
	'tipo_c'		 => $tipo_c,	
	'cedula'		 => $cedula,
	'nombre_a'		 => $nombre_a,
	'telefono'		 => $telefono,
	'cod_bodega'	 => $cod_bodega,
	'tipo_b'		 => $tipo_b,
	'rif_b'			 => $rif_b,
	'razon_social'	 => $razon_social,
	'municipio'		 => $municipio,
	'parroquia'		 => $parroquia,
	'tipo_r'		 => $tipo_r,
	'cedula_r'		 => $cedula_r,
	'responsable'	 => $responsable,
	'telefono_r'	 => $telefono_r,
);

$integrante = Integrantes::find($integrante_id)->update($datos);

//Krumo::dump($datos);
header("Location: integrantes_clap_busqueda_planilla.php?municipio=".$municipio."&parroquia=".$parroquia."&sector_id=".$sector_id."&zona_id=".$zona_id.""); /* Redirect browser */
exit();
?>