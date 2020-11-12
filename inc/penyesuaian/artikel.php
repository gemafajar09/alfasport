<option value="">-Pilih-</option>
<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$datag = $con->query(" 
SELECT tb_barang_toko.barang_toko_id,
tb_barang_toko.id_toko,
tb_barang_toko.barang_detail_id,
tb_barang_toko.barang_toko_jml,
tb_barang_toko.ukuran_id,
tb_barang_toko.barang_toko_tgl,
tb_barang_detail.barang_detail_barcode,
tb_barang.barang_artikel,
tb_barang.barang_nama,
tb_ukuran.sepatu_ue
FROM   tb_barang_toko
INNER JOIN tb_barang_detail
        ON tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
INNER JOIN tb_barang
        ON tb_barang.barang_id = tb_barang_detail.barang_id
INNER JOIN tb_ukuran
        ON tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
WHERE  tb_barang_toko.id_toko = '$_POST[id_toko]'
                    ")->fetchAll();

foreach ($datag as $gudang) {
?>
    <option value="<?= $gudang['barang_toko_id'] ?>"> <?= $gudang['barang_artikel'] ?> - <?= $gudang['barang_nama'] ?> - <?= $gudang['sepatu_ue'] ?></option>
<?php
}
?>