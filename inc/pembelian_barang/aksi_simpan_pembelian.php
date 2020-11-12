<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
session_start();
// $json = file_get_contents('php://input');
// $_POST = json_decode($json, true);

// foto
$nm_foto = $_FILES['beli_nota']['name'];
if (!empty($nm_foto)) {
    $nama_foto = fileUpload($_FILES['beli_nota'], "../../img/nota_pembelian/");
}
$tgl = date('Y-m-d H:i:s');

$data = array(
    'beli_invoice' => $_SESSION['auto_kode'],
    'beli_tgl_beli' => $_POST['tanggal'],
    'supplier_id' => $_POST['supplier_id'],
    'beli_create_at' => $tgl,
    'beli_create_by' => $_COOKIE['id_karyawan'],
    'beli_nota' => $nama_foto,
);
$simpan = $con->insert('tb_beli', $data);

$beli_id = $con->id();

$con->query("INSERT INTO tb_beli_detail (beli_id,beli_invoice, barang_detail_id, beli_detail_jml, satuan_id) 
        Select '$beli_id' as beli_id,
                tb_beli_tmp.beli_invoice,
                tb_beli_tmp.barang_detail_id,
                tb_beli_tmp.beli_tmp_jml As beli_detail_jml,
                tb_beli_tmp.satuan_id
        From
            tb_beli_tmp
        WHERE
            tb_beli_tmp.beli_invoice = '$_SESSION[auto_kode]' ");

// ambil data di gudang
$data_dari_tb_beli_tmp = $con->query("SELECT barang_detail_id, beli_tmp_jml FROM tb_beli_tmp WHERE beli_invoice = :beli_invoice", array('beli_invoice' => $_SESSION['auto_kode']))->fetchAll();

// var_dump($data_dari_tb_beli_tmp);
// exit;
// update tb_gudang
foreach ($data_dari_tb_beli_tmp as $i => $no) {
    // var_dump($no['barang_detail_id']);
    // var_dump($no['beli_tmp_jml']);
    $cari_jml_barang_di_tb_barang_detail = $con->query("SELECT barang_detail_jml FROM tb_barang_detail WHERE barang_detail_id = :barang_detail_id", array('barang_detail_id' => $no['barang_detail_id']))->fetch();
    // var_dump($cari_jml_barang_di_tb_barang_detail['barang_detail_jml']);

    $con->update(
        "tb_barang_detail",
        array(
            "barang_detail_jml" => $cari_jml_barang_di_tb_barang_detail['barang_detail_jml'] + $no['beli_tmp_jml']
        ),
        array(
            "barang_detail_id" => $no["barang_detail_id"]
        )
    );
}

$con->delete("tb_beli_tmp", array("beli_invoice " => $_SESSION["auto_kode"]));

unset($_SESSION['auto_kode']);

if ($simpan == TRUE) {
    echo json_encode($simpan);
} else {
    echo json_encode('ERROR');
}
