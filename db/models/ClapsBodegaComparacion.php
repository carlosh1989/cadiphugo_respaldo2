<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class ClapsBodegaComparacion extends Model {
	public $timestamps = false;
    protected $table = 'claps_bodega_comparacion';
    protected $fillable = ['estado_id','municipio_id','parroquia_id','bodega_id','clap_codigo','clap_nombre','comunidad','cargo_id','tipo','cedula','nombre_apellido','telefono','registrado','ubicado','comparacion'];    //Ejemplo de definir campos
}