<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_stok_toko
                        JOIN tb_gudang ON tb_stok_toko.id_gudang = tb_gudang.id_gudang
                        WHERE tb_stok_toko.id_toko = '$_GET[id_toko]'");
echo "<option value=''>Pilih Barang</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_gudang'] . ">" . $a['nama'] . "</option>";
}
