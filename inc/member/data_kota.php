<?php

include "../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_kota WHERE id_prov = '$_GET[id_prov]'");
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_kota'] . ">" . $a['nama_kota'] . "</option>";
}
