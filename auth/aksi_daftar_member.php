<?php
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

if (isset($_POST['regis'])) {

    $date   = new DateTime(); //this returns the current date time
    $result = $date->format('y-m-d-H-i-s');
    $krr    = explode('-', $result);
    $kode = implode("", $krr);

    $cek_email = $con->count("tb_member", [
        "member_email" => "$_POST[member_email]"
    ]);

    if ($cek_email < 1) {
        if ($_POST["member_password"] == $_POST["member_password_repeat"]) {
            $pwd = password_hash($_POST["member_password"], PASSWORD_DEFAULT);
            $simpan = $con->insert(
                "tb_member",
                array(
                    "member_kode" => $kode,
                    "member_nama" => $_POST["member_nama"],
                    "member_email" => $_POST["member_email"],
                    "member_password" => $pwd,
                    "member_password_repeat" => $_POST["member_password_repeat"],
                    "id_prov" => $_POST["id_prov"],
                    "id_kota" => $_POST["id_kota"],
                    "member_alamat" => $_POST["member_alamat"],
                    "member_notelp" => $_POST["member_notelp"],
                    "member_tgl_lahir" => $_POST["member_tgl_lahir"],
                    "member_gender" => $_POST["member_gender"],
                    "member_profesi" => $_POST["member_profesi"],
                )
            );
            if ($simpan == TRUE) {
                setcookie('success', "Selamat Akun Success Dibuat.!!", time() + 1, "/");
                header('location:daftar-member.html');
            } else {
                setcookie('error', "Password Tidak Sama!!!", time() + 1, "/");
                header('location:daftar-member.html');
            }
        } else {
            setcookie('error', "Password Tidak Sama!!!", time() + 1, "/");
            header('location:daftar-member.html');
        }
    } else {
        setcookie('error', "Email Sudah Digunakan!!!", time() + 1, "/");
        header('location:daftar-member.html');
    }
}
