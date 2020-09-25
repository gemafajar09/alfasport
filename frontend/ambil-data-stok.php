<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}
include "../config/koneksi.php";

$id_stok = $_POST['id_stok'];

$data = $con->query("SELECT jumlah FROM tb_stok_toko WHERE id_stok_toko = '$id_stok'")->fetch();

echo json_encode($data);
