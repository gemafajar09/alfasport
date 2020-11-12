<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_barang_toko
                        JOIN tb_barang_detail ON tb_barang_toko.barang_detail_id = tb_barang_detail.barang_detail_id
                        JOIN tb_barang ON tb_barang_detail.barang_id = tb_barang.barang_id
                        WHERE tb_barang_toko.id_toko = '$_GET[id_toko]'
                        GROUP BY tb_barang.barang_nama");
echo "<option value=''>Pilih Barang</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['barang_id'].">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . "</option>";
}
