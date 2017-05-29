<?php
require('autoload.php');
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Dompdf\Dompdf;
use Dompdf\Options;
use Models\ClapZona;
new Eloquent();



 

ob_start();
require_once("integrantes_clap_pdf.php"); 
// Instanciamos un objeto de la clase DOMPDF.
 $pdf = new Dompdf();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "landscape");
 
// Cargamos el contenido HTML.
$pdf->load_html(ob_get_clean(),'UTF-8');
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('FicheroEjemplo.pdf');

echo "asd";