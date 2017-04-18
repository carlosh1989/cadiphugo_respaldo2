<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\BaseMisionesClap;
use Models\Clap2;
use Models\Clap;
use Models\Familia;
use Models\Jefe;
use Models\JefeCertificados;
use Models\Municipio;
use Models\Parroquia;
new Eloquent();

extract($_GET);
extract($_POST);

/*$jefes = JefeCertificados::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'asc')->where('huella_certificada',1)->get();

$solos = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->where('huella_certificada',1)->get();

$solosconteo = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->get();

$jefe = JefeCertificados::where('bodega', $bodega)->first();
//\krumo::dump($solos);

//$jefeclaps = Clap::where('cedula',$jefe->bodeguera->ci_representante)->first();
$responsable = JefeCertificados::where('cedula', $jefe->bodeguera->ci_representante)->first();

$clapcodigo = $responsable->clap;
$basemisionesclap = BaseMisionesClap::where('cod_clap',$clapcodigo)->first();
$mision_base_nombre = $basemisionesclap->basemision->nombre_base;
$municipio = Municipio::where('id_municipio',$jefe->bodeguera->cod_municipio)->first();
$parroquia = Parroquia::where('id_parrouia',$jefe->bodeguera->cod_parroquia)->first();
$datosclap = Clap::where('codigo_clap',$responsable->clap)->first();

$solo_conteo = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->get();*/


$jefes = JefeCertificados::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'asc')->where('huella_certificada',1)->get();

$solos = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->where('huella_certificada',1)->get();

$solosconteo = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->get();

$jefe = JefeCertificados::where('bodega', $bodega)->first();
//\krumo::dump($solos);

//$jefeclaps = Clap::where('cedula',$jefe->bodeguera->ci_representante)->first();
$responsable = JefeCertificados::where('cedula', $jefe->bodeguera->ci_representante)->first();

$clapcodigo = $jefe->clap;
$basemisionesclap = BaseMisionesClap::where('cod_clap',$clapcodigo)->first();
$mision_base_nombre = $basemisionesclap->basemision->nombre_base;
$municipio = Municipio::where('id_municipio',$jefe->bodeguera->cod_municipio)->first();
$parroquia = Parroquia::where('id_parrouia',$jefe->bodeguera->cod_parroquia)->first();
$datosclap = Clap::where('codigo_clap',$jefe->clap)->first();

$jefes = JefeCertificados::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'asc')->where('huella_certificada',1)->get();

$solos = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->where('huella_certificada',1)->get();

$solosconteo = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->get();

$jefe = JefeCertificados::where('bodega', $bodega)->first();
//\krumo::dump($solos);

//$jefeclaps = Clap::where('cedula',$jefe->bodeguera->ci_representante)->first();
$responsable = JefeCertificados::where('cedula', $jefe->bodeguera->ci_representante)->first();

$clapcodigo = $jefe->clap;
$basemisionesclap = BaseMisionesClap::where('cod_clap',$clapcodigo)->first();
$mision_base_nombre = $basemisionesclap->basemision->nombre_base;
$municipio = Municipio::where('id_municipio',$jefe->bodeguera->cod_municipio)->first();
$parroquia = Parroquia::where('id_parrouia',$jefe->bodeguera->cod_parroquia)->first();
$datosclap = Clap::where('codigo_clap',$jefe->clap)->first();



$solo_conteo = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->get();
?>
<br>
<div class="bodega">
<strong>Datos de clap</strong>
<br>	
Codigo Clap: <?php echo $datosclap->codigo_clap ?>
<br>
Nombre Clap: <?php echo $datosclap->nombre_clap ?>
<br>
Base de misión: <?php echo $mision_base_nombre ?>
<br>
Sector: <?php echo $datosclap->comunidad ?>
<br>
<br>
<strong>Datos de bodega</strong>
<br>
Responsable: <?php echo $jefe->bodeguera->responsable ?>
<br>
Municipio: <?php echo $municipio->nombre_municipio ?>
<br>
Parroquia: <?php echo $parroquia->nombre_parroquia ?>
<br>  
Dirección: <?php echo $jefe->bodeguera->direccion ?>
</div>
<h3 align="center">Jefes con huellas certificadas</h3>
<table border=0 cellspacing=0 cellpadding=2 bordercolor="666633">
    <thead>
        <tr style="background-color:#DCDCDC;">
        <th>Nombre Apellido</th>
        <th>Cédula</th>
        <th>Parentesco</th>
        <th>Edad</th>
        <th>Discapacidad</th>
      </tr>
    </thead>
    <tbody>
   <?php $familiaconteo = 0; ?>
		<?php foreach ($jefes as $jefe): ?>
        <tr style="background-color:#73C5FF;">
			<td align="left"><?php echo $jefe->nombre_apellido ?></td>
			<td align="left"><?php echo $jefe->tipo ?>-<?php echo $jefe->cedula ?></td>
			<td align="center">Jefe Familia</td>
			<td align="center"><?php echo $jefe->edad ?></td>
			<td align="center"></td>
      	</tr>
<?php $familias = Familia::where('cod_cabeza_familia', $jefe->cedula)->where('nombre_y_apellido', 'not like', '%La cédula de identidad%')->get() ?>

<?php $familiaconteo = $familias->count() + $familiaconteo; ?>

      	<?php foreach ($familias as $familiar): ?>
        <tr class="bordered">
			<td align="left"><?php echo $familiar->nombre_y_apellido ?></td>
			<td align="left"><?php echo $familiar->nac ?>-<?php echo $familiar->cedula ?></td>
			<td align="center">
			<?php if ($familiar->parentesco=='1'): ?>
				<?php echo 'Padre' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='2'): ?>
				<?php echo 'Madre' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='3'): ?>
				<?php echo 'Hijo(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='4'): ?>
				<?php echo 'Concubino(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='5'): ?>
				<?php echo 'Esposo(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='6'): ?>
				<?php echo 'Abuelo(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='7'): ?>
				<?php echo 'Tio(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='8'): ?>
				<?php echo 'Sobrino(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='9'): ?>
				<?php echo 'Nieto(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='10'): ?>
				<?php echo 'Hermano(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='11'): ?>
				<?php echo 'Primo(a)' ?>
			<?php endif ?>
			<?php if ($familiar->parentesco=='12'): ?>
				<?php echo 'Cuñado(a)' ?>
			<?php endif ?>
			</td>
			<td align="center"><?php echo $familiar->edad ?></td>
			<?php if ($familiar->discapacidad == "NINGUNA"): ?>
			<td align="center"></td>	
			<?php else: ?>
			<td align="center"><?php echo $familiar->discapacidad ?></td>
			<?php endif ?>
			<td></td>
      	</tr>
      	<?php endforeach ?>
		<?php endforeach ?>
		<tr>
			<td colspan="6" align="center">
			<h3>Personas solas</h3>
			</td>
		</tr>
		<?php foreach ($solos as $solo): ?>
        <tr>
			<td align="left"><?php echo $solo->nombre_apellido ?></td>
			<td align="center"><?php echo $jefe->tipo ?>-<?php echo $solo->cedula ?></td>
			<td align="center"></td>
			<td align="center"><?php echo $solo->edad ?></td>
			<?php if ($familiar->discapacidad == "NINGUNA"): ?>
			<td align="center"></td>	
			<?php else: ?>
			<td align="center"><?php echo $familiar->discapacidad ?></td>
			<?php endif ?>
      	</tr>
		<?php endforeach ?>
    </tbody>
  </table>

<?php 

$familias_conteo = Familia::where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->where('nombre_y_apellido', 'not like', '%La cédula de identidad%')->get();

$total_familias = $jefes->count() + $solos->count();
$total_personas = $jefes->count() + $familiaconteo + $solosconteo->count();
?>



<?php
$jefes_certificados = JefeCertificados::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'asc')->where('huella_certificada',1)->get();

$solos_certificados = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->where('huella_certificada',1)->get();

$jefes_no_certificados = JefeCertificados::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'asc')->where('huella_certificada',0)->get();

$solos_no_certificados = JefeCertificados::where('n_personas',1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('cedula', 'desc')->where('huella_certificada',0)->get();
?>
<hr>
<b>Número de Familias:</b> <?php echo $jefes->count() ?> 
<br>
<b>Número de Personas:</b> <?php echo $total_personas ?>

<br>
<b>Jefes de familia no certificados:</b> <?php echo $jefes_no_certificados->count() + $solos_no_certificados->count(); ?>
<hr>
<b>Número de Personas solas:</b> <?php echo $solos->count() ?>
<br>
<b>Personas solas certificadas:</b> <?php echo $solos->count() ?>
<br>
<b>Personas solas no certificadas:</b> <?php echo $solos_no_certificados->count() ?>
<br>
<hr>


