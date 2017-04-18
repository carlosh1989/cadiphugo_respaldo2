<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\Jefe;
new Eloquent();

extract($_GET);
extract($_POST);

$solos = Jefe::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
$jefe = Jefe::where('bodega', $bodega)->first();
//\krumo::dump($solos);
?>
<br>
<div class="bodega">
<strong>Datos de bodega</strong>
<br>
Responsable: <?php echo $jefe->bodeguera->responsable ?>
<br>	
Dirección: <?php echo $jefe->bodeguera->rason_social ?>
	
</div>
<h3 align="center">Personas Solas</h3>
<table border=0 cellspacing=0 cellpadding=2 bordercolor="666633">
    <thead>
	    <tr style="background-color:#DCDCDC;">
	        <th>Nombre Apellido</th>
	        <th>Cédula</th>
	        <th>Edad</th>
	        <th>Sexo</th>
	    </tr>
    </thead>
    <tbody>
		<?php foreach ($solos as $solo): ?>
		<tr>
			<td align="left"><?php echo $solo->nombre_apellido ?></td>
			<td align="left"><?php echo $solo->tipo ?>-<?php echo $solo->cedula ?></td>
			<td align="center"><?php echo $solo->edad ?></td>
			<td align="center">
			<?php 
			if($solo->sexo == '2')
			{
				echo "Masculino";
			}
			else
			{
				echo "Femenino";
			}
			?>
			</td>
      	</tr>
		<?php endforeach ?>
    </tbody>
  </table>
  <hr>
  <pre>Total personas solas: <?php echo $solos->count() ?></pre>
