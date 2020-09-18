<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
tb_stok_toko.jumlah,
tb_gudang.jual,
tb_stok_toko.id_gudang,
IFNULL(
    tb_flash_diskon_persen.potongan,
    0
) AS potongan,
IFNULL(
    tb_flash_diskon_persen.persen,
    0
) AS persen
FROM
tb_stok_toko
LEFT JOIN tb_gudang_detail ON tb_gudang_detail.id_detail = tb_stok_toko.id_gudang
LEFT JOIN tb_gudang ON tb_gudang.id = tb_gudang_detail.id
LEFT JOIN tb_flash_diskon_persen ON tb_flash_diskon_persen.barcode = tb_gudang_detail.barcode
WHERE tb_stok_toko.id_stok_toko='$_POST[id]' LIMIT 1")->fetch();
// backup lama
// $data = $con->query("
// SELECT 
// a.jumlah, 
// b.jual, 
// a.id_gudang, 
// if(d.potongan != NULL, d.potongan, 0) as potongan,
// if(d.persen != NULL, d.persen, 0) as persen
// FROM tb_stok_toko a 
// LEFT JOIN tb_gudang b 
// ON a.id_gudang=b.id_gudang 
// LEFT JOIN tb_gudang_detail c 
// ON b.id=c.id 
// LEFT JOIN tb_flash_diskon_persen d
// ON c.barcode=d.barcode
// WHERE a.id_stok_toko='$_POST[id]' LIMIT 1")->fetch();

echo json_encode($data);
