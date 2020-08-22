<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// $data = $con->get("tb_gudang_detail", "*", array("id_detail" => $_POST['id_detail']));

$data = $con->query("SELECT
                                    tb_gudang_detail.id_detail,
                                    tb_gudang_detail.id_ukuran,
                                    tb_gudang_detail.jumlah,
                                    tb_gudang_detail.barcode,
                                    tb_gudang_detail.tanggal,
                                    tb_gudang.artikel,
                                    tb_gudang.nama,
                                    tb_all_ukuran.ue,
                                    tb_all_ukuran.uk,
                                    tb_all_ukuran.us,
                                    tb_all_ukuran.cm,
                                    tb_gudang_detail.id,
                                    tb_restock.restock_tgl,
                                    tb_restock.restock_jumlah_awal,
                                    tb_restock.restock_jumlah_tambah
                                From
                                    tb_gudang Inner Join
                                    tb_gudang_detail On tb_gudang.id = tb_gudang_detail.id Inner Join
                                    tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_gudang_detail.id_ukuran Inner Join
                                    tb_restock ON tb_restock.id_detail = tb_gudang_detail.id_detail 
                                WHERE tb_restock.id_detail='$_POST[id_detail]'
                                LIMIT 1")->fetch();

echo json_encode($data);
