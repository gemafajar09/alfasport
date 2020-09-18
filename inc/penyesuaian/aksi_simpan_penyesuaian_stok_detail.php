<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


if ($_POST['penyesuaian_stok_detail_id'] == NULL) {
    // simpan id_stok_toko dibagian penyesuaiana_stok karena berdasarkan tb_stok_toko
    $simpan = $con->insert(
        "tb_penyesuaian_stok_detail",
        [
            "penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"],
            "id_toko" => $_POST["id_stok_toko"],
            "stok_awal" => $_POST["stok_awal"],
            "stok_penyesuaian" => $_POST["stok_penyesuaian"],
            "stok_akhir" => $_POST["stok_akhir"],
        ]
    );
    // update stok gudang toko
    $update = $con->update('tb_stok_toko', ['jumlah' => $_POST['stok_akhir']], ['id_stok_toko' => $_POST['id_stok_toko']]);

    $last = $_POST["penyesuaian_stok_id"];

    if ($simpan == TRUE) {
        echo json_encode($last);
    } else {
        echo json_encode('ERROR');
    }
} else {
    $where = array("penyesuaian_stok_detail_id" => $_POST["penyesuaian_stok_detail_id"]);
    $simpan = $con->update(
        "tb_penyesuaian_stok_detail",
        array(
            "penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"],
            "id_toko" => $_POST["id_stok_toko"],
            "stok_awal" => $_POST["stok_awal"],
            "stok_penyesuaian" => $_POST["stok_penyesuaian"],
            "stok_akhir" => $_POST["stok_akhir"],
        ),
        array(
            "penyesuaian_stok_detail_id" => $_POST["penyesuaian_stok_detail_id"]
        )
    );
    if ($simpan == TRUE) {
        echo json_encode($where);
    } else {
        echo json_encode('ERROR');
    }
}
