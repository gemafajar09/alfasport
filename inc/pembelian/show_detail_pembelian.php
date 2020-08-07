<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query(" SELECT a.pembelian_id,
                        a.pembelian_no_invoice,
                        a.pembelian_tgl_beli,
                        b.supplier_nama,
                        a.pembelian_create_at
                FROM tb_pembelian a
                JOIN tb_supplier b ON a.supplier_id=b.supplier_id
                WHERE a.pembelian_id = :pembelian_id LIMIT 1
                ", array("pembelian_id" => $_POST['pembelian_id']))->fetch();

echo json_encode($data);
