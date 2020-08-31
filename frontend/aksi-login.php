<?php
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cek = $con->query("SELECT * FROM tb_member WHERE member_email = '$email'")->fetch();
  if ($cek['member_email'] == $email) {
    if (password_verify($password, $cek['member_password'])) {
      setcookie('member_id', "$cek[member_id]", time() + (86400 * 30), "/");
      setcookie('member_kode', "$cek[member_kode]", time() + (86400 * 30), "/");
      setcookie('member_nama', "$cek[member_nama]", time() + (86400 * 30), "/");
      setcookie('success', "Selamat Datang.!!", time() + 1, "/");
      header('location: ./');
    } else {
      setcookie('error', "Maaf Password Salah.!!", time() + 1, "/");
      header('location: index.php?page=login');
    }
  } else {
    setcookie('error', "Maaf Email Salah.!!", time() + 1, "/");
    header('location: index.php?page=login');
  }
}
