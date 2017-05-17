<?php 
namespace Models;
use Models\Municipio;
use Models\Parroquia;
use \Illuminate\Database\Eloquent\Model;
 
class Bodega extends Model {
	public $timestamps = false;
    protected $table = 'registro_bodegas_patria';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos

    public function municipio()
    {
    	return $this->hasOne(Municipio::class,'id_municipio','cod_municipio');
    }

    public function parroquia()
    {
    	return $this->hasOne(Parroquia::class,'id_parrouia','cod_parroquia');
    }
}


