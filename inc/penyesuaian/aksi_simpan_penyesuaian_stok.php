<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['penyesuaian_stok_id'] == NULL) {
    $simpan = $con->insert(
        "tb_penyesuaian_stok",
        array(
            "id_toko" => $_POST["id_toko"],
            "penyesuaian_stok_tgl" => $_POST["penyesuaian_stok_tgl"],
            "penyesuaian_stok_tipe" => $_POST["penyesuaian_stok_tipe"],
            "penyesuaian_stok_create_at" => $_POST["penyesuaian_stok_create_at"],
            "penyesuaian_stok_create_by" => $_POST["penyesuaian_stok_create_by"],
        )
    );

    $last = $con->get(
        "tb_penyesuaian_stok",
        "penyesuaian_stok_id",
        ["ORDER" => ["penyesuaian_stok_id" => "DESC"]],
        ["LIMIT" => 1]
    );

    if ($simpan == TRUE) {
        echo json_encode($last);
    } else {
        echo json_encode('ERROR');
    }
} else {
    $where = array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]);
    $simpan = $con->update(
        "tb_penyesuaian_stok",
        array(
            // "id_toko" => $_POST["id_toko"],
            // "penyesuaian_stok_tgl" => $_POST["penyesuaian_stok_tgl"],
            "penyesuaian_stok_tipe" => $_POST["penyesuaian_stok_tipe"],
            // "penyesuaian_stok_create_by" => $_POST["penyesuaian_stok_create_by"],
        ),
        array(
            "penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]
        )
    );
    if ($simpan == TRUE) {
        echo json_encode($where);
    } else {
        echo json_encode('ERROR');
    }
}
