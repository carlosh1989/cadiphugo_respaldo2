<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\BaseMisiones;
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
$jefeSI = Jefe::where('base_misiones',$basemisiones)->where('bodega',$bodega_id)->where('huella_certificada',$tipo)->get();
$bodega = Bodega::where('id',$bodega_id)->first();
$municipio = Municipio::where('id_municipio',$bodega->cod_municipio)->first();
$parroquia = Parroquia::where('id_parrouia',$bodega->cod_parroquia)->first();
$datosBASEMISIONES = BaseMisiones::where('id', $basemisiones)->first();
$responsable = $bodega->responsable;
$jefeSiExcel = array();

$array = Array (
        0 => Array (
		    "TOTAL:",
		   	$jefeSI->count(),
        ),
);
$jefeSiExcel = array_merge($jefeSiExcel,$array);

foreach ($jefeSI as $key => $jefe) 
{
	$datosCLAP = Clap2::where('clap_codigo',$jefe->clap)->first();
	$datosBODEGA = Bodega::where('id',$jefe->bodega)->first();
	$array = Array (
	        0 => Array (
			    $jefe->cedula,
			    $jefe->nombre_apellido,
			    $jefe->sector,			    
			    $jefe->calle_avenida,
			    $jefe->casa_edif_apto,
			    $jefe->clap,
			    $datosCLAP->clap_nombre,
			    $datosBODEGA->responsable,
			    $datosBODEGA->direccion,
	        ),
	);
	$jefeSiExcel = array_merge($jefeSiExcel,$array);
}

if($tipo == 1)
{
	header("Content-Disposition: attachment; filename=\"certificados_jefes_familia_base_mision_".$datosBASEMISIONES->nombre_base."_".$bodega->responsable.".xls\"");
}
elseif($tipo == 0) 
{
	header("Content-Disposition: attachment; filename=\"no_certificados_jefes_familia_base_mision_".$datosBASEMISIONES->nombre_base."_".$bodega->responsable.".xls\"");
}


header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");
$out = fopen("php://output", 'w');
foreach ($jefeSiExcel as $data)
{
    fputcsv($out, $data,"\t");
}
fclose($out);









