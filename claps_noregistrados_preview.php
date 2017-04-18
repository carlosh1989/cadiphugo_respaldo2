
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 1.4.1
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/tables-data.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 11:00:50 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Data Tables</title>

    <meta name="description" content="data tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Page Related styles-->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!-- /Head --><!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 1.4.1
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/tables-data.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 11:00:50 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Data Tables</title>

    <meta name="description" content="data tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Page Related styles-->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <script src="assets/js/skins.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>




      <script>
$(document).ready(function(){
    $('#simpledatatable').dataTable();
});
</script>

<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOS
require('autoload.php');
use DB\Eloquent;
use Models\Cargo;
use Models\Clap2;
use Models\Jefe;
use Models\Municipio;
use Models\Parroquia;
new Eloquent();

extract($_GET);
extract($_POST);

$integrantes = Clap2::where('registrado',0)->orderBy('id', 'DESC')->get();
$totalIntegrantes = Clap2::all();
?>
        <div class="page-body">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h5 class="row-title before-darkorange"><i class="fa fa-list-alt darkorange"></i>Busquedas segun municipio, parroquia y bodega</h5>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                            <a class="btn btn-danger btn-lg pull-right" href="jefe_pdf.php?municipio"><i class="fa fa-download" aria-hidden="true"></i> Descargar PDF</a>
                            <hr>
                            <h3 align="center">Integrantes no registrados</h3>
                              

                            </div>
                        </div>


                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">Jefes de familia</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="#" data-toggle="dispose">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body">
                            <table class="table table-striped table-bordered table-hover" id="simpledatatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    
                                                </th>
                                                <th>
                                                    Codigo Clap
                                                </th>
                                                <th>
                                                    Municipio
                                                </th>
                                                <th>
                                                    Parroquia
                                                </th>
                                                <th>
                                                    Comunidad
                                                </th>
                                                <th>
                                                    Cedula
                                                </th>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    cargo
                                                </th>
                                                <th>
                                                    telefono
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($integrantes as $integrante): ?>
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                <?php echo $integrante->clap_codigo ?>
                                                </td>
                                                <td>
                                                <?php 
                                                $municipio = Municipio::find($integrante->municipio_id);
                                                ?>
                                                    <?php echo $municipio->nombre_municipio ?>
                                                </td>
                                                <td>
                                                <?php 
                                                $parroquia = Parroquia::find($integrante->parroquia_id);
                                                ?>
                                                    <?php echo $parroquia->nombre_parroquia ?>
                                                </td>
                                                <td>
                                                    <?php echo $integrante->comunidad ?>
                                                </td>
                                                <td>
                                                   <?php echo $integrante->tipo ?>-<?php echo $integrante->cedula ?>
                                                </td>
                                                <td>
                                                    <?php echo $integrante->nombre_apellido ?>
                                                </td>
                                                <td>
                                                <?php 
                                                $cargo = Cargo::find($integrante->cargo_id);
                                                ?>
                                                    <?php echo $cargo->cargo ?>
                                                </td>
                                                <td>
                                                    <?php echo $integrante->telefono ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
<div class="horizontal-space"></div>
  <pre>Numero de integrantes total: <?php echo $totalIntegrantes->count() ?></pre>
  <pre>Numero de No registrados: <?php echo $integrantes->count() ?></pre>
  <pre>Numero de Registrados: <?php echo $totalIntegrantes->count() - $integrantes->count() ?></pre>
  
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

  <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/ZeroClipboard.js"></script>
    <script src="assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/datatable/datatables-init.js"></script>
    <script>
        InitiateSimpleDataTable.init();
        InitiateEditableDataTable.init();
        InitiateExpandableDataTable.init();
        InitiateSearchableDataTable.init();
    </script>
    <!--Google Analytics::Demo Only-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-60412744-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/tables-data.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 11:00:57 GMT -->
</html>