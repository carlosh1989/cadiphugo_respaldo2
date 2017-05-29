<?php
require __DIR__ . '/vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use DB\Eloquent;
use Models\ClapZona;
new Eloquent();
extract($_GET);
extract($_POST);
$zona  = ClapZona::where('id', $zona_id)->first();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Descarga PDF  </title>
    <link type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
    table {
      width: 90%;
      height: 20px;
      font-size: 0.8em;
    }

    .integrantes_tabla 
    {
      text-align: center;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <h4><center><b><em>INFORME TÉCNICO DE LOS CLAP SECTOR <?php echo $zona->sector_clap->sector ?></em></b></center></h4>

      <h5><u><em>INFORMACIÓN SUMINISTRADA:</em></u></h5>
      <table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
        <tr>
          <th>Código CLAP</th>
          <td>
            <?php echo $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->cod_clap ?>
          </td>
        </tr>
        <tr>
          <th>Nombre del CLAP</th>
          <td> <?php echo $zona->nombre_clap ?> </td>
        </tr>
        <tr>
          <th>Nombre de la Bodega</th>
            <td> <?php echo $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->razon_social.'('.$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->cod_bodega.')' ?> </td>
        </tr>  

        <!-- <tr> ///////////////////////////////////////////////////////////////////////////////////
          <th>RIF</th>
          <td><?php echo $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->tipo_b.'-'.$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->rif_b ?> </td>
        </tr> //////////////////////////////////////////////////////////////////////////////////// -->

        <tr>
          <th>Responsable de la Bodega</th>
          <td> <?php echo $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->responsable ?> </td>
        </tr>

        <!-- <tr> /////////////////////////////////////////////////////////////////////////////////
          <th>Cedula</th>
          <td><?php echo $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->tipo_r.'-'.$zona->integrantes_clap()->where('eliminar', '<', 1)->first()->cedula_r; ?></td>
        </tr>
        <tr>
          <th>Teléfono</th>
          <td> <?php echo $zona->integrantes_clap()->where('eliminar', '<', 1)->first()->telefono_r ?> </td>
        </tr> ////////////////////////////////////////////////////////////////////////////////////// -->

        <tr>
          <th>Municipio</th>
          <td> <?php echo $zona->bodega->municipio->nombre_municipio ?> </td>
        </tr>
        <tr>
          <th>Parroquia </th>
          <td> <?php echo $zona->bodega->parroquia->nombre_parroquia ?> </td>
        </tr>
        <tr>
          <th>Sector</th>
          <td> <?php echo $zona->sector_clap->sector ?> </td>
        </tr>
        <tr>
          <th>Sub-Sector</th>
          <td> <?php echo $zona->subsector ?> </td>
        </tr>
        <tr>
          <th>Comunidad</th>
          <td><?php echo $zona->comunidad ?></td>
        </tr>
        <tr>
          <th>Consolidado</th>
          <td>
            <?php
            if($zona->consolidado == true)
            {
            $consolidado = "CLAP Consolidado";
            }
            else
            {
            $consolidado = "CLAP NO Consolidado";
            }
            ?>
            <?php echo $consolidado ?>
          </td>
        </tr>
      </table>
      <h5><u><em>CONDICIÓN DE LOS INTEGRANTES OFICIALES:</em></u></h5>
      <table class="integrantes_tabla" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
        <tr>
        <!--////////////////////////////////////////////////////// 
          <th style="text-align: center;">Id</th>
          <th style="text-align: center;">Tipo</th>
        ////////////////////////////////////////////////////// -->
          <th style="text-align: center;">Cargo CLAP</th>          
          <th style="text-align: center;">Cedula</th>
          <th style="text-align: center;">Nombre y Apellido</th>
          <th style="text-align: center;">Teléfono</th>
          <th style="text-align: center;">Observación</th>

          <!--////////////////////////////////////////////////////// 
          <th style="text-align: center;">Municipio</th>
          <th style="text-align: center;">Parroquia</th>
          ////////////////////////////////////////////////////// -->
        </tr>

        <?php foreach($zona->integrantes_clap()->where('eliminar', '<', 1)->get() as $key => $int): ?>
        <tr>
          <!--////////////////////////////////////////////////////// 
          <td><?php echo $int->id ?></td> 
          <td><?php echo $int->tipo_c ?></td> 
          ////////////////////////////////////////////////////// -->

          <td><?php echo $int->cargo->cargo ?></td>
          <td><?php echo $int->tipo_c.' -'.$int->cedula ?></td>
          <td><?php echo $int->nombre_a ?></td>
          <td><?php echo $int->telefono ?></td>
          <td>Bien</td>
          <!--////////////////////////////////////////////////////// 
          <td><?php echo $int->intmunicipio->nombre_municipio ?></td>
          <td><?php echo $int->intparroquia->nombre_parroquia ?></td>
          ////////////////////////////////////////////////////// -->
        </tr>
        <?php endforeach ?>
      </table>

      <!--//////////////////////////////////////////////////////////////////////////////////////////// 
      <h5><u><em>OBSERVACIONES INTEGRANTES:</em></u></h5>
      <table class="integrantes_tabla" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
        <tr>
          <th style="text-align: center;">Cedula</th>
          <th style="text-align: center;">¿Existe CADIP?</th>
          <th style="text-align: center;">Código CADIP</th>
          <th style="text-align: center;">¿Jefe ó Carga?</th>
          <th style="text-align: center;">¿Existe CLAP?</th>
          <th style="text-align: center;">Cargo CLAP</th>
          <th style="text-align: center;">¿Coincide Cargo CLAP?</th>
          <th style="text-align: center;">¿Coincide Municipio CLAP - CADIP?</th>
          <th style="text-align: center;">¿Coincide Parroquia CLAP - CADIP?</th>
        </tr>
        <?php foreach($zona->integrantes_clap()->where('eliminar', '<', 1)->get() as $key => $int): ?>
        <tr>
          <td><?php echo $int->cedula ?></td>
          <td>
            <?php if ($int->e_cadip == true): ?>
            Sí
            <?php else: ?>
            Nó
            <?php endif ?>
          </td>
          <td><?php echo $zona->cod_cadip ?></td>
          <td>
            <?php if ($int->jefe_carga == 1): ?>
            Jefe
            <?php else: ?>
            Carga
            <?php endif ?>
          </td>
          
          <td>
            <?php if ($int->e_clap == true): ?>
            Sí
            <?php else: ?>
            Nó
            <?php endif ?>
          </td>
          <td><?php echo $int->cargo->cargo ?></td>
          
          <td>
            <?php if ($int->c_cargo == true): ?>
            Sí
            <?php else: ?>
            Nó
            <?php endif ?>
          </td>
          <td>
            <?php if ($int->c_municipio == true): ?>
            Sí
            <?php else: ?>
            Nó
            <?php endif ?>
          </td>
          <td>
            <?php if ($int->c_parroquia == true): ?>
            Sí
            <?php else: ?>
            Nó
            <?php endif ?>
          </td>
        </tr>
        <?php endforeach ?>
      </table>
      //////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>
  </body>
</html>