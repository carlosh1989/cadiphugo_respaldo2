<?php 
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\BodegaComparacion;
use Models\Clap2;
use Models\Clap;
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Jefe;
new Eloquent();

//buscando todos los claps de la tabla vieja
$clap_viejo = Clap::all();

$num = 1;
foreach ($clap_viejo as $clap) 
{
	$clapnuevo = Clap2::where('bodega_id', '>', 1)->where('clap_codigo', $clap->codigo_clap)->get();
	
	$bodegas = array();

	foreach($clapnuevo as $n)
	{	
		$bo = array($n->bodega_id);
		$bodegas = array_merge($bodegas,$bo);
	}

	//filtra los campos vacios 
	$bodegas = array_filter($bodegas);

	//se ordena desde el que menos coincide hasta el que mas se repite
	usort($bodegas, "strcmp");
	$bodega_ultima = array_pop($bodegas);

	var_dump($bodegas);
	//conteo de integrantes
	$conteo_integrantes = count($bodegas);

	//busqueda de valor cero en el array
	$existe_cero = array_search(0, $bodegas);

	//si se consigue un campo con cero entonces la comparacion no se lleva a cabo y tienes que colocarse como cero
	if($existe_cero)
	{
		echo "es cero\n";
		echo "son distintos\n";
		$comparacionCreate = BodegaComparacion::create([
		'clap_codigo' => $clap->codigo_clap,
		'bodega_mayoritaria_id' => '0',
		'comparacion' => '0',
		]);
	}
	else
	{
		$num2 = 0;
		$negativo = 0;
		$positivo = 0;
		echo "conteo: ".count($bodegas);
		foreach ($bodegas as $bo) 
		{
			if($bodega_ultima == $bo)
			{
				echo "es igual el array: ".$num2."\n";
				$positivo = $positivo + 1;
			}
			else
			{
				echo "no es igual a: ".$num2."\n";
				$negativo = $negativo + 1;
				foreach($clapnuevo as $n)
				{	
					//Guardando en la tabla a integrante	
					$clapAcreate = ClapsBodegaComparacion::create([
						'estado_id'   	 => $n->estado_id,
						'municipio_id'	 => $n->municipio_id,
						'parroquia_id'	 => $n->parroquia_id,
						'clap_codigo' 	 => $n->clap_codigo,
						'clap_nombre' 	 => $n->clap_nombre, 
						'bodega_id'		 => $n->bodega_id,
						'comunidad'   	 => $n->comunidad, 
						'cargo_id'       => $n->cargo_id,
						'tipo'        	 => $n->tipo,
						'cedula'      	 => $n->cedula,
						'nombre_apellido'=> $n->nombre_apellido,
						'telefono'       => $n->telefono,
						'registrado'     => $n->registrado,
						'ubicado'		 => $n->ubicado,
						'comparacion' 	 => '',
					]);
				}
			}
			$num2 = $num2 + 1;

			$positivoTotal = $positivo;
			$negativoTotal = $negativo;
		}
		$comparacionCreate = BodegaComparacion::create([
		'clap_codigo' => $clap->codigo_clap,
		'bodega_mayoritaria_id' => $bodega_ultima,
		'comparacion' => $positivo.":".$negativo,
		]);


		echo "---------------------------------------------------------------------\n";	
		echo "RESULTADO: ".$positivo.":".$negativo."\n";
		echo "---------------------------------------------------------------------\n";	
	}

	echo "------------------------------------------------------------\n";
}

