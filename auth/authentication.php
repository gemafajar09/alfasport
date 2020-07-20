<?php
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek = $con->query("SELECT * FROM tb_karyawan WHERE username = '$username'")->fetch();
    if ($cek['username'] == $username) {
        if (password_verify($password, $cek['password'],)) {
            setcookie('id_karyawan', "$cek[id_karyawan]", time() + (86400 * 30), "/");
            setcookie('nama', "$cek[nama]", time() + (86400 * 30), "/");
            setcookie('jabatan_id', "$cek[jabatan_id]", time() + (86400 * 30), "/");
            setcookie('id_toko', "$cek[id_toko]", time() + (86400 * 30), "/");
            setcookie('success', "Selamat Datang.!!", time() + 1, "/");
            header('location:home.html');
        } else {
            setcookie('error', "Maaf Password Salah.!!", time() + 1, "/");
            header('location:home.html');
        }
    } else {
        setcookie('error', "Maaf Username Salah.!!", time() + 1, "/");
        header('location:login.html');
    }
} elseif (isset($_POST['regis'])) {

    $date   = new DateTime(); //this returns the current date time
    $result = $date->format('y-m-d-H-i-s');
    $krr    = explode('-', $result);
    $kode = implode("", $krr);


    $id             = $kode;
    $nik            = $_POST["nik"];
    $nama           = $_POST["nama"];
    $no_telpon      = $_POST["no_telpon"];
    $alamat         = $_POST["alamat"];
    $email_karyawan = $_POST["email_karyawan"];
    $username       = $_POST["username"];
    $foto           = $_FILES["foto"];
    $foto_ktp       = $_FILES["foto_ktp"];
    $id_toko        = $_POST["id_toko"];
    $password       = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];

    if ($password == $password_repeat) {
        $pwd = password_hash($password, PASSWORD_DEFAULT);
        $data['foto'] = fileUpload($_FILES['foto'], "../img/karyawan/");
        $data['foto_ktp'] = fileUpload($_FILES['foto_ktp'], "../img/karyawan/");

        $simpan = $con->insert(
            "tb_karyawan",
            array(
                "id" => $id,
                "nik" => $_POST["nik"],
                "nama" => $_POST["nama"],
                "no_telpon" => $_POST["no_telpon"],
                "alamat" => $_POST["alamat"],
                "email_karyawan" => $_POST["email_karyawan"],
                "username" => $_POST["username"],
                "password" => $pwd,
                "password_repeat" => $password_repeat,
                "foto" => $data["foto"],
                "foto_ktp" => $data["foto_ktp"],
                "jabatan_id" => '3',
                "id_toko" => $_POST["id_toko"]
            )
        );

        if ($simpan == TRUE) {
            setcookie('success', "Selamat Akun Success Dibuat.!!", time() + 1, "/");
            header('location:login.html');
        } else {
            setcookie('error', "ERROR.!!", time() + 1, "/");
            header('location:daftar.html');
        }
    }
}
