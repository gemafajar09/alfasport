<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$con->query("DELETE FROM tb_voucher_detail_ongkir WHERE voucher_id_ongkir = '$_POST[voucher_id_ongkir]'");
$hapus = $con->query("DELETE FROM tb_voucher_ongkir WHERE voucher_id_ongkir = '$_POST[voucher_id_ongkir]'");

if ($hapus == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
