<?php 
namespace Models;
use Models\Sector;
use \Illuminate\Database\Eloquent\Model;
 
class ClapZona extends Model {
	public $timestamps = false;
    protected $table = 'clap_zona';
	protected $primaryKey = 'id';
    protected $fillable = ['sector_id','nombre_clap','comunidad','cod_clap','cod_bodega','cod_cadip','consolidado','eliminar'];
    //Ejemplo de definir campos

	public function sector()
	{
		return $this->belongsTo(Sector::class, 'sector_id', 'id');
	}
}

