<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\BaseMisiones;
use Models\Bodega;
use Models\BodegaComparacion;
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

//Krumo::dump($jefe);

$integrante = Integrantes::where('cedula',$cedula)->first();

if($integrante)
{
  $registrado = 1;
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
    }
    else
    {
      $registrado = 0;
      $existe = 0;
      $tipo_c = "";
      $cedula = "";
      $nombre_y_apellido = "";
      $telefono = "";
    }
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
                <form action="integrantes_clap_guardar.php" method="GET">
          <input type="hidden" name="sector_id" value="<?php echo $sector->id ?>">
          <input type="hidden" name="zona_id" value="<?php echo $zona->id ?>">
          <input type="hidden" name="municipio" value="<?php echo $muni->id ?>">
          <input type="hidden" name="parroquia" value="<?php echo $parro->id ?>">
          <br>
          <h4>Integrante CLAP</h4>
          <div class="form-group form-group-lg">            
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
            <input style="width: 100%;" name=" telefono" type="text" placeholder="Teléfono del Integrante" >
            <br>
            <br>
            <input style="width: 100%;" name="e_cadip" type="number" placeholder="¿Existe en CADIP?" ="">
              <br>
              <br>
              <input style="width: 100%;" name="jefe_carga" type="number" placeholder="¿Jefe ó Carga?" >
              <br>
              <br>

            <h4>Bodega CLAP</h4>
            <input style="width: 100%;" name="cod_bodega" type="text" placeholder="Código de la Bodega" onChange="javascript:this.value=this.value.toUpperCase();" >
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
            <input style="width: 100%;" name="razon_social" type="text" placeholder="Nombre de la Bodega (RAZÓN SOCIAL)" onChange="javascript:this.value=this.value.toUpperCase();" requiered >
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
      <br><br>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>