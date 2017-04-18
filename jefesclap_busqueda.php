<?php
//SECCIÓN DE CARGA DE LIBRERIAS Y MODELOSsss
use DB\Eloquent;
use Models\Municipio;

require __DIR__ . '/vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

new Eloquent();
//\krumo::dump($comercios);
?>

<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 1.4.1
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 10:56:56 GMT -->
<head>
    <meta charset="utf-8" />
    <title>C.A.D.I.P | Inicio </title>

    <meta name="description" content="Dashboard" />
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
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
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
            $.post("clap.php", { idparroquia:idparroquia }, function(data){
                $("#clap").html(data);
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

<script language="javascript">
$(document).ready(function(){
   $("#municipioC").change(function () {
           $("#municipioC option:selected").each(function () {
            idmunicipio = $(this).val();
            $.post("parroquias.php", { idmunicipio:idmunicipio }, function(data){
                $("#parroquiaC").html(data);
            }); 
            window.console&&console.log(idmunicipio);           
        });
   })

});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#parroquiaC").change(function () {
           $("#parroquiaC option:selected").each(function () {
            idparroquia = $(this).val();
            $.post("bodegas.php", { idparroquia:idparroquia }, function(data){
                $("#bodegaC").html(data);
            }); 
            window.console&&console.log(idparroquia);           
        });
   })

});
</script>

</head>
<!-- /Head -->
<!-- Body -->
<body>

    <!-- Loading Container 
    <div class="loading-container">
        <div class="loader"></div>
    </div> 
    -->
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <!--CADIP -->
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
  <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Buscar Productos</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="active">
                        <a href="jefe_busqueda.php">
                            <i class="fa fa-user-plus"></i>
                            <span class="menu-text"> Busqueda Jefe </span>
                        </a>
                    </li>
                    <!--Databoxes-->
                    <li>
                        <a href="jefecarga_busqueda.php">
                            <i class="fa fa-users"></i>
                            <span class="menu-text"> Busqueda Jefe y carga </span>
                        </a>
                    </li>
                    <!--Widgets-->
                    <li>
                        <a href="solo_busqueda.php">
                            <i class="fa fa-user"></i>
                            <span class="menu-text"> Busqueda de personas solas </span>
                        </a>
                    </li>
                                <!--UI Elements-->
                                <!--
                                <li>
                                    <a href="#" class="menu-dropdown">
                                        <i class="menu-icon fa fa-desktop"></i>
                                        <span class="menu-text"> Elements </span>
                                        <i class="menu-expand"></i>
                                    </a>

                                    <ul class="submenu">
                                        <li>
                                            <a href="elements.html">
                                                <span class="menu-text">Basic Elements</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                -->
                </ul>
                <!-- /Sidebar Menu -->
            </div>

            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Inicio</a>
                        </li>
                        <li class="active">Panel</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Panel - Administrador
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <h5 class="row-title before-darkorange"><i class="fa fa-list-alt darkorange"></i>Busquedas segun municipio, parroquia y bodega</h5>
              </div>

                                            </div>

                                 
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="well with-header">
                                            <div class="header bordered-green"><li class="fa fa-user-plus fa-2x red-text"></li> Busqueda de Jefes de familia por el Clap</div>
                                        <form action="jefesclap_preview.php" method="POST">
                                            
                                                <?php $municipios = Municipio::all(); ?>
                                                <select name="municipio" id="municipio">
                                                <option value="">MUNICIPIO</option>
                                                <optgroup label='-------'></optgroup>
                                                <?php foreach ($municipios as $municipio): ?>
                                                     <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre_municipio ?></option>
                                                <?php endforeach ?>
                                                </select>
                                    
                                
                                                <select name="parroquia" id="parroquia">
                                                </select>
                                
                                    
                                                <select name="clap" id="clap">
                                                </select>
                                        <hr>
                                            <div class="col-lg-2 col-sm-12 col-xs-12">
                                                <button class="btn btn-danger btn-lg" type="submit" value="buscar">
                                                Buscar  <i class="fa fa-search"></i> 
                                                </button>
                                            </div>
                                            <br><br>
                                            </div>
                                        </div>
                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="horizontal-space"></div>
                                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
    <!--Basic Scripts-->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>


    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="assets/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/js/charts/sparkline/sparkline-init.js"></script>

    <!--Easy Pie Charts Needed Scripts-->
    <script src="assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/js/charts/easypiechart/easypiechart-init.js"></script>

    <!--Flot Charts Needed Scripts-->
    <script src="assets/js/charts/flot/jquery.flot.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.pie.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.tooltip.js"></script>
    <script src="assets/js/charts/flot/jquery.flot.orderBars.js"></script>


</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.4.1.s3-website-us-east-1.amazonaws.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 09 Jul 2015 10:59:22 GMT -->
</html>



