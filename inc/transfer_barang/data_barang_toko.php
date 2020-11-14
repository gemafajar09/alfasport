<?php

include "../../config/koneksi.php";

$data = $con->query("SELECT
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang_detail.barang_detail_id,
                        tb_barang_detail.barang_detail_barcode,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran
                    From
                        tb_barang_toko Inner Join
                        tb_barang_detail On tb_barang_detail.barang_detail_id =
                                tb_barang_toko.barang_detail_id Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                    WHERE tb_barang_toko.id_toko= '$_GET[id_toko]'
                    ORDER BY tb_barang.barang_kategori DESC");

echo "<option>-Pilih Barang-</option>";

foreach ($data as $i => $a) {
    if ($a['barang_kategori'] == 'Sepatu') {
        echo "<option value=" . $a['barang_detail_id'] . ">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . " - " . $a['barang_detail_barcode'] . " - ( EU : " . $a['sepatu_ue'] . " / UK : " . $a['sepatu_uk'] . " / US : " . $a['sepatu_us'] . " / CM : " . $a['sepatu_cm']  . ")</option>";
    } elseif ($a['barang_kategori'] == 'Kaos Kaki') {
        echo "<option value=" . $a['barang_detail_id'] . ">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . " - " . $a['barang_detail_barcode'] . " - ( EU : " . $a['kaos_kaki_eu'] . " / Size : " . $a['kaos_kaki_size'] . ")</option>";
    } elseif ($a['barang_kategori'] == 'Barang Lainnya') {
        echo "<option value=" . $a['barang_detail_id'] . ">" . $a['barang_nama'] . " - " . $a['barang_artikel'] . " - " . $a['barang_detail_barcode'] . " - ( Ukuran : " . $a['barang_lainnya_nama_ukuran'] . ")</option>";
    }
}
