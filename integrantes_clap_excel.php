<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\ClapZona;
new Eloquent();
extract($_GET);
extract($_POST);
$zona  = ClapZona::where('id', $zona_id)->first();

$Excel = array();

$array = Array (
        0 => Array (
          "Código CLAP",
          $zona->cod_clap,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (
        0 => Array (
          "Nombre del CLAP",
          $zona->nombre_clap,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (
        0 => Array (
          "Razon social",
          $zona->bodega->rason_social,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (
        0 => Array (
          "Responsable de la Bodega",
          $zona->bodega->responsable,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (  
        0 => Array (
          "Municipio",
          $zona->bodega->municipio->nombre_municipio,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);


$array = Array (
        0 => Array (
          "Parroquia",
          $zona->bodega->parroquia->nombre_parroquia,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (
        0 => Array (
          "Sector",
          $zona->sector_clap->sector,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (
        0 => Array (
          "Id",
          "Tipo",
          "Cedula",          
          "Nombre y Apellido",
          "Teléfono",
          "Tipo",
          "RIF Bodega",
          "Nombre Bodega",
          "Municipio",
          "Parroquia",
          "Tipo",
          "Cedula",
          "Teléfono",
        ),
);


$Excel = array_merge($Excel,$array);

//Krumo::dump($zona->integrantes_clap()->where('eliminar', '<', 1)->get());

foreach ($zona->integrantes_clap()->where('eliminar', '<', 1)->get() as $key => $int) 
{
  $array = Array (
          0 => Array (
          $int->id,
          $int->tipo_c,
          $int->cedula,          
          $int->nombre_a,
          $int->telefono,
          $int->clap,
          $int->cod_bodega,
          $int->tipo_b,
          $int->rif_b,
          $int->razon_social,
          $int->intmunicipio->nombre_municipio,
          $int->intparroquia->nombre_parroquia,
          $int->tipo_r,
          $int->cedula_r,
          $int->responsable,
          $int->telefono_r,
          ),
  );
  $Excel = array_merge($Excel,$array);
}

header("Content-Disposition: attachment; filename=\"integrantes.xls\"");
header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");
$out = fopen("php://output", 'w');
foreach ($Excel as $data)
{
    fputcsv($out, $data,"\t");
}
fclose($out);
