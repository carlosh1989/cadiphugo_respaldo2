<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\Bodega;
use Models\BodegaComparacion;
use Models\Clap2;
use Models\Clap;
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
new Eloquent();

extract($_GET);
extract($_POST);

//JEFES SI CERTIFICADOS
$familiaSI = Familia::where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega_id)->where('huella_certificada',1)->get();
$bodega = Bodega::where('id',$bodega_id)->first();
$municipio = Municipio::where('id_municipio',$bodega->cod_municipio)->first();
$parroquia = Parroquia::where('id_parrouia',$bodega->cod_parroquia)->first();

$responsable = $bodega->responsable;
$jefeSiExcel = array();

foreach ($jefeSI as $key => $jefe) 
{
	$datosCLAP = Clap2::where('clap_codigo',$jefe->clap)->first();
	$array = Array (
	        0 => Array (
			    $jefe->cedula,
			    $jefe->nombre_apellido,
			    $municipio->nombre_municipio,
			    $parroquia->nombre_parroquia,
			    $jefe->sector,
			    $jefe->clap,
			    $datosCLAP->clap_nombre,
			    $datosCLAP->comunidad,
			    $jefe->sector,
			    $jefe->calle_avenida,
			    $jefe->casa_edif_apto,
	        ),
	);
	$jefeSiExcel = array_merge($jefeSiExcel,$array);
}


//JEFES SI CERTIFICADOS
$jefeSI = Jefe::where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega_id)->where('huella_certificada',0)->get();
$bodega = Bodega::where('id',$bodega_id)->first();
$municipio = Municipio::where('id_municipio',$bodega->cod_municipio)->first();
$parroquia = Parroquia::where('id_parrouia',$bodega->cod_parroquia)->first();

$responsable = $bodega->responsable;
$jefeSiExcel = array();

foreach ($jefeSI as $key => $jefe) 
{
	$array = Array (
	        0 => Array (
			    $jefe->cedula,
			    $jefe->nombre_apellido,
			    $municipio->nombre_municipio,
			    $parroquia->nombre_parroquia,
			    $jefe->sector,
			    $jefe->clap,
	        ),
	);
	$jefeSiExcel = array_merge($jefeSiExcel,$array);
}
 
header("Content-Disposition: attachment; filename=\"".$responsable."_Jefe_no_certificados.xls\"");
header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");
$out = fopen("php://output", 'w');
foreach ($jefeSiExcel as $data)
{
    fputcsv($out, $data,"\t");
}
fclose($out);
