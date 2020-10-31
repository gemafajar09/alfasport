<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$tgl = date('Y-m-d H:i:s');

$con->insert(
    "tb_restock_kaos_kaki",
    array(
        "gudang_kaos_kaki_detail_id" => $_POST["gudang_kaos_kaki_detail_id"],
        "gudang_kaos_kaki_kode" => $_POST["gudang_kaos_kaki_kode"],
        "restock_kaos_kaki_tgl" => $tgl,
        "restock_kaos_kaki_jml_awal" => $_POST['gudang_kaos_kaki_detail_jumlah'],
        "restock_kaos_kaki_jml_tambah" => $_POST['jumlah_restock'],
    )
);

$simpan = $con->query("UPDATE tb_gudang_kaos_kaki_detail SET gudang_kaos_kaki_detail_jumlah = :jumlah + :jumlah_restock WHERE gudang_kaos_kaki_detail_id = :gudang_kaos_kaki_detail_id", array('jumlah' => $_POST['gudang_kaos_kaki_detail_jumlah'], 'jumlah_restock' => $_POST['jumlah_restock'], 'gudang_kaos_kaki_detail_id' => $_POST['gudang_kaos_kaki_detail_id']));

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
