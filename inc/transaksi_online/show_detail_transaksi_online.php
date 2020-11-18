<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT 
                        tb_transaksi_online.transol_id, 
                        tb_transaksi_online.transol_kode, 
                        tb_transaksi_online.transol_tgl,
                        toko.nama_toko,
                        tb_data_toko_online.data_toko_online_nama
                    From tb_transaksi_online 
                    Inner Join toko On toko.id_toko = tb_transaksi_online.id_toko 
                    Inner Join tb_data_toko_online On tb_data_toko_online.data_toko_online_id = tb_transaksi_online.data_toko_online_id 
                    WHERE tb_transaksi_online.transol_id = :transaksi_id", array("transaksi_id" => $_POST['transaksi_id']))->fetch();
echo json_encode($data);
