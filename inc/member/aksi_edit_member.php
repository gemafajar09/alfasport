<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$where = array('member_id' => $_POST['member_id']);
$edit = $con->get('tb_member', "*", $where);
echo json_encode($edit);
