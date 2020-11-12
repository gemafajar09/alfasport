<?php
include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_subdivisi WHERE divisi_id = '$_GET[divisi_id]'");
foreach ($data as $i => $a) {
    echo "<option value=" . $a['subdivisi_id'] . ">" . $a['subdivisi_nama'] . "</option>";
}
