<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class BodegaComparacion extends Model {
	public $timestamps = false;
    protected $table = 'bodega_comparacion';
	protected $primaryKey = 'id';
    protected $fillable = ['clap_codigo','bodega_mayoritaria_id','comparacion','consolidado'];
    //Ejemplo de definir campos
}
