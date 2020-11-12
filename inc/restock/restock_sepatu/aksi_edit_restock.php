<?php
include "../../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang_detail.barang_detail_id,
                        tb_barang_detail.barang_detail_jml,
                        tb_barang_detail.ukuran_id,
                        tb_barang_detail.barang_detail_barcode,
                        tb_barang_detail.barang_detail_tgl,
                        tb_barang.barang_kode
                    From
                    tb_barang Inner Join
                    tb_barang_detail On tb_barang_detail.barang_id =
                            tb_barang.barang_id
                    WHERE tb_barang_detail.barang_detail_id='$_POST[barang_detail_id]'")->fetch();

echo json_encode($data);
