<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Clap3 extends Model {
	public $timestamps = false;
    protected $table = 'claps3';
    protected $fillable = ['estado_id','municipio_id','parroquia_id','bodega_id','clap_codigo','clap_nombre','comunidad','cargo_id','tipo','cedula','nombre_apellido','telefono','carga','registrado','ubicado','positivo','negativo'];
    //Ejemplo de definir campos
}
