<?php
$base_url = 'http://localhost/alfasport/';
date_default_timezone_set("Asia/Jakarta");
require "Medoo.php";

use Medoo\Medoo;

$con = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'alfa_sport',
    'server' => "localhost",
    'username' => "root",
    'password' => ""
]);

// function tgl_indo($tanggal)
// {
// 	$bulan = array (
// 		1 =>   'Januari',
// 		'Februari',
// 		'Maret',
// 		'April',
// 		'Mei',
// 		'Juni',
// 		'Juli',
// 		'Agustus',
// 		'September',
// 		'Oktober',
// 		'November',
// 		'Desember'
// 	);
// 	$pecahkan = explode('-', $tanggal); 
// 	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
// }
