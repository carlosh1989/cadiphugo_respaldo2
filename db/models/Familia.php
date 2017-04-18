<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Familia extends Model {
	public $timestamps = false;
    protected $table = 'registro_estudio_paso_carga_familiar';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos
}
