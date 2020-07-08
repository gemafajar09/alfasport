<?php
include "../config/koneksi.php";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek = $con->query("SELECT * FROM tb_admin WHERE username = '$username'")->fetch();
    if($cek['username'] == $username)
    {
        if(password_verify($password, $cek['password'],))
        {
            setcookie('id_admin', "$cek[id_admin]", time() + (86400 * 30), "/");
            setcookie('nama', "$cek[nama]", time() + (86400 * 30), "/");
            setcookie('level', "$cek[level]", time() + (86400 * 30), "/");
            setcookie('success', "Selamat Datang.!!", time() + 1, "/");
            header('location:home.html');
        }
        else
        {
            setcookie('error', "Maaf Password Salah.!!", time() + 1, "/");
            header('location:home.html');
        }
    }
    else
    {
        setcookie('error', "Maaf Username Salah.!!", time() + 1, "/");
        header('location:login.html');
    }
}elseif(isset($_POST['regis']))
{
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $level = $_POST['level'];
    if($password1 == $password2)
    {
        $pwd = password_hash($password1, PASSWORD_DEFAULT);
        $simpan = $con->query("INSERT INTO tb_admin (`nama`, `username`, `password`, `password_repeat`, `level`) VALUES ('$nama','$username','$pwd', '$password1','$level' )");
        if($simpan == TRUE)
        {
            setcookie('success', "Selamat Akun Success Dibuat.!!", time() + 1, "/");
            header('location:login.html');
        }
        else
        {
            setcookie('error', "ERROR.!!", time() + 1, "/");
            header('location:daftar.html');
        }
    }
}