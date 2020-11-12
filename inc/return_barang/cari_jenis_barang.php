<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_barang.barang_kode,
                        tb_barang.barang_nama,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang_detail.barang_detail_barcode,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran,
                        tb_barang_toko.barang_toko_id,
                        tb_barang_toko.id_toko
                        From
                        tb_barang_toko Inner Join
                        tb_barang_detail On tb_barang_detail.barang_detail_id =
                                tb_barang_toko.barang_detail_id Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                        WHERE tb_barang.barang_kategori = '$_POST[barang_kategori]'
                        AND tb_barang_toko.id_toko = '$_POST[id_toko]'");



echo "<option>-Pilih Barang-</option>";

if ($_POST['barang_kategori'] == 'Sepatu') {
    foreach ($data as $i => $a) {
        echo "<option value=" . $a['barang_toko_id'] . ">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . " - " . $a['barang_detail_barcode'] . " - (UE : " . $a['sepatu_ue'] . " | UK : " . $a['sepatu_uk'] . " | US : " . $a['sepatu_us'] . " | CM : " . $a['sepatu_cm'] . ")</option>";
    }
} elseif ($_POST['barang_kategori'] == 'Kaos Kaki') {
    foreach ($data as $i => $a) {
        echo "<option value=" . $a['barang_toko_id'] . ">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . " - " . $a['barang_detail_barcode'] . " - (EU : " . $a['kaos_kaki_eu'] . " | SIZE : " . $a['kaos_kaki_size'] . ")</option>";
    }
} elseif ($_POST['barang_kategori'] == 'Barang Lainnya') {
    foreach ($data as $i => $a) {
        echo "<option value=" . $a['barang_toko_id'] . ">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . " - " . $a['barang_detail_barcode'] . " - (Nama Ukuran : " . $a['barang_lainnya_nama_ukuran'] . ")</option>";
    }
}
