<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Parroquia extends Model {
	public $timestamps = false;
    protected $table = 'tabla_parroquia';
	protected $primaryKey = 'id_parrouia';
    //Ejemplo de definir campos
}
