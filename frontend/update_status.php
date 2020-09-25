<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

include "../config/koneksi.php";

$date = date('Y-m-d H:i:s');

$simpan = $con->insert(
  "tb_status_orders",
  array(
    "id_order" => $_GET['id'],
    "status_order" => "Barang Telah Diterima",
    "tgl_status" => $date
  )
);

$simpan = $con->update(
  "tb_orders",
  array(
    "status_order" => "Barang Telah Diterima"
  ),
  array(
    "id_order" => $_GET['id']
  )
);

if ($simpan) {
  echo "<script>window.location.href='index.php?page=order_history';</script>";
}
