<?php
include "../../../config/koneksi.php";

$cari_jenis = $con->query("SELECT barang_kategori FROM tb_barang WHERE barang_id = '$_GET[id]'")->fetch();

$data = $con->query("SELECT * FROM tb_ukuran WHERE merk_id = '$_GET[merk]' AND subdivisi_id = '$_GET[subdivisi]' AND ukuran_kategori = '$cari_jenis[barang_kategori]'");

echo "<option>-Pilih Ukuran-</option>";

if ($cari_jenis['barang_kategori'] == 'Sepatu') {
    foreach ($data as $i => $a) {
        echo "<option value=" . $a['ukuran_id'] . "> UE : " . $a['sepatu_ue'] . " | UK : " . $a['sepatu_uk'] . " | US : " . $a['sepatu_us'] . " | CM : " . $a['sepatu_cm'] . "</option>";
    }
} elseif ($cari_jenis['barang_kategori'] == 'Kaos Kaki') {
    foreach ($data as $i => $a) {
        echo "<option value=" . $a['ukuran_id'] . "> EU : " . $a['kaos_kaki_eu'] . " | SIZE : " . $a['kaos_kaki_size'] . "</option>";
    }
} elseif ($cari_jenis['barang_kategori'] == 'Barang Lainnya') {
    foreach ($data as $i => $a) {
        echo "<option value=" . $a['ukuran_id'] . "> Nama Ukuran : " . $a['barang_lainnya_nama_ukuran'] . "</option>";
    }
}
