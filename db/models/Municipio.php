<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Municipio extends Model {
	public $timestamps = false;
    protected $table = 'tabla_municipio';
	protected $primaryKey = 'id_municipio';
    //Ejemplo de definir campos
}
