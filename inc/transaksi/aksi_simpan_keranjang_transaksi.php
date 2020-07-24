<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['tmp_id'] == NULL) {

    if ($_POST['tipe_konsumen'] == "Member") {
        $data = array(
            'tmp_kode' => $_POST['tmp_kode'],
            'tmp_tgl' => $_POST['tmp_tgl'],
            'id_toko' => $_POST['id_toko'],
            'id_gudang' => $_POST['id_gudang'],
            'tmp_tipe_konsumen' => $_POST['tipe_konsumen'],
            'id_konsumen' => $_POST['member_id'],
            'tmp_jumlah_beli' => $_POST['tmp_jumlah_beli'],
            'tmp_total_harga' => $_POST['tmp_total_harga'],
        );
        $simpan = $con->insert('tb_transaksi_tmp', $data);
    } else if ($_POST['tipe_konsumen'] == "Distributor") {
        $data = array(
            'tmp_kode' => $_POST['tmp_kode'],
            'tmp_tgl' => $_POST['tmp_tgl'],
            'id_toko' => $_POST['id_toko'],
            'id_gudang' => $_POST['id_gudang'],
            'tmp_tipe_konsumen' => $_POST['tipe_konsumen'],
            'id_konsumen' => $_POST['distributor_id'],
            'tmp_jumlah_beli' => $_POST['tmp_jumlah_beli'],
            'tmp_total_harga' => $_POST['tmp_total_harga'],
        );
        $simpan = $con->insert('tb_transaksi_tmp', $data);
    } else {
        $data = array(
            'tmp_kode' => $_POST['tmp_kode'],
            'tmp_tgl' => $_POST['tmp_tgl'],
            'id_toko' => $_POST['id_toko'],
            'id_gudang' => $_POST['id_gudang'],
            'tmp_tipe_konsumen' => $_POST['tipe_konsumen'],
            'id_konsumen' => 0,
            'tmp_jumlah_beli' => $_POST['tmp_jumlah_beli'],
            'tmp_total_harga' => $_POST['tmp_total_harga'],
        );
        $simpan = $con->insert('tb_transaksi_tmp', $data);
    }
    if ($simpan == TRUE) {
        echo json_encode($simpan);
    } else {
        echo json_encode('ERROR');
    }
}
