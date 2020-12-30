<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$id = $_POST['id_member'];
$data = $con->query("SELECT * FROM tb_member_point JOIN tb_member ON tb_member.member_id = tb_member_point.member_id WHERE tb_member_point.member_id = '$id'")->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);