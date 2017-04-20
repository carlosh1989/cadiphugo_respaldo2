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

$claps = Clap::all();
$clapConteo = Clap::count();
$counter = 0;
$total = $clapConteo;

foreach ($claps as $clap) 
{
	echo "\n";
	echo "---------------------------------------------------------------------\n";
	echo "\033[32m NOMBRE CLAP \033[0m: -> ".$clap->nombre_clap." \n";
	//comenzar a buscar por miembro de clap uno por uno
	echo "---------------------------------------------------------------------\n";
	//lider de comunidad
	if($clap->l_com_cedula)
	{
		echo "LIDER COMUNIDAD: ".$clap->nombre_comunidad."";

		//buscando a integrante en tabla de jefes de familia
		$jefe1 = Jefe::where('cedula',$clap->l_com_cedula)->first();
		$familiar1 = Familia::where('cedula',$clap->l_com_cedula)->first();
		$clapA = Clap2::where('cedula', $clap->l_com_cedula)->first();

		if($jefe1)
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'clap_codigo' 	 => $clap->codigo_clap,
				'clap_nombre' 	 => $clap->nombre_clap, 
				'id_bodega'		 => $jefe1->bodega,
				'comunidad'   	 => $clap->comunidad, 
				'cargo_id'       	 => '1',
				'tipo'        	 => $clap->tipo_comunidad,
				'cedula'      	 => $clap->l_com_cedula,
				'nombre_apellido'=> $clap->l_comunidad,
				'telefono'       => $clap->l_com_telefono,
				'tipo_f'		=> 1,
				'status'     	=> 1,
				'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
			]);
			echo "\033[32m -> INTEGRANTE: ".$jefe1->bodega." \033[0m";
			echo "\n";
		}
		else
		{
			if($familiar1)
			{
				//Guardando en la tabla a integrante	
				$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
					'clap_codigo' 	 => $clap->codigo_clap,
					'clap_nombre' 	 => $clap->nombre_clap, 
					'id_bodega'		 => $familiar1->bodega,
					'comunidad'   	 => $clap->comunidad, 
					'cargo_id'       	 => '1',
					'tipo'        	 => $clap->tipo_comunidad,
					'cedula'      	 => $clap->l_com_cedula,
					'nombre_apellido'=> $clap->l_comunidad,
					'telefono'       => $clap->l_com_telefono,
					'tipo_f'		=> 2,
					'status'     	=> 1,
				'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
				]);
				echo "\033[32m -> INTEGRANTE: ".$clap->nombre_comunidad." \033[0m";
				echo "\n";
			}
		}
	}

	//ubch
	if ($clap->l_ubch_cedula) 
	{
		echo "UBCH: ".$clap->nombre_ubch."";
		//buscando a integrante en tabla de jefes de familia
		$jefe2 = Jefe::where('cedula',$clap->l_ubch_cedula)->first();
		$familiar2 = Familia::where('cedula',$clap->l_ubch_cedula)->first();

		$clapB = Clap2::where('cedula', $clap->l_ubch_cedula)->first();


		if($jefe2)
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'clap_codigo' 	 => $clap->codigo_clap,
				'clap_nombre' 	 => $clap->nombre_clap, 
				'id_bodega'		 => $jefe2->bodega,
				'comunidad'   	 => $clap->comunidad, 
				'cargo_id'       	 => '2',
				'tipo'        	 => $clap->tipo_ubch,
				'cedula'      	 => $clap->l_ubch_cedula,
				'nombre_apellido'=> $clap->l_ubch,
				'telefono'       => $clap->l_ubch_telefono,
				'tipo_f'		=> 2,
				'status'     	=> 1,
								'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
			]);
			echo "\033[32m -> INTEGRANTE: ".$clap->nombre_ubch." \033[0m";
			echo "\n";
		}
		else
		{
			if($familiar2)
			{
				//Guardando en la tabla a integrante	
				$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
					'clap_codigo' 	 => $clap->codigo_clap,
					'clap_nombre' 	 => $clap->nombre_clap, 
					'id_bodega'		 => $familiar2->bodega,
					'comunidad'   	 => $clap->comunidad, 
					'cargo_id'       	 => '2',
					'tipo'        	 => $clap->tipo_ubch,
					'cedula'      	 => $clap->l_ubch_cedula,
					'nombre_apellido'=> $clap->l_ubch,
					'telefono'       => $clap->l_ubch_telefono,
					'tipo_f'		=> 2,
					'status'     	=> 1,
									'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
				]);
				echo "\033[32m -> INTEGRANTE: ".$clap->nombre_ubch." \033[0m";
				echo "\n";
			}
		}
	}

	//una mujer
	if($clap->l_unamujer_cedula)
	{
		echo "UNA MUJER: ".$clap->nombre_unamujer."";
		//buscando a integrante en tabla de jefes de familia
		$jefe3 = Jefe::where('cedula',$clap->l_unamujer_cedula)->first();
		$familiar3 = Familia::where('cedula',$clap->l_unamujer_cedula)->first();

		$clapC = Clap2::where('cedula', $clap->l_unamujer_cedula)->first();

		if($jefe3)
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'clap_codigo' 	 => $clap->codigo_clap,
				'clap_nombre' 	 => $clap->nombre_clap, 
				'id_bodega'		 => $jefe3->bodega,
				'comunidad'   	 => $clap->comunidad, 
				'cargo_id'       	 => '3',
				'tipo'        	 => $clap->tipo_unamujer,
				'cedula'      	 => $clap->l_unamujer_cedula,
				'nombre_apellido'=> $clap->l_unamujer,
				'telefono'       => $clap->l_unamujer_cedula_telefono,
				'tipo_f'		=> 2,
				'status'     	=> 1,
								'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
			]);
			echo "\033[32m -> INTEGRANTE: ".$clap->nombre_unamujer." \033[0m";
			echo "\n";
		}
		else
		{
			if($familiar3)
			{
				//Guardando en la tabla a integrante	
				$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
					'clap_codigo' 	 => $clap->codigo_clap,
					'clap_nombre' 	 => $clap->nombre_clap, 
					'id_bodega'		 => $familiar3->bodega,
					'comunidad'   	 => $clap->comunidad, 
					'cargo_id'       	 => '3',
					'tipo'        	 => $clap->tipo_unamujer,
					'cedula'      	 => $clap->l_unamujer_cedula,
					'nombre_apellido'=> $clap->l_unamujer,
					'telefono'       => $clap->l_unamujer_cedula_telefono,
					'tipo_f'		=> 2,
					'status'     	=> 1,
									'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
				]);
				echo "\033[32m -> INTEGRANTE: ".$clap->nombre_unamujer." \033[0m";
				echo "\n";
			}
		}
	}

	//Lider FFM
	if($clap->l_ffm_cedula)
	{
		echo "LIDER FFM: ".$clap->nombre_ffm."";
		//buscando a integrante en tabla de jefes de familia
		$jefe4 = Jefe::where('cedula',$clap->l_ffm_cedula)->first();
		$familiar4 = Familia::where('cedula',$clap->l_ffm_cedula)->first();

		$clapD = Clap2::where('cedula', $clap->l_ffm_cedula)->first();

		if($jefe4)
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'clap_codigo' 	 => $clap->codigo_clap,
				'clap_nombre' 	 => $clap->nombre_clap, 
				'id_bodega'		 => $jefe4->bodega,
				'comunidad'   	 => $clap->comunidad, 
				'cargo_id'       	 => '4',
				'tipo'        	 => $clap->tipo_ffm,
				'cedula'      	 => $clap->l_ffm_cedula,
				'nombre_apellido'=> $clap->l_ffm,
				'telefono'       => $clap->l_ffm_telefono,
				'tipo_f'		=> 2,
				'status'     	=> 1,
								'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
			]);
			echo "\033[32m -> INTEGRANTE: ".$clap->l_ffm_telefono." \033[0m";
			echo "\n";
		}
		else
		{
			if($familiar4)
			{
				//Guardando en la tabla a integrante	
				$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
					'clap_codigo' 	 => $clap->codigo_clap,
					'clap_nombre' 	 => $clap->nombre_clap, 
					'id_bodega'		 => $familiar4->bodega,
					'comunidad'   	 => $clap->comunidad, 
					'cargo_id'       	 => '4',
					'tipo'        	 => $clap->tipo_ffm,
					'cedula'      	 => $clap->l_ffm_cedula,
					'nombre_apellido'=> $clap->l_ffm,
					'telefono'       => $clap->l_ffm_telefono,
					'tipo_f'		=> 2,
					'status'     	=> 1,
									'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
				]);
				echo "\033[32m -> INTEGRANTE: ".$clap->l_ffm_telefono." \033[0m";
				echo "\n";
			}
		}
	}

	//l_ccomunal
	if($clap->l_ccomunal_cedula)
	{
		echo "LIDER CONSEJO COMUNAL: ".$clap->nombre_ccomunal."";
		//buscando a integrante en tabla de jefes de familia
		$jefe5 = Jefe::where('cedula',$clap->l_ccomunal_cedula)->first();
		$familiar5 = Familia::where('cedula',$clap->l_ccomunal_cedula)->first();

		$clapE = Clap2::where('cedula', $clap->l_ccomunal_cedula)->first();

		if($jefe5)
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'clap_codigo' 	 => $clap->codigo_clap,
				'clap_nombre' 	 => $clap->nombre_clap, 
				'id_bodega'		 => $jefe5->bodega,
				'comunidad'   	 => $clap->comunidad, 
				'cargo_id'       	 => '5',
				'tipo'        	 => $clap->tipo_ccomunal,
				'cedula'      	 => $clap->l_ccomunal_cedula,
				'nombre_apellido'=> $clap->l_ccomunal,
				'telefono'       => $clap->l_ccomunal_telefono,
				'tipo_f'		=> 2,
				'status'     	=> 1,
								'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
			]);
			echo "\033[32m -> INTEGRANTE: ".$clap->nombre_ccomunal." \033[0m";
			echo "\n";
		}
		else
		{
			if($familiar5)
			{
				//Guardando en la tabla a integrante	
				$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
					'clap_codigo' 	 => $clap->codigo_clap,
					'clap_nombre' 	 => $clap->nombre_clap, 
					'id_bodega'		 => $familiar5->bodega,
					'comunidad'   	 => $clap->comunidad, 
					'cargo_id'       	 => '5',
					'tipo'        	 => $clap->tipo_ccomunal,
					'cedula'      	 => $clap->l_ccomunal_cedula,
					'nombre_apellido'=> $clap->l_ccomunal,
					'telefono'       => $clap->l_ccomunal_telefono,
					'tipo_f'		=> 2,
					'status'     	=> 1,
									'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
				]);
				echo "\033[32m -> INTEGRANTE: ".$clap->nombre_ccomunal." \033[0m";
				echo "\n";
			}
		}
	}

	//Lider Milicia
	if($clap->l_milicia_cedula)
	{
		echo "MILICIA: ".$clap->nombre_milicia."";
		//buscando a integrante en tabla de jefes de familia
		$jefe6 = Jefe::where('cedula',$clap->l_milicia_cedula)->first();
		$familiar6 = Familia::where('cedula',$clap->l_milicia_cedula)->first();

		$clapF = Clap2::where('cedula', $clap->l_milicia_cedula)->first();

		if($jefe6)
		{
			//Guardando en la tabla a integrante	
			$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
				'clap_codigo' 	 => $clap->codigo_clap,
				'clap_nombre' 	 => $clap->nombre_clap, 
				'id_bodega'		 => $jefe6->bodega,
				'comunidad'   	 => $clap->comunidad, 
				'cargo_id'       	 => '6',
				'tipo'        	 => $clap->tipo_milicia,
				'cedula'      	 => $clap->l_milicia_cedula,
				'nombre_apellido'=> $clap->l_milicia,
				'telefono'       => $clap->l_milicia_telefono,
				'tipo_f'		=> 2,
				'status'     	=> 1,
								'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
			]);
			echo "\033[32m -> INTEGRANTE: ".$clap->nombre_milicia." \033[0m";
			echo "\n";
		}
		else
		{
			if($familiar6)
			{
				//Guardando en la tabla a integrante	
				$clapAcreate = Clap2::create([
				'id_estado'   	 => $clap->id_estado,
				'id_municipio'	 => $clap->id_municipio,
				'id_parroquia'	 => $clap->id_parroquia,
					'clap_codigo' 	 => $clap->codigo_clap,
					'clap_nombre' 	 => $clap->nombre_clap, 
					'id_bodega'		 => $familiar6->bodega,
					'comunidad'   	 => $clap->comunidad, 
					'cargo_id'       	 => '6',
					'tipo'        	 => $clap->tipo_milicia,
					'cedula'      	 => $clap->l_milicia_cedula,
					'nombre_apellido'=> $clap->l_milicia,
					'telefono'       => $clap->l_milicia_telefono,
					'tipo_f'		=> 2,
					'status'     	=> 1,
									'validado'		=> 0,
				'validado_m' 	=> 0,
				'validado_p'	=> 0,
				'validado_b'	=> 0,
				'status_consolidado'=> 0, 
				]);
				echo "\033[32m -> INTEGRANTE: ".$clap->nombre_milicia." \033[0m";
				echo "\n";
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
