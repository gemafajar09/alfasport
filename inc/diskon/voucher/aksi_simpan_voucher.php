<?php
include "../../../config/koneksi.php";
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['voucher_id'] == NULL) {

    $simpan = $con->insert(
        "tb_voucher",
        array(
            'voucher_kode' => $_POST['voucher_kode'],
            'voucher_nama' => $_POST['voucher_nama'],
            'voucher_jenis' => $_POST['voucher_jenis'],
            'voucher_harga' => $_POST['voucher_harga'],
            'voucher_tgl_mulai' => $_POST['voucher_tgl_mulai'],
            'voucher_tgl_akhir' => $_POST['voucher_tgl_akhir'],
            "id_toko" => $_POST['id_toko']
        )
    );
    $last_id = $con->id();

    for ($i = 0; $i < $_POST['voucher_jumlah']; $i++) {
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $voucher_generate =  substr(str_shuffle($karakter), 0, 8);

        $save = $con->insert(
            "tb_voucher_detail",
            array(
                'voucher_id' => $last_id,
                'voucher_detail_token' => $voucher_generate,
                'voucher_detail_status' => 0,
                'member_id' => 0
            )
        );
    }
}
unset($_SESSION['auto_kode']);


if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
