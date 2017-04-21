<?php 
set_time_limit(000000000000000000000000);
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\Clap2;
use Models\Clap;
use Models\Familia;
use Models\Jefe;
new Eloquent();

$claps = Clap2::all();
$clapConteo = Clap2::count();
$num = 0;
$num2 = 0;

$counter = 0;
$total = $clapConteo;

foreach ($claps as $c) 
{
	if($c->status == true)
	{
		//si es jefe de familia
		if($c->tipo_f == 1)
		{
			$jefe_ubicacion = Jefe::where('cod_municipio',$c->id_municipio)->where('cod_parroquia',$c->id_parroquia)->where('cedula',$c->cedula)->first();
			
			//validando m y parroquia de forma global
			if($jefe_ubicacion)
			{
				echo "\n";
				echo "---------------------------------------------------------------------\n";
				echo "\033[32m SI GLOBAL: \033[0m: -> ".$c->cedula." \n";
				//comenzar a buscar por miembro de clap uno por uno
				echo "---------------------------------------------------------------------\n";
				$c->validado = 1;
				$c->validado_m = 1;
				$c->validado_p = 1;
				$c->save();
			}
			else
			{
				echo "\n";
				echo "---------------------------------------------------------------------\n";
				echo "\033[32m NO GLOBAL: \033[0m: -> ".$c->cedula." \n";
				//comenzar a buscar por miembro de clap uno por uno
				echo "---------------------------------------------------------------------\n";
				$c->validado = 0;
				$c->save();

				//validando municipio
				$jefe_validado_m = Jefe::where('cod_municipio',$c->id_municipio)->where('cedula',$c->cedula)->first();
				
				if($jefe_validado_m)
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m SI MUNICIPIO: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_m = 1;
					$c->save();
				}
				else
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m NO MUNICIPIO: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_m = 0;
					$c->save();
				}

				//validando parroquia
				$jefe_validado_p = Jefe::where('cod_parroquia',$c->id_parroquia)->where('cedula',$c->cedula)->first();
				
				if($jefe_validado_p)
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m SI PARROQUIA: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_p = 1;
					$c->save();
				}
				else
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m NO PARROQUIA: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_p = 0;
					$c->save();
				}
			}
		}


		//si es jefe de familia
		if($c->tipo_f == 2)
		{
			$jefe_ubicacion = Familia::where('cod_municipio',$c->id_municipio)->where('cod_parroquia',$c->id_parroquia)->where('cedula',$c->cedula)->first();
			
			//validando m y parroquia de forma global
			if($jefe_ubicacion)
			{
				echo "\n";
				echo "---------------------------------------------------------------------\n";
				echo "\033[32m SI GLOBAL: \033[0m: -> ".$c->cedula." \n";
				//comenzar a buscar por miembro de clap uno por uno
				echo "---------------------------------------------------------------------\n";
				$c->validado = 1;
				$c->validado_m = 1;
				$c->validado_p = 1;
				$c->save();
			}
			else
			{
				echo "\n";
				echo "---------------------------------------------------------------------\n";
				echo "\033[32m NO GLOBAL: \033[0m: -> ".$c->cedula." \n";
				//comenzar a buscar por miembro de clap uno por uno
				echo "---------------------------------------------------------------------\n";
				$c->validado = 0;
				$c->save();

				//validando municipio
				$jefe_validado_m = Familia::where('cod_municipio',$c->id_municipio)->where('cedula',$c->cedula)->first();
				
				if($jefe_validado_m)
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m SI MUNICIPIO: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_m = 1;
					$c->save();
				}
				else
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m NO MUNICIPIO: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_m = 0;
					$c->save();
				}

				//validando parroquia
				$jefe_validado_p = Familia::where('cod_parroquia',$c->id_parroquia)->where('cedula',$c->cedula)->first();
				
				if($jefe_validado_p)
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m SI PARROQUIA: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_p = 1;
					$c->save();
				}
				else
				{
					echo "\n";
					echo "---------------------------------------------------------------------\n";
					echo "\033[32m NO PARROQUIA: \033[0m: -> ".$c->cedula." \n";
					//comenzar a buscar por miembro de clap uno por uno
					echo "---------------------------------------------------------------------\n";
					$c->validado_p = 0;
					$c->save();
				}
			}
		}
	}
	echo "---------------------------------------------------------------------\n";
  	$counter++;
    $percentage = $counter/$total;
	$percentage = floor(round( (($counter / $clapConteo) * 100), 1 ));
    echo "Progreso: ".$percentage."% \n";
	echo "---------------------------------------------------------------------\n";
	echo "\n";
}	


