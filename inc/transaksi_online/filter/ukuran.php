<?php

include "../../../config/koneksi.php";
$size = $_POST['size'];

// $data = $con->query("SELECT a.id_stok_toko, b.$size FROM `tb_stok_toko` a
//                         JOIN tb_all_ukuran b ON a.id_ukuran = b.id_ukuran
//                         WHERE a.id_stok_toko = '$_POST[id]'");

$data = $con->query("SELECT
tb_stok_toko.id_stok_toko,
tb_all_ukuran.$size
From
tb_gudang Inner Join
tb_gudang_detail On tb_gudang_detail.id = tb_gudang.id Inner Join
tb_stok_toko On tb_gudang_detail.id_detail = tb_stok_toko.id_gudang Inner Join
tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_stok_toko.id_ukuran
WHERE tb_gudang.id_gudang = '$_POST[id]'
AND tb_stok_toko.id_toko = '$_POST[id_toko]'");


echo "<option value=''>Pilih Ukuran</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_stok_toko'] . ">" . $a[$size] . "</option>";
}
