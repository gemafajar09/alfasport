<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$tgl = date('Y-m-d H:i:s');

$con->insert(
    "tb_restock_lainnya",
    array(
        "gudang_lainnya_detail_id" => $_POST["gudang_lainnya_detail_id"],
        "gudang_lainnya_kode" => $_POST["gudang_lainnya_kode"],
        "restock_lainnya_tgl" => $tgl,
        "restock_lainnya_jml_awal" => $_POST['gudang_lainnya_detail_jumlah'],
        "restock_lainnya_jml_tambah" => $_POST['jumlah_restock'],
    )
);

$simpan = $con->query("UPDATE tb_gudang_lainnya_detail SET gudang_lainnya_detail_jumlah = :jumlah + :jumlah_restock WHERE gudang_lainnya_detail_id = :gudang_lainnya_detail_id", array('jumlah' => $_POST['gudang_lainnya_detail_jumlah'], 'jumlah_restock' => $_POST['jumlah_restock'], 'gudang_lainnya_detail_id' => $_POST['gudang_lainnya_detail_id']));

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
