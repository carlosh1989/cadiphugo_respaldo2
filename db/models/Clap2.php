<?php 
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Clap2 extends Model {
	public $timestamps = false;
    protected $table = 'claps';
    protected $fillable = ['id_estado','id_municipio','id_parroquia','clap_codigo','clap_nombre','comunidad','cargo_id','tipo','cedula','nombre_apellido','telefono','tipo_f','status','validado','validado_m','validado_p','validado_b','status_consolidado'];
    //Ejemplo de definir campos
}
