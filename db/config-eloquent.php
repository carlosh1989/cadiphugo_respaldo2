<?php
namespace DB; 

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Eloquent {
	    function __construct() {
	    $capsule = new Capsule;
	    $capsule->addConnection([
	     'driver' => 'mysql',
	     'host' => 'localhost',
	     'database' => 'CADIP2',
	     'username' => 'root',
	     'password' => 'Adm15.',
	     'charset' => 'utf8',
	     'collation' => 'utf8_unicode_ci',
	     'prefix' => '',
	    ]);
	    // Setup the Eloquent ORM… 
	    $capsule->bootEloquent();
	}
}