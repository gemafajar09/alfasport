<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->query("DELETE FROM tb_point WHERE member_id = '$_POST[member_id]'");
$hapus = $con->query("DELETE FROM tb_member WHERE member_id = '$_POST[member_id]'");
if ($hapus == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
