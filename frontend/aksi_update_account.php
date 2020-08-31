<?php
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

if (isset($_POST['simpan'])) {

    $simpan = $con->update(
        "tb_member",
        array(
            "member_nama" => $_POST["member_nama"],
            "member_email" => $_POST["member_email"],
            "id_prov" => $_POST["id_prov"],
            "id_kota" => $_POST["id_kota"],
            "member_alamat" => $_POST["member_alamat"],
            "member_notelp" => $_POST["member_notelp"],
            "member_tgl_lahir" => $_POST["member_tgl_lahir"],
            "member_gender" => $_POST["member_gender"],
            "member_profesi" => $_POST["member_profesi"],
        ),
        array(
            "member_id" => $_POST['member_id']
        )
    );
    if ($simpan == TRUE) {
        echo "<script>alert('Berhasil di Update');
                      window.location.href='index.php?page=account';</script>";
    } else {
        echo "<script>alert('Gagal di Update');
                      window.location.href='index.php?page=account';</script>";
    }
}
