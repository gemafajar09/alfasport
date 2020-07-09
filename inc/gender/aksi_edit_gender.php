<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->get("tb_gender", "*", array("gender_id" => $_POST["gender_id"]));
echo json_encode($edit);
