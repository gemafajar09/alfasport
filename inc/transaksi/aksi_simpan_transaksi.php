<?php
include "../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['transaksi_id'] == NULL) {

    $data_tmp = $con->query("SELECT * FROM tb_transaksi_tmp WHERE tmp_kode = '$_SESSION[auto_kode]'")->fetchAll(PDO::FETCH_ASSOC);
    $tgl = date('Y-m-d H:i:s');

    $data = array(
        'transaksi_kode' => $_SESSION['auto_kode'],
        'transaksi_tgl' => $data_tmp[0]['tmp_tgl'],
        'id_toko' => $data_tmp[0]['id_toko'],
        'transaksi_jumlah_beli' => $_POST['transaksi_jumlah_beli'],
        'transaksi_tipe_bayar' => $_POST['transaksi_tipe_bayar'],
        'transaksi_cash' => $_POST['transaksi_cash'],
        'transaksi_debit' => $_POST['transaksi_card'],
        'transaksi_bank' => $_POST['transaksi_bank'],
        'transaksi_diskon' => $_POST['transaksi_diskon'],
        'transaksi_create_at' => $tgl,
        'transaksi_create_by' => $_COOKIE['id_karyawan'],
    );
    $simpan = $con->insert('tb_transaksi', $data);
    $idtra = $con->id();

    $con->query("INSERT INTO tb_transaksi_detail (transaksi_id, detail_kode, detail_tgl, id_toko,id_gudang,detail_tipe_konsumen, id_konsumen, detail_jumlah_beli, detail_total_harga) 
        Select '$idtra' as transaksi_id,
                tb_transaksi_tmp.tmp_kode As detail_kode,
                tb_transaksi_tmp.tmp_tgl As detail_tgl,
                tb_transaksi_tmp.id_toko,
                tb_transaksi_tmp.id_gudang,
                tb_transaksi_tmp.tmp_tipe_konsumen As detail_tipe_konsumen,
                tb_transaksi_tmp.id_konsumen,
                tb_transaksi_tmp.tmp_jumlah_beli As detail_jumlah_beli,
                tb_transaksi_tmp.tmp_total_harga As detail_total_harga
        From
            tb_transaksi_tmp
        WHERE
            tb_transaksi_tmp.tmp_kode = '$_SESSION[auto_kode]' ");

    $con->delete("tb_transaksi_tmp", array("tmp_kode" => $_SESSION["auto_kode"]));
    unset($_SESSION['auto_kode']);


    if ($simpan == TRUE) {
        echo json_encode($simpan);
    } else {
        echo json_encode('ERROR');
    }
}
