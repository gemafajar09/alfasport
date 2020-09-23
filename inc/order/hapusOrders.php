<?php

include "../../config/koneksi.php";

$id_order = $_POST['id_order'];

 $con->query("DELETE FROM tb_orders WHERE id_order = '$id_order'");
$hapus = $con->query("DELETE FROM tb_orders_detail WHERE id_order = '$id_order'");

echo json_encode($hapus);