<?php

include "../../config/koneksi.php";

$data = $con->query("SELECT a.*, b.*, c.*, e.* 
                        FROM tb_gudang a 
                        LEFT JOIN tb_gudang_detail b ON a.id = b.id 
                        LEFT JOIN tb_all_ukuran c ON b.id_ukuran = c.id_ukuran
                        JOIN tb_stok_toko d ON d.id_gudang = a.id_gudang 
                        JOIN toko e ON d.id_toko = e.id_toko 
                        WHERE e.id_toko = '$_GET[id_toko]'");
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_gudang'] . ">" . $a['artikel'] . " - " . $a['nama'] . " - (" . $a['ue'] . " / " . $a['uk'] . " / " . $a['us'] . " / " . $a['cm']  . ")</option>";
}
