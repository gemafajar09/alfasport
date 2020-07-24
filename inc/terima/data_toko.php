<?php

include "../../config/koneksi.php";

$data = $con->query("SELECT * FROM toko WHERE id_toko != '$_GET[id_toko]'");
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
}
