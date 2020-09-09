<?php
include "../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['transol_id'] == NULL) {

    $data_tmp = $con->query("SELECT * FROM tb_transaksi_online_tmp WHERE transol_tmp_kode = '$_SESSION[auto_kode]'")->fetchAll(PDO::FETCH_ASSOC);
    $tgl = date('Y-m-d H:i:s');

    $data = array(
        'transol_kode' => $_SESSION['auto_kode'],
        'transol_tgl' => $data_tmp[0]['transol_tmp_tgl'],
        'id_toko' => $data_tmp[0]['id_toko'],
        'transol_jumlah_beli' => $_POST['transol_jumlah_beli'],
        'transol_tipe_bayar' => $_POST['transol_tipe_bayar'],
        'transol_cash' => $_POST['transol_cash'],
        'transol_debit' => $_POST['transol_card'],
        'transol_bank' => $_POST['transol_bank'],
        'transol_diskon' => $_POST['transol_diskon'],
        'transol_create_at' => $tgl,
        'transol_create_by' => $_COOKIE['id_karyawan'],
        'transol_keterangan' => $_POST['transol_keterangan'],
    );
    $simpan = $con->insert('tb_transaksi_online', $data);

    $idtra = $con->id();


    $con->query("INSERT INTO tb_transaksi_online_detail (transol_id, transol_detail_kode, transol_detail_tgl, id_toko, id_gudang, data_toko_online_id , transol_detail_jumlah_beli, transol_detail_total_harga, transol_detail_potongan, transol_detail_diskon1, transol_detail_diskon2,id_karyawan) 
        Select '$idtra' as transol_id,
                tb_transaksi_online_tmp.transol_tmp_kode As transol_detail_kode,
                tb_transaksi_online_tmp.transol_tmp_tgl As transol_detail_tgl,
                tb_transaksi_online_tmp.id_toko,
                tb_transaksi_online_tmp.id_gudang,
                tb_transaksi_online_tmp.data_toko_online_id,
                tb_transaksi_online_tmp.transol_tmp_jumlah_beli As transol_detail_jumlah_beli,
                tb_transaksi_online_tmp.transol_tmp_total_harga As transol_detail_total_harga,
                tb_transaksi_online_tmp.transol_tmp_potongan As transol_detail_potongan,
                tb_transaksi_online_tmp.transol_tmp_diskon1 As transol_detail_diskon1,
                tb_transaksi_online_tmp.transol_tmp_diskon2 As transol_detail_diskon2,
                tb_transaksi_online_tmp.id_karyawan
        From
            tb_transaksi_online_tmp
        WHERE
            tb_transaksi_online_tmp.transol_tmp_kode = '$_SESSION[auto_kode]' ");

    $con->delete("tb_transaksi_online_tmp", array("transol_tmp_kode" => $_SESSION["auto_kode"]));

    unset($_SESSION['auto_kode']);

    if ($simpan == TRUE) {
        echo json_encode($simpan);
    } else {
        echo json_encode('ERROR');
    }
}