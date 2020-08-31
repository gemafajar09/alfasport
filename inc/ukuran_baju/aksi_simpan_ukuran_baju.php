<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$a = $_POST['id_gender'];
$id_gender = implode(",", $a);

if ($_POST['ukuran_baju_id'] == NULL) {
} else {
    $simpan = $con->update(
        "tb_ukuran_baju",
        array(
            "id_merek" => $_POST["id_merek"],
            "id_kategori" => $_POST["id_kategori"],
            "id_divisi" => $_POST["id_divisi"],
            "id_subdivisi" => $_POST["id_subdivisi"],
            "id_gender" => $id_gender,
        ),
        array(
            "ukuran_baju_id" => $_POST["ukuran_baju_id"]
        )
    );

    $con->query("UPDATE tb_ukuran_baju_detail SET ukuran_baju_detail_stok = '$_POST[ukuran_stok_s]' WHERE ukuran_baju_id = '$_POST[ukuran_baju_id]' AND ukuran_baju_detail_nama = 'S'");

    $con->query("UPDATE tb_ukuran_baju_detail SET ukuran_baju_detail_stok = '$_POST[ukuran_stok_m]' WHERE ukuran_baju_id = '$_POST[ukuran_baju_id]' AND ukuran_baju_detail_nama = 'M'");

    $con->query("UPDATE tb_ukuran_baju_detail SET ukuran_baju_detail_stok = '$_POST[ukuran_stok_l]' WHERE ukuran_baju_id = '$_POST[ukuran_baju_id]' AND ukuran_baju_detail_nama = 'L'");

    $con->query("UPDATE tb_ukuran_baju_detail SET ukuran_baju_detail_stok = '$_POST[ukuran_stok_xl]' WHERE ukuran_baju_id = '$_POST[ukuran_baju_id]' AND ukuran_baju_detail_nama = 'XL'");
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}