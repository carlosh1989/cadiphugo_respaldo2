<?php 
namespace Models;
use Models\Bodega;
use Models\Familia;
use \Illuminate\Database\Eloquent\Model;
 
class JefeCertificados extends Model {
	public $timestamps = false;
    protected $table = 'registro_estudio_datos_del_encuestado';
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