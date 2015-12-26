<?php
use Illuminate\Database\Capsule\Manager as Capsule;

/*
 *Configure the database and boot Eloquent
*/

$capsule = new Capsule;

$capsule->addConnection(array(
	'driver'		=> 'mysql',
	'host'		=> 'localhost',
	'database'	=> 'kampus',
	'username'	=> 'root',
	'password' 	=> '27marthinz',
	'charset' 	=> 'utf8',
	'collation'	=> 'utf8_general_ci',
	'prefix' 		=> ''
	));
$capsule->setAsGlobal();

$capsule->bootEloquent();

date_default_timezone_get('UTC');