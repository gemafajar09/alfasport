<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['transol_tmp_id'] == NULL) {
    $data = array(
        'transol_tmp_kode' => $_POST['transol_tmp_kode'],
        'transol_tmp_tgl' => $_POST['transol_tmp_tgl'],
        'id_toko' => $_POST['id_toko'],
        'id_gudang' => $_POST['id_gudang'],
        'data_toko_online_id' => $_POST['data_toko_online_id'],
        'transol_tmp_jumlah_beli' => $_POST['transol_tmp_jumlah_beli'],
        'transol_tmp_total_harga' => $_POST['transol_tmp_total_harga'],
        'transol_tmp_potongan' => $_POST['transol_tmp_potongan'],
        'transol_tmp_diskon1' => $_POST['transol_tmp_diskon1'],
        'transol_tmp_diskon2' => $_POST['transol_tmp_diskon2'],
        'transol_tmp_diskon2' => $_POST['transol_tmp_diskon2'],
        'id_karyawan' => $_COOKIE['id_karyawan']
    );
    $simpan = $con->insert('tb_transaksi_online_tmp', $data);

    if ($simpan == TRUE) {
        echo json_encode('SUCCESS');
    } else {
        echo json_encode('ERROR');
    }
}
