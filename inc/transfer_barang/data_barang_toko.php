<?php

include "../../config/koneksi.php";

$data = $con->query("
SELECT 
c.id_detail,
b.artikel,
b.nama,
d.ue, 
d.uk, 
d.us, 
d.cm,
c.barcode
FROM tb_stok_toko a 
LEFT JOIN tb_gudang b 
ON a.id_gudang=b.id_gudang 
LEFT JOIN tb_gudang_detail c
ON b.id=c.id
LEFT JOIN tb_all_ukuran d
ON d.id_ukuran=c.id_ukuran
WHERE a.id_toko= '$_GET[id_toko]'");
echo "<option>-Pilih Barang-</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_detail'] . ">" . $a['nama'] . " - " . $a['artikel'] . " - " . $a['barcode'] ." - (" . $a['ue'] . " / " . $a['uk'] . " / " . $a['us'] . " / " . $a['cm']  . ")</option>";
}
