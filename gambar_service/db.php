<?php
 
use Medoo\Medoo;
 
$DB = new Medoo([
	'database_type' => $_ENV['DB_TYPE'],
	'database_file' => $_ENV['DB_DATABASE']
]);