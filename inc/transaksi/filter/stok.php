<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
tb_barang_toko.barang_toko_jml,
tb_barang.barang_jual,
tb_barang.barang_kategori,
tb_barang_toko.barang_detail_id,
IFNULL(
    tb_flash_diskon_persen.potongan,
    0
) AS potongan,
IFNULL(
    tb_flash_diskon_persen.persen,
    0
) AS persen
FROM
tb_barang_toko
LEFT JOIN tb_barang_detail ON tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
LEFT JOIN tb_barang ON tb_barang.barang_id = tb_barang_detail.barang_id
LEFT JOIN tb_flash_diskon_persen ON tb_flash_diskon_persen.barcode = tb_barang_detail.barang_detail_barcode
WHERE tb_barang_toko.barang_toko_id='$_POST[id]' LIMIT 1")->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
