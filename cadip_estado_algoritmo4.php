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

function porcentaje($total, $parte, $redondear = 2) {
    return round($parte / $total * 100, $redondear);
}
 
$n1 = 255;
$n2 = 133;
$n3 = 87;
 
$total = $n1+$n2+$n3;
 
echo "$n1 es el " . porcentaje($total, $n1, 2) . "% de $total <br>";
echo "$n2 es el " . porcentaje($total, $n2, 2) . "% de $total <br>";
echo "$n3 es el " . porcentaje($total, $n3, 2) . "% de $total <br>";  