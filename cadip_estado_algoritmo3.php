<?php 
set_time_limit(000000000000000000000000);
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\BodegaComparacion;
use Models\Clap2;
use Models\Clap3;
use Models\Clap;
use Models\Familia;
use Models\Jefe;
new Eloquent();
//buscando todos los claps de la tabla viejaa
$clap_viejo = Clap::all();

$clapConteo = Clap::count();
$num = 0;
$num2 = 0;

$counter = 0;
$total = $clapConteo;

$num = 1;
foreach ($clap_viejo as $clap) 
{
	$clapnuevo = Clap2::where('clap_codigo', $clap->codigo_clap)->get();
	$bodegas = array();
	$bodegas2 = array();
	
	foreach($clapnuevo as $n)
	{																					
		$bo = array($n->id_bodega);
		$bodegas = array_merge($bodegas,$bo);
	}

	//filtra los campos vacios 
	$bodegas = array_filter($bodegas);
	//se ordena desde el que menos coincide hasta el que mas se repite
	uasort($bodegas, "strcmp");
	//usort($bodegas, "strcmp");
	$bodega_ultima = array_pop($bodegas);
	//$bodegasID  = array_column($bodegas2,'bodega_id');
	var_dump($bodegas);	
	//conteo de integrantes
	$conteo_integrantes = count($bodegas);
	$num2 = 0;
	$num_total = 0;
	$negativo = 0;
	$positivo = 0;
	foreach ($bodegas as $bo) 
	{
		if($bodega_ultima == $bo)
		{
			echo "es igual el array: ".$num2."\n";
			$positivo = $positivo + 1;
			$clapNum = Clap2::where('clap_codigo', $clap->codigo_clap)->where('id_bodega',$bo)->where('status',1)->get();
			foreach ($clapNum as $n) 
			{
				$n->status_consolidado = 1;
				$n->save();
			}
		}
		else
		{
			echo "no es igual a: ".$num2."\n";
			$negativo = $negativo + 1;
			$clapNum = Clap2::where('clap_codigo', $clap->codigo_clap)->where('id_bodega',$bo)->where('status',1)->get();
			foreach ($clapNum as $n) 
			{
				$n->status_consolidado = 0;
				$n->save();
			}
		}
		$num2 = $num2 + 1;
	}


 
	$total = $num2;
 	//$porc = porcentaje($total, $positivo, 2);

	if($positivo != 0)
	{
		$porc = round($positivo / $total * 100, 2);
	}
	else
	{
	    $porc = '0';
	}

 	
	$comparacionCreate = BodegaComparacion::create([
		'clap_codigo' => $clap->codigo_clap,
		'bodega_mayoritaria_id' => $bodega_ultima,
		'comparacion' => $positivo.":".$negativo,
		'consolidado' => $porc,
		'integrantes_validos' => $num2,
	]);

}

echo "---------------------------------------------------------------------\n";	
echo "LISTO: ".date('d:m:Y H:m:s')."\n";
echo "---------------------------------------------------------------------\n";	
