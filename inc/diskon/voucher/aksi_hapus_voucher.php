<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->query("DELETE FROM tb_voucher_detail WHERE voucher_id = '$_POST[voucher_id]'");
$hapus = $con->query("DELETE FROM tb_voucher WHERE voucher_id = '$_POST[voucher_id]'");

if ($hapus == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
