<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['penyesuaian_stok_detail_id'] == NULL) {
    $simpan = $con->insert(
        "tb_penyesuaian_stok_detail",
        array(
            "penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"],
            "id_barang" => $_POST["id_barang"],
            "id_stok_awal" => $_POST["id_stok_awal"],
            "id_stok_penyesuaian" => $_POST["id_stok_penyesuaian"],
            "penyesuaian_stok_detail_stok_akhir" => $_POST["penyesuaian_stok_detail_stok_akhir"],
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
            "id_barang" => $_POST["id_barang"],
            "id_stok_awal" => $_POST["id_stok_awal"],
            "id_stok_penyesuaian" => $_POST["id_stok_penyesuaian"],
            "penyesuaian_stok_detail_stok_akhir" => $_POST["penyesuaian_stok_detail_stok_akhir"],
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
