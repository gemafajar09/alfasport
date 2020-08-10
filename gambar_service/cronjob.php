<?php
require "index.php";

// AMBIL DAFTAR GAMBAR YANG EXPIRED
$data_file = $DB->query("SELECT id, name, extension FROM ".$_ENV['TABLE_NAME']." WHERE DATE(expired_at) < DATE()")->fetchAll(PDO::FETCH_ASSOC);

// HAPUS GAMBAR DAN HAPUS DATANYA DARI DATABASE
foreach ($data_file as $data)
{
	unlink("./".$_ENV['FILE_STORAGE'].$data['name'].".".$data['extension']);
	$DB->delete($_ENV['TABLE_NAME'], ["id" => $data['id']]);
	echo date("d-m-Y H:i:s")." : success delete ./".$_ENV['FILE_STORAGE'].$data['name']." \n";
}