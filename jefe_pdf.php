<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
extract($_GET);
$mpdf = new mPDF('','Letter',11,'arial');
$mpdf->SetWatermarkText('Nota: Exclusivo para la Distribución de PDVAL.');
$mpdf->showWatermarkText = true;
ob_start();
include('encabezado.php');
$mpdf->SetHTMLHeader(ob_get_clean());
$mpdf->SetHTMLFooter('
<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>

<td width="80%"><span style="font-weight: bold; font-style: italic;">Nota: De uso Exclusivo para la Distribución de PDVAL.</span></td>



<td width="20%" style="text-align: right; ">{PAGENO}/{nbpg}</td>

</tr></table>

');
$mpdf->AddPage('', // L - landscape, P - portrait 
'', '', '', '',
5, // margen izquierdo
5, // margen derecho
40, // margin arriba
5, // margin abajo
0, // margin encabezado
0); // margin pie de pagina

ob_start();
include("jefe.php");
$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML(ob_get_clean(),2);
$nombre = "Jefes.pdf";
$mpdf->Output($nombre,'D');

