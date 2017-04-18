<?php 
namespace Models;
use Models\Bodega;
use Models\Familia;
use \Illuminate\Database\Eloquent\Model;
 
class JefeHuella extends Model {
	public $timestamps = false;
    protected $table = 'tabla_poblacion_cert';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos

	public function familia()
	{
	    return $this->hasMany(Familia::class, 'cod_cabeza_familia', 'cedula');
	}

	public function bodeguera()
	{
		return $this->belongsTo(Bodega::class, 'bodega', 'id');
	}
}
