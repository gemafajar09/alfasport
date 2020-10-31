<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// $data = $con->get("tb_gudang_detail", "*", array("id_detail" => $_POST['id_detail']));

$data = $con->query("SELECT
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_jumlah,
                        tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_tgl,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode
                    From
                    tb_gudang_kaos_kaki Inner Join
                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode =
                            tb_gudang_kaos_kaki.gudang_kaos_kaki_kode
                    WHERE tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id='$_POST[gudang_kaos_kaki_detail_id]'")->fetch();

echo json_encode($data);
