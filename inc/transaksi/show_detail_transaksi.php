<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT tb_transaksi.transaksi_id, tb_transaksi.transaksi_kode, tb_transaksi.transaksi_tgl,toko.nama_toko From tb_transaksi Inner Join toko On toko.id_toko = tb_transaksi.id_toko WHERE tb_transaksi.transaksi_id = :transaksi_id", array("transaksi_id" => $_POST['transaksi_id']))->fetch();

echo json_encode($data);
