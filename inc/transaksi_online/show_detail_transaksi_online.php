<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query("SELECT
                        tb_transaksi_online_detail.transol_detail_id,
                        tb_transaksi_online_detail.transol_detail_kode,
                        tb_transaksi_online_detail.transol_detail_tgl,
                        tb_transaksi_online_detail.transol_id,
                        toko.nama_toko,
                        tb_gudang.nama,
                        tb_gudang.jual,
                        tb_transaksi_online_detail.transol_detail_jumlah_beli,
                        tb_transaksi_online_detail.transol_detail_total_harga
                From
                        tb_transaksi_online_detail 
                Inner Join
                        toko On toko.id_toko = tb_transaksi_online_detail.id_toko 
                Inner Join
                        tb_gudang On tb_gudang.id_gudang = tb_transaksi_online_detail.id_gudang 
                Inner Join
                        tb_stok_toko On toko.id_toko = tb_stok_toko.id_toko
                WHERE tb_transaksi_online_detail.transol_id = :transol_id 
                LIMIT 1 
                ", array("transol_id" => $_POST['transol_id']))->fetch();

echo json_encode($data);
