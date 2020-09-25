<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$date = date('Y-m-d H:i:s');

$resi = $_POST['resi'];
$status_order = 'Barang Telah Dikirim';
$id_order = $_POST['id_order'];
$con->query("INSERT INTO `tb_status_orders` VALUES ('','$id_order','$status_order','$date')");
$update = $con->query("UPDATE tb_orders SET status_order='$status_order', resi='$resi' WHERE id_order='$id_order'");
echo json_encode($update);
