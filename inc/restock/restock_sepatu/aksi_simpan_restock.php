<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$tgl = date('Y-m-d H:i:s');

$con->insert(
    "tb_barang_restock",
    array(
        "barang_detail_id" => $_POST["barang_detail_id"],
        "barang_kode" => $_POST["barang_kode"],
        "barang_restock_tgl" => $tgl,
        "barang_restock_jml_awal" => $_POST['barang_detail_jumlah'],
        "barang_restock_jml_tambah" => $_POST['jumlah_restock'],
    )
);

$simpan = $con->query(
    "UPDATE tb_barang_detail SET 
                        barang_detail_jml = :jumlah + :jumlah_restock 
                        WHERE barang_detail_id = :barang_detail_id",
    array(
        'jumlah' => $_POST['barang_detail_jumlah'],
        'jumlah_restock' => $_POST['jumlah_restock'],
        'barang_detail_id' => $_POST['barang_detail_id']
    )
);

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
