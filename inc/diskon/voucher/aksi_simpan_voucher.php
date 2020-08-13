<?php
include "../../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['voucher_id'] == NULL) {
    for ($i = 0; $i < $_POST['voucher_jumlah']; $i++) {
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $voucher_generate =  substr(str_shuffle($karakter), 0, 8);
        $simpan = $con->insert(
            "tb_voucher",
            array(
                'voucher_kode' => $_POST['voucher_kode'],
                'voucher_nama' => $_POST['voucher_nama'],
                'voucher_harga' => $_POST['voucher_harga'],
                'voucher_generate' => $voucher_generate,
                'voucher_tgl_mulai' => $_POST['voucher_tgl_mulai'],
                'voucher_tgl_akhir' => $_POST['voucher_tgl_akhir'],
                'voucher_status' => "0",
                "id_toko" => $_POST['id_toko']
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
