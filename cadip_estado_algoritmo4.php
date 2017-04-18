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

//listando a todos los integrantes del clap
$claps = Clap2::all();

foreach ($claps as $key => $c) 
{
	
}