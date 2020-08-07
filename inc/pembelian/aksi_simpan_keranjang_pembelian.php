<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['tmp_id'] == NULL) {

    $data = array(
        'pembelian_no_invoice' => $_POST['pembelian_no_invoice'],
        'id_gudang_detail' => $_POST['id_gudang_detail'],
        'tmp_jumlah' => $_POST['tmp_jumlah'],
        'satuan_id' => $_POST['satuan_id'],
        'id_karyawan' => $_COOKIE['id_karyawan'],
    );
    $simpan = $con->insert('tb_pembelian_tmp', $data);

    if ($simpan == TRUE) {
        echo json_encode('SUCCESS');
    } else {
        echo json_encode('ERROR');
    }
}
