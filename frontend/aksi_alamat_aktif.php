<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

include "../config/koneksi.php";

$simpan = $con->update(
  "tb_member",
  array(
    "alamat_id" => $_GET["alamat_id"],
  ),
  array(
    "member_id" => $_COOKIE['member_id']
  )
);

if ($simpan) {
  echo "<script>window.location.href='index.php?page=alamat';</script>";
} else {
  echo "<script>window.location.href='index.php?page=alamat';</script>";
}
