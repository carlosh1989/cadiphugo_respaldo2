<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Clap extends Model {
	public $timestamps = false;
    protected $table = 'registro_claps';
	protected $primaryKey = 'id_clap';
    //Ejemplo de definir campos
}
