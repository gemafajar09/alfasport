<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query("
                SELECT a.detail_id, 
                        a.detail_kode, 
                        a.detail_tgl, 
                        a.transaksi_id, 
                        d.nama, 
                        b.nama_toko, 
                        d.jual, 
                        a.detail_jumlah_beli, 
                        a.detail_total_harga 
                FROM tb_transaksi_detail a 
                JOIN toko b ON a.id_toko=b.id_toko 
                JOIN tb_stok_toko c ON a.id_toko=c.id_toko 
                JOIN tb_gudang d ON c.id_gudang=d.id_gudang 
                WHERE a.transaksi_id = :transaksi_id LIMIT 1
                ", array("transaksi_id" => $_POST['transaksi_id']))->fetch();

echo json_encode($data);

