<?php
require "index.php";
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// PERINTAH UNTUK MENGHAPUS GAMBAR YANG EXPIRED_AT TIDAK NULL ALIAS GAMBAR SEMENTARA
	$DB->update($_ENV['TABLE_NAME'], array("expired_at" => null), array("id" => $_POST['id']));

	if($DB->error()[1] != null)
	{
		echo restApi::error($DB->error()[2]);
		exit;
	}

	echo restApi::ok();
	exit;
}

echo restApi::error("Not allowed");