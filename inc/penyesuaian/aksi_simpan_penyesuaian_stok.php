<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['penyesuaian_stok_id'] == NULL) {
    if ($_POST['penyesuaian_stok_tipe'] != 'dipakai sendiri') {
        $simpan = $con->insert(
            "tb_penyesuaian_stok",
            array(
                "id_toko" => $_POST["id_toko"],
                "penyesuaian_stok_tgl" => $_POST["penyesuaian_stok_tgl"],
                "penyesuaian_stok_tipe" => $_POST["penyesuaian_stok_tipe"],
                "id_karyawan" => 0,
                "penyesuaian_stok_create_at" => $_POST["penyesuaian_stok_create_at"],
                "penyesuaian_stok_create_by" => $_POST["penyesuaian_stok_create_by"],
            )
        );
        $idps = $con->id();

        $last = $con->get(
            "tb_penyesuaian_stok",
            "penyesuaian_stok_id, id_toko",
            ["ORDER" => ["penyesuaian_stok_id" => "DESC"]],
            ["LIMIT" => 1]
        );
    } else {
        $simpan = $con->insert(
            "tb_penyesuaian_stok",
            array(
                "id_toko" => $_POST["id_toko"],
                "penyesuaian_stok_tgl" => $_POST["penyesuaian_stok_tgl"],
                "penyesuaian_stok_tipe" => $_POST["penyesuaian_stok_tipe"],
                "id_karyawan" => $_POST["id_karyawan"],
                "penyesuaian_stok_create_at" => $_POST["penyesuaian_stok_create_at"],
                "penyesuaian_stok_create_by" => $_POST["penyesuaian_stok_create_by"],
            )
        );
        $idps = $con->id();

        $last = $con->get(
            "tb_penyesuaian_stok",
            "penyesuaian_stok_id, id_toko",
            ["ORDER" => ["penyesuaian_stok_id" => "DESC"]],
            ["LIMIT" => 1]
        );
    }
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
            "penyesuaian_stok_tipe" => $_POST["penyesuaian_stok_tipe"],
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
