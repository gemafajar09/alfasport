<?php
if (@$_COOKIE['member_id'] == '') {
    echo "<script>window.location='index.php?page=login';</script>";
}
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

if (isset($_POST['simpan'])) {

    $nmberkas  = $_FILES["foto"]["name"];
    $lokberkas = $_FILES["foto"]["tmp_name"];

    if (!empty($lokberkas)) {
        $nmfoto = date("YmdHis") . $nmberkas;
        move_uploaded_file($lokberkas, "../img/$nmfoto");

        $simpan = $con->update(
            "tb_member",
            array(
                "member_nama" => $_POST["member_nama"],
                "member_email" => $_POST["member_email"],
                "member_notelp" => $_POST["member_notelp"],
                "member_tgl_lahir" => $_POST["member_tgl_lahir"],
                "member_gender" => $_POST["member_gender"],
                "member_profesi" => $_POST["member_profesi"],
                "member_foto" => $nmfoto
            ),
            array(
                "member_id" => $_POST['member_id']
            )
        );
    } else {
        $simpan = $con->update(
            "tb_member",
            array(
                "member_nama" => $_POST["member_nama"],
                "member_email" => $_POST["member_email"],
                "member_notelp" => $_POST["member_notelp"],
                "member_tgl_lahir" => $_POST["member_tgl_lahir"],
                "member_gender" => $_POST["member_gender"],
                "member_profesi" => $_POST["member_profesi"],
            ),
            array(
                "member_id" => $_POST['member_id']
            )
        );
    }
    if ($simpan == TRUE) {
        echo "<script>alert('Berhasil di Update');
                      window.location.href='index.php?page=account';</script>";
    } else {
        echo "<script>alert('Gagal di Update');
                      window.location.href='index.php?page=account';</script>";
    }
}
