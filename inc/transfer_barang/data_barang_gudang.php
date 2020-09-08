<?php

include "../../config/koneksi.php";

$data = $con->query("
SELECT 
a.artikel,
a.nama,
b.id_detail,
c.ue, 
c.uk, 
c.us, 
c.cm
FROM tb_gudang a
LEFT JOIN tb_gudang_detail b
ON a.id=b.id
LEFT JOIN tb_all_ukuran c
ON c.id_ukuran=b.id_ukuran
");
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_detail'] . ">" . $a['artikel'] . " - " . $a['nama'] . " - (" . $a['ue'] . " / " . $a['uk'] . " / " . $a['us'] . " / " . $a['cm']  . ")</option>";
}
