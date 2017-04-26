<?php 
namespace Models;
use Models\ClapZona;
use Models\Municipio;
use Models\Parroquia;
use \Illuminate\Database\Eloquent\Model;
 
class Sector extends Model {
	public $timestamps = false;
    protected $table = 'sector';
	protected $primaryKey = 'id';
    protected $fillable = ['sector','id_municipio','id_parroquia','eliminar'];
    //Ejemplo de definir campos

	public function clap_zona()
	{
	    return $this->hasMany(ClapZona::class, 'sector_id', 'id');
	}

	public function municipio()
	{
		return $this->belongsTo(Municipio::class, 'id_municipio', 'id_municipio');
	}

	public function parroquia()
	{
		return $this->belongsTo(Parroquia::class, 'id_parroquia', 'id_parrouia');
	}
}