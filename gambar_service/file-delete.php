<?php
require "index.php";
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// AMBIL DAFTAR GAMBAR YANG EXPIRED
	$data = $DB->get($_ENV['TABLE_NAME'], ["id", "name", "extension"], array("id" => $_POST['id']));

	if(!empty($data))
	{
		unlink("./".$_ENV['FILE_STORAGE'].$data['name'].".".$data['extension']);
		$DB->delete($_ENV['TABLE_NAME'], ["id" => $data['id']]);
	}

	echo restApi::ok();
	exit;
}

echo restApi::error("Not allowed");