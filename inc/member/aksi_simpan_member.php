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
            'member_notelp' => $_POST['member_notelp'],
            'member_tgl_lahir' => $_POST['member_tgl_lahir'],
            'member_gender' => $_POST['member_gender'],
        )
    );
    // ambil id user kemuadin tambahkan ke tb_member_point
    $id = $con->id();
    $con->insert(
        "tb_member_point",
        array(
            'member_id' => $id
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
            'id_prov' => $_POST['id_prov'],
            'id_kota' => $_POST['id_kota'],
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
