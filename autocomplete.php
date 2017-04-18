<?php 
header( 'Content-type: text/html; charset=iso-8859-1' );
require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DB\Eloquent;
use Models\Bodega;
use Models\BodegaComparacion;
use Models\Clap2;
use Models\Clap;
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Jefe;
new Eloquent();

extract($_GET);
extract($_POST);

$bodegas = Bodega::all();

foreach ($bodegas as $company) {
   $companyLabel = $company->responsable;
   if ( strpos( strtoupper($companyLabel), strtoupper($term) )!== false ) {
      array_push( $result, $company );
   }
}

echo json_encode( $result );
?>


