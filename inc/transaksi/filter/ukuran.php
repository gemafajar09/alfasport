<?php

include "../../../config/koneksi.php";
$size = $_POST['size'];
$data = $con->query("SELECT a.id_stok_toko, b.$size FROM `tb_stok_toko` a
                        JOIN tb_all_ukuran b ON a.id_ukuran = b.id_ukuran
                        WHERE a.id_stok_toko = '$_POST[id]'");
echo "<option value=''>Pilih Ukuran</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_stok_toko'] . ">" . $a[$size] . "</option>";
}
 