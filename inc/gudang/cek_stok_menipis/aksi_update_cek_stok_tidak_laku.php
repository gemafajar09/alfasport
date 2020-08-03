<?php
include "../../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// echo "UPDATE tb_cek_stok_menipis SET menipis_status= '1' WHERE id_gudang = '5'";

$simpan = $con->update(
    "tb_cek_stok_menipis",
    array(
        'menipis_status' => "1"
    ),
    array(
        "id_gudang" => $_POST["id_gudang"]
    )
);
