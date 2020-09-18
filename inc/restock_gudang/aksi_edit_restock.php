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
                        tb_gudang.nama
                    From
                        tb_gudang_detail 
                    Inner Join
                        tb_gudang On tb_gudang.id = tb_gudang_detail.id 
                    WHERE tb_gudang_detail.id_detail='$_POST[id_detail]'")->fetch();

echo json_encode($data);
