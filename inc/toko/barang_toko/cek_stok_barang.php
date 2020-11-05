<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->query("SELECT
                        tb_barang_detail.barang_detail_id,
                        tb_barang_detail.ukuran_id,
                        tb_barang_detail.barang_detail_jml
                    From
                    tb_barang_detail 
                    WHERE tb_barang_detail.barang_detail_id = '$_POST[barang_detail_id]'")->fetch();
echo json_encode($edit);
