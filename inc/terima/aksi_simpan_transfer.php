<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['id_transfer'] == NULL) {
    $simpan = $con->insert(
        "tb_transfer",
        array(
            "id_toko" => $_POST["id_toko"],
            "id_toko_tujuan" => $_POST["id_toko_tujuan"],
            "id_gudang" => $_POST["id_gudang"],
            "id_detail" => $_POST["id_detail"],
            "jumlah" => $_POST["jumlah"],
            "tanggal" => $_POST["tanggal"],
            "acc_owner" => "0",
        )
    );
} else {
    $simpan = $con->update(
        "tb_transfer",
        array(
            "id_toko" => $_POST["id_toko"],
            "id_toko_tujuan" => $_POST["id_toko_tujuan"],
            "id_gudang" => $_POST["id_gudang"],
            "id_detail" => $_POST["id_detail"],
            "jumlah" => $_POST["jumlah"],
            "tanggal" => $_POST["tanggal"],
            "acc_owner" => "0",
        ),
        array(
            "id_transfer" => $_POST["id_transfer"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
