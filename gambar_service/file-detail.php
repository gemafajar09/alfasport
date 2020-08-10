<?php
require "index.php";
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// PERINTAH UNTUK MENGHAPUS GAMBAR YANG EXPIRED_AT TIDAK NULL ALIAS GAMBAR SEMENTARA
	$data = $DB->get($_ENV['TABLE_NAME'], "*", array("id" => $_POST['id']));

	if($DB->error()[1] != null)
	{
		echo restApi::error($DB->error()[2]);
		exit;
	}

	echo restApi::ok($data);
	exit;
}

echo restApi::error("Not allowed");