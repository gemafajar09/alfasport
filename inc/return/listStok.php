<?php
include "../../config/koneksi.php";

$id_toko = $_POST['id_toko'];

$data = $con->query("
SELECT 
* 
FROM `tb_stok_toko` a
LEFT JOIN tb_gudang_detail b
ON a.id_gudang = b.id_detail
LEFT JOIN tb_gudang c
ON c.id=b.id
WHERE id_toko = '$id_toko'
")->fetch(PDO::FETCH_ASSOC);