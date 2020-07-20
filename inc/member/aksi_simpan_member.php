<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$date   = new DateTime(); //this returns the current date time
$result = $date->format('y-m-d-H-i-s');
$krr    = explode('-', $result);
$kode = implode("", $krr);

$password = $_POST['member_password'];
$pwd = password_hash($password, PASSWORD_DEFAULT);

if ($_POST['member_id'] == NULL) {
    $simpan = $con->insert(
        "tb_member",
        array(
            'member_kode' => $kode,
            'member_nama' => $_POST['member_nama'],
            'member_email' => $_POST['member_email'],
            'member_password' => $pwd,
            'member_password_repeat' => $_POST['member_password'],
            'member_alamat' => $_POST['member_alamat'],
            'member_notelp' => $_POST['member_notelp'],
            'member_tgl_lahir' => $_POST['member_tgl_lahir'],
        )
    );
} else {
    $simpan = $con->update(
        "tb_member",
        array(
            'member_nama' => $_POST['member_nama'],
            'member_email' => $_POST['member_email'],
            'member_password' => $pwd,
            'member_password_repeat' => $_POST['member_password'],
            'member_alamat' => $_POST['member_alamat'],
            'member_notelp' => $_POST['member_notelp'],
            'member_tgl_lahir' => $_POST['member_tgl_lahir'],
        ),
        array(
            "member_id" => $_POST["member_id"]
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
