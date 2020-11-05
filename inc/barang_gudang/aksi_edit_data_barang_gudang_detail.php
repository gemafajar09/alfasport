<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->query("SELECT
                        tb_barang.subdivisi_id,
                        tb_barang.merk_id,
                        tb_barang.barang_id,
                        tb_barang_detail.barang_detail_id,
                        tb_barang_detail.barang_id,
                        tb_barang_detail.ukuran_id,
                        tb_barang_detail.barang_detail_barcode,
                        tb_barang_detail.barang_detail_jml,
                        tb_barang_detail.barang_detail_tgl
                    From
                    tb_barang_detail Inner Join
                    tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id
                    WHERE tb_barang_detail.barang_detail_id = :barang_detail_id ", array("barang_detail_id" => $_POST["barang_detail_id"]))->fetch();
echo json_encode($edit);
