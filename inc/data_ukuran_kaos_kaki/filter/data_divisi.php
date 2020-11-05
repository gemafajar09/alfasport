<?php
include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_divisi WHERE kategori_id = '$_GET[kategori_id]'");
echo "<option>-Pilih Divisi-</option>";
foreach ($data as $i => $a) {
    echo "<option value=" . $a['divisi_id'] . ">" . $a['divisi_nama'] . "</option>";
}
