<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class BaseMisiones extends Model {
	public $timestamps = false;
    protected $table = 'base_misiones';
	protected $primaryKey = 'id';
    //Ejemplo de definir campos
}
