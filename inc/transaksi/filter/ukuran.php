<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM `tb_stok_toko` a
                        JOIN tb_all_ukuran b ON a.id_ukuran = b.id_ukuran
                        WHERE a.id_stok_toko = '$_POST[id]'");
echo "<option value=''>Pilih Ukuran</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_stok_toko'] . ">" . $a['ue'] . "-".$a['uk']."-".$a['us']."-".$a['cm']."</option>";
}
 