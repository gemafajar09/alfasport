<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query("SELECT
                        tb_beli.beli_id,
                        tb_beli.beli_invoice,
                        tb_beli.beli_tgl_beli,
                        tb_beli.beli_create_at,
                        tb_supplier.supplier_nama
                        From
                        tb_beli Inner Join
                        tb_supplier On tb_supplier.supplier_id = tb_beli.supplier_id
                        WHERE tb_beli.beli_id = :beli_id LIMIT 1
                        ", array("beli_id" => $_POST['beli_id']))->fetch();

echo json_encode($data);
