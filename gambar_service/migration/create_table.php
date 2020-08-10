<?php
require "index.php";

$DB->query("DROP TABLE IF EXISTS ".$_ENV['TABLE_NAME']);

$DB->create($_ENV['TABLE_NAME'], [
	"id" => [
		"integer",
		"NOT NULL",
		"PRIMARY KEY",
		"AUTOINCREMENT"
	],
	"name" => [
		"text",
		"NOT NULL"
	],
	"extension" => [
		"text",
		"NOT NULL"
	],
	"mime" => [
		"text",
		"NOT NULL"
	],
	"size" => [
		"integer",
		"NOT NULL"
	],
	"path" => [
		"text",
		"NOT NULL"
	],
	"expired_at" => [
		"text",
		"NULL"
	]
]);

echo "Table '".$_ENV['TABLE_NAME']."' successfully created!";