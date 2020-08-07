<?php
include "../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['transaksi_id'] == NULL) {

    $data_tmp = $con->query("SELECT * FROM tb_pembelian_tmp WHERE tmp_kode = '$_SESSION[auto_kode]'")->fetchAll(PDO::FETCH_ASSOC);
    $tgl = date('Y-m-d H:i:s');

    $data = array(
        'pembelian_no_invoice' => $_SESSION['auto_kode'],
        'pembelian_tgl_beli' => $_POST['tanggal'],
        'supplier_id' => $_POST['supplier_id'],
        'pembelian_create_at' => $tgl,
        'pembelian_create_by' => $_COOKIE['id_karyawan']
    );
    $simpan = $con->insert('tb_pembelian', $data);
    $idpem = $con->id();

    $con->query("INSERT INTO tb_pembelian_detail (pembelian_id,pembelian_no_invoice, id_gudang_detail, detail_jumlah, satuan_id) 
        Select '$idpem' as pembelian_id,
                tb_pembelian_tmp.pembelian_no_invoice,
                tb_pembelian_tmp.id_gudang_detail,
                tb_pembelian_tmp.tmp_jumlah As detail_jumlah,
                tb_pembelian_tmp.satuan_id
        From
            tb_pembelian_tmp
        WHERE
            tb_pembelian_tmp.pembelian_no_invoice = '$_SESSION[auto_kode]' ");

    $con->delete("tb_pembelian_tmp", array(" pembelian_no_invoice " => $_SESSION["auto_kode"]));
    unset($_SESSION['auto_kode']);


    if ($simpan == TRUE) {
        echo json_encode($simpan);
    } else {
        echo json_encode('ERROR');
    }
}
