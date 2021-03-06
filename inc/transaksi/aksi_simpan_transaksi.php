<?php
include "../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
// var_dump($_POST);
// exit;

if ($_POST['transaksi_id'] == NULL) {

    $data_tmp = $con->query("SELECT * FROM tb_transaksi_tmp WHERE tmp_kode = '$_POST[kode]'")->fetchAll(PDO::FETCH_ASSOC);
    $tgl = date('Y-m-d H:i:s');

    // var_dump($data_tmp);
    // exit;
    $data = array(
        'transaksi_kode' => $data_tmp[0]['tmp_kode'],
        'transaksi_tgl' => $data_tmp[0]['tmp_tgl'],
        'id_toko' => $data_tmp[0]['id_toko'],
        'transaksi_jumlah_beli' => $_POST['transaksi_jumlah_beli'],
        'transaksi_tipe_bayar' => $_POST['transaksi_tipe_bayar'],
        'transaksi_cash' => $_POST['transaksi_cash'],
        'transaksi_debit' => $_POST['transaksi_card'],
        'transaksi_point' => $_POST['points'],
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
    // exit;

    // cari point
    $p = (int)$_POST['transaksi_total_belanja'] / 100;
    $point = round($p);
    $member_id = $data_tmp[0]['id_konsumen'];
    if ($data_tmp[0]['tmp_tipe_konsumen'] == 'Member') {
        if($_POST['transaksi_tipe_bayar'] >= 1 AND $_POST['transaksi_tipe_bayar'] <= 5){

            
            // kurangi point dahulu
            $con->query("UPDATE tb_member_point SET point = point - '$_POST[points]' WHERE member_id = '$member_id'");
            
            // baru tambahkan yang baru
            $con->query("UPDATE tb_member_point SET point = point + '$point', royalti = royalti + '$point' WHERE member_id = '$member_id'");
        }else{
            // kurangi point dahulu
            $con->query("UPDATE tb_member_point SET point = point - '$_POST[points]' WHERE member_id = '$member_id'");
        }
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
            tb_transaksi_tmp.tmp_kode = '$_POST[kode]' ");
    
    $con->delete("tb_transaksi_tmp", array("tmp_kode" => $_POST['kode']));
    unset($_SESSION['auto_kodes']);

    if ($simpan == TRUE) {
        echo json_encode('SUCCESS');
    } else {
        echo json_encode('ERROR');
    }
}