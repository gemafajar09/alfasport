<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['detail_ukuran_id'] == NULL) {
    $simpan = $con->insert(
        "tb_detail_ukuran",
        array(
            "ukuran_id" => $_POST["ukuran_id"],
            "kategori_id" => $_POST["kategori_id"],
            "divisi_id" => $_POST["divisi_id"],
            "subdivisi_id" => $_POST["subdivisi_id"],
            "gender_id" => $_POST["gender_id"],
            "detail_ukuran_ukuran" => $_POST["detail_ukuran_ukuran"],
            "detail_ukuran_stok" => $_POST["detail_ukuran_stok"],
            "detail_ukuran_harga_modal" => $_POST["detail_ukuran_harga_modal"],
            "detail_ukuran_harga_jual" => $_POST["detail_ukuran_harga_jual"],
        )
    );
} else {
    $simpan = $con->update(
        "tb_detail_ukuran",
        array(
            "ukuran_id" => $_POST["ukuran_id"],
            "kategori_id" => $_POST["kategori_id"],
            "divisi_id" => $_POST["divisi_id"],
            "subdivisi_id" => $_POST["subdivisi_id"],
            "gender_id" => $_POST["gender_id"],
            "detail_ukuran_ukuran" => $_POST["detail_ukuran_ukuran"],
            "detail_ukuran_stok" => $_POST["detail_ukuran_stok"],
            "detail_ukuran_harga_modal" => $_POST["detail_ukuran_harga_modal"],
            "detail_ukuran_harga_jual" => $_POST["detail_ukuran_harga_jual"],
        ),
        array(
            "detail_ukuran_id" => $_POST["detail_ukuran_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
