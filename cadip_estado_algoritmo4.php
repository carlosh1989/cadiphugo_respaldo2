<?php 
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\BodegaComparacion;
use Models\Clap2;
use Models\Clap3;
use Models\Clap;
use Models\ClapDatos;
use Models\Familia;
use Models\Jefe;
new Eloquent();

$bodegas = BodegaComparacion::all();
$num = 0;

$automatico = 0;
$manual = 0;
foreach ($bodegas as $bo) 
{
	$clap = Clap2::where('clap_codigo',$bo->clap_codigo)->get();
	if ($bo->integrantes_validos >= 4) 
	{
		if($bo->consolidado >= 60)
		{
			foreach ($clap as $c) 
			{
				$c->id_bodega = $bo->bodega_mayoritaria_id;
				$c->status_consolidado = 1;
				$c->save();
				echo "---------------------------------------------------------------------\n";	
				echo "Automatico clap codigo: ".$c->clap_codigo."\n";
				echo "---------------------------------------------------------------------\n";	
			}
		}
		else
		{
			foreach ($clap as $c) 
			{
				$c->status_consolidado = 0;
				$c->save();
				echo "---------------------------------------------------------------------\n";	
				echo "Automatico clap codigo: ".$c->clap_codigo."\n";
				echo "---------------------------------------------------------------------\n";	
			}
		}

	}
	else
	{
		$manual = $manual + 1;
		$c->status_consolidado = 0;
		$c->save();
		echo "---------------------------------------------------------------------\n";	
		echo "MANUAL clap codigo: ".$c->clap_codigo."\n";
		echo "---------------------------------------------------------------------\n";	
	}
}

