<?php 
namespace Models;
use Models\Cargo;
use Models\Integrantes;
use Models\Sector;
use \Illuminate\Database\Eloquent\Model;
 
class Integrantes extends Model {
	public $timestamps = false;
    protected $table = 'integrantes_clap';
	protected $primaryKey = 'id';
    protected $fillable = ['sector_id','zona_id','tipo_c','cedula','e_cadip','e_clap','c_municipio','c_parroquia','c_cargo','nombre_a','telefono','jefe_carga','cod_clap','cod_bodega','tipo_b','rif_b','razon_social','municipio','parroquia','tipo_r','cedula_r','responsable','telefono_r','eliminar','cargo_clap','municipio_int','parroquia_int'];
    //Ejemplo de definir campos

	public function sector()
	{
		return $this->belongsTo(Sector::class, 'sector_id', 'id');
	}

    public function intmunicipio()
    {
    	return $this->hasOne(Municipio::class,'id_municipio','municipio_int');
    }

    public function intparroquia()
    {
    	return $this->hasOne(Parroquia::class,'id_parrouia','parroquia_int');
    }

    public function cargo()
    {
    	return $this->hasOne(Cargo::class,'id','cargo_clap');
    }
   
}
