<?php
if (@$_COOKIE['member_id'] == '') {
    echo "<script>window.location='index.php?page=login';</script>";
}
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

if (isset($_POST['simpan'])) {

    $cek_password = $con->query("SELECT member_password FROM tb_member WHERE member_id='$_COOKIE[member_id]'")->fetch();

    if (password_verify($_POST['member_password'], $cek_password['member_password'])) {
        if ($_POST["password_baru"] == $_POST["ulangi_password"]) {
            $pwd = password_hash($_POST["password_baru"], PASSWORD_DEFAULT);
            $simpan = $con->update(
                "tb_member",
                array(
                    "member_password" => $pwd,
                    "member_password_repeat" => $_POST["ulangi_password"],
                ),
                array(
                    "member_id" => $_POST['member_id']
                )
            );
            if ($simpan == TRUE) {
                echo "<script>alert('Berhasil di Update');
                          window.location.href='index.php?page=informasi_pribadi';</script>";
            } else {
                echo "<script>alert('Gagal di Update');
                          window.location.href='index.php?page=informasi_pribadi';</script>";
            }
        } else {
            echo "<script>alert('Password Tidak Sama');
                      window.location.href='index.php?page=password';</script>";
        }
    } else {
        echo "<script>alert('Password Lama Salah');
                      window.location.href='index.php?page=password';</script>";
    }
}
