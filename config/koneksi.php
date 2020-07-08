<?php
$base_url = 'http://localhost/alfasport/';
require "./Medoo.php";

use Medoo\Medoo;

$con = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'alfa_sport',
    'server' => "localhost",
    'username' => "root",
    'password' => ""
]);