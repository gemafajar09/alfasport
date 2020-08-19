<?php
$base_url = 'http://localhost/mediatama/alfasport/';
date_default_timezone_set("Asia/Jakarta");
require "Medoo.php";

use Medoo\Medoo;

$con = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'alfa_sport',
    'server' => "localhost",
    'username' => "root",
    'password' => "mysql"
]);
