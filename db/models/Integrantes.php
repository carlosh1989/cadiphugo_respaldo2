<?php 
namespace Models;
use Models\Sector;
use \Illuminate\Database\Eloquent\Model;
 
class Integrantes extends Model {
	public $timestamps = false;
    protected $table = 'integrantes_clap';
	protected $primaryKey = 'id';
    protected $fillable = ['id'];
    //Ejemplo de definir campos

	public function sector()
	{
		return $this->belongsTo(Sector::class, 'sector_id', 'id');
	}
}
