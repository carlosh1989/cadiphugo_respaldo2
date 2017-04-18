
    <script src="assets/js/jquery.min.js"></script>


      <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<?php
require __DIR__ . '/vendor/autoload.php';
use DB\Eloquent;
use Models\Jefe;
new Eloquent();

extract($_GET);
extract($_POST);


$jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
?>
                <div class="page-body">
					<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<h5 class="row-title before-darkorange"><i class="fa fa-list-alt darkorange"></i>Busquedas segun municipio, parroquia y bodega</h5>
              				</div>
							<div class="col-lg-12 col-sm-12 col-xs-12">
							<a class="btn btn-danger btn-lg pull-right" href="jefe_pdf.php?municipio=<?php echo $municipio ?>&parroquia=<?php echo $parroquia ?>&bodega=<?php echo $bodega ?>"><i class="fa fa-download" aria-hidden="true"></i> Descargar PDF</a>
							<hr>
                            <h3 align="center">Jefes de familia</h3>
                            <?php
                            $jefes = Jefe::where('n_personas', '>', 1)->where('cod_municipio',$municipio)->where('cod_parroquia',$parroquia)->where('bodega',$bodega)->orderBy('edad', 'desc')->get();
                            ?>
                              

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
                                                    Nombre
                                                </th>
                                                <th>
                                                    Cedula
                                                </th>
                                                <th>
                                                    Edad
                                                </th>
                                                <th>
                                                    Cant. Personas
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
    <?php $num = 1; ?>
        <?php foreach ($jefes as $jefe): ?>
                                            <tr>
                                                <td>
                                              
                                                </td>
                                                <td>
                                                    <?php echo $jefe->nombre_apellido ?>
                                                </td>
                                                <td>
                                                   <?php echo $jefe->cedula ?>
                                                </td>
                                                <td>
                                                    <?php echo $jefe->edad ?>
                                                </td>
                                                <td class="center ">
                                                    <?php echo $jefe->n_personas ?>
                                                </td>
                                            </tr>
                                            <?php $num = $num + 1 ?>
        <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
<div class="horizontal-space"></div>
  <pre>Numero de Familias: <?php echo $jefes->count() ?></pre>
  <pre>Numero de personas: <?php echo $jefes->sum('n_personas') ?></pre>
                                </div>
                            </div>
                        </div>
                    </div>

	                </div>

   <!--Basic Scripts-->

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>

    <!--Page Related Scripts-->
    <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/ZeroClipboard.js"></script>
   <!-- <script src="assets/js/datatable/dataTables.tableTools.min.js"></script> -->
    <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/datatable/datatables-init.js"></script>
    <script>
        InitiateSimpleDataTable.init();
    </script>


