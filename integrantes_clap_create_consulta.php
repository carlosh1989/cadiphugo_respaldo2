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
use Models\ClapsBodegaComparacion;
use Models\Familia;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
use Models\Sector;
use Models\ClapZona;
new Eloquent();
extract($_GET);
extract($_POST);
$muni = Municipio::where('id_municipio', $municipio)->first();
$parro = Parroquia::where('id_parrouia', $parroquia)->first();
$sector  = Sector::where('id', $sector_id)->first();
$zona  = ClapZona::where('id', $zona_id)->first();
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
            <a href="integrantes_clap_busqueda.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&sector_id=<?php echo $sector->id ?>&zona_id=<?php echo $zona->id ?>" class="fa fa-arrow-left fa-3x"></a>
          </div>
          <h4 class="text-center text-muted"><a class="fa fa-user-circle fa-2x" href=""></a> Integrantes CLAP</h4>
          <br>
        <pre><?php echo $muni->nombre_municipio ?>, <?php echo $parro->nombre_parroquia ?>, <?php echo $sector->sector ?>, <?php echo $zona->comunidad ?></pre>
        <form action="integrantes_clap_create.php" method="GET">
          <input type="hidden" name="sector_id" value="<?php echo $sector->id ?>">
          <input type="hidden" name="zona_id" value="<?php echo $zona->id ?>">
          <input type="hidden" name="municipio" value="<?php echo $municipio ?>">
          <input type="hidden" name="parroquia" value="<?php echo $parroquia ?>">
          <br>
          <h4>Integrante CLAP</h4>
          <div class="form-group form-group-lg">            
            <select style="width: 8%;" name="tipo_c" required="required">
              <option value="V" selected="selected" >V</option>
              <option value="E">E</option>
            </select>
            
            <input style="width: 30%" name="cedula" type="number" placeholder="Cedula del Integrante" required>
          
            <button type="submit" class="btn btn-info fa fa-user-o"> Buscar</button>
        </div>
      </form>
      <br><br>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>