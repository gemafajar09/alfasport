<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$id = $_POST['id_member'];
$data = $con->query("SELECT * FROM tb_member_point WHERE member_id = '$id'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);