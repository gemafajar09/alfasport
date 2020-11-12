<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$cari_beli = $con->query(
    "SELECT beli_tmp_id, beli_tmp_jml 
    FROM tb_beli_tmp 
    WHERE beli_invoice = :beli_invoice
    AND barang_detail_id = :barang_detail_id
    AND id_karyawan = :id_karyawan",
    array(
        'beli_invoice' => $_POST['beli_invoice'],
        'barang_detail_id' => $_POST['barang_detail_id'],
        'id_karyawan' => $_COOKIE['id_karyawan']
    )
)->fetch();

if ($cari_beli['beli_tmp_id'] != null) {
    $simpan = $con->update(
        "tb_beli_tmp",
        array(
            "beli_tmp_jml" => $cari_beli['beli_tmp_jml'] + $_POST['beli_tmp_jml']
        ),
        array(
            "beli_tmp_id" => $cari_beli["beli_tmp_id"]
        )
    );
} else {
    $data = array(
        'beli_invoice' => $_POST['beli_invoice'],
        'barang_detail_id' => $_POST['barang_detail_id'],
        'beli_tmp_jml' => $_POST['beli_tmp_jml'],
        'satuan_id' => $_POST['satuan_id'],
        'id_karyawan' => $_COOKIE['id_karyawan'],
    );
    $simpan = $con->insert('tb_beli_tmp', $data);
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
