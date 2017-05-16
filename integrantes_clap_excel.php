<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\ClapZona;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
new Eloquent();
extract($_GET);
extract($_POST);
$muni = Municipio::where('id_municipio', $municipio)->first();
$parro = Parroquia::where('id_parrouia', $parroquia)->first();
$sector  = Sector::where('id', $sector_id)->first();
$zona  = ClapZona::where('id', $zona_id)->first();

$Excel = array();

$array = Array (
        0 => Array (
          "id",
          "tipo",
          "cedula",          
          "nombre apellido",
          "telefono",
          "clap",
          "bodega",
          "tipo b",
          "rif b",
          "razon_social",
          "municipio",
          "parroquia",
        ),
);
/*
$array = Array (
  0 => Array (
          "id",
          "tipo",
          "cedula",          
          "nombre apellido",
          "telefono",
          "clap",
          "bodega",
          "tipo b",
          "rif b",
          "razon_social",
          "municipio",
          "parroquia",
          ),
    ),
);
*/
$Excel = array_merge($Excel,$array);

//Krumo::dump($zona->integrantes_clap()->where('eliminar', '<', 1)->get());

foreach ($zona->integrantes_clap()->where('eliminar', '<', 1)->get() as $key => $int) 
{
  $intmunicipio = Municipio::where('id_municipio',$int->municipio_int)->first();
  $intparroquia = Parroquia::where('id_parrouia',$int->parroquia_int)->first();

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
          $intmunicipio->nombre_municipio,
          $intparroquia->nombre_parroquia,
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
