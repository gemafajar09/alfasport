<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// $data = $con->get("tb_gudang_detail", "*", array("id_detail" => $_POST['id_detail']));

$data = $con->query("SELECT
                        tb_gudang_lainnya.gudang_lainnya_artikel,
                        tb_gudang_lainnya.gudang_lainnya_nama,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_id,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_jumlah,
                        tb_gudang_lainnya_detail.ukuran_barang_detail_id,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_tgl,
                        tb_gudang_lainnya.gudang_lainnya_kode
                    From
                    tb_gudang_lainnya Inner Join
                    tb_gudang_lainnya_detail On tb_gudang_lainnya_detail.gudang_lainnya_kode =
                            tb_gudang_lainnya.gudang_lainnya_kode
                    WHERE tb_gudang_lainnya_detail.gudang_lainnya_detail_id='$_POST[gudang_lainnya_detail_id]'")->fetch();

echo json_encode($data);
