<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

if (ENVIRONMENT === 'production') {
	// Hosting / Production Server
	// Sesuaikan dengan kredensial server produksi / hosting Anda
	$db['default'] = array(
		'dsn'	=> '',
		'hostname' => getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost',
		'username' => getenv('DB_USER') ? getenv('DB_USER') : 'YOUR_PRODUCTION_DB_USER',
		'password' => getenv('DB_PASS') ? getenv('DB_PASS') : 'YOUR_PRODUCTION_DB_PASSWORD',
		'database' => getenv('DB_NAME') ? getenv('DB_NAME') : 'YOUR_PRODUCTION_DB_NAME',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => FALSE,
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8mb4',
		'dbcollat' => 'utf8mb4_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
} else {
	// Localhost (XAMPP)
	$db['default'] = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'db_jewepe',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => TRUE,
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8mb4',
		'dbcollat' => 'utf8mb4_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
}
