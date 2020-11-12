<?php
include "../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['transaksi_id'] == NULL) {

    $data_tmp = $con->query("SELECT * FROM tb_transaksi_tmp WHERE tmp_kode = '$_SESSION[auto_kodes]'")->fetchAll(PDO::FETCH_ASSOC);
    $tgl = date('Y-m-d H:i:s');

    $data = array(
        'transaksi_kode' => $_SESSION['auto_kodes'],
        'transaksi_tgl' => $data_tmp['tmp_tgl'],
        'id_toko' => $data_tmp['id_toko'],
        'transaksi_jumlah_beli' => $_POST['transaksi_jumlah_beli'],
        'transaksi_tipe_bayar' => $_POST['transaksi_tipe_bayar'],
        'transaksi_cash' => $_POST['transaksi_cash'],
        'transaksi_debit' => $_POST['transaksi_card'],
        'transaksi_total_belanja' => $_POST['transaksi_total_belanja'],
        'transaksi_kembalian' => $_POST['transaksi_kembalian'],
        'transaksi_bank' => $_POST['transaksi_bank'],
        'transaksi_tipe_diskon' => $_POST['tipe_diskon2'],
        'transaksi_diskon' => $_POST['diskon2'],
        'transaksi_diskon_bank' => $_POST['diskon_bank'],
        'transaksi_create_at' => $tgl,
        'transaksi_create_by' => $_COOKIE['id_karyawan'],
        'keterangan' => $_POST['keterangan'],
    );

    $simpan = $con->insert('tb_transaksi', $data);
    $idtra = $con->id();

    // cari point
    $p = $_POST['transaksi_total_belanja'] / 100;
    $point = round($p);
    if ($data_tmp['tmp_tipe_konsumen'] == 'Member') {
        $member_id = $data_tmp['id_konsumen'];
        $con->query("UPDATE tb_member_point SET point = point + '$point', royalti = royalti + '$point' WHERE member_id = '$member_id'");
    }

    $sim = $con->query("INSERT INTO tb_transaksi_detail (transaksi_id, detail_kode, detail_tgl, id_toko,id_gudang,detail_tipe_konsumen, id_konsumen, detail_jumlah_beli, detail_total_harga, detail_potongan, detail_diskon1) 
        Select '$idtra' as transaksi_id,
                tb_transaksi_tmp.tmp_kode As detail_kode,
                tb_transaksi_tmp.tmp_tgl As detail_tgl,
                tb_transaksi_tmp.id_toko,
                tb_transaksi_tmp.id_gudang,
                tb_transaksi_tmp.tmp_tipe_konsumen As detail_tipe_konsumen,
                tb_transaksi_tmp.id_konsumen,
                tb_transaksi_tmp.tmp_jumlah_beli As detail_jumlah_beli,
                tb_transaksi_tmp.tmp_total_harga As detail_total_harga,
                tb_transaksi_tmp.potongan As detail_potongan,
                tb_transaksi_tmp.diskon1 As detail_diskon1
        From
            tb_transaksi_tmp
        WHERE
            tb_transaksi_tmp.tmp_kode = '$_SESSION[auto_kodes]' ");
    $con->delete("tb_transaksi_tmp", array("tmp_kode" => $_SESSION["auto_kodes"]));
    unset($_SESSION['auto_kodes']);

    if ($simpan == TRUE) {
        echo json_encode($simpan);
    } else {
        echo json_encode('ERROR');
    }
}
