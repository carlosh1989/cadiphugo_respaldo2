<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Dompdf\Dompdf;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
new Eloquent();

extract($_GET);

$jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
$jefe = Jefe::where('cod_municipio', $municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->where('cedula',$cedula)->first();

$municipio2 = $municipio;
$parroquia2 = $parroquia;

$municipio = Municipio::find($municipio);
$parroquia = Parroquia::find($parroquia);


	$dompdf = new Dompdf();
	ob_start();
	include('formato_solas2.php');
	$dompdf->loadHtml(ob_get_clean());
	$dompdf->setPaper('Letter');
	$dompdf->render();
	$dompdf->stream();

	//estado de certificado "generado"
	$jefe->certificacion_solo = 1;
	$jefe->save();
	echo "<script>window.location.replace('solo_preview.php?municipio=".$municipio2."&parroquia=".$parroquia2."&bodega=".$bodega."&cedula=".$jefe->cedula."');</script>";



