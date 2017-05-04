<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\BaseMisiones;
use Models\Bodega;
use Models\BodegaComparacion;
use Models\Cargo;
use Models\Clap2;
use Models\Clap;
use Models\ClapZona;
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Integrantes;
use Models\Jefe;
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
$jefe = Jefe::where('cedula', $cedula)->first();
$familia = Familia::where('cedula',$cedula)->first();
$cargos = Cargo::all();
//Krumo::dump($jefe);
$integrante = Integrantes::where('cedula',$cedula)->first();
if($integrante)
{
$registrado = 1;
$bodega = "";
$existe = 0;
$tipo_c = "";
$cedula = "";
$nombre_y_apellido = "";
$telefono = "";
$municipio_int = "";
$parroquia_int = "";
$e_cadip = 0;
$cargo = "";
$clap_existe = 0;
$bodega = "";
}
else
{
if($jefe)
{
//si existe en tabla integrantes
$registrado = 0;
//si existe en las dos tablas CADIP jefe y carga familiar
$existe = 1;
$tipo_c = $jefe->tipo;
$cedula = $jefe->cedula;
$nombre_y_apellido = $jefe->nombre_apellido;
$telefono = $jefe->telefono;
$municipio_int = $jefe->cod_municipio;
$parroquia_int = $jefe->cod_parroquia;
$e_cadip = 1;
$claps = Clap2::where('cedula',$cedula)->first();
$bodega = Bodega::find($jefe->bodega);
if($claps)
{
$cargo = Cargo::where('id',$claps->cargo_id)->first();
$clap_existe = 1;
}
else
{
$cargo = "";
$clap_existe = 0;
}
}
else
{
if($familia)
{
$registrado = 0;
$existe = 1;
$tipo_c = $familia->nac;
$cedula = $familia->cedula;
$nombre_y_apellido = $familia->nombre_y_apellido;
$telefono = "";
$municipio_int = $familia->cod_municipio;
$parroquia_int = $familia->cod_parroquia;
$e_cadip = 1;
//$cabeza_familia = Jefe::where('cedula',$familia->cod_cab)->first();
$claps = Clap2::where('cedula',$cedula)->first();
$bodega_jefe = Jefe::where('cedula',$familia->cod_cabeza_familia)->first();
$bodega = Bodega::find($bodega_jefe->bodega);

//Krumo::dump($bodega);
if($claps)
{
$cargo = Cargo::where('id',$claps->cargo_id)->first();
$clap_existe = 1;
}
else
{
$cargo = "";
$clap_existe = 0;
}
}
else
{
$registrado = 0;
$existe = 0;
$tipo_c = "";
$cedula = "";
$nombre_y_apellido = "";
$telefono = "";
$municipio_int = "";
$parroquia_int = "";
$e_cadip = 0;
$cargo = "";
$clap_existe = 0;
$bodega = "";
}
}
}
if($bodega)
{
$bodega_id = $bodega->id;
$bodega_tipo_b = substr($bodega->rif, 0, 1);
$bodega_rif = substr($bodega->rif,1);
$bodega_razon_social = $bodega->rason_social;
$bodega_municipio = $bodega->cod_municipio;
$bodega_parroquia = $bodega->cod_parroquia;
$bodega_responsable_cedula = $bodega->ci_representante;
$bodega_responsable_nombre = $bodega->responsable;
$bodega_responsable_telefono = $bodega->tlf_responsable;
}
else
{
$bodega_id = "";
$bodega_tipo_b = "";
$bodega_rif = "";
$bodega_razon_social = "";
$bodega_municipio = "";
$bodega_parroquia = "";
$bodega_responsable_cedula = "";
$bodega_responsable_nombre = "";
$bodega_responsable_telefono = "";
}

if($municipio_int AND $parroquia_int)
{
if($bodega_municipio AND $bodega_parroquia)
{

if($municipio_int == $bodega_municipio)
{
$igual_municipio = 1;
}
else
{
$igual_municipio = 0;
}

if($parroquia_int == $bodega_parroquia)
{
$igual_parroquia = 1;
}
else
{
$igual_parroquia = 0;
}
}
}
else
{
}

if($integrante)
{
  $c_bodega = "";
}
else
{
  if($zona->cod_bodega == $bodega->id)
  {
    $c_bodega = 1;
  }
  else
  {
   $c_bodega = 0;
  } 
}


?>
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Let browser know website is optimized for mobile-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <!--Import jQuery before materialize.js-->
    <!-- Compiled and minified JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script language="javascript">
    $(document).ready(function(){
    $("#municipio").change(function () {
    $("#municipio option:selected").each(function () {
    idmunicipio = $(this).val();
    $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
    $("#parroquia").html(data);
    });
    window.console&&console.log(idmunicipio);
    });
    })
    });
    </script>
    <script language="javascript">
    $(document).ready(function(){
    $("#parroquia").change(function () {
    $("#parroquia option:selected").each(function () {
    idparroquia = $(this).val();
    $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
    $("#bodega").html(data);
    });
    window.console&&console.log(idparroquia);
    });
    })
    });
    </script>
    <script language="javascript">
    $(document).ready(function(){
    $("#municipioB").change(function () {
    $("#municipioB option:selected").each(function () {
    idmunicipio = $(this).val();
    $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
    $("#parroquiaB").html(data);
    });
    window.console&&console.log(idmunicipio);
    });
    })
    });
    </script>
    <script language="javascript">
    $(document).ready(function(){
    $("#parroquiaB").change(function () {
    $("#parroquiaB option:selected").each(function () {
    idparroquia = $(this).val();
    $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
    $("#bodegaB").html(data);
    });
    window.console&&console.log(idparroquia);
    });
    })
    });
    </script>
    <br><br>
    <br>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="jefe">
        <div class="col-xs-6 col-md-6 col-md-offset-3 col-sm-12 panel panel-default">
          <div class="pull-left">
            <a href="integrantes_clap_create_consulta.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&sector_id=<?php echo $sector->id ?>&zona_id=<?php echo $zona->id ?>" class="fa fa-arrow-left fa-3x"></a>
          </div>
          <h4 class="text-center text-muted"><a class="fa fa-user-circle fa-2x" href=""></a> Integrantes CLAP</h4>
          <br>
        <pre><?php echo $muni->nombre_municipio ?>, <?php echo $parro->nombre_parroquia ?>, <?php echo $sector->sector ?>, <?php echo $zona->comunidad ?></pre>
        <?php if($registrado == true): ?>
        <div class="alert alert-success">
          <strong>Integrante encontrado en SECTORES CLAP!</strong>
        </div>
        <?php endif ?>
        <?php if ($registrado == true): ?>
        <?php if ($integrante->eliminar == true): ?>
        <div class="alert alert-warning">
          <strong>Integrante registrado!</strong> Usted ya ha ingresado dicho integrante por este medio pero fue <strong>ELIMINADO.</strong>
        </div>
        <?php else: ?>
        <div class="alert alert-warning">
          <strong>Integrante registrado!</strong> Usted ya ha ingresado dicho integrante por este medio.
        </div>
        <?php endif ?>
        
        <?php else: ?>
        <?php if($existe == false): ?>
        <div class="alert alert-warning">
          <strong>Integrante NO encontrado en CADIP!</strong> Ingrese datos completos de integrante.
        </div>
        <?php else: ?>
        <div class="alert alert-success">
          <strong>Integrante encontrado en CADIP!</strong> Ingrese datos restantes por llenar.
        </div>
        <?php endif ?>
        <?php if($clap_existe == false): ?>
        <div class="alert alert-warning">
          <strong>Integrante NO encontrado en tabla CLAPS!</strong>
        </div>
        <?php else: ?>
        <div class="alert alert-success">
          <strong>Integrante encontrado en tabla CLAPS!</strong>.
        </div>
        <?php endif ?>
        <?php if($igual_municipio == false): ?>
        <div class="alert alert-warning">
          <strong>NO coinciden los municipios!</strong>
        </div>
        <?php else: ?>
        <div class="alert alert-success">
          <strong>SI coinciden los municipios!</strong>
        </div>
        <?php endif ?>
        <?php if($igual_parroquia == false): ?>
        <div class="alert alert-warning">
          <strong>NO coinciden las parroquias!</strong>
        </div>
        <?php else: ?>
        <div class="alert alert-success">
          <strong>SI coinciden las parroquias!</strong>
        </div>
        <?php endif ?>
      
        <?php if($c_bodega == false): ?>
        <div class="alert alert-warning">
          <strong>NO coinciden el SECTOR CLAP con la BODEGA CADIP!</strong>
        </div>
        <?php else: ?>
        <div class="alert alert-success">
          <strong>SI coinciden el SECTOR CLAP con la BODEGA CADIP!</strong>
        </div>
        <?php endif ?>

        <?php if ($registrado == true): ?>
        
        <?php else: ?>
        <?php if ($clap_existe == false): ?>
          <?php if ($e_cadip == true): ?>
            
    <form action="integrantes_clap_guardar.php" method="GET">
      <input type="hidden" name="sector_id" value="<?php echo $sector->id ?>">
      <input type="hidden" name="zona_id" value="<?php echo $zona->id ?>">
      <input type="hidden" name="municipio" value="<?php echo $muni->id ?>">
      <input type="hidden" name="parroquia" value="<?php echo $parro->id ?>">
      <input type="hidden" name="e_cadip" value="<?php echo $e_cadip ?>">
      <input type="hidden" name="e_clap" value="<?php echo $clap_existe ?>">
      <input type="hidden" name="c_municipio" value="<?php echo $igual_municipio ?>">
      <input type="hidden" name="c_parroquia" value="<?php echo $igual_parroquia ?>">
      <input type="hidden" name="c_bodega" value="<?php echo $c_bodega ?>">
      <br>
      <h4>Integrante CLAP</h4>
      <div class="form-group">
        <select style="width: 8%;" name="tipo_c" required="required">
          <option value="V" selected="selected" >V</option>
          <option value="E">E</option>
        </select>
        <br>
        <br>
        <input style="width: 100%;" readonly name="cedula" type="number" placeholder="Cedula del Integrante" value="<?php echo $cedula ?>">
        <br>
        <br>
        <input style="width: 100%;" readonly name="nombre_a" type="text" placeholder="Nombres y Apellidos del Integrante" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $nombre_y_apellido ?>" >
        <br>
        <br>
        <div class="form-group">
          <?php $municipios = Municipio::all(); ?>
          <select name="municipio_int" id="municipioB"class="form-control" required>
            <?php if ($municipio_int): ?>
            <?php $municipio_int_nombre = Municipio::where('id_municipio',$municipio_int)->first(); ?>
            <option value="<?php echo $municipio_int ?>"><?php echo $municipio_int_nombre->nombre_municipio ?></option>
          <optgroup label='-------'></optgroup>
          <?php endif ?>
          <?php foreach ($municipios as $municipio): ?>
          <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <select name="parroquia_int" id="parroquiaB"class="form-control" value="<?php echo $parroquia ?>" required>
          <?php if ($parroquia_int): ?>
          <?php $parroquia_int_nombre = Parroquia::where('id_parrouia',$parroquia_int)->first(); ?>
          <option value="<?php echo $parroquia_int ?>"><?php echo $parroquia_int_nombre->nombre_parroquia ?></option>
          <?php endif ?>
        </select>
      </div>
      <input style="width: 100%;" name=" telefono" type="text" placeholder="Teléfono del Integrante" value="<?php echo $telefono ?>" >
      <br>
      <br>
      <select name="jefe_carga" id="">
        <?php if ($jefe): ?>
        <option value="1">JEFE</option>
        <?php elseif ($familia): ?>
        <option value="2">CARGA</option>
        <?php else:  ?>
        <option value="">NO EXISTE</option>
        <?php endif ?>
      </select>
      <br>
      <br>
      <select name="cargo_clap" id="" required>
        <?php if ($cargo): ?>
        <option value="<?php echo $cargo->id ?>"><?php echo $cargo->cargo ?></option>
          <optgroup label='-------'></optgroup>
        <?php endif ?>

                <?php foreach ($cargos as $ca): ?>
        <option value="<?php echo $ca->id ?>"><?php echo $ca->cargo ?></option>
        <?php endforeach ?>
      </select>
      <br>
      <br>
      <h4>Bodega CLAP</h4>
      <input style="width: 100%;" name="cod_bodega" type="text" value="<?php echo $bodega_id ?>" placeholder="Código de la Bodega" onChange="javascript:this.value=this.value.toUpperCase();" >
      <br>
      <br>
      <select style="width: 8%;" name="tipo_b" required="required">
        <?php if ($bodega_tipo_b): ?>
        <option value="<?php echo $bodega_tipo_b ?>"><?php echo $bodega_tipo_b ?></option>
        <?php else: ?>
        <option value="J" selected="selected" >J</option>
        <option value="V">V</option>
        <option value="E">E</option>
        <option value="G">G</option>
        <option value="P">P</option>
        <?php endif ?>
      </select>
      <br>
      <br>
      <input style="width: 100%;" name="rif_b" value="<?php echo $bodega_rif ?>" type="number" placeholder="RIF de la Bodega" required >
      <br>
      <br>
      <input style="width: 100%;" name="razon_social" value="<?php echo $bodega_razon_social ?>" type="text" placeholder="Nombre de la Bodega (RAZÓN SOCIAL)" onChange="javascript:this.value=this.value.toUpperCase();" requiered >
    </div>
    <div class="form-group">
      <?php $municipios = Municipio::all(); ?>
      <select name="municipio" id="municipio"class="form-control" required>
        <?php if ($bodega_municipio): ?>
        <?php $municipio_bode = Municipio::where('id_municipio',$bodega_municipio)->first(); ?>
      <option value="<?php echo $bodega_municipio ?>"><?php echo $municipio_bode->nombre_municipio ?></option selected>
      <?php else: ?>
      <?php foreach ($municipios as $municipio): ?>
      <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
      <?php endforeach ?>
      <?php endif ?>
    </select>
  </div>
  <div class="form-group">
    <select name="parroquia" id="parroquia"class="form-control" required>
      <?php if ($bodega_parroquia): ?>
      <?php $parroquia_bode = Parroquia::where('id_parrouia',$bodega_parroquia)->first(); ?>
      <option value="<?php echo $bodega_parroquia ?>"><?php echo $parroquia_bode->nombre_parroquia ?></option>
      <?php endif ?>
    </select>
  </div>
  <br>
  <h4>Responsable Bodega CLAP</h4>
  <select style="width: 8%;" name="tipo_r" required="required">
    <option value="V" selected="selected" >V</option>
    <option value="E">E</option>
  </select>
  <br>
  <br>
  <input style="width: 100%;" name="cedula_r" value="<?php echo $bodega_responsable_cedula ?>" type="number" placeholder="Cedula del Bodeguero" required >
  <br>
  <br>
  <input style="width: 100%;" name="responsable" value="<?php echo $bodega_responsable_nombre ?>" type="text" placeholder="Nombres y Apellidos del Bodeguero" onChange="javascript:this.value=this.value.toUpperCase();" required >
  <br>
  <br>
  <input style="width: 100%;" name="telefono_r" value="<?php echo $bodega_responsable_telefono ?>" type="number" placeholder="Teléfono del Bodeguero" required>
  <hr>
  <button class="btn btn-success pull-right" type="submit">
  Guardar <i class="fa fa-save"></i></button>
  
</form>
          <?php else: ?>
        <form action="integrantes_clap_guardar.php" method="GET">
          <input type="hidden" name="sector_id" value="<?php echo $sector->id ?>">
          <input type="hidden" name="zona_id" value="<?php echo $zona->id ?>">
          <input type="hidden" name="municipio" value="<?php echo $muni->id ?>">
          <input type="hidden" name="parroquia" value="<?php echo $parro->id ?>">
          <input type="hidden" name="e_cadip" value="<?php echo $e_cadip ?>">
          <input type="hidden" name="e_clap" value="<?php echo $clap_existe ?>">
          <input type="hidden" name="c_municipio" value="<?php echo $igual_municipio ?>">
          <input type="hidden" name="c_parroquia" value="<?php echo $igual_parroquia ?>">
          <br>
          <h4>Integrante CLAP</h4>
          <div class="form-group">
            <select style="width: 8%;" name="tipo_c" required="required">
              <option value="V" selected="selected" >V</option>
              <option value="E">E</option>
            </select>
            <br>
            <br>
            <input style="width: 100%;" name="cedula" type="number" placeholder="Cedula del Integrante" required>
            <br>
            <br>
            <input style="width: 100%;" name="nombre_a" type="text" placeholder="Nombres y Apellidos del Integrante" onChange="javascript:this.value=this.value.toUpperCase();"  required>
            <br>
            <br>
            <div class="form-group">
              <?php $municipios = Municipio::all(); ?>
              <select name="municipio_int" id="municipioB"class="form-control" required>
                <option value="">MUNICIPIO</option>
              <optgroup label='-------'></optgroup>
              <?php foreach ($municipios as $municipio): ?>
              <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            
            <select name="parroquia_int" id="parroquiaB"class="form-control" required>
            </select>
          </div>
          <input style="width: 100%;" name=" telefono" type="text" placeholder="Teléfono del Integrante" required >
          <br>
          <br>
          <select name="jefe_carga" id="">
            <option selected="selected" value="">NO REGISTRADO JEFE/CARGA</option>
          </select>
          <br>
          <br>
          <select name="cargo_clap" id="" required>
            <?php foreach ($cargos as $ca): ?>
            <option value="<?php echo $ca->id ?>"><?php echo $ca->cargo ?></option>
            <?php endforeach ?>
          </select>
          <br>
          <br>
          <h4>Bodega CLAP</h4>
          <input style="width: 100%;" name="cod_bodega" type="text" placeholder="Código de la Bodega" onChange="javascript:this.value=this.value.toUpperCase();" required>
          <br>
          <br>
          <select style="width: 8%;" name="tipo_b" required="required">
            <option value="J" selected="selected" >J</option>
            <option value="V">V</option>
            <option value="E">E</option>
            <option value="G">G</option>
            <option value="P">P</option>
          </select>
          <br>
          <br>
          <input style="width: 100%;" name="rif_b" type="number" placeholder="RIF de la Bodega" required >
          <br>
          <br>
          <input style="width: 100%;" name="razon_social" type="text" placeholder="Nombre de la Bodega (RAZÓN SOCIAL)" onChange="javascript:this.value=this.value.toUpperCase();" required>
        </div>
        <div class="form-group">
          <?php $municipios = Municipio::all(); ?>
          <select name="municipio" id="municipio"class="form-control" required>
            <option value="">MUNICIPIO</option>
          <optgroup label='-------'></optgroup>
          <?php foreach ($municipios as $municipio): ?>
          <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        
        <select name="parroquia" id="parroquia"class="form-control" required>
        </select>
      </div>
      <br>
      <h4>Responsable Bodega CLAP</h4>
      <select style="width: 8%;" name="tipo_r" required="required">
        <option value="V" selected="selected" >V</option>
        <option value="E">E</option>
      </select>
      <br>
      <br>
      <input style="width: 100%;" name="cedula_r" type="number" placeholder="Cedula del Bodeguero" required >
      <br>
      <br>
      <input style="width: 100%;" name="responsable" type="text" placeholder="Nombres y Apellidos del Bodeguero" onChange="javascript:this.value=this.value.toUpperCase();" required >
      <br>
      <br>
      <input style="width: 100%;" name="telefono_r" type="number" placeholder="Teléfono del Bodeguero" required>
      <hr>
      <button class="btn btn-success pull-right" type="submit">
      Guardar <i class="fa fa-save"></i></button>
    </form>
             <?php endif ?>
    <?php else: ?>
    <form action="integrantes_clap_guardar.php" method="GET">
      <input type="hidden" name="sector_id" value="<?php echo $sector->id ?>">
      <input type="hidden" name="zona_id" value="<?php echo $zona->id ?>">
      <input type="hidden" name="municipio" value="<?php echo $muni->id ?>">
      <input type="hidden" name="parroquia" value="<?php echo $parro->id ?>">
      <input type="hidden" name="e_cadip" value="<?php echo $e_cadip ?>">
      <input type="hidden" name="e_clap" value="<?php echo $clap_existe ?>">
      <input type="hidden" name="c_municipio" value="<?php echo $igual_municipio ?>">
      <input type="hidden" name="c_parroquia" value="<?php echo $igual_parroquia ?>">
      <br>
      <h4>Integrante CLAP</h4>
      <div class="form-group">
        <select style="width: 8%;" name="tipo_c" required="required">
          <option value="V" selected="selected" >V</option>
          <option value="E">E</option>
        </select>
        <br>
        <br>
        <input style="width: 100%;" readonly name="cedula" type="number" placeholder="Cedula del Integrante" value="<?php echo $cedula ?>">
        <br>
        <br>
        <input style="width: 100%;" readonly name="nombre_a" type="text" placeholder="Nombres y Apellidos del Integrante" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $nombre_y_apellido ?>" >
        <br>
        <br>
        <div class="form-group">
          <?php $municipios = Municipio::all(); ?>
          <select name="municipio_int" id="municipioB"class="form-control" required>
            <?php if ($municipio_int): ?>
            <?php $municipio_int_nombre = Municipio::where('id_municipio',$municipio_int)->first(); ?>
            <option value="<?php echo $municipio_int ?>"><?php echo $municipio_int_nombre->nombre_municipio ?></option>
          <optgroup label='-------'></optgroup>
          <?php endif ?>
          <?php foreach ($municipios as $municipio): ?>
          <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <select name="parroquia_int" id="parroquiaB"class="form-control" value="<?php echo $parroquia ?>" required>
          <?php if ($parroquia_int): ?>
          <?php $parroquia_int_nombre = Parroquia::where('id_parrouia',$parroquia_int)->first(); ?>
          <option value="<?php echo $parroquia_int ?>"><?php echo $parroquia_int_nombre->nombre_parroquia ?></option>
          <?php endif ?>
        </select>
      </div>
      <input style="width: 100%;" name=" telefono" type="text" placeholder="Teléfono del Integrante" value="<?php echo $telefono ?>" >
      <br>
      <br>
      <select name="jefe_carga" id="">
        <?php if ($jefe): ?>
        <option value="1">JEFE</option>
        <?php elseif ($familia): ?>
        <option value="2">CARGA</option>
        <?php else:  ?>
        <option value="">NO EXISTE</option>
        <?php endif ?>
      </select>
      <br>
      <br>
      <select name="cargo_clap" id="" required>
        <?php if ($cargo): ?>
        <option value="<?php echo $cargo->id ?>"><?php echo $cargo->cargo ?></option>
          <optgroup label='-------'></optgroup>
        <?php endif ?>

                <?php foreach ($cargos as $ca): ?>
        <option value="<?php echo $ca->id ?>"><?php echo $ca->cargo ?></option>
        <?php endforeach ?>
      </select>
      <br>
      <br>
      <h4>Bodega CLAP</h4>
      <input style="width: 100%;" name="cod_bodega" type="text" value="<?php echo $bodega_id ?>" placeholder="Código de la Bodega" onChange="javascript:this.value=this.value.toUpperCase();" >
      <br>
      <br>
      <select style="width: 8%;" name="tipo_b" required="required">
        <?php if ($bodega_tipo_b): ?>
        <option value="<?php echo $bodega_tipo_b ?>"><?php echo $bodega_tipo_b ?></option>
        <?php else: ?>
        <option value="J" selected="selected" >J</option>
        <option value="V">V</option>
        <option value="E">E</option>
        <option value="G">G</option>
        <option value="P">P</option>
        <?php endif ?>
      </select>
      <br>
      <br>
      <input style="width: 100%;" name="rif_b" value="<?php echo $bodega_rif ?>" type="number" placeholder="RIF de la Bodega" required >
      <br>
      <br>
      <input style="width: 100%;" name="razon_social" value="<?php echo $bodega_razon_social ?>" type="text" placeholder="Nombre de la Bodega (RAZÓN SOCIAL)" onChange="javascript:this.value=this.value.toUpperCase();" requiered >
    </div>
    <div class="form-group">
      <?php $municipios = Municipio::all(); ?>
      <select name="municipio" id="municipio"class="form-control" required>
        <?php if ($bodega_municipio): ?>
        <?php $municipio_bode = Municipio::where('id_municipio',$bodega_municipio)->first(); ?>
      <option value="<?php echo $bodega_municipio ?>"><?php echo $municipio_bode->nombre_municipio ?></option selected>
      <?php else: ?>
      <?php foreach ($municipios as $municipio): ?>
      <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
      <?php endforeach ?>
      <?php endif ?>
    </select>
  </div>
  <div class="form-group">
    <select name="parroquia" id="parroquia"class="form-control" required>
      <?php if ($bodega_parroquia): ?>
      <?php $parroquia_bode = Parroquia::where('id_parrouia',$bodega_parroquia)->first(); ?>
      <option value="<?php echo $bodega_parroquia ?>"><?php echo $parroquia_bode->nombre_parroquia ?></option>
      <?php endif ?>
    </select>
  </div>
  <br>
  <h4>Responsable Bodega CLAP</h4>
  <select style="width: 8%;" name="tipo_r" required="required">
    <option value="V" selected="selected" >V</option>
    <option value="E">E</option>
  </select>
  <br>
  <br>
  <input style="width: 100%;" name="cedula_r" value="<?php echo $bodega_responsable_cedula ?>" type="number" placeholder="Cedula del Bodeguero" required >
  <br>
  <br>
  <input style="width: 100%;" name="responsable" value="<?php echo $bodega_responsable_nombre ?>" type="text" placeholder="Nombres y Apellidos del Bodeguero" onChange="javascript:this.value=this.value.toUpperCase();" required >
  <br>
  <br>
  <input style="width: 100%;" name="telefono_r" value="<?php echo $bodega_responsable_telefono ?>" type="number" placeholder="Teléfono del Bodeguero" required>
  <hr>
  <button class="btn btn-success pull-right" type="submit">
  Guardar <i class="fa fa-save"></i></button>
  
</form>
<?php endif ?>
<?php endif ?>
<?php endif ?>
<br><br>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>