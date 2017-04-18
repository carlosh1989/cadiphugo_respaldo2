<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class ClapDatos extends Model {
	public $timestamps = false;
    protected $table = 'clap_datos';
    protected $fillable = ['estado_id','municipio_id','parroquia_id','bodega_id','clap_codigo','clap_nombre'];
    //Ejemplo de definir campos
}
