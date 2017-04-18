<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
use DB\Eloquent;
use Models\Bodega;
use Models\Clap;
use Models\Comercio;
use Models\Parroquia;

require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

new Eloquent();
//\krumo::dump($comercios);
$id_parroquia = $_POST['idparroquia'];
$claps = Clap::where('id_parroquia',$id_parroquia)->get();
//var_dump($bodegas);
echo "<option value=''>CLAP</option>";
echo "<optgroup label='-------'></optgroup>";
foreach ($claps as $key => $clap) {
	echo '<option value="'.$clap->id_clap.'">'.$clap->nombre_clap.'</option>';
}
?>
