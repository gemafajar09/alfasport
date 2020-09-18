<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_stok_toko
                        JOIN tb_gudang_detail ON tb_stok_toko.id_gudang = tb_gudang_detail.id_detail
                        JOIN tb_gudang ON tb_gudang_detail.id = tb_gudang.id
                        WHERE tb_stok_toko.id_toko = '$_GET[id_toko]'
                        GROUP BY tb_gudang.nama");
echo "<option value=''>Pilih Barang</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_gudang'] . ">" . $a['nama'] . " - " . $a['artikel'] . "</option>";
}
