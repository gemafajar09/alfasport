<?php
include "../../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

if ($_POST['voucher_id'] == NULL) {
    for ($i = 0; $i < $_POST['voucher_jumlah']; $i++) {
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $voucher_kode =  substr(str_shuffle($karakter), 0, 8);
        $simpan = $con->insert(
            "tb_voucher",
            array(
                'voucher_nama' => $_POST['voucher_nama'],
                'voucher_kode' => $voucher_kode,
                'voucher_tgl' => "",
                'voucher_status' => "0"
            )
        );
    }
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
