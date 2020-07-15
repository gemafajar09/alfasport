<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['penyesuaian_stok_detail_id'] == NULL) {
    $simpan = $con->insert(
        "tb_penyesuaian_stok_detail",
        array(
            "penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"],
            "id_gudang" => $_POST["id_gudang"],
            "stok_awal" => $_POST["stok_awal"],
            "stok_penyesuaian" => $_POST["stok_penyesuaian"],
            "stok_akhir" => $_POST["stok_akhir"],
        )
    );

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
            "id_gudang" => $_POST["id_gudang"],
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
