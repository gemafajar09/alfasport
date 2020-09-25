<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

include "../config/koneksi.php";

$json = file_get_contents('php://input');
$post = json_decode($json, true);

$data = $con->query("
SELECT
c.potongan
FROM
tb_stok_toko a
LEFT JOIN tb_gudang_detail b
ON a.id_gudang=b.id_detail
LEFT JOIN tb_flash_diskon_persen c 
ON c.barcode=b.barcode
LEFT JOIN tb_flash_diskon d
ON c.id_diskon=d.id_diskon
WHERE a.id_stok_toko = '$post[id_stok]' AND CURDATE() >= d.tgl_mulai AND CURDATE() <= d.tgl_berakhir
")->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
