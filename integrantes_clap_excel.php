
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

/* //////////////////////////////////////////////////////////////////////////////////////////////////
$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$array = Array (
        0 => Array (
          "Código Bodega",
          $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->cod_bodega,
        ),
);

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$cedula = $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->tipo_b.'-'.$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->rif_b;

$array = Array (
        0 => Array (
          "RIF",
          $cedula,         

        ),
);
///////////////////////////////////////////////////////////////////////////////////////////////// */

$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

  $bodeg = $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->razon_social.'('.$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->cod_bodega.')';
$array = Array (
        0 => Array (
          "Nombre de la Bodega",
          $bodeg,
        ),
);

/* /////////////////////////////////////////////////////////////////////////////////////////////////
$Excel = array_merge($Excel,$array);

$array = Array (
        0 => Array (
          "", 
        ),
);

$cedula_int = $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->tipo_r.'-'.$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->cedula_r;

$array = Array (
        0 => Array (
          "Responsable de la Bodega",
          $zona->bodega->responsable,
          "Cedula: ".$cedula_int,          
          "Teléfono: ".$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->telefono_r,
        ),
);
///////////////////////////////////////////////////////////////////////////////////////////////// */
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

$array = Array (
        0 => Array (
          "Sub-Sector",
          $zona->subsector,
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
          "Comunidad",
          $zona->comunidad,
        ),
);

$Excel = array_merge($Excel,$array);


$array = Array (
        0 => Array (
          "", 
        ),
);

       
if($zona->consolidado == true)
    {
    $consolidado = "CLAP Consolidado";
    }
  else
      {
      $consolidado = "CLAP NO Consolidado";
      }        
$array = Array (
        0 => Array (
          "¿Esta Consolidado?",
          $consolidado,
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
          // "Id",
          // "Tipo",
          "Cargo CLAP",
          "Cedula",          
          "Nombre y Apellido",
          "Teléfono",          
          /*"Municipio",
          "Parroquia", 
          "¿Existe CADIP?",
          "Código CADIP",
          "¿Jefe ó Carga?",
          "¿Existe CLAP?",
          "Cargo CLAP",
          "¿Coincide Cargo CLAP?",
          "¿Coincide Municipio CLAP - CADIP?",
          "¿Coincide Parroquia CLAP - CADIP?",*/
          "Observaciones",
        ),
);


$Excel = array_merge($Excel,$array);

//Krumo::dump($zona->integrantes_clap()->where('eliminar', '<', 1)->get());

foreach ($zona->integrantes_clap()->where('eliminar', '<', 1)->get() as $key => $int) 
{

  if($int->e_cadip == 1)
  {
    $e_cadip = "Sí";
  }
  else
  {
    $e_cadip = "Nó";
  }

  if($int->jefe_carga == 1)
  {
    $j_c = "Jefe";
  }
  else
  {
    $j_c = "Carga";
  }

  if($int->e_clap == 1)
  {
    $e_clap = "Sí";
  }
  else
  {
    $e_clap = "Nó";
  }

  if($int->c_cargo == 1)
  {
    $c_cargo = "Sí";
  }
  else
  {
    $c_cargo = "Nó";
  }

  if($int->c_municipio == 1)
  {
    $c_municipio = "Sí";
  }
  else
  {
    $c_municipio = "Nó";
  }

  if($int->c_parroquia == 1)
  {
    $c_parroquia = "Sí";
  }
  else
  {
    $c_parroquia = "Nó";
  }


  $array = Array (
          0 => Array (
          // $int->id,
          // $int->tipo_c,
          $int->cargo->cargo,                    
          $int->cedula,          
          $int->nombre_a,
          $int->telefono,          
          /*$int->intmunicipio->nombre_municipio,
          $int->intparroquia->nombre_parroquia,   
          $e_cadip,
          $zona->cod_cadip, 
          $j_c,
          $e_clap,
          $int->cargo->cargo,
          $c_cargo,
          $c_municipio,
          $c_parroquia,*/  
          

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
