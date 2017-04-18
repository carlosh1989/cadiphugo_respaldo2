<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Bodega extends Model {
	public $timestamps = false;
    protected $table = 'registro_bodegas_patria';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos
}
