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

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

<style>
    table {
    	width: 90%;
    	height: 20px;
    }
</style>
</head>
<body>
<div class="container">

<h2><b><em>INFORME TÉCNICO DE LOS CLAP SECTOR DOMINGA ORITZ DE PAEZ</em></b></h2>		

<br>
<h3><u><em>INFORMACIÓN SUMINISTRADA:</em></u></h3>

<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr>
    <th>Código CLAP</th>
    <td>CLAPS-BAR-060514-00003</td>
  </tr>

  <tr>
    <th>Nombre del CLAP</th>
    <td>SAN ISIDRO I</td>
    </tr>

  <tr>
    <th>Nombre de La Bodega</th>
    <td>YOCIDIS ROSELIN ALVARADO VELASQUEZ</td>
  </tr>
  <tr>
    <th>Código Bodega</th>
    <td>920</td>
  </tr>	

  <tr>
    <th>RIF</th>
    <td>V-09324152-1</td>
  </tr>

  <tr>
    <th>Responsable de la Bodega</th>
    <td>YOCIDIS ROSELIN ALVARADO VELASQUEZ</td>
  </tr>

  <tr>
    <th>Cedula</th>
    <td>V-9324152</td>
  </tr>

  <tr>
    <th>Teléfono</th>
    <td>02736644440</td>
  </tr>

   <tr>
    <th>Municipio</th>
    <td>MUNICIPIO BARINAS</td>
  </tr>

   <tr>
    <th>Parroquia </th>
    <td>PARROQUIA DOMINGA ORTIZ DE PAEZ </td>
  </tr>

  <tr>
    <th>Sector</th>
    <td>SAN ISIDRO, LA MULA</td>
  </tr>

  <tr>
    <th>Comunidad</th>
    <td>SECTOR B2</td>
  </tr>

  <tr>
    <th>Consolidado</th>
    <td>1</td>
  </tr>

</table> 
<br>

<h3><u><em>CONDICIÓN DE LOS INTEGRANTES OFICIALES:</em></u></h3>

<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr>
	  <th>Id</th>
	  <th>Tipo</th>
	  <th>Cedula</th>          
	  <th>Nombre y Apellido</th>
	  <th>Teléfono</th>          
	  <th>Municipio</th>
	  <th>Parroquia</th> 	 
  </tr>

  <tr>
    <td>2</td>
    <td>V</td>
    <td>17987303</td>
    <td>CARLOS JULIO LOPEZ LIZARAZO</td>
    <td>04145356417</td>
    <td>MUNICIPIO BARINAS</td>
    <td>PARROQUIA ALTO BARINAS</td>    
</th>
</table>
<br>
          
<h3><u><em>OBSERVACIONES INTEGRANTES:</em></u></h3>

<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr>	  
	  <th>Cedula</th> 
	  <th>¿Existe CADIP?</th>
	  <th>Código CADIP</th>
	  <th>¿Jefe ó Carga?</th>
	  <th>¿Existe CLAP?</th>
	  <th>Cargo CLAP</th>
	  <th>¿Coincide Cargo CLAP?</th>
	  <th>¿Coincide Municipio CLAP - CADIP?</th>
	  <th>¿Coincide Parroquia CLAP - CADIP?</th>
  </tr>

  <tr>    
    <td>V-17987303</td>    
    <td>Sí</td>
    <td>256985</td>
    <td>Jefe</td>
    <td>Nó</td>
    <td>Lider de Comunidad</td>
    <td>Nó</td>
    <td>Sí</td>
    <td>Sí</td>
</th>
</table>
	
</div>
</body>
</html>