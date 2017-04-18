<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class BaseMisionesClap extends Model {
	public $timestamps = false;
    protected $table = 'base_misiones_clap';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos

	public function basemision()
	{
	    return $this->belongsTo(BaseMisiones::class, 'cod_base', 'id');
	}
}