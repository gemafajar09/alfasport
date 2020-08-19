<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$tgl = date('Y-m-d H:i:s');

$con->insert(
    "tb_restock",
    array(
        "id_detail" => $_POST["id_detail"],
        "id" => $_POST["artikel"],
        "restock_tgl" => $tgl,
        "restock_jumlah_awal" => $_POST['jumlah'],
        "restock_jumlah_tambah" => $_POST['jumlah_restock'],
    )
);

$simpan = $con->query("UPDATE tb_gudang_detail SET jumlah = :jumlah + :jumlah_restock WHERE id_detail = :id_detail", array('jumlah' => $_POST['jumlah'], 'jumlah_restock' => $_POST['jumlah_restock'], 'id_detail' => $_POST['id_detail']));

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
